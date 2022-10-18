<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionagregadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacionagregados', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('slug');
            $table->string('empresa_solicitante');
            $table->date('fecha_entrega');
            $table->string('direccion');
            $table->string('transporte_agregado'); //SI - NO
            $table->string('informacion_adicional', 2000)->nullable();
            $table->string('observacion_adicional', 2000)->nullable();
            $table->string('igv'); //SI - NO
            $table->integer('total');
            $table->string('estado');
            $table->string('costo_estimado')->nullable();
            $table->string('igv');
            $table->string('costo_afectado')->nullable();
            $table->unsignedBigInteger('ubigeo_id')->nullable();
            $table->unsignedBigInteger('interesado_id')->nullable();
            $table->foreign('ubigeo_id')->references('id')->on('ubigeos');
            $table->foreign('interesado_id')->references('id')->on('interesados')->delete('cascade');
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
        Schema::dropIfExists('cotizacionagregados');
    }
}
