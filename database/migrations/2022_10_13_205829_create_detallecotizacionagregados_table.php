<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallecotizacionagregadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallecotizacionagregados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cotizacionagregado_id')->nullable();
            $table->unsignedBigInteger('agregado_id')->nullable();
            $table->integer('cantidad');
            $table->foreign('agregado_id')->references('id')->on('agregados');
            $table->foreign('cotizacionagregado_id')->references('id')->on('cotizacionagregados');
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
        Schema::dropIfExists('detallecotizacionagregados');
    }
}
