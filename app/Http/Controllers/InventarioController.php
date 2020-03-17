<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InventarioRequest;
use App\Models\Inventario;

class InventarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $inventarios = Inventario::all(['id', 'stock', 'existencia', 'estado']);

        if (request()->ajax()) {
            $inventarios = Inventario::all(['id', 'stock', 'existencia', 'estado']);
            return response()->view('tablas.tabla-inventarios', compact('inventarios'));
        }

        return view('inventario.index', compact('inventarios'));
    }

    public function store(InventarioRequest $request)
    {
        if (request()->ajax())
        {
            Inventario::create($request->all());
            return response()->json(['success' => 'INVENTARIO CREADO CON EXITO!']);
        }
    }
}
