<table class="table table-condensed table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>#</th>
            <th>Nombre</th>
            <th>Accion</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($equipo_multimedias as $equipo_multimedia)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$equipo_multimedia->nombre}}</td>
            <td class="text-center">
				<a href='#EditEquipo_multimedias' data-toggle='modal' class='btn bg-indigo waves-effect btn-sm' data-id="{{$equipo_multimedia->id}}" data-nombre="{{$equipo_multimedia->nombre}}">
                    <i class="material-icons" data-toggle="tooltip" data-placement="top" data-original-title="Editar">create</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>