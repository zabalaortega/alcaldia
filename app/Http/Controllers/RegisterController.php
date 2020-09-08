<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Repositories\DependenciaRepository;
use App\Repositories\UsuarioRepository;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;
    protected $repository;
    protected $dependencia;

    public function __construct(UsuarioRepository $repository, DependenciaRepository $dependencia)
    {
        $this->middleware('guest');
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

        return view('auth.register', compact('usuarios', 'dependencias', 'tipos'));
        
    }

    public function store(Request $request){

        $usuario = User::create([
            'name' => $request->name,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'tipo_id' => $request->tipo_id,
            'dependencia_id' => $request->dependencia_id,
            'estado' => 1,
            'password' => Hash::make($request->password),
        ]);

        $usuario->assignRole([1]);

        return redirect()->route('login');  
        //return view('home');	
    }
}
