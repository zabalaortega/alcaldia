<table class="table table-condensed table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre funcionario</th>
            <th>Multimedia</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>#</th>
            <th>Nombre funcionario</th>
            <th>Multimedia</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($prestamos as $prestamo)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$prestamo->empleado->nombres}} {{$prestamo->empleado->apellidos}}</td>
            <td>{{$prestamo->multimedia->nombre_multimedia}}</td>
            <td>{{$prestamo->descripcion}}</td>
            <td>{{$prestamo->estado}}</td>
            <td class="text-center">
				<a href='#EditPrestamo' data-toggle='modal' class='btn bg-indigo waves-effect btn-sm' data-id="{{$prestamo->id}}" data-fecha="{{$prestamo->fecha_entrada}}" data-estado="{{$prestamo->estado}}" data-empleado="{{$prestamo->empleado_id}}" data-multimedia="{{$prestamo->multimedi_id}}">
                    <i class="material-icons" data-toggle="tooltip" data-placement="top" data-original-title="Editar">create</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>