<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('foto_principal')->unique();
            $table->string('sintesis');
            $table->string('cuerpo');
            $table->string('reportero');
            $table->string('cedula');
            $table->string('clasificacion');
            $table->string('foto1')->unique()->nullable();
            $table->string('foto2')->unique()->nullable();
            $table->string('foto3')->unique()->nullable();
            $table->timestamp('fecha');
            $table->foreign('cedula')->references('cedula')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticias');
    }
}
