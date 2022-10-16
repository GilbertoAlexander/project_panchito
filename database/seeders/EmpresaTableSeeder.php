<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $date = $date->format('d-m-Y');

        $empresa = Empresa::create([
            'img_portada' => 'portada_principal.png',
            'razonsocial' => 'Transporte y Servicios Panchito',
            'ruc' => '20101214155',
            'slug' => 'transporte-y-servicios-panchito',
            'logo' => 'logo.png',
            'email' => 'gerencia@panchito.com',
            'telefono' => '056141520',
            'celular' => '945142585',
            'direccion' => 'Av. San Rafael Nro 240 A',
            'referencia' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'nro_whatsapp' => '945142285',
            'url_facebook' => 'https://www.facebook.com/',
            'url_instagram' => 'https://www.instagram.com/',
            'mision' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum id, at autem consectetur, recusandae consequatur non eaque porro repellat soluta nisi quia alias qui cupiditate quam asperiores doloribus error odit!',
            'vision' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum id, at autem consectetur, recusandae consequatur non eaque porro repellat soluta nisi quia alias qui cupiditate quam asperiores doloribus error odit!',
            'nosotros' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum id, at autem consectetur, recusandae consequatur non eaque porro repellat soluta nisi quia alias qui cupiditate quam asperiores doloribus error odit!',
            'ubigeo_id' => '191',
        ]);
    }
}
