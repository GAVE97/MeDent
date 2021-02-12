<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Area');
            $table->string('Tipo');
            $table->string('Marca');
            $table->string('Modelo');
            $table->string('Num_de_serie');
            $table->string('Ubicacion');
            $table->string('Estatus');
            $table->date('vencimientoGarantia'); 
            $table->string('Consumo_electrico');
            $table->timestamps();
            $table->string('imagenEquipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
