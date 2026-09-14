<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
            $table->unsignedInteger('task_number'); // Nomor urut task per project (1, 2, 3...)
            $table->string('judul_task');
            $table->text('deskripsi')->nullable();
            $table->foreignId('status_id')->constrained('task_statuses');
            $table->enum('priority', ['Low', 'Medium', 'High', 'Urgent'])->default('Medium');
            $table->date('deadline')->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('team_id')->nullable()->constrained('teams')->nullOnDelete();
            $table->timestamps();

            // Task number unik dalam lingkup satu project
            $table->unique(['project_id', 'task_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
