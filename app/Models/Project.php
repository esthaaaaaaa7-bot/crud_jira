<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'key',
        'nama_project',
        'deskripsi',
        'deadline',
    ];

    /**
     * Relasi ke anggota proyek (User) melalui pivot project_users
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'project_users', 'project_id', 'user_id')
                    ->withPivot('role')
                    ->withTimestamps();
    }

    /**
     * Relasi ke tabel pivot project_users
     */
    public function projectUsers()
    {
        return $this->hasMany(ProjectUser::class, 'project_id');
    }

    /**
     * Relasi ke daftar tim dalam proyek ini
     */
    public function teams()
    {
        return $this->hasMany(Team::class, 'project_id');
    }

    /**
     * Relasi ke daftar tiket tugas (Task) dalam proyek ini
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_id');
    }
}
