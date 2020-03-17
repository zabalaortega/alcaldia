<?php

use Illuminate\Database\Seeder;
use App\Models\Tipo;

class Tiposeeder extends Seeder
{
    
    public function run()
    {
        Tipo::create([
        	'nombre_tipo' 		=>	'Planta',
        	'descripcion'	    =>	'empleado de planta'
        ]);

        Tipo::create([
        	'nombre_tipo' 		=>	'Contratista',
        	'descripcion'	    =>	'empleado contratista'
        ]);

        Tipo::create([
        	'nombre_tipo' 		=>	'U Otro ',
        	'descripcion'	    =>	'empleado diferente'
        ]);
    }
}
