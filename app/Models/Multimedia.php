<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $table = 'multimedias';

    protected $fillable = ['nombre_multimedia', 'tipo', 'serial', 'estado'];

    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = ['estado' => 'boolean'];

    public function prestamos()
    {
        return $this->hasMany('App\Models\Prestamo');
    }

}
