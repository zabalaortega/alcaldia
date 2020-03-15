<table class="table table-condensed table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Stock</th>
            <th>Existencia</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>#</th>
            <th>Stock</th>
            <th>Existencia</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($inventarios as $inventario)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$inventario->stock}}</td>
            <td>{{$inventario->existencia}}</td>
            <td>{{$inventario->estado}}</td>
            <td class="text-center">
				<a href='#EditInventario' data-toggle='modal' class='btn bg-indigo waves-effect btn-sm' data-id="{{$inventario->id}}" data-stock="{{$inventario->stock}}" data-existencia="{{$inventario->existencia}}" data-estado="{{$inventario->estado}}">
                    <i class="material-icons" data-toggle="tooltip" data-placement="top" data-original-title="Editar">create</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>