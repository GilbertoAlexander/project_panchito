<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('img_portada')->nullable();
            $table->string('razonsocial')->nullable();
            $table->string('ruc')->nullable();
            $table->string('slug')->nullable();
            $table->string('logo')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('direccion')->nullable();
            $table->string('referencia')->nullable();
            $table->string('nro_whatsapp')->nullable();
            $table->string('url_facebook')->nullable();
            $table->string('url_instagram')->nullable();
            $table->string('mision', 2000)->nullable();
            $table->string('vision', 2000)->nullable();
            $table->string('nosotros', 2000)->nullable();
            $table->unsignedBigInteger('ubigeo_id')->nullable();
            $table->foreign('ubigeo_id')->references('id')->on('ubigeos');
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
        Schema::dropIfExists('empresas');
    }
}
