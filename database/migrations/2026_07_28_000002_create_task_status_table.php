<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('task_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('nama_status', 50);
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });

        // Data awal status kolom Kanban
        DB::table('task_statuses')->insert([
            ['id' => 1, 'nama_status' => 'To Do', 'urutan' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nama_status' => 'In Progress', 'urutan' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nama_status' => 'Review', 'urutan' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'nama_status' => 'Done', 'urutan' => 4, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('task_statuses');
    }
};
