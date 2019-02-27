<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGarantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('dui');
            $table->string('nit');
            $table->string('telefono');
            $table->string('celular');
            $table->string('email');
            $table->string('direccion');
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
        Schema::dropIfExists('garantes');
    }
}
