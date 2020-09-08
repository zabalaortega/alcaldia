<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Models\Dependencia;
use App\Repositories\DependenciaRepository;
use App\Repositories\UsuarioRepository;

class UsuarioController extends Controller
{

    protected $repository;
    protected $dependencia;

    public function __construct(UsuarioRepository $repository, DependenciaRepository $dependencia)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->dependencia = $dependencia;
    }

    public function index()
    {
        $campos = ['id', 'tipo_id', 'dependencia_id', 'name', 'apellidos','email'];
        $usuarios = $this->repository->getUsuariosWithDependencia($campos);

        $dependencias = $this->dependencia->getDependencias();
        $tipos = $this->repository->getTipos();

        if (request()->ajax()) {
            $usuarios = $this->repository->getUsuariosWithDependencia($campos);
            return response()->view('tablas.tabla-usuarios', compact('usuarios'));
        } 

        return view('usuario.index', compact('usuarios', 'dependencias', 'tipos'));
      
    }
   
}
