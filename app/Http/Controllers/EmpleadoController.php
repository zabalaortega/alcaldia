<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpleadoRequest;
use App\Models\Empleado;
use App\Models\Dependencia;
use App\Models\Tipo;

class EmpleadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $empleados = Empleado::all(['tipo_id', 'dependencia_id', 'nombres', 'apellidos', 'estado']);
        $dependencias = Dependencia::all();
        $tipos = Tipo::all();

        if (request()->ajax()) {
            $empleados = Empleado::all(['tipo_id', 'dependencia_id', 'nombres', 'apellidos', 'estado']);
            return response()->view('tablas.tabla-empleados', compact('empleados'));
        }

        return view('empleado.index', compact('empleados', 'dependencias', 'tipos'));
    }

    public function store(EmpleadoRequest $request)
    {
        if (request()->ajax())
        {
            Empleado::create($request->all());
            return response()->json(['success' => 'EMPLEADO CREADO CON EXITO!']);
        }
    }
}
