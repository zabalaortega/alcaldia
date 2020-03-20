<?php

namespace App\Http\Controllers;

use App\Http\Requests\MultimediasRequest;
use App\Http\Requests\MultimediaUpdateRequest;
use App\Repositories\MultimediaRepository;

class MultimediaController extends Controller
{
    protected $repository;

    public function __construct(MultimediaRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        // Traer el inventario en el que se encuentra
        $multimedias = $this->repository->getMultimedias();
        $inventarios = $this->repository->getInventarios();

        if (request()->ajax()) {
            $multimedias = $this->repository->getMultimedias();
            return response()->view('tablas.tabla-multimedias', compact('multimedias'));
        }

        return view('multimedia.index', compact('multimedias', 'inventarios'));
    }

    public function store(MultimediasRequest $request)
    {
        if (request()->ajax()) {

            $exito = $this->repository->saveMultimedia($request);

            if ($exito == 1) {
                return response()->json(['success' => 'MULTIMEDIA CREADO CON EXITO!']);
            }

            if ($exito == 0) {
                return response()->json(['warning' => 'ERROR AL GUARDAR DATOS!']);
            }

            if ($exito == 2) {
                return response()->json(['warning' => 'INVENTARIO LLENO AMPLIE SU STOCK!']);
            }
        }
    }

    public function update(MultimediaUpdateRequest $request, $id)
    {
        if (request()->ajax()) {
            $exito = $this->repository->updateMultimedia($request);
            if ($exito) {
                return response()->json(['success' => 'MULTIMEDIA ACTUALIZADO CON EXITO!']);
            } else {
                return response()->json(['warning' => 'ERROR AL ACTUALIZAR DATOS!']);
            }
        }
    }

    public function changeStatus($id, $status)
    {
        if (request()->ajax()) {
            $exito = $this->repository->changeStatus($id);

            if ($exito == 3) {
                return response()->json(['warning' => 'ERROR AL ACTUALIZAR DATOS!']);
            }

            if ($exito == 2) {
                return response()->json(['warning' => 'INVENTARIO LLENO AMPLIE SU STOCK!']);
            }

            return response()->json(['success' => 'MULTIMEDIA HA CAMBIADO SU ESTADO!', 'status' => $status]);
        
        }
    }
}
