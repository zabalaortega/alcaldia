@extends('layouts.main')
@section('titulo', 'Registro Empleado')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 class="text-center font-bold col-teal">REGISTRO DE PRESTAMO</h2>
            </div>
            <div class="body">

                <form id="form_create" method="POST" action="{{ route('prestamos.store') }}"
                    autocomplete="off">

                    @csrf

                        <div class="col-md-6">
                            <label for="tipo_id">Empleado</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="empleado_id" class="form-control">
                                        <option value="">-- Escoja una opcion --</option>   
                                        @foreach($empleados as $empleado)
                                        <option value="{{$empleado->id}}">{{$empleado->nombres}} {{$empleado->apellidos}} </option>
                                        @endforeach
                                    </select>                                                 
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="multimedia_id">Multimedia</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="multimedia_id" class="form-control">
                                        <option value="">-- Escoja una opcion --</option>   
                                        @foreach($multimedias as $multimedia)
                                        <option value="{{$multimedia->id}}">{{$multimedia->nombre_multimedia}}</option>
                                        @endforeach
                                    </select>  
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="descripcion" class="col-red">Descripcion:</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="descripcion">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="estado">Estado:</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input class="form-control" name="estado">
                                </div>
                            </div>        
                        </div>

                        
                    <button type="submit"  class="btn bg-teal waves-effect">
                        <i class="material-icons">save</i>
                        <span>GUARDAR</span>
                    </button>

                </form>

            </div>
        </div>
    </div>
</div>
@stop