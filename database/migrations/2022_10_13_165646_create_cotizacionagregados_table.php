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
            $table->string('informacion_adicional', 2000);
            $table->integer('total');
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
        Schema::dropIfExists('cotizacionagregados');
    }
}
