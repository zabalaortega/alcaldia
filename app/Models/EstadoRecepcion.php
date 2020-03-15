<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoRecepcion extends Model
{
    protected $table = 'estadorecepcion';
    protected $fillable = ['estado_id', 'recepcion_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function estado(){
    	return $this->belongsTo('App\Models\Estado');
    }

    public function recepcion(){
    	return $this->belongsTo('App\Models\Recepcion');
    }
}
