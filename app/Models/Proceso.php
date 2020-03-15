<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    protected $table = 'procesos';
    protected $fillable = ['nombre_proceso', 'descripcion'];
    protected $hidden = ['created_at', 'updated_at'];

    public function prestamos(){
    	return $this->belongsToMany('App\Models\Prestamo');
    }
}
