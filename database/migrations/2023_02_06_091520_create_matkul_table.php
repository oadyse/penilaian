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
        Schema::create('matkul', function (Blueprint $table) {
            $table->id();
            $table->string('matkul')->unique();
            $table->string('sks');
            $table->enum('semester', ['1', '2', '3', '4', '5', '6', '7', '8']);
            $table->foreignId('id_kelas')->nullable()->references('id')->on('kelas');
            $table->foreignId('id_user')->nullable()->references('id')->on('users');
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
        Schema::dropIfExists('matkul');
    }
};
