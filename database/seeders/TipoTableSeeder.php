<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Seeder;

class TipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = new Tipo();
        $tipo->name = "ALQUILER";
        $tipo->slug = "alquiler";
        $tipo->icono = "icono_alquiler.png";
        $tipo->save();

        $tipo = new Tipo();
        $tipo->name = "PROYECTOS";
        $tipo->slug = "proyectos";
        $tipo->icono = "icono_proyectos.png";
        $tipo->save();

        $tipo = new Tipo();
        $tipo->name = "ABASTECIMIENTO DE AGUA EN CISTERNA";
        $tipo->slug = "abastecimiento-de-agua-en-cisterna";
        $tipo->icono = "icono_abastecimiento_agua.png";
        $tipo->save();

    }
}
