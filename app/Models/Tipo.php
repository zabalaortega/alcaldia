<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';
    protected $fillable = ['nombre', 'descripcion', 'empleado_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function empleados(){
    	return $this->belongsTo('App\Models\Empleado');
    }

}
