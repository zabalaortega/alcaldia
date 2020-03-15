<table class="table table-condensed table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Descripcion</th>
            <th>Fecha Entrada</th>
            <th>Estado</th>
            <th>Empleado ID</th>
            <th>Multimedia ID</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>#</th>
            <th>Descripcion</th>
            <th>Fecha Entrada</th>
            <th>Estado</th>
            <th>Empleado ID</th>
            <th>Multimedia ID</th>
            <th>Accion</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($prestamos as $prestamo)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$prestamo->descripcipon}}</td>
            <td>{{$prestamo->fecha_entrada}}</td>
            <td>{{$prestamo->estado}}</td>
            <td>{{$prestamo->empleado_id}}</td>
            <td>{{$prestamo->multimedia_id}}</td>
            <td class="text-center">
				<a href='#EditPrestamo' data-toggle='modal' class='btn bg-indigo waves-effect btn-sm' data-id="{{$prestamo->id}}" data-fecha="{{$prestamo->fecha_entrada}}" data-estado="{{$prestamo->estado}}" data-empleado="{{$prestamo->empleado_id}}" data-multimedia="{{$prestamo->multimedi_id}}">
                    <i class="material-icons" data-toggle="tooltip" data-placement="top" data-original-title="Editar">create</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>