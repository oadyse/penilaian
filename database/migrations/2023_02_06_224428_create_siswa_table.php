<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->unique();
            $table->string('nama');
            $table->enum('gender', ['L', 'P']);
            $table->foreignId('id_kelas')->nullable()->references('id')->on('kelas')->onDelete('cascade');
            $table->foreignId('id_user')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('pa')->nullable()->references('id')->on('dosen')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
