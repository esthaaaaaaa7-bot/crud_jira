<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\Task;
use App\Models\Team;
use App\Models\TaskLog;
use App\Models\User;
use App\Models\TaskStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $user = session('user');
        $userProjectIds = ProjectUser::where('user_id', $user->id)
            ->pluck('project_id');

        $newProjectsThisMonth = Project::whereIn('id', $userProjectIds)
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->count();
        $totalProjects = $userProjectIds->count();

        $activeTasks = Task::whereIn('project_id', $userProjectIds)
            ->where('status_id', '!=', 4)
            ->count();

        $completedTasks = Task::whereIn('project_id', $userProjectIds)
            ->where('status_id', 4)
            ->count();

        $overdueTasks = Task::whereIn('project_id', $userProjectIds)
            ->where('deadline', '<', Carbon::today())
            ->where('status_id', '!=', 4)
            ->count();

        $teamMembers = ProjectUser::whereIn('project_id', $userProjectIds)->distinct('user_id')->count('user_id');
        $totalTeams = Team::whereIn('project_id', $userProjectIds)->count();

        $teamMemberIds = ProjectUser::whereIn('project_id', $userProjectIds)
            ->pluck('user_id')
            ->unique();

        $teamWorkload = User::whereIn('id', $teamMemberIds)
            ->withCount(['assignedTasks' => function ($q) use ($userProjectIds) {
                $q->whereIn('project_id', $userProjectIds)
                    ->where('status_id', '!=', 4);
            }])
            ->orderByDesc('assigned_tasks_count')
            ->get();

        $taskIds = Task::whereIn('project_id', $userProjectIds)->pluck('id');

        $recentActivities = TaskLog::whereIn('task_id', $taskIds)
            ->with(['user', 'task', 'fromStatus', 'toStatus'])
            ->latest()
            ->paginate(5);

        $statuses = TaskStatus::orderBy('urutan')->get();

        $myTasks = Task::where('assigned_to', $user->id)
            ->with(['status', 'project'])
            ->whereIn('project_id', $userProjectIds)
            ->get()
            ->groupBy('status_id');

        return view('dashboard', compact(
            'totalProjects',
            'newProjectsThisMonth',
            'activeTasks',
            'completedTasks',
            'overdueTasks',
            'teamMembers',
            'totalTeams',
            'teamWorkload',
            'recentActivities',
            'statuses',
            'myTasks',
        ));
    }
}
