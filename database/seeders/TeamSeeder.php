<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $project1 = Project::where('key', 'PROS')->first();
        $admin    = User::where('username', 'admin')->first();
        $budi     = User::where('username', 'budi')->first();
        $siti     = User::where('username', 'siti')->first();

        if ($project1 && $admin && $budi && $siti) {
            // Tim 1: Frontend Engineering
            $teamFrontend = Team::create([
                'project_id' => $project1->id,
                'nama_team'  => 'Frontend Engineering',
                'deskripsi'  => 'Mengembangkan antarmuka Blade, Tailwind CSS, dan komponen UI interaktif.',
                'created_by' => $admin->id,
            ]);
            TeamUser::create(['team_id' => $teamFrontend->id, 'user_id' => $budi->id]);
            TeamUser::create(['team_id' => $teamFrontend->id, 'user_id' => $siti->id]);

            // Tim 2: Backend Engineering
            $teamBackend = Team::create([
                'project_id' => $project1->id,
                'nama_team'  => 'Backend Engineering',
                'deskripsi'  => 'Mengembangkan RESTful API, arsitektur database Eloquent, dan autentikasi.',
                'created_by' => $admin->id,
            ]);
            TeamUser::create(['team_id' => $teamBackend->id, 'user_id' => $admin->id]);
            TeamUser::create(['team_id' => $teamBackend->id, 'user_id' => $budi->id]);
        }
    }
}
