<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_nit')->unique();
            $table->string('razon_social');
            $table->longText('descripcion')->nullable();
            $table->unsignedInteger('user_id');
            $table->string('rep_nombre');
            $table->string('rep_nombre_2')->nullable();
            $table->string('rep_apellido');
            $table->string('rep_apellido_2')->nullable();
            $table->string('sitio_web', 255)->nullable();
            $table->string('telefono', 15);
            $table->string('direccion');
            $table->string('ciudad', 20)->nullable();
            $table->unsignedSmallInteger('calificacion')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('suppliers');
    }
}
