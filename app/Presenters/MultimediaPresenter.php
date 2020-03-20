<?php

namespace App\Presenters;

use Illuminate\Support\HtmlString;

class MultimediaPresenter extends Presenter
{
    public function isStatus()
    {
        return $this->checkStatus() ? $this->hasActive() : $this->hasNotActive();
    }

    public function isInventario()
    {
        return $this->checkStatus() ? $this->hasInventario() : $this->hasNotInventario();
    }

    public function checkStatus()
    {
        return $this->model->estado;
    }

    public function hasActive()
    {
        return new HtmlString("<button type='button' onclick='changeStatus(this);' id='btnapprove-{$this->model->id}' data-href='" . route('multimedias.change', $this->model->id) . "' class='btn bg-purple waves-effect btn-sm'><i class='material-icons'  data-toggle='tooltip' data-placement='top' data-original-title='DAR DE BAJA!'>visibility</i></button>" .
            "<button style='display:none;' type='button' onclick='changeStatus(this);' id='btnreject-{$this->model->id}' data-href='" . route('multimedias.change', $this->model->id) . "' class='btn bg-deep-orange waves-effect btn-sm'><i class='material-icons'  data-toggle='tooltip' data-placement='top' data-original-title='REACTIVAR'>visibility_off</i></button>");
    }

    public function hasNotActive()
    {
        return new HtmlString("<button type='button' onclick='changeStatus(this);' id='btnreject-{$this->model->id}' data-href='" . route('multimedias.change', $this->model->id) . "' class='btn bg-deep-orange waves-effect btn-sm'><i class='material-icons'  data-toggle='tooltip' data-placement='top' data-original-title='REACTIVAR'>visibility_off</i></button>" .
            "<button style='display:none;' type='button' onclick='changeStatus(this);' id='btnapprove-{$this->model->id}' data-href='" . route('multimedias.change', $this->model->id) . "' class='btn bg-purple waves-effect btn-sm'><i class='material-icons'  data-toggle='tooltip' data-placement='top' data-original-title='DAR DE BAJA!'>visibility</i></button>");
    }

    public function hasInventario()
    {
        return new HtmlString("{$this->model->inventarioCurrent->first()->descripcion} (Existencia: {$this->model->inventarioCurrent->first()->existencia}");
    }

    public function hasNotInventario()
    {
        return new HtmlString("<span class='col-black'>Retirado de Inventario</span>");
    }

}
