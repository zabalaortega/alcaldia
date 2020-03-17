<?php

namespace App\Repositories;

use App\Models\Empleado;
use App\Models\Tipo;

class EmpleadoRepository
{
    public function getEmpleadosWithDependencia(array $campos)
    {
        return Empleado::latest()->with('tipo:id,nombre_tipo', 'dependencia:id,nombre_dependencia')->get($campos);
    }

    public function getTipos()
    {
        return Tipo::all(['id', 'nombre_tipo']);
    }

    public function saveEmpleado($request)
    {
        try {
            $request['estado'] = 1;
            Empleado::create($request->all());
            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function updateEmpleado($request)
    {
        try {
            Empleado::find($request->id_empleado)->update($request->all());
            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }

}
