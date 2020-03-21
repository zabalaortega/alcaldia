<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpleadoRequest;
use App\Models\Dependencia;
use App\Models\Empleado;
use App\Repositories\DependenciaRepository;
use App\Repositories\EmpleadoRepository;

class EmpleadoController extends Controller
{
    protected $repository;
    protected $dependencia;

    public function __construct(EmpleadoRepository $repository, DependenciaRepository $dependencia)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->dependencia = $dependencia;
    }

    public function index()
    {
        $campos = ['id', 'tipo_id', 'dependencia_id', 'nombres', 'apellidos'];
        $empleados = $this->repository->getEmpleadosWithDependencia($campos);

        $dependencias = $this->dependencia->getDependencias();
        $tipos = $this->repository->getTipos();

        if (request()->ajax()) {
            $empleados = $this->repository->getEmpleadosWithDependencia($campos);
            return response()->view('tablas.tabla-empleados', compact('empleados'));
        }

        return view('empleado.index', compact('empleados', 'dependencias', 'tipos'));
    }

    public function store(EmpleadoRequest $request)
    {
        if (request()->ajax()) {
            $exito = $this->repository->saveEmpleado($request);
            if (!$exito) {
                return response()->json(['warning' => 'ERROR AL GUARDAR DATOS!']);
            }
            return response()->json(['success' => 'EMPLEADO CREADO CON EXITO!', 'empleado' => $exito]);
        }
    }

    public function update(EmpleadoRequest $request, $id)
    {
        if (request()->ajax()) {
            $exito = $this->repository->updateEmpleado($request);
            if ($exito) {
                return response()->json(['success' => 'EMPLEADO ACTUALIZADO CON EXITO!']);
            } else {
                return response()->json(['warning' => 'ERROR AL ACTUALIZAR DATOS!']);
            }
        }
    }
}
