@extends('layouts.main')


@section('titulo', 'LISTADO DE MULTIMEDIAS')

@section('extra-css')
<link href="{{asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<!-- Sweetalert Css -->
<link href="{{asset('plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" />
@stop


@section('content')

<div class="container-fluid">
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2 class="text-center font-bold col-deep-purple font-42">
						LISTADO DE MULTIMEDIAS
					</h2>
					<a href="#crearMultimedia" data-toggle="modal"  class="btn btn-success waves-effect">
                        <i class="material-icons">save</i>
                        <span>CREAR MULTIMEDIA</span>
                    </a>
				</div>
				<div class="body">
					<div class="table-responsive" id="id_table">
						@include('tablas.tabla-multimedias')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<form id="form_hidden" style="display:none" action="{{route('multimedias.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>


@include('modals.create-multimedia')
@include('modals.edit-multimedia')
	
@stop



@section('extra-scripts')

<script src="{{asset('plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('js/datatable.js')}}"></script>
<script src="{{asset('js/multimedia.js')}}"></script>

@stop