<table class="table table-condensed table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Empleado</th>
            <th>Multimedia</th>
            <th>Fecha Prestamo</th>
            <th>Devolucion</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>#</th>
            <th>Empleado</th>
            <th>Multimedia</th>
            <th>Fecha Prestamo</th>
            <th>Devolucion</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($prestamos as $prestamo)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$prestamo->empleado->nombre_completo}}</td>
            <td>{{$prestamo->multimedia->nombre_multimedia}}</td>
            <td>{{$prestamo->fecha_prestamo}} ({{$prestamo->hora_prestamo}})</td>
            <td>{{$prestamo->fecha_devolucion}} ({{$prestamo->hora_devolucion}})</td>
            <td>{{$prestamo->present()->isStatus()}}</td>
            <td class="text-center">
				{{-- <a href='#EditPrestamo' data-toggle='modal' class='btn bg-indigo waves-effect btn-sm' data-id="{{$prestamo->id}}" data-fecha="{{$prestamo->fecha_entrada}}" data-estado="{{$prestamo->estado}}" data-empleado="{{$prestamo->empleado_id}}" data-multimedia="{{$prestamo->multimedi_id}}">
                    <i class="material-icons" data-toggle="tooltip" data-placement="top" data-original-title="Editar">create</i>
                </a> --}}
                {{$prestamo->present()->linkProceso()}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>