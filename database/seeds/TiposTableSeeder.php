<?php

use App\Models\Tipo;
use Illuminate\Database\Seeder;

class TiposTableSeeder extends Seeder
{

    public function run()
    {
        Tipo::create([
            'nombre_tipo' => 'Planta',
            'descripcion' => 'Empleado de Planta',
        ]);

        Tipo::create([
            'nombre_tipo' => 'Contratista',
            'descripcion' => 'Empleado Contratista',
        ]);

        Tipo::create([
            'nombre_tipo' => 'Otro',
            'descripcion' => 'Funcionario Externo',
        ]);
    }
}
