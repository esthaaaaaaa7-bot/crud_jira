<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $userId = session('user')->id;
        $projectIds = ProjectUser::where('user_id', $userId)->pluck('project_id');
        $adminProjectIds = ProjectUser::where('user_id', $userId)
            ->where('role', 'Administrator')
            ->pluck('project_id');

        $teams = Team::whereIn('project_id', $projectIds)
            ->with(['users', 'project'])
            ->latest()
            ->paginate(5);

        $availableUsers = User::orderBy('name')->get();

        $projects = Project::whereIn('id', $adminProjectIds)->get();

        return view('team', compact('teams', 'availableUsers', 'projects', 'adminProjectIds'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_team'  => 'required|string|max:100',
            'project_id' => 'required|exists:projects,id',
            'members'    => 'required|array|min:1',
            'members.*'  => 'exists:users,id',
        ]);

        $userId    = session('user')->id;
        $projectId = $request->project_id;

        $isAdmin = ProjectUser::where('user_id', $userId)
            ->where('project_id', $projectId)
            ->where('role', 'Administrator')
            ->exists();

        if (!$isAdmin) {
            return response()->json(['message' => 'Hanya Administrator project yang dapat membuat team.'], 403);
        }

        $team = Team::create([
            'nama_team'  => $request->nama_team,
            'project_id' => $projectId,
            'deskripsi'  => $request->deskripsi ?? null,
            'created_by' => $userId,
        ]);

        $team->users()->sync($request->members);

        foreach ($request->members as $memberId) {
            ProjectUser::firstOrCreate(
                ['project_id' => $projectId, 'user_id' => $memberId],
                ['role' => 'member']
            );
        }

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'team'    => $team->load(['users', 'project']),
            ]);
        }

        return redirect()->route('team')->with('success', "Team '{$team->nama_team}' berhasil dibuat!");
    }

    public function update(Request $request, $id)
    {
        $userId = session('user')->id;

        $team = Team::findOrFail($id);

        $isAdmin = ProjectUser::where('user_id', $userId)
            ->where('project_id', $team->project_id)
            ->where('role', 'Administrator')
            ->exists();

        if (!$isAdmin) {
            return response()->json(['message' => 'Hanya Administrator project yang dapat mengubah team.'], 403);
        }

        $request->validate([
            'nama_team' => 'required|string|max:100',
            'members'   => 'required|array|min:1',
            'members.*' => 'exists:users,id',
        ]);

        $oldMemberIds = $team->users()->pluck('users.id')->toArray();
        $newMemberIds = array_map('intval', $request->members);

        $team->update([
            'nama_team' => $request->nama_team,
            'deskripsi' => $request->deskripsi ?? $team->deskripsi,
        ]);

        $team->users()->sync($newMemberIds);

        foreach ($newMemberIds as $memberId) {
            ProjectUser::firstOrCreate(
                ['project_id' => $team->project_id, 'user_id' => $memberId],
                ['role' => 'member']
            );
        }

        $removedMemberIds = array_diff($oldMemberIds, $newMemberIds);

        foreach ($removedMemberIds as $removedId) {
            $stillInOtherTeam = Team::where('project_id', $team->project_id)
                ->where('id', '!=', $team->id)
                ->whereHas('users', fn($q) => $q->where('users.id', $removedId))
                ->exists();

            if (!$stillInOtherTeam) {
                ProjectUser::where('project_id', $team->project_id)
                    ->where('user_id', $removedId)
                    ->where('role', '!=', 'Administrator') // jangan hapus Administrator
                    ->delete();
            }
        }

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'team'    => $team->load(['users', 'project']),
            ]);
        }

        return redirect()->route('team')->with('success', 'Team berhasil diupdate!');
    }

    public function destroy($id)
    {
        $userId = session('user')->id;

        $team = Team::with('users')->findOrFail($id);

        $isAdmin = ProjectUser::where('user_id', $userId)
            ->where('project_id', $team->project_id)
            ->where('role', 'Administrator')
            ->exists();

        if (!$isAdmin) {
            if (request()->wantsJson() || request()->ajax()) {
                return response()->json(['message' => 'Hanya Administrator project yang dapat menghapus team.'], 403);
            }
            return redirect()->back()->with('error', 'Tidak punya akses untuk menghapus team ini.');
        }

        $memberIds = $team->users()->pluck('users.id')->toArray();

        $team->delete();

        foreach ($memberIds as $memberId) {
            $stillInOtherTeam = Team::where('project_id', $team->project_id)
                ->whereHas('users', fn($q) => $q->where('users.id', $memberId))
                ->exists();

            if (!$stillInOtherTeam) {
                ProjectUser::where('project_id', $team->project_id)
                    ->where('user_id', $memberId)
                    ->where('role', '!=', 'Administrator')
                    ->delete();
            }
        }

        if (request()->wantsJson() || request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('team')->with('success', 'Team berhasil dihapus!');
    }
}
