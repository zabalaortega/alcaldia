<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(TiposTableSeeder::class);
        $this->call(ProcesoTableSeeder::class);
        $this->call(DependenciaSeeder::class);
        $this->call(RolesPermisosSeeder::class);
        $this->call(UsersTableSeeder::class);
        
        
    }
}
