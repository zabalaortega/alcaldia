<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MultimediasRequest;
use App\Models\Multimedia;

class MultimediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $multimedias = Multimedia::all(['id', 'nombre_multimedia', 'tipo', 'serial', 'estado']);

        if (request()->ajax()) {
            $multimedias = Multimedia::all(['id', 'nombre_multimedia', 'tipo', 'serial', 'estado']);
            return response()->view('tablas.tabla-multimedias', compact('multimedias'));
        }

        return view('multimedia.index', compact('multimedias'));
    }

    public function store(MultimediasRequest $request)
    {
        if (request()->ajax())
        {
            Multimedia::create($request->all());
            return response()->json(['success' => 'EQUIPO MULTIMEDIA CREADO CON EXITO!']);
        }
    }
}
