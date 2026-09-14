<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Proyek tempat user ini terdaftar sebagai anggota/admin
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_users', 'user_id', 'project_id')
                    ->withPivot('role')
                    ->withTimestamps();
    }

    /**
     * Tim tempat user ini terdaftar
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_users', 'user_id', 'team_id')
                    ->withTimestamps();
    }

    /**
     * Daftar task yang ditugaskan ke user ini
     */
    public function assignedTasks()
    {
        return $this->hasMany(Task::class, 'assigned_to');
    }

    /**
     * Daftar task yang dibuat oleh user ini
     */
    public function createdTasks()
    {
        return $this->hasMany(Task::class, 'created_by');
    }
}
