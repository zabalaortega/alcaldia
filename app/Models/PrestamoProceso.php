<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrestamoProceso extends Model
{
    protected $table = 'prestamo_proceso';
    protected $fillable = ['proceso_id', 'prestamo_id', 'descripcion', 'estado'];
    protected $hidden = ['created_at', 'updated_at'];
}
