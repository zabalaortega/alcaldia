<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrestamoRequest;
use App\Repositories\DependenciaRepository;
use App\Repositories\EmpleadoRepository;
use App\Repositories\PrestamoRepository;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{

    protected $repository;
    protected $empleado;
    protected $dependencia;


    public function __construct(PrestamoRepository $repository, EmpleadoRepository $empleado, DependenciaRepository $dependencia)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->empleado = $empleado;
        $this->dependencia = $dependencia;

    }

    public function index()
    {
        $prestamos = $this->repository->getPrestamos();
        $dependencias = $this->dependencia->getDependencias();
        $tipos = $this->empleado->getTipos();
        $empleados = $this->empleado->getEmpleadosWithDependencia(['id', 'tipo_id', 'dependencia_id', 'nombres', 'apellidos']);
        $multimedias = $this->repository->getMultimediasAvaliable();

       
        if (request()->ajax()) {
            $prestamos = $this->repository->getPrestamos();
            return response()->view('tablas.tabla-prestamos', compact('prestamos'));
        }

        return view('prestamo.index', compact('prestamos', 'dependencias', 'tipos', 'empleados', 'multimedias'));
    }

    public function store(PrestamoRequest $request)
    {
        if (request()->ajax()) {
            $exito = $this->repository->savePrestamo($request);
            if ($exito) {
                return response()->json(['success' => 'PRESTAMO CREADO CON EXITO!']);
            } else {
                return response()->json(['warning' => 'ERROR AL GUARDAR DATOS!']);
            }
        }
    }

    public function update(PrestamoRequest $request, $id)
    {
        if (request()->ajax()) {
            $exito = $this->repository->updatePrestamo($request);
            if ($exito) {
                return response()->json(['success' => 'PRESTAMO ACTUALIZADO CON EXITO!']);
            } else {
                return response()->json(['warning' => 'ERROR AL ACTUALIZAR DATOS!']);
            }
        }
    }

    
}
