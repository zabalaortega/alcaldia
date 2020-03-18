<?php

namespace App\Presenters;

use Illuminate\Support\HtmlString;

class DependenciaPresenter extends Presenter
{

    public function isDescripcion()
    {
        return $this->checkDescripcion() ? $this->hasDescripcion() : $this->hasNotDescripcion();
    }

    public function checkDescripcion()
    {
        if ($this->model->descripcion) {
            return true;
        }
        return false;
    }

    public function hasDescripcion()
    {
        return new HtmlString("<span class='col-black'>{$this->model->descripcion}</span>");
    }

    public function hasNotDescripcion()
    {
        return new HtmlString("<span class='col-black'>Ningun detalle especificado</span>");
    }

    public function textName()
    {
        return new HtmlString("<span class='col-teal font-bold'>{$this->model->nombre_dependencia}</span>");
    }
}
