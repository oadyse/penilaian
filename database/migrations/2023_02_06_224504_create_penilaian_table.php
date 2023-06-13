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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa')->nullable()->references('id')->on('siswa');
            $table->integer('sikap');
            $table->integer('ketrampilan');
            $table->text('catatan');
            $table->string('a');
            $table->string('b');
            $table->string('c');
            $table->string('d');
            $table->string('e');
            $table->string('f');
            $table->string('g');
            $table->string('h');
            $table->string('i');
            $table->string('j');
            $table->string('k');
            $table->string('l');
            $table->string('aa');
            $table->string('bb');
            $table->string('cc');
            $table->string('dd');
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
        Schema::dropIfExists('penilaian');
    }
};
