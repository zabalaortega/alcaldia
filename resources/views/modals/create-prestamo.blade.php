@extends('layouts.menu')

@section('titulo', 'Alcaldia Sincelejo')

@section('content')
<link href="{{asset('plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" />
<div class="container">
    <h1 class="">Solicitud De Equipos Multimedias</h1>
    <a href="#crearPrestamo" data-toggle="modal"  class="btn btn-button animated tada infinite bounce">
        <span>Aqui</span>
    </a>
</div>

<div class="modal fade" id="crearPrestamo" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="text-center font-bold col-teal">SOLICITUD DE EQUIPOS MULTIMEDIAS </h2>
                            </div>
                            <div class="body">

                                <form id="form_create" method="POST"
                                    action="{{ route('solicitud_equipos_multimedias.store') }}" autocomplete="off">

                                    @csrf

                                    <div class="row">
                                        <div class="clearfix"></div> 
                                        <div class="col-md-6">
                                            <label for="usuario_id">Nombres</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    {{ Auth::user()->name }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="apellidos">Apellidos</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    {{ Auth::user()->apellidos }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                       <div class="col-md-12" id="showAlert" style="display:none;">
                                            <div class="alert alert-info">
                                                <strong>Lo Sentimos!!!</strong> Multimedia Agotados
                                             </div>
                                        </div>
                                    </div>    


                                    <div class="row">

                                       <div class="col-md-6" id="showMultimediaCreate">
                                            <label for="multimedia_id">Multimedias (Disponibles) (*)</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select name="multimedia_id" id="selectCreate"
                                                        class="form-control show-tick">
                                                        <option value="">-- Escoja una opcion --
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="descripcion">Evento Utilzar</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" name="observacion"></input>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <button type="button" id="btnsave" class="btn bg-teal waves-effect">
                                        <i class="material-icons">save</i>
                                        <span>GUARDAR</span>
                                    </button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>

<form id="form_avaliable" style="display:none" action="{{route('multimedias.avaliable')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
@stop 

@section('extra-scripts')
<script src="{{asset('js/prestamo.js')}}"></script>
<script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('js/datatable.js')}}"></script>

@stop