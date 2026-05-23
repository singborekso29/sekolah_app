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
        Schema::table('siswas', function (Blueprint $table) {
            // Tambahkan kolom jenis_kelamin setelah kolom umur
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->after('umur');
            // Atau jika ingin pakai string:
            // $table->string('jenis_kelamin')->after('umur');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            // Hapus kolom jenis_kelamin jika rollback
            $table->dropColumn('jenis_kelamin');
        });
    }
};