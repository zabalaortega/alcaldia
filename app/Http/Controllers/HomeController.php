<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuario = Auth::user();
        $rol = $usuario->roles->implode('name');
        //dd($rol);
       
        switch ($rol) {
            case 'admin':
                return view('home');
            break;

        }
        return view('modals.create-prestamo');
    }
}
