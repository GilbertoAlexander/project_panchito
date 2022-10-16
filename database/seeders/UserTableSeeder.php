<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        $admin = User::create([
            'name' => 'Administrador Cuantica',
            'slug' => 'administrador-cuantica',
            'email' => 'admin@cuantica.com',
            'imagen' => 'cuantica-user.png',
            'estado' => 'Activo',
            'role_id' => '1',
            'password' => Hash::make('admincuantica'),
            'confirmpassword' => Hash::make('admincuantica'),
        ]);

        $admin = User::create([
            'name' => 'Administrador Panchito',
            'slug' => 'administrador-panchito',
            'email' => 'admin@panchito.com',
            'imagen' => 'panchito-user.png',
            'estado' => 'Activo',
            'role_id' => '2',
            'password' => Hash::make('panchito'),
            'confirmpassword' => Hash::make('panchito'),
        ]);
    }
}
