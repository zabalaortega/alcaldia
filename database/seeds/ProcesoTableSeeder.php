<?php

use App\Models\Proceso;
use Illuminate\Database\Seeder;

class ProcesoTableSeeder extends Seeder
{

    public function run()
    {
        Proceso::create([
            'nombre_proceso' => 'Prestado',
            'descripcion' => 'Multimedia o Herramienta Prestada',
        ]);

        Proceso::create([
            'nombre_proceso' => 'Devuelto',
            'descripcion' => 'Multimedia o Herramienta Devuelta',
        ]);

        Proceso::create([
            'nombre_proceso' => 'Vencido',
            'descripcion' => 'Plazo de devolucion vencido',
        ]);
    }
}
