<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\Task;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Cek session user
        $user = session('user');
        if (!$user) {
            return redirect('/login');
        }

        // 2. Ambil daftar ID proyek yang diikuti oleh user ini
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

        // 4. Kirim variabel ke view dashboard
        return view('dashboard', compact(
            'totalProjects',
            'newProjectsThisMonth',
            'activeTasks',
            'completedTasks',
            'overdueTasks',
            'teamMembers',
            'totalTeams',
        ));
    }
}
