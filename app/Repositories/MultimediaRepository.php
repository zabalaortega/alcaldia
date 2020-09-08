<?php

namespace App\Repositories;

use App\Models\Multimedia;
use Illuminate\Support\Facades\DB;

class MultimediaRepository
{

    public function getMultimedias()
    {
        return Multimedia::latest()->where('estado', 1)->get(['id', 'nombre_multimedia', 'marca', 'serial', 'estado']);
    }

    public function saveMultimedia($request)
    {
        DB::beginTransaction();

        try {

            $multimedia = new Multimedia;

            $multimedia->nombre_multimedia = $request->nombre_multimedia;
            $multimedia->marca = $request->marca;
            $multimedia->serial = $request->serial;
            $multimedia->estado = 1;

            $multimedia->save();
    
            DB::commit();

            return 1;
        } catch (\Exception $ex) {
            DB::rollback();
            return 0;
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

    public function getMultimediaCurrent($id)
    {
        return Multimedia::where('id', $id)->first(['id', 'estado']);
    }

    public function changeStatus($request)
    {
        DB::beginTransaction();

        try {

            $multimedia = $this->getMultimediaCurrent($request->id_multi); 
                      
            $this->updateStatusMultimedia($multimedia, $request);

            DB::commit();
            return 1;

        } catch (\Exception $ex) {
            DB::rollback();
            return 3;
        }
    }

    public function updateStatusMultimedia($multimedia, $request)
    {
        if ($multimedia->estado) {
            $multimedia->estado = 0;
            $multimedia->observacion = $request->observacion;
        } else {
            $multimedia->estado = 1;
            $multimedia->observacion = $request->observacion;
        }

        $multimedia->save();
        
    }
    
}
