<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('username', 'admin')->first();
        $budi  = User::where('username', 'budi')->first();
        $siti  = User::where('username', 'siti')->first();
        $rudi  = User::where('username', 'rudi')->first();

        $project1 = Project::create([
            'key'          => 'PROS',
            'nama_project' => 'ProSite Web Platform',
            'deskripsi'    => 'Pengembangan platform manajemen proyek dan pelacakan tugas berbasis Kanban ala Jira.',
            'deadline'     => Carbon::now()->addMonths(2)->format('Y-m-d'),
        ]);

        $project2 = Project::create([
            'key'          => 'BANK',
            'nama_project' => 'Mobile Banking Redesign',
            'deskripsi'    => 'Redesain dan integrasi API payment gateway untuk aplikasi Mobile Banking iOS & Android.',
            'deadline'     => Carbon::now()->addMonth()->format('Y-m-d'),
        ]);

        if ($admin && $budi && $siti && $rudi) {
            ProjectUser::create(['project_id' => $project1->id, 'user_id' => $admin->id, 'role' => 'Administrator']);
            ProjectUser::create(['project_id' => $project1->id, 'user_id' => $budi->id,  'role' => 'Member']);
            ProjectUser::create(['project_id' => $project1->id, 'user_id' => $siti->id,  'role' => 'Member']);
            ProjectUser::create(['project_id' => $project1->id, 'user_id' => $rudi->id,  'role' => 'Viewer']);

            ProjectUser::create(['project_id' => $project2->id, 'user_id' => $budi->id,  'role' => 'Administrator']);
            ProjectUser::create(['project_id' => $project2->id, 'user_id' => $siti->id,  'role' => 'Member']);
            ProjectUser::create(['project_id' => $project2->id, 'user_id' => $admin->id, 'role' => 'Member']);
        }
    }
}
