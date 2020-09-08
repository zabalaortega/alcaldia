<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrestamoRequest;
use App\Http\Requests\ExportRequest;
use App\Repositories\PrestamoRepository;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PrestamoController extends Controller
{

    protected $repository;
    protected $usuario;


    public function __construct(PrestamoRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $prestamos = $this->repository->getPrestamos();
        $usuarios = User::all();
           
        if (request()->ajax()) {
            $prestamos = $this->repository->getPrestamos();
            return response()->view('tablas.tabla-prestamos', compact('prestamos'));
        }

        return view('prestamo.index', compact('prestamos', 'usuarios'));
    
    }


    public function getMultimedias()
    {
        if (request()->ajax()) {
            $multimedias = $this->repository->getMultimediasAvaliable();
            return response()->json($multimedias);
        }
    }


    public function store(PrestamoRequest $request)
    {
        if (request()->ajax()) {
            $exito = $this->repository->savePrestamo($request);
            if ($exito) {
                return response()->json(['success' => 'SOLICITUD CREADA CON EXITO! POR FAVOR ACERQUESE A LA SALA DE SISTEMA A RECLAMAR SU EQUIPO MULTIMEDIA']);
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
                 return response()->json(['success' => 'SOLICITUD ACTUALIZADA CON EXITO!']);
             } else {
                 return response()->json(['warning' => 'ERROR AL ACTUALIZAR DATOS!']);
             }
         }
    }

    public function devolverMultimedia($id)
    {
        if (request()->ajax()) {
            $exito = $this->repository->devolverMultimedia($id);
            if ($exito) {
                return response()->json(['success' => 'HERRAMIENTA/MULTIMEDIA DEVUELTA!']);
            } else {
                return response()->json(['warning' => 'OOPS OCURRIO UN ERROR!']);
            }
        }
    }

    public function changeUpdate(Request $request)
    {
        $exito = $this->repository->UpdateStatus($request);

        if ($exito == 3) {
            return response()->json(['warning' => 'ERROR AL ACTUALIZAR DATOS!']);
        }

        return redirect()->route('solicitud_equipos_multimedias.index');
    }

    public function export(Request $request)
    {
        
        $exito = $this->repository->exportPrestamo($request);
        return $exito;
                 
    }
  
}
