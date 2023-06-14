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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nama');
            $table->enum('gender', ['L', 'P']);
            $table->foreignId('id_user')->nullable()->references('id')->on('users');
            $table->foreignId('id_kelas')->nullable()->references('id')->on('kelas');
            $table->foreignId('id_matkul')->nullable()->references('id')->on('matkul');
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
        Schema::dropIfExists('dosen');
    }
};
