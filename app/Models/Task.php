<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'project_id',
        'task_number',
        'judul_task',
        'deskripsi',
        'status_id',
        'priority',
        'deadline',
        'created_by',
        'assigned_to',
        'team_id',
    ];

    public function getFormattedKeyAttribute(): string
    {
        $projectKey = $this->project ? $this->project->key : 'TASK';
        $numberFormatted = str_pad($this->task_number, 2, '0', STR_PAD_LEFT);
        return "{$projectKey}-{$numberFormatted}";
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function comments()
    {
        return $this->hasMany(TaskComment::class, 'task_id');
    }

    public function logs()
    {
        return $this->hasMany(TaskLog::class, 'task_id');
    }
}
