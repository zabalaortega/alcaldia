<table class="table table-condensed table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Equipo ID</th>
            <th>Fecha Entrada</th>
            <th>Fecha Salida</th>
            <th>Descripcion</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>#</th>
            <th>Equipo ID</th>
            <th>Fecha Entrada</th>
            <th>Fecha Salida</th>
            <th>Descripcion</th>
            <th>Accion</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($recepciones as $recepcion)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$recepcion->equipo_id}}</td>
            <td>{{$recepcion->fecha_entrada}}</td>
            <td>{{$recepcion->fecha_salida}}</td>
            <td>{{$recepcion->descripcion}}</td>
            <td class="text-center">
				<a href='#EditRecepcion' data-toggle='modal' class='btn bg-indigo waves-effect btn-sm' data-id="{{$recepcion->id}}" data-fecha_entrada="{{$recepcion->fecha_entrada}}" data-fecha_salida="{{$recepcion->fecha_salida}}" data-descripcion="{{$recepcion->descripcion}}">
                    <i class="material-icons" data-toggle="tooltip" data-placement="top" data-original-title="Editar">create</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>