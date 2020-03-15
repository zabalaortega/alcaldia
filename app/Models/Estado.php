<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';
    protected $fillable = ['nombre_estado', 'descripcion'];
    protected $hidden = ['created_at', 'updated_at'];

    public function recepciones(){
    	return $this->belongsToMany('App\Models\Recepcion');
    }
}
