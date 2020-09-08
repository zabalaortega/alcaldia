<?php

use Illuminate\Database\Seeder;
use App\Models\Dependencia;

class DependenciaSeeder extends Seeder
{
    
    public function run()
    {
        Dependencia::create([
            'nombre_dependencia' => 'Sistema',
            'descripcion' => 'area de sistema',
        ]);

        Dependencia::create([
            'nombre_dependencia' => 'Recursos Humanos',
            'descripcion' => 'area recursos humanos',
        ]);

        Dependencia::create([
            'nombre_dependencia' => 'Gerencia',
            'descripcion' => 'Area de gerencia',
        ]);
    }
}
