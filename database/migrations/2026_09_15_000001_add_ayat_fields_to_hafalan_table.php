<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('hafalan', function (Blueprint $table) {
            $table->unsignedInteger('ayat_mulai')->nullable()->after('surat');
            $table->unsignedInteger('ayat_selesai')->nullable()->after('ayat_mulai');
            $table->unsignedInteger('total_ayat')->nullable()->after('ayat_selesai');
            $table->enum('status', ['baru','ulang','lulus'])->default('baru')->after('total_ayat');
        });
    }
    public function down(): void {
        Schema::table('hafalan', function (Blueprint $table) {
            $table->dropColumn(['ayat_mulai','ayat_selesai','total_ayat','status']);
        });
    }
};
