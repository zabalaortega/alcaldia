<?php

namespace App\Repositories;

use App\Models\Inventario;

class InventarioRepository
{
    
    public function saveInventario($request)
    {
        try {
            $request['existencia'] = $request->stock;
            $request['estado'] = 1;
            $inventario = Inventario::create($request->all());
            return $inventario;
        } catch (\Exception $ex) {
            return false;
        }
    }

}
