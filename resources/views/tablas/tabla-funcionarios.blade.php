<table class="table table-condensed table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Dependencia</th>
            <th>Nombre Funcionario</th>
            <th>Apellido Funcionario</th>
            <th>Cargo Funcionario</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>#</th>
            <th>Dependencia</th>
            <th>Nombre Funcionario</th>
            <th>Apellido Funcionario</th>
            <th>Cargo Funcionario</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($funcionarios as $funcionario)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$funcionario->dependencia->id_dependencia}}</td>
            <td>{{$funcionario->nombre_funcionario}}</td>
            <td>{{$funcionario->apellido_funcionario}}</td>
            <td>{{$funcionario->cargo_funcionario}}</td>
            <td class="text-center">
				<a href='#EditFuncionario' data-toggle='modal' class='btn bg-indigo waves-effect btn-sm' data-id="{{$funcionario->id}}" data-dependencia="id_dependencia" data-nombre="{{$funcionario->nombre_funcionario}}" data-apellido="{{$funcionario->apellido_funcionario}}" data-cargo="{{$funcionario->cargo_funcionario}}">
                    <i class="material-icons" data-toggle="tooltip" data-placement="top" data-original-title="Editar">create</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>