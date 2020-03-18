<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\PrestamoRequest;
use App\Models\Prestamo;
use App\Models\Empleado;
use App\Models\Multimedia;

class PrestamoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $prestamos = Prestamo::all(['id', 'empleado_id', 'multimedia_id', 'descripcion', 'estado']);

        if (request()->ajax()) {
            $prestamos = Prestamo::all(['id', 'empleado_id', 'multimedia_id', 'descripcion', 'estado']);
            return response()->view('tablas.tabla-prestamos', compact('prestamos'));
        }

        return view('prestamo.index', compact('prestamos'));
    }

    public function create()
    {
        $prestamos = Prestamo::all();
        $empleados = Empleado::all();
        $multimedias = Multimedia::all();
        return view('prestamo.create', compact('prestamos', 'empleados','multimedias'));
    }

    public function store(Request $request)
    {
        
        Prestamo::create($request->all());
        return redirect('/prestamos');   
  
    }
}
