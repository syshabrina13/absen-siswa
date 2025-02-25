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
        Schema::create('lokals', function (Blueprint $table) {
            $table->id('lokal_id');
            $table->unsignedBigInteger('id_jurusan');
            $table->string('nama_kelas');
            $table->unsignedBigInteger('id_guru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokals');
    }
};
