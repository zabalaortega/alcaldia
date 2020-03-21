<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventarioRequest;
use App\Http\Requests\UpdateStockInventario;
use App\Models\Inventario;
use App\Repositories\InventarioRepository;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    protected $repository;

    public function __construct(InventarioRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
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
        if (request()->ajax()) {
            $exito = $this->repository->saveInventario($request);
            if (!$exito) {
                return response()->json(['warning' => 'ERROR AL GUARDAR DATOS!']);
            }
            return response()->json(['success' => 'INVENTARIO CREADO CON EXITO!', 'inventario' => $exito]);
        }
    }

    public function addSpaceStock(UpdateStockInventario $request)
    {
        if (request()->ajax()) {
            $exito = $this->repository->saveUpdateStockInventario($request);
            if (!$exito) {
                return response()->json(['warning' => 'ERROR AL GUARDAR DATOS!']);
            }
            return response()->json(['success' => 'STOCK DE INVENTARIO AMPLIADO CON EXITO!']);
        }

    }
}
