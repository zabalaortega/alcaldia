<?php

namespace App\Repositories;

use App\Models\Inventario;
use App\Models\Multimedia;
use Illuminate\Support\Facades\DB;

class MultimediaRepository
{
    public function getMultimedias()
    {
        return Multimedia::latest()->with('inventarioCurrent')->get(['id', 'nombre_multimedia', 'tipo', 'serial', 'estado']);
    }

    public function getInventarios()
    {
        return Inventario::latest()->get(['id', 'descripcion', 'stock']);
    }

    public function getCountStockInventario($id)
    {
        return Inventario::where('id', $id)->withCount('multimediasCurrent')->first(['id', 'stock']);
    }

    public function getMultimediaWithCurrentInventario($id)
    {
        return Multimedia::where('id', $id)->with('stocks')->first(['id', 'estado']);
    }

    public function saveMultimedia($request)
    {
        DB::beginTransaction();

        try {

            $multimedia = new Multimedia;

            $multimedia->nombre_multimedia = $request->nombre_multimedia;
            $multimedia->tipo = $request->tipo;
            $multimedia->serial = $request->serial;
            $multimedia->estado = 1;

            $multimedia->save();

            // Toca chequear el estado del inventario.
            if (!$this->checkExistencias($request->inventario_id)) {
                return 2;
            }

            $multimedia->inventarios()->attach($request->inventario_id, ['descripcion' => 'Asignado a Inventario', 'estado' => 1]);

            DB::commit();

            return 1;
        } catch (\Exception $ex) {
            DB::rollback();
            return 0;
        }
    }

    public function checkExistencias($id)
    {
        $inventario = $this->getCountStockInventario($id);

        if ($inventario->multimedias_current_count < $inventario->stock) {
            return true;
        }
        return false;
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

    public function changeStatus($id)
    {
        DB::beginTransaction();

        try {
            $multimedia = $this->getMultimediaWithCurrentInventario($id);
            $this->updateStatusMultimedia($multimedia);
            $this->discountInventario($multimedia);
            
            DB::commit();
            return $multimedia;

        } catch (\Exception $ex) {
            DB::rollback();
            return false;
        }
    }

    public function updateStatusMultimedia($multimedia)
    {

        if ($multimedia->estado) {
            $multimedia->estado = 0;
        } else {
            $multimedia->estado = 1;
        }

        $multimedia->save();

    }

    public function discountInventario($multimedia)
    {
        // Por ahora no se tiene permitido cambiar de inventario
        $inventario = Inventario::find($multimedia->stocks->first()->inventario_id);

        // Lo optimo seria actualizar el stock actual
        foreach ($multimedia->stocks as $stock) {
            $multimedia->inventarios()->updateExistingPivot($stock->inventario_id, ['estado' => 0]);
        }

        $this->addStatusInventario($multimedia, $multimedia->status, $inventario->id);
        $this->updateStock($inventario, $multimedia->estado);

    }

    public function addStatusInventario($multimedia, $status, $inventario)
    {
        if ($status) {
            $multimedia->inventarios()->attach($inventario, ['descripcion' => 'Reactivado a Inventario', 'estado' => 1]);
        } else {
            $multimedia->inventarios()->attach($inventario, ['descripcion' => 'Dado de baja a Inventario', 'estado' => 0]);
        }
    }

    public function updateStock($inventario, $estado)
    {
        if ($estado) {
            $inventario->stock = $inventario->stock + 1;
        } else {
            $inventario->stock = $inventario->stock - 1;
        }

        $inventario->save();
    }

}
