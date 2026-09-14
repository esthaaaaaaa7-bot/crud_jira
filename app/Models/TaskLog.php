<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskLog extends Model
{
    use HasFactory;

    protected $table = 'task_logs';

    protected $fillable = [
        'task_id',
        'user_id',
        'from_status_id',
        'to_status_id',
        'log_activity',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function fromStatus()
    {
        return $this->belongsTo(TaskStatus::class, 'from_status_id');
    }

    public function toStatus()
    {
        return $this->belongsTo(TaskStatus::class, 'to_status_id');
    }
}
