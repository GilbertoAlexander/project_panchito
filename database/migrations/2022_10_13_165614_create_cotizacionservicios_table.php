<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionserviciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacionservicios', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->nullable();
            $table->string('slug')->nullable();
            $table->string('empresa_solicitante')->nullable();
            $table->date('fecha_ejecucion')->nullable();
            $table->string('horas_requeridas')->nullable();
            $table->string('operador_maquinaria')->nullable();
            $table->string('informacion_adicional', 2000)->nullable();
            $table->string('direccion')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->string('cantidad_requerida')->nullable();
            $table->unsignedBigInteger('ubigeo_id')->nullable();
            $table->unsignedBigInteger('interesado_id')->nullable();
            $table->foreign('ubigeo_id')->references('id')->on('ubigeos');
            $table->foreign('interesado_id')->references('id')->on('interesados');
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
        Schema::dropIfExists('cotizacionservicios');
    }
}
