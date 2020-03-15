<table class="table table-condensed table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre Tipo</th>
            <th>Descripcion</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>#</th>
            <th>Nombre Tipo</th>
            <th>Descripcion</th>
            <th>Accion</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($tipos as $tipo)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$tipo->nombre_tipo}}</td>
            <td>{{$tipo->descripcion}}</td>
            <td class="text-center">
				<a href='#EditTipo' data-toggle='modal' class='btn bg-indigo waves-effect btn-sm' data-id="{{$tipo->id}}" data-nombre="{{$tipo->nombre_tipo}}" data-descripcion="{{$tipo->descripcion}}">
                    <i class="material-icons" data-toggle="tooltip" data-placement="top" data-original-title="Editar">create</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>