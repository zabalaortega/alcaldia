<table class="table table-condensed table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Serial</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>#</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Serial</th>
            <th>Accion</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($equipo_computos as $equipo_computo)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$equipo_computo->nombre}}</td>
            <td>{{$equipo_computo->marca}}</td>
            <td>{{$equipo_computo->serial}}</td>
            <td class="text-center">
				<a href='#EditEquipo_computos' data-toggle='modal' class='btn bg-indigo waves-effect btn-sm' data-id="{{$equipo_computo->id}}" data-nombre="{{$equipo_computo->nombre}}" data-marca="{{$equipo_computo->marca}}" data-serial="{{$equipo_computo->serial}}">
                    <i class="material-icons" data-toggle="tooltip" data-placement="top" data-original-title="Editar">create</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>