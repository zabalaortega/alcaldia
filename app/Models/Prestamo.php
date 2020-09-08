<?php

namespace App\Models;

use App\Presenters\PrestamoPresenter;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Prestamo extends Model
{
    use HasRoles;

    protected $table = 'prestamos';

    protected $fillable = [
        'user_id',
        'multimedia_id',
        'descripcion',
        'fecha_salida',
        'hora_salida',
        'estado',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = ['estado' => 'boolean'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function multimedia()
    {
        return $this->belongsTo('App\Models\Multimedia');
    }

    public function procesos()
    {
        return $this->belongsToMany('App\Models\Proceso')->withTimestamps();
    }

    public function procesoCurrent()
    {
        return $this->belongsToMany('App\Models\Proceso')->wherePivot('estado', 1);
    }

    public function present()
    {
        return new PrestamoPresenter($this);
    }

}
