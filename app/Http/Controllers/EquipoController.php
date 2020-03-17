<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EquipoRequest;
use App\Models\Equipo;

class EquipoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $equipos = Equipo::all(['id', 'serial', 'marca', 'tipo', 'estado']);

        if (request()->ajax()) {
            $equipos = Equipo::all(['id', 'serial', 'marca', 'tipo', 'estado']);
            return response()->view('tablas.tabla-equipos', compact('equipos'));
        }

        return view('equipo.index', compact('equipos'));
    }

    public function store(EquipoRequest $request)
    {
        if (request()->ajax())
        {
            Equipo::create($request->all());
            return response()->json(['success' => 'EQUIPO CREADO CON EXITO!']);
        }
    }
}
