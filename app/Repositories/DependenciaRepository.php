<?php

namespace App\Repositories;

use App\Models\Dependencia;

class DependenciaRepository
{
    public function getDependencias()
    {
        return Dependencia::latest()->get(['id', 'nombre_dependencia', 'descripcion']);
    }

    public function saveDependencia($request)
    {
        try {
            Dependencia::create($request->all());
            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function updateDependencia($request)
    {
        try {
            Dependencia::find($request->id_dependencia)->update($request->all());
            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }

}
