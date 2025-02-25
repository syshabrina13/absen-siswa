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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jurusan');
            $table->string('nama');
            $table->string('nisn')->unique();
            $table->enum('jk', ['L', 'P']);
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nohp_walimurid');
            $table->string('nama_walimurid');
            $table->unsignedBigInteger('id_kelas');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
