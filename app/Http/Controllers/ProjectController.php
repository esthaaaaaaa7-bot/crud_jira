<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use App\Models\TaskStatus;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(ProjectService $projectService)
    {
        $userId = session('user')->id ?? 0;
        $projects = $projectService->getProjectsForUser($userId);

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.nejects');
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
}
