<?php

namespace App\Repositories;

use App\Models\Inventario;
use App\Models\Multimedia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class MultimediaRepository
{
    public function getMultimedias()
    {
        return Multimedia::latest()->get(['id', 'nombre_multimedia', 'tipo', 'serial', 'estado']);
    }

    public function getInventarios()
    {
        return Inventario::latest()->get(['id', 'descripcion', 'stock']);
    }

    public function saveMultimedia($request)
    {
        DB::beginTransaction();

        try {

            $request['estado'] = 1;
            $campos = $request->all();
            $campos = Arr::except($campos, $campos['inventario_id']); 
            $multimedia = Multimedia::create($campos);

            // Toca chequear el estado del inventario.
            $multimedia->inventarios()->attach($request->inventario_id, ['descripcion' => 'Asignado a Inventario', 'estado' => 1]);

            DB::commit();

            return true;
        } catch (\Exception $ex) {
            DB::rollback();
            return false;
        }
    }

    public function updateMultimedia($request)
    {
        try {
            Multimedia::find($request->id_multimedia)->update($request->all());
            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }

}
