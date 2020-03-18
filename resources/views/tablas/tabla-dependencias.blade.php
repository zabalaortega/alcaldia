<table class="table table-condensed table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Dependencia</th>
            <th>Descripcion</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>#</th>
            <th>Dependencia</th>
            <th>Descripcion</th>
            <th>Accion</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($dependencias as $dependencia)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$dependencia->present()->textName()}}</td>
            <td>{{$dependencia->present()->isDescripcion()}}</td>
            <td class="text-center">
				<a href='#EditDependencia' data-toggle='modal' class='btn bg-indigo waves-effect btn-sm' data-id="{{$dependencia->id}}" data-nombre="{{$dependencia->nombre_dependencia}}" data-descripcion="{{$dependencia->descripcion}}">
                    <i class="material-icons" data-toggle="tooltip" data-placement="top" data-original-title="Editar">create</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>