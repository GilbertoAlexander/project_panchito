<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = "ADMIN CUANTICA";
        $role->slug = "admin-cuantica";
        $role->save();

        $role = new Role();
        $role->name = "ADMIN PANCHITO";
        $role->slug = "admin-panchito";
        $role->save();
    }
}
