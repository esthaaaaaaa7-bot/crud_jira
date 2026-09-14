<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Tabel Tim di dalam Project
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
            $table->string('nama_team', 100);
            $table->string('deskripsi')->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });

        // Tabel Pivot Anggota Tim
        Schema::create('team_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['team_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_users');
        Schema::dropIfExists('teams');
    }
};
