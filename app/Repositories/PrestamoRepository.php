<?php

namespace App\Repositories;

use App\Models\Multimedia;
use App\Models\Prestamo;
use App\Models\PrestamoProceso;
use App\Models\Proceso;
use Illuminate\Support\Facades\DB;

class PrestamoRepository
{

    public function getPrestamos()
    {
        return Prestamo::with('empleado:id,nombres,apellidos', 'multimedia:id,nombre_multimedia', 'procesoCurrent')
            ->where('estado', 1)
            ->get();
    }

    public function getMultimediasAvaliable()
    {
        return Multimedia::doesntHave('devueltos')->where('estado', 1)->get();
    }

    public function getPrestamoPivotProceso($prestamo, $proceso)
    {
        return PrestamoProceso::where(['prestamo_id' => $prestamo, 'proceso_id' => $proceso])
            ->orderBy('created_at', 'DESC')
            ->first();
    }

    public function savePrestamo($request)
    {

        DB::beginTransaction();

        try {

            $prestamo = new Prestamo;

            $prestamo->empleado_id = $request->empleado_id;
            $prestamo->multimedia_id = $request->multimedia_id;
            $prestamo->fecha_prestamo = $request->fecha_prestamo;
            $prestamo->fecha_devolucion = $request->fecha_devolucion;
            $prestamo->hora_prestamo = $request->hora_prestamo;
            $prestamo->hora_devolucion = $request->hora_devolucion;
            $prestamo->descripcion = $request->observacion;
            $prestamo->estado = 1;

            $prestamo->save();

            $this->attachPivotProceso($prestamo, 'Prestado');

            DB::commit();

            return true;
        } catch (\Exception $ex) {
            DB::rollback();
            return false;
        }

    }

    public function devolverMultimedia($id)
    {
        DB::beginTransaction();

        try {

            $prestamo = Prestamo::find($id);
            $prestamo->estado = 0;
            $prestamo->save();

            $idProceso = $prestamo->procesoCurrent()->first()->id;

            $this->updatePivotProcesoPrestamo($prestamo->id, $idProceso);

            $this->attachPivotProceso($prestamo, 'Devuelto');

            DB::commit();

            return true;
        } catch (\Exception $ex) {
            DB::rollback();
            return false;
        }

    }

    public function updatePivotProcesoPrestamo($prestamo, $proceso)
    {
        $prestamoPivotProceso = $this->getPrestamoPivotProceso($prestamo, $proceso);
        $prestamoPivotProceso->update(['estado' => 0]);
    }

    public function attachPivotProceso($prestamo, $estado)
    {
        $proceso = Proceso::where('nombre_proceso', $estado)->first();
        $prestamo->procesos()->attach($proceso->id, ['descripcion' => $proceso->nombre_proceso, 'estado' => 1]);
    }

}
