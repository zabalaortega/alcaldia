<table class="table table-condensed table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Serial</th>
            <th>Marca</th>
            <th>Tipo</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>#</th>
            <th>Serial</th>
            <th>Marca</th>
            <th>Tipo</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($equipos as $equipo)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$equipo_computo->serial}}</td>
            <td>{{$equipo_computo->marca}}</td>
            <td>{{$equipo_computo->tipo}}</td>
            <td>{{$equipo_computo->estado}}</td>
            <td class="text-center">
				<a href='#EditEquipos' data-toggle='modal' class='btn bg-indigo waves-effect btn-sm' data-id="{{$equipo->id}}" data-serial="{{$equipo->serial}}" data-marca="{{$equipo->marca}}" data-tipo="{{$equipo->tipo}}" data-estado="{{$equipo->estado}}">
                    <i class="material-icons" data-toggle="tooltip" data-placement="top" data-original-title="Editar">create</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>