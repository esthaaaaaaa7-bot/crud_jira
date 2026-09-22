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

        $projects = [
            [
                'key'          => 'PRJ-001',
                'nama_project' => 'E-Commerce Platform',
                'deskripsi'    => 'Pengembangan platform belanja online multi-tenant modern.',
                'priority'     => 'High',
                'deadline'     => Carbon::now()->addMonths(3)->format('Y-m-d'),
            ],
            [
                'key'          => 'PRJ-002',
                'nama_project' => 'Mobile Banking App',
                'deskripsi'    => 'Aplikasi perbankan mobile generasi baru dengan enkripsi biometrik.',
                'priority'     => 'High',
                'deadline'     => Carbon::now()->addMonths(2)->format('Y-m-d'),
            ],
            [
                'key'          => 'PRJ-003',
                'nama_project' => 'CRM Dashboard',
                'deskripsi'    => 'Dashboard analitik dan manajemen prospek penjualan perusahaan.',
                'priority'     => 'Medium',
                'deadline'     => Carbon::now()->addMonth()->format('Y-m-d'),
            ],
            [
                'key'          => 'PRJ-004',
                'nama_project' => 'API Gateway Service',
                'deskripsi'    => 'Layanan gateway terpadu untuk microservices arsitektur.',
                'priority'     => 'High',
                'deadline'     => Carbon::now()->addMonths(4)->format('Y-m-d'),
            ],
            [
                'key'          => 'PRJ-005',
                'nama_project' => 'Design System Library',
                'deskripsi'    => 'Koleksi komponen UI terstandarisasi untuk ekosistem aplikasi.',
                'priority'     => 'Low',
                'deadline'     => Carbon::now()->addMonths(5)->format('Y-m-d'),
            ],
            [
                'key'          => 'PRJ-006',
                'nama_project' => 'Data Analytics Engine',
                'deskripsi'    => 'Mesin pemrosesan analitik data besar secara real-time.',
                'priority'     => 'Medium',
                'deadline'     => Carbon::now()->subDays(10)->format('Y-m-d'), // on hold / overdue
            ],
        ];

        foreach ($projects as $data) {
            $p = Project::firstOrCreate(['key' => $data['key']], $data);

            if ($admin && !ProjectUser::where('project_id', $p->id)->where('user_id', $admin->id)->exists()) {
                ProjectUser::create(['project_id' => $p->id, 'user_id' => $admin->id, 'role' => 'Administrator']);
            }
            if ($budi && !ProjectUser::where('project_id', $p->id)->where('user_id', $budi->id)->exists()) {
                ProjectUser::create(['project_id' => $p->id, 'user_id' => $budi->id, 'role' => 'Member']);
            }
        }
    }
}
