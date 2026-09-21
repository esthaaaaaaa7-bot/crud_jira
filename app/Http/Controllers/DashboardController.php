<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\Task;
use App\Models\Team;
use App\Models\TaskLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil user dari session (sudah dijamin ada oleh CheckAuth middleware)
        $user = session('user');

        // Ambil daftar ID proyek yang diikuti oleh user ini
        $userProjectIds = ProjectUser::where('user_id', $user->id)
            ->pluck('project_id');

        // 3. Kueri ke-5 Statistik:

        // a. Total Project:
        $newProjectsThisMonth = Project::whereIn('id', $userProjectIds)
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->count();

        $totalProjects = $userProjectIds->count();

        // b. Active Tasks (Task yang belum 'Done' / status_id != 4)
        $activeTasks = Task::whereIn('project_id', $userProjectIds)
            ->where('status_id', '!=', 4)
            ->count();

        // c. Completed Tasks (Task yang sudah 'Done' / status_id = 4)
        $completedTasks = Task::whereIn('project_id', $userProjectIds)
            ->where('status_id', 4)
            ->count();

        // d. Overdue Tasks (Task yang deadline-nya < hari ini & belum 'Done' )
        $overdueTasks = Task::whereIn('project_id', $userProjectIds)
            ->where('deadline', '<', Carbon::today())
            ->where('status_id', '!=', 4)
            ->count();

        // e. Team Members (Jumlah rekan kerja unik di proyek-proyek user ini)
        $teamMembers = ProjectUser::whereIn('project_id', $userProjectIds)->distinct('user_id')->count('user_id');
        $totalTeams = Team::whereIn('project_id', $userProjectIds)->count();

        // f. Team Workload — anggota tim + jumlah task aktif yang di-assign ke mereka
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

        // g. Recent Activity — 10 log aktivitas terbaru dari task di project user ini
        $taskIds = Task::whereIn('project_id', $userProjectIds)->pluck('id');

        $recentActivities = TaskLog::whereIn('task_id', $taskIds)
            ->with(['user', 'task', 'fromStatus', 'toStatus'])
            ->latest()
            ->limit(10)
            ->get();

        // 4. Kirim variabel ke view dashboard
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
        ));
    }
}
