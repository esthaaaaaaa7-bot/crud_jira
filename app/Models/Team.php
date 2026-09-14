<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';

    protected $fillable = [
        'project_id',
        'nama_team',
        'deskripsi',
        'created_by',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'team_users', 'team_id', 'user_id')
                    ->withTimestamps();
    }

    public function teamUsers()
    {
        return $this->hasMany(TeamUser::class, 'team_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'team_id');
    }
}
