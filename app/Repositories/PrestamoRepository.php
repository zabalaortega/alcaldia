<?php

namespace App\Repositories;

use App\Models\Multimedia;
use App\Models\Prestamo;
use App\Models\PrestamoProceso;
use App\Models\Proceso;
use Illuminate\Support\Facades\DB;
use App\Exports\PrestamosExport;
use Carbon\Carbon;

class PrestamoRepository
{

    public function getPrestamos()
    {
        return Prestamo::with('user:id,name,apellidos,email', 
                              'multimedia:id,nombre_multimedia,serial',
                              'procesoCurrent')
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

            $prestamo->user_id = $request->user()->id;
            $prestamo->multimedia_id = $request->multimedia_id;

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

    public function attachPivotProceso($prestamo, $estado)
    
    {
        $proceso = Proceso::where('nombre_proceso', $estado)->first();
        $prestamo->procesos()->attach($proceso->id, ['descripcion' => $proceso->nombre_proceso, 'estado' => 1]);
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

    public function updatePrestamo($request)
    {
        try {

            $prestamo = Prestamo::find($request->id_prestamo);

            $prestamo->user_id = $request->user_id;
            // Esto es como un if rapido (operador ternario) si yo seleccione una multimedia pues tome ese valor
            // De lo contrario deje el multimedia que tiene por defecto.
            $prestamo->multimedia_id = ($request->multimedia_id) ? $request->multimedia_id : $prestamo->multimedia_id;
            $prestamo->descripcion = $request->observacion;
            
            $prestamo->save();

            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function UpdateStatus($request)
    {
        DB::beginTransaction();

        try {

            $prestamo = $this->getPrestamoWithCurrentEstado($request->id_pres);
            $this->updateStatusprestamo($prestamo, $request);

            $idProceso = $prestamo->procesoCurrent()->first()->id;

            $this->updatePivotProcesoPrestamo($prestamo->id, $idProceso);

            $this->attachPivotProceso($prestamo, 'Devuelto');

            DB::commit();
            return 1;
        } catch (\Exception $ex) {
            DB::rollback();
            return 3;
        }
    }

    public function getPrestamoWithCurrentEstado($id)
    {
        return Prestamo::where('id', $id)->first(['id', 'estado']);
    }

    public function updateStatusprestamo($prestamo, $request)
    {
        if ($prestamo->estado) {
            $prestamo->estado = 0;
            $prestamo->fecha_salida = $request->fecha_salida;
            $prestamo->hora_salida = $request->hora_salida;
        } else {
            $prestamo->estado = 1;
            $prestamo->fecha_salida = $request->fecha_salida;
            $prestamo->hora_salida = $request->hora_salida;
        }

        $prestamo->save();
        
    }

    public function exportPrestamo($request)
    {
        
        try {
            $fecha_inicial = Carbon::parse($request->fecha_inicio);
            $fecha_final =  Carbon::parse($request->fecha_final)->addDays(1);

            $prestamoExport = new PrestamosExport; 
            $export = $prestamoExport->forDate($fecha_inicial, $fecha_final)->download('solicitudes.xlsx');

            return $export;
        } catch (\Exception $ex) {
            return false;
        }
        
    }

}
