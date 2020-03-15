<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventarios';
    protected $fillable = ['stop', 'existencia', 'estado', 'multimedia_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function multimedia(){
    	return $this->belongsTo('App\Models\Mutimedia');
    }

    public function prestamos(){
    	return $this->hasMany('App\Models\Prestamo');
    }
}
