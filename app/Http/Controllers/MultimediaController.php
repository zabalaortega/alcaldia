<?php

namespace App\Http\Controllers;

use App\Http\Requests\MultimediasRequest;
use App\Http\Requests\ChangeStatusRequest;
use Illuminate\Http\Request;
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
        $multimedias = $this->repository->getMultimedias();

        if (request()->ajax()) {
            $multimedias = $this->repository->getMultimedias();
            return response()->view('tablas.tabla-multimedias', compact('multimedias'));
        }

        return view('multimedia.index', compact('multimedias'));
    }

    public function store(MultimediasRequest $request)
    {
        if (request()->ajax()) {

            $exito = $this->repository->saveMultimedia($request);

            if ($exito == 1) {
                return response()->json(['success' => 'MULTIMEDIA CREADO CON EXITO!']);
            }
            return redirect()->route('multimedias.index');
            /* if ($exito == 0) {
                return response()->json(['warning' => 'ERROR AL GUARDAR DATOS!']);
            } */

            /* if ($exito == 2) {
                return response()->json(['warning' => 'INVENTARIO LLENO AMPLIE SU STOCK!']);
            } */
        }
    }

    public function update(MultimediasRequest $request, $id)
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

    public function changeStatus(Request $request)
    {
        $exito = $this->repository->changeStatus($request);

        if ($exito == 3) {
            return response()->json(['warning' => 'ERROR AL ACTUALIZAR DATOS!']);
        }

        return redirect()->route('multimedias.index');
    
    }

}
