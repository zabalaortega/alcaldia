<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    protected $table = 'dependencias';

    protected $fillable = ['nombre_dependencia', 'descripcion'];

    protected $hidden = ['created_at', 'updated_at'];

    public function empleados()
    {
        return $this->hasMany('App\Models\Empleado');
    }


}
