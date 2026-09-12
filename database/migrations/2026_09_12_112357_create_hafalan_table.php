<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hafalan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('jenis_hafalan', ['surat_pendek', 'doa', 'hadis']);
            $table->string('surat', 100);
            $table->unsignedTinyInteger('progress')->default(0);
            $table->string('audio', 255)->nullable();
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hafalan');
    }
};
