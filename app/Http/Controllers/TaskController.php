<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskComment;
use App\Models\TaskLog;
use App\Models\Project;
use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request, $projectId)
    {
        $project = Project::findOrFail($projectId);

        $lastNumber = Task::where('project_id', $projectId)->max('task_number') ?? 0;

        Task::create([
            'project_id'  => $projectId,
            'task_number' => $lastNumber + 1,
            'judul_task'  => $request->judul_task,
            'deskripsi'   => $request->deskripsi,
            'status_id'   => $request->status_id ?? 1,
            'priority'    => $request->priority ?? 'Medium',
            'deadline'    => $request->deadline,
            'created_by'  => session('user')->id,
            'assigned_to' => $request->assigned_to ?? null,
            'team_id'     => null,
        ]);

        return redirect()->back()->with('success', 'Task berhasil dibuat!');
    }

    public function show($id)
    {
        $task = Task::with([
            'project',
            'status',
            'assignee',
            'creator',
            'comments.user',
            'logs.fromStatus',
            'logs.toStatus',
            'logs.user',
        ])->findOrFail($id);

        $statuses = TaskStatus::orderBy('urutan')->get();

        return view('TaskLog', compact('task', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $data = [];
        foreach (['judul_task', 'deskripsi', 'priority', 'deadline', 'assigned_to'] as $field) {
            if ($request->has($field)) {
                $data[$field] = $request->input($field) ?: null;
            }
        }

        $task->update($data);
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back()->with('success', 'Task berhasil diupdate!');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'Task berhasil dihapus!');
    }

    public function updateStatus(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $oldStatusId = $task->status_id;
        $newStatusId = $request->status_id;

        $task->update(['status_id' => $newStatusId]);

        TaskLog::create([
            'task_id'        => $task->id,
            'user_id'        => session('user')->id,
            'from_status_id' => $oldStatusId,
            'to_status_id'   => $newStatusId,
            'log_activity'   => 'Status changed',
        ]);

        return response()->json(['success' => true]);
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate(['comment' => 'required|string|max:2000']);

        $task   = Task::findOrFail($id);
        $user   = session('user');
        $userId = $user->id ?? null;

        $comment = TaskComment::create([
            'task_id' => $task->id,
            'user_id' => $userId,
            'comment' => $request->comment,
        ]);

        $userName = $user->name ?? 'Unknown';
        $initials = strtoupper(substr($userName, 0, 2));

        return response()->json([
            'success'  => true,
            'comment'  => $comment->comment,
            'user'     => $userName,
            'initials' => $initials,
        ]);
    }
}
