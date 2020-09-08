<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\Tipo;

class UsuarioRepository
{
    public function getUsuariosWithDependencia(array $campos)
    {
        return User::latest()->with('tipo:id,nombre_tipo', 'dependencia:id,nombre_dependencia')->get($campos);
    }

    public function getTipos()
    {
        return Tipo::all(['id', 'nombre_tipo']);
    }

}
