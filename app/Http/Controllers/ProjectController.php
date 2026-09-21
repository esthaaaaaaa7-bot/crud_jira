<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\TaskStatus;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(ProjectService $projectService)
    {
        $userId = session('user')->id ?? 0;
        $projects = $projectService->getProjectsForUser($userId);

        return view('projects.index', compact('projects'));
    }

    public function store(StoreProjectRequest $request, ProjectService $projectService)
    {
        $userId = session('user')->id ?? 0;
        $project = $projectService->createProject($request->validated(), $userId);

        return redirect('/projects')->with('success', "Proyek '{$project->nama_project}' (Key: {$project->key}) berhasil dibuat!");
    }

    public function show($id)
    {
        $project = Project::with(['tasks.status', 'tasks.assignee', 'tasks.team', 'users', 'teams'])->findOrFail($id);
        $statuses = TaskStatus::orderBy('urutan')->get();

        return view('board', compact('project', 'statuses'));
    }

    public function edit($id)
    {
        $userId = session('user')->id ?? 0;
        $project = Project::whereHas('projectUsers', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->findOrFail($id);

        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id, ProjectService $projectService)
    {
        $userId = session('user')->id ?? 0;
        $project = Project::whereHas('projectUsers', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->findOrFail($id);

        $validated = $request->validate([
            'nama_project' => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
            'deadline'     => 'nullable|date',
            'priority'     => 'required|in:Low,Medium,High',
        ]);

        $project->update($validated);

        return redirect('/projects')->with('success', "Proyek '{$project->nama_project}' berhasil diupdate!");
    }

    public function destroy($id)
    {
        $userId = session('user')->id ?? 0;
        $project = Project::whereHas('projectUsers', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->findOrFail($id);

        $project->delete();

        return redirect('/projects')->with('success', "Proyek berhasil dihapus!");
    }
}
