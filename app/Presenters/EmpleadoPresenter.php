<?php

namespace App\Presenters;

use Illuminate\Support\HtmlString;

class EmpleadoPresenter extends Presenter
{
    public function textName()
    {
        return new HtmlString("<span class='col-teal font-bold'>{$this->model->nombre_dependencia}</span>");
    }

}
