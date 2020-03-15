<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';

    protected $fillable = ['nombre_tipo', 'descripcion'];

    protected $hidden = ['created_at', 'updated_at'];

    public function empleados()
    {
        return $this->hasMany('App\Models\Empleado');
    }

}
