<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 50)->unique()->after('name');
            $table->enum('role', ['admin', 'guru', 'ortu', 'siswa'])->default('siswa')->after('password');
            $table->foreignId('siswa_id')->nullable()->after('role')->constrained('siswas')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('guru_id')->nullable()->after('siswa_id')->constrained('gurus')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['siswa_id']);
            $table->dropForeign(['guru_id']);
            $table->dropColumn(['username', 'role', 'siswa_id', 'guru_id']);
        });
    }
};
