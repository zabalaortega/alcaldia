<?php

namespace App\Http\Controllers;

use App\Http\Requests\DependenciaRequest;
use App\Models\Dependencia;
use Illuminate\Http\Request;

class DependenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dependencias = Dependencia::all(['id', 'nombre_dependencia', 'descripcion']);

        if (request()->ajax()) {
            $dependencias = Dependencia::all(['id', 'nombre_dependencia', 'descripcion']);
            return response()->view('tablas.tabla-dependencias', compact('dependencias'));
        }

        return view('dependencia.index', compact('dependencias'));
    }

    public function store(DependenciaRequest $request)
    {
        if (request()->ajax())
        {
            Dependencia::create($request->all());
            return response()->json(['success' => 'DEPENDENCIA CREADO CON EXITO!']);
        }
    }

    public function update(DependenciaRequest $request, $id)
    {
        if (request()->ajax())
        {
            Dependencia::find($request->id_dependencia)->update($request->all());
            return response()->json(['success' => 'DEPENDENCIA ACTUALIZADO CON EXITO!']);
        }
    }

    
}
