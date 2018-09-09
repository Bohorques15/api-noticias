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
            $table->string('foto_principal');
            $table->string('sintesis');
            $table->string('cuerpo')->nullable();
            $table->string('reportero');
            $table->string('user_id')->unique();
            $table->string('clasificacion');
            $table->string('foto1')->unique()->nullable();
            $table->string('foto2')->unique()->nullable();
            $table->string('foto3')->unique()->nullable();
            $table->date('fecha');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade")->onUpdate("cascade");
            $table->foreign('reportero')->references('name')->on('users')->onDelete("cascade")->onUpdate("cascade");
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
