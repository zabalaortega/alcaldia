

@extends('layouts.main')
@section('titulo', 'LISTADO DE SOLICITUD DE EQUIPOS MULTIMEDIAS')

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
						LISTADO DE SOLICITUD DE EQUIPOS MULTIMEDIAS 
					</h2>
		
					<ul class="header-dropdown m-r--5">
						<li class="dropdown">
							<a href='#Exports' class="dropdown-toggle" data-toggle="modal" data-original-title='Reporte'>
								<i class="material-icons" data-toggle='tooltip' data-placement='top' data-original-title='Reporte'>cloud_download</i>
							</a>
						</li>
					</ul>

				</div>
				
				<div class="body">
					<div class="table-responsive" id="id_table">
						@include('tablas.tabla-prestamos')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<form id="form_hidden" style="display:none" action="{{route('solicitud_equipos_multimedias.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
<form id="form_avaliable" style="display:none" action="{{route('multimedias.avaliable')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>

<input id="list_usuarios" type="hidden" value='@json($usuarios)'>

@include('modals.edit-prestamo')
@include('modals.update-prestamo')
@include('modals.export')
	

@stop



@section('extra-scripts')

<script src="{{asset('plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('js/datatable.js')}}"></script>
<script>
	let usuarios = $('#list_usuarios').val();
	usuarios = JSON.parse(usuarios);
</script> 

<script src="{{asset('js/prestamo.js')}}"></script>

@stop