<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recepcion extends Model
{
    protected $table = 'recepciones';

    protected $fillable = ['equipo_id', 'fecha_entrada', 'fecha_salida', 'descripcion'];

    protected $hidden = ['created_at', 'updated_at'];

    public function equipo()
    {
        return $this->belongsTo('App\Models\Equipo');
    }

    public function estados()
    {
        return $this->belongsToMany('App\Models\Estado');
    }
}
