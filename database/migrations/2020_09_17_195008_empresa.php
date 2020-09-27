<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo')->nullable();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('slogan')->nullable();
            $table->string('mision')->nullable();
            $table->string('vision')->nullable();
            $table->string('contacto');
            $table->string('correo');
            $table->integer('estado');
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
        Schema::drop('empresa');
    }
}
