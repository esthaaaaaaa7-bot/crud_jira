<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Team;
use App\Models\Task;
use App\Models\TaskComment;
use App\Models\TaskLog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $project = Project::where('key', 'PROS')->first();
        $admin   = User::where('username', 'admin')->first();
        $budi    = User::where('username', 'budi')->first();
        $siti    = User::where('username', 'siti')->first();
        $teamFE  = Team::where('nama_team', 'Frontend Engineering')->first();
        $teamBE  = Team::where('nama_team', 'Backend Engineering')->first();

        if ($project && $admin && $budi && $siti && $teamFE && $teamBE) {
            $task1 = Task::create([
                'project_id'  => $project->id,
                'task_number' => 1,
                'judul_task'  => 'Integrasi REST API Dashboard & Kanban Board',
                'deskripsi'   => 'Menghubungkan controller backend dengan view Blade dashboard agar statistik tampil dinamis.',
                'status_id'   => 1,
                'priority'    => 'High',
                'deadline'    => Carbon::now()->addDays(5)->format('Y-m-d'),
                'created_by'  => $admin->id,
                'assigned_to' => $budi->id,
                'team_id'     => $teamFE->id,
            ]);

            $task2 = Task::create([
                'project_id'  => $project->id,
                'task_number' => 2,
                'judul_task'  => 'Slicing UI Form Create Project & Modal',
                'deskripsi'   => 'Penyesuaian tata letak form nejects.blade.php dan komponen input transparan.',
                'status_id'   => 2,
                'priority'    => 'Urgent',
                'deadline'    => Carbon::now()->addDays(2)->format('Y-m-d'),
                'created_by'  => $admin->id,
                'assigned_to' => $siti->id,
                'team_id'     => $teamFE->id,
            ]);

            $task3 = Task::create([
                'project_id'  => $project->id,
                'task_number' => 3,
                'judul_task'  => 'Refactoring Model Eloquent & Migration',
                'deskripsi'   => 'Pembaruan skema database 7 tabel baru dan relasi antar model Eloquent.',
                'status_id'   => 3,
                'priority'    => 'Medium',
                'deadline'    => Carbon::now()->addDays(1)->format('Y-m-d'),
                'created_by'  => $admin->id,
                'assigned_to' => $admin->id,
                'team_id'     => $teamBE->id,
            ]);

            $task4 = Task::create([
                'project_id'  => $project->id,
                'task_number' => 4,
                'judul_task'  => 'Setup Auth Session & Middleware Login',
                'deskripsi'   => 'Autentikasi akun terenkripsi berbasis bcrypt dan penanganan session driver.',
                'status_id'   => 4,
                'priority'    => 'Low',
                'deadline'    => Carbon::now()->subDays(2)->format('Y-m-d'),
                'created_by'  => $admin->id,
                'assigned_to' => $budi->id,
                'team_id'     => $teamBE->id,
            ]);

            $task5 = Task::create([
                'project_id'  => $project->id,
                'task_number' => 5,
                'judul_task'  => 'Uji Coba Fitur Drag and Drop Papan Kanban',
                'deskripsi'   => 'Pengujian pergeseran status kartu dari kolom To Do ke Done.',
                'status_id'   => 2,
                'priority'    => 'Urgent',
                'deadline'    => Carbon::now()->subDays(3)->format('Y-m-d'), // Terlambat (Overdue)
                'created_by'  => $admin->id,
                'assigned_to' => $siti->id,
                'team_id'     => $teamFE->id,
            ]);

            TaskComment::create([
                'task_id' => $task2->id,
                'user_id' => $admin->id,
                'comment' => 'Tolong pastikan ukuran form tidak terlalu lebar di layar desktop ya.',
            ]);

            TaskComment::create([
                'task_id' => $task2->id,
                'user_id' => $siti->id,
                'comment' => 'Siap pak, sudah disesuaikan menggunakan max-w-2xl dan padding p-8.',
            ]);

            TaskLog::create([
                'task_id'        => $task4->id,
                'user_id'        => $budi->id,
                'from_status_id' => 3,
                'to_status_id'   => 4,
                'log_activity'   => 'Mengubah status tugas dari Review ke Done.',
            ]);
        }
    }
}
