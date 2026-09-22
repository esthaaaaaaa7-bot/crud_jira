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

    /**
     * Halaman pemilihan project sebelum membuka Board Kanban
     */
    public function boardSelect()
    {
        $userId = session('user')->id ?? 0;
        $projects = Project::with(['tasks.status'])->get();

        $demoDefaults = [
            'PRJ-001' => ['progress' => 78, 'tasks' => 34, 'status' => 'Active', 'priority' => 'High', 'due' => 'Dec 15'],
            'PRJ-002' => ['progress' => 65, 'tasks' => 52, 'status' => 'Active', 'priority' => 'Critical', 'due' => 'Nov 30'],
            'PRJ-003' => ['progress' => 92, 'tasks' => 28, 'status' => 'In Review', 'priority' => 'Medium', 'due' => 'Oct 20'],
            'PRJ-004' => ['progress' => 45, 'tasks' => 41, 'status' => 'Active', 'priority' => 'High', 'due' => 'Jan 10'],
            'PRJ-005' => ['progress' => 12, 'tasks' => 15, 'status' => 'Planning', 'priority' => 'Low', 'due' => 'Feb 28'],
            'PRJ-006' => ['progress' => 33, 'tasks' => 22, 'status' => 'On Hold', 'priority' => 'Medium', 'due' => 'Mar 15'],
        ];

        $statusCounts = [
            'Active'    => 0,
            'In Review' => 0,
            'Planning'  => 0,
            'On Hold'   => 0,
        ];

        foreach ($projects as $project) {
            $key = strtoupper($project->key);
            $total = $project->tasks->count();
            $done = $project->tasks->where('status_id', 4)->count();
            $review = $project->tasks->where('status_id', 3)->count();

            if ($total > 0) {
                $progress = (int) round(($done / $total) * 100);
                $taskCount = $total;
                if ($review > 0) {
                    $status = 'In Review';
                } elseif ($project->deadline && \Carbon\Carbon::parse($project->deadline)->isPast() && $progress < 100) {
                    $status = 'On Hold';
                } else {
                    $status = 'Active';
                }
                $priority = $project->priority ?? 'Medium';
                $dueDate = $project->deadline ? \Carbon\Carbon::parse($project->deadline)->format('M d') : 'Dec 15';
            } elseif (isset($demoDefaults[$key])) {
                $progress = $demoDefaults[$key]['progress'];
                $taskCount = $demoDefaults[$key]['tasks'];
                $status = $demoDefaults[$key]['status'];
                $priority = $demoDefaults[$key]['priority'];
                $dueDate = $demoDefaults[$key]['due'];
            } else {
                $progress = 0;
                $taskCount = 0;
                $status = 'Planning';
                $priority = $project->priority ?? 'Medium';
                $dueDate = $project->deadline ? \Carbon\Carbon::parse($project->deadline)->format('M d') : 'Dec 15';
            }

            $project->calculated_status = $status;
            $project->calculated_progress = $progress;
            $project->calculated_task_count = $taskCount;
            $project->calculated_priority = $priority;
            $project->calculated_due_date = $dueDate;

            if (isset($statusCounts[$status])) {
                $statusCounts[$status]++;
            } else {
                $statusCounts['Active']++;
            }
        }

        return view('board', compact('projects', 'statusCounts'));
    }
}

