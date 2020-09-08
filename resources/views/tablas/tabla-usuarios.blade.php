<table class="table table-condensed table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombres y Apellidos</th>
            <th>Email</th>
            <th>Tipo Usuario</th>
            <th>Dependencia</th>
            <th>Rol</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>#</th>
            <th>Nombres y Apellidos</th>
            <th>Email</th>
            <th>Tipo Usuario</th>
            <th>Dependencia</th>
            <th>Rol</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$usuario->nombre_completo}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{$usuario->tipo->nombre_tipo}}</td>
            <td>{{$usuario->dependencia->nombre_dependencia}}</td>
            <td>{{$usuario->roles->implode('name', ',') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>