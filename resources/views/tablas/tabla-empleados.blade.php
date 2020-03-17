<table class="table table-condensed table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Tipo Funcionario</th>
            <th>Nombre Dependencia</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>#</th>
            <th>Tipo Funcionario</th>
            <th>Nombre Dependencia</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$empleado->tipo->nombre_tipo}}</td>
            <td>{{$empleado->dependencia->nombre_dependencia}}</td>
            <td>{{$empleado->nombres}}</td>
            <td>{{$empleado->apellidos}}</td>
            <td>{{$empleado->estado}}</td>
            <td class="text-center">
				<a href='#EditEmpleado' data-toggle='modal' class='btn bg-indigo waves-effect btn-sm' data-id="{{$empleado->id}}" data-tipo="tipo_id" data-nombre="{{$empleado->nombres}}" data-apellido="{{$empleado->apellidos}}" data-estado="{{$empleado->estado}}">
                    <i class="material-icons" data-toggle="tooltip" data-placement="top" data-original-title="Editar">create</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>