<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrestamoProceso extends Model
{
    protected $table = 'prestamo_proceso';

    protected $fillable = ['prestamo_id', 'proceso_id', 'descripcion', 'estado'];

    protected $hidden = ['created_at', 'updated_at'];

    public function prestamo()
    {
        return $this->belongsTo('App\Models\Prestamo');
    }

    public function proceso()
    {
        return $this->belongsTo('App\Models\Proceso');
    }
}
