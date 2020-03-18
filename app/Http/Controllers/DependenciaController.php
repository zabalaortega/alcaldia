<?php

namespace App\Http\Controllers;

use App\Http\Requests\DependenciaRequest;
use App\Repositories\DependenciaRepository;

class DependenciaController extends Controller
{
    protected $repository;

    public function __construct(DependenciaRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $dependencias = $this->repository->getDependencias();

        if (request()->ajax()) {
            $dependencias = $this->repository->getDependencias();
            return response()->view('tablas.tabla-dependencias', compact('dependencias'));
        }

        return view('dependencia.index', compact('dependencias'));
    }

    public function store(DependenciaRequest $request)
    {
        if (request()->ajax()) {
            $exito = $this->repository->saveDependencia($request);
            if ($exito) {
                return response()->json(['success' => 'DEPENDENCIA CREADO CON EXITO!']);
            } else {
                return response()->json(['warning' => 'ERROR AL GUARDAR DATOS!']);
            }
        }
    }

    public function update(DependenciaRequest $request, $id)
    {
        if (request()->ajax()) {
            $exito = $this->repository->updateDependencia($request);
            if ($exito) {
                return response()->json(['success' => 'DEPENDENCIA ACTUALIZADO CON EXITO!']);
            } else {
                return response()->json(['warning' => 'ERROR AL ACTUALIZAR DATOS!']);
            }
        }
    }

}
