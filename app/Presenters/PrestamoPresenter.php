<?php

namespace App\Presenters;

use Illuminate\Support\HtmlString;

class PrestamoPresenter extends Presenter
{
    public function isStatus()
    {
        if ($this->checkProceso('Prestado')) {
            return $this->textStatus('En Uso', 'light-green');
        }

        if ($this->checkProceso('Vencido')) {
            return $this->textStatus('Vencido', 'deep-orange');
        }

    }

    public function checkProceso($proceso)
    {
        if ($this->model->procesoCurrent->first()->nombre_proceso == $proceso) {
            return true;
        }
        return false;
    }

    public function textStatus($status, $color)
    {
        return new HtmlString("<span class='font-bold col-" . $color . "'>" . $status . "</span>");
    }

    public function linkProceso()
    {
        if ($this->checkProceso('Prestado')) {
            return $this->hasPrestado();
        }

        if ($this->checkProceso('Vencido')) {
            return $this->hasPrestado();
        }
    }

    public function hasPrestado()
    {
        return new HtmlString("<button type='button' onclick='devolverMultimedia(this);' 
        id='btndevolver-{$this->model->id}' 
        data-href='" . route('prestamos.devolver', $this->model->id) .
        "' class='btn bg-purple waves-effect btn-sm'><i class='material-icons' 
        data-toggle='tooltip' data-placement='top' data-original-title='DEVUELTO!'>low_priority</i></button>");
    }

    public function isDescripcion()
    {
        return $this->checkDescripcion() ? $this->hasDescripcion() : $this->hasNotDescripcion();
    }

    public function checkDescripcion()
    {
        if ($this->model->fecha_salida) {
            return true;
        }
        return false;
    }

    public function hasDescripcion()
    {
        return new HtmlString("<span class='col-black'>{$this->model->fecha_salida}</span>");
    }

    public function hasNotDescripcion()
    {
        return new HtmlString("<span class='col-black'>Ningun detalle especificado</span>");
    }
}
