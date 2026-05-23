<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Di file migration
public function up()
{
    Schema::table('gurus', function (Blueprint $table) {
        $table->string('foto')->nullable(); // atau sesuai tipe data yang diinginkan
    });
}

public function down()
{
    Schema::table('gurus', function (Blueprint $table) {
        $table->dropColumn('foto');
    });
}
};
