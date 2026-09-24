<?php

namespace App\Services;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Support\Str;

class ProjectService
{
    /**
     * Membuat proyek baru, otomatis men-generate key unik dan memasukkan pembuat sebagai Administrator.
     */
    public function createProject(array $data, int $userId): Project
    {
        // Generate kode key jika tidak diisi oleh pengguna (misal: "Prosite Platform" => "PROS")
        if (empty($data['key'])) {
            $data['key'] = $this->generateProjectKey($data['nama_project']);
        } else {
            $data['key'] = strtoupper($data['key']);
        }

        // Buat proyek
        $project = Project::create([
            'key'          => $data['key'],
            'nama_project' => $data['nama_project'],
            'deskripsi'    => $data['deskripsi'] ?? null,
            'priority'     => $data['priority'] ?? 'Medium',
            'status'       => $data['status'] ?? 'To Do',
            'deadline'     => $data['deadline'] ?? null,
        ]);

        // Masukkan pembuat proyek sebagai Administrator di pivot project_users
        ProjectUser::create([
            'project_id' => $project->id,
            'user_id'    => $userId,
            'role' => 'Administrator',
        ]);

        return $project;
    }

    /**
     * Ambil seluruh proyek yang mana user terdaftar di dalamnya
     */
    public function getProjectsForUser(int $userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return collect();
        }

        return $user->projects()->withCount('tasks')->latest('projects.created_at')->paginate(5);
    }

    /**
     * Helper untuk membuat key unik (3-5 huruf kapital) berdasarkan nama proyek
     */
    private function generateProjectKey(string $projectName): string
    {
        $words = explode(' ', trim($projectName));
        $key = '';

        if (count($words) >= 2) {
            foreach ($words as $w) {
                if (!empty($w)) {
                    $key .= strtoupper($w[0]);
                }
            }
        }

        if (strlen($key) < 2) {
            $cleaned = preg_replace('/[^A-Za-z0-9]/', '', $projectName);
            $key = strtoupper(substr($cleaned, 0, 4));
        }

        $key = substr($key, 0, 5);

        // Jika key sudah digunakan, tambahkan suffix angka acak
        $baseKey = $key;
        $counter = 1;
        while (Project::where('key', $key)->exists()) {
            $key = substr($baseKey, 0, 3) . $counter;
            $counter++;
        }

        return $key;
    }
}
