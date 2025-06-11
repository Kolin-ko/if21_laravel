<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('mata_kuliah_id');
            $table->foreign('mata_kuliah_id')->references('id')->on('mata_kuliah')->onDelete('restrict')->onUpdate('restrict');
            $table->uuid('dosen_id');
            $table->foreign('dosen_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->integer('pertemuan');
            $table->string('pokok_bahasan', 255);
            $table->string('file_materi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};
