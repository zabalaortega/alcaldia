<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrestamoProceso extends Model
{
    protected $table = 'prestamoproceso';
    protected $fillable = ['prestamo_id', 'proceso_id'];
    protected $hidden = ['created_at', 'updated_at'];
}
