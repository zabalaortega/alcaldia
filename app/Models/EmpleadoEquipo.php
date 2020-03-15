<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpleadoEquipo extends Model
{
    protected $table = 'empleado_equipo';
    protected $fillable = ['empleado_id', 'equipo_id', 'descripcion', 'estado'];
    protected $hidden = ['created_at', 'updated_at'];
}
