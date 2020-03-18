<?php

namespace App\Presenters;

use Illuminate\Support\HtmlString;

class MultimediaPresenter extends Presenter
{
    public function isStatus()
    {
        return $this->checkStatus() ? $this->hasActive() : $this->hasNotActive();
    }

    public function checkStatus()
    {
        return $this->model->estado;
    }

    public function hasActive()
    {
        return new HtmlString("<a type='button' id='btnapprove-{$this->model->id}' data-href='#' class='btn bg-teal waves-effect btn-sm'><i class='material-icons'  data-toggle='tooltip' data-placement='top' data-original-title='DAR DE BAJA!'>visibility</i></a>");
    }

    public function hasNotActive()
    {
        return new HtmlString("<a type='button' id='btnreject-{$this->model->id}' data-href='#' class='btn bg-deep-orange waves-effect btn-sm'><i class='material-icons'  data-toggle='tooltip' data-placement='top' data-original-title='REACTIVAR'>visibility_off</i></a>");
    }

}
