<?php

namespace App\Repositories;

use App\Models\Inventario;
use App\Models\InventarioMultimedia;
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
        return Inventario::where('id', $id)->withCount('multimediasCurrent')->first(['id', 'stock', 'existencia']);
    }

    public function getMultimediaWithCurrentInventario($id)
    {
        return Multimedia::where('id', $id)->with('stocks')->first(['id', 'estado']);
    }

    public function getMultimediaPivotInventario($multimedia, $inventario)
    {
        return InventarioMultimedia::where(['multimedia_id' => $multimedia, 'inventario_id' => $inventario])
            ->orderBy('created_at', 'DESC')
            ->first();
    }

    public function getInventario($id)
    {
        return Inventario::find($id);
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

            $multimedia->inventarios()->attach($request->inventario_id, ['descripcion' => 'Asignado', 'estado' => 1]);

            $inventario = $this->getInventario($request->inventario_id);
            $this->updateExistencia($inventario);

            DB::commit();

            return 1;
        } catch (\Exception $ex) {
            DB::rollback();
            return 0;
        }
    }

    public function updateExistencia($inventario)
    {
        $inventario->existencia = $inventario->existencia + 1;
        $inventario->update();
    }

    public function checkExistencias($id)
    {
        $inventario = $this->getCountStockInventario($id);

        if ($inventario->existencia < $inventario->stock) {
            if ($inventario->multimedias_current_count < $inventario->stock) {
                return true;
            }
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
            $inventario = $this->getInventario($multimedia->stocks->first()->inventario_id);

            $this->updateStatusMultimedia($multimedia);
            $this->discountPivotInventario($multimedia->id, $inventario->id);

            if ($multimedia->estado) {

                $check = $this->checkExistencias($inventario->id);
                if (!$check) {
                    DB::rollback();
                    return 2;
                }

                $this->addStatusPivotInventario($multimedia, $inventario->id);
                $this->updateStock($inventario, $multimedia->estado);

            } else {
                $this->addStatusPivotInventario($multimedia, $inventario->id);
                $this->updateStock($inventario, $multimedia->estado);
            }

            DB::commit();
            return 1;

        } catch (\Exception $ex) {
            DB::rollback();
            return 3;
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

    public function discountPivotInventario($multimedia, $inventario)
    {
        // Por ahora no se tiene permitido cambiar de inventario

        $inventarioPivotMultimedia = $this->getMultimediaPivotInventario($multimedia, $inventario);

        // Lo optimo seria actualizar el stock actual
        $inventarioPivotMultimedia->update(['estado' => 0]);
    }

    public function addStatusPivotInventario($multimedia, $inventario)
    {
        if ($multimedia->estado) {
            $multimedia->inventarios()->attach($inventario, ['descripcion' => 'Reactivado', 'estado' => 1]);
        } else {
            $multimedia->inventarios()->attach($inventario, ['descripcion' => 'Baja', 'estado' => 0]);
        }
    }

    public function updateStock($inventario, $estado)
    {
        if ($estado) {
            $inventario->existencia = $inventario->existencia + 1;
        } else {
            $inventario->existencia = $inventario->existencia - 1;
        }

        $inventario->save();
    }

}
