<table class="table table-condensed table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>Multimedia</th>
            <th>Fecha Solicitud</th>
            <th>Motivo Solicitud</th>
            <th>Fecha Entraga</th>
            <th>Estado</th>
            @role('admin')
            <th>Accion</th>
            @endrole
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>#</th>
            <th>Usuario</th>
            <th>Multimedia</th>
            <th>Fecha Solicitud</th>
            <th>Motivo Solicitud</th>
            <th>Fecha Entraga</th>
            <th>Estado</th>
            @role('admin')
            <th>Accion</th>
            @endrole
        </tr>
    </tfoot>
    <tbody>
        @foreach($prestamos as $prestamo)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$prestamo->user->nombre_completo}}</td>
            <td>{{$prestamo->multimedia->nombre_multimedia}} ({{$prestamo->multimedia->serial}})</td>
            <td>{{$prestamo->created_at}}</td>
            <td>{{$prestamo->descripcion}}</td>
            <td>{{$prestamo->present()->isDescripcion()}}</td>
            <td>{{$prestamo->present()->isStatus()}}</td>
            @role('admin')
            <td class="text-center">
            
                <a href='#EditPrestamo' data-toggle='modal' class='btn bg-indigo waves-effect btn-sm'
                    data-id="{{$prestamo->id}}" 
                    data-usuario="{{$prestamo->user_id}}" 
                    data-multimedia="{{$prestamo->multimedia_id}}"
                    data-observacion="{{$prestamo->descripcion}}" 
                    data-name_multimedia="{{$prestamo->multimedia->nombre_multimedia}}" 
                    data-serial="{{$prestamo->multimedia->serial}}"
                    >
                    <i class="material-icons" data-toggle="tooltip" data-placement="top" data-original-title="Editar">create</i>
                </a>

                <a href='#updatePrestamo' data-toggle='modal' class='btn bg-red waves-effect btn-sm' 
                    data-id="{{$prestamo->id}}" 
                    data-estado="{{$prestamo->estado}}">
                    <i class='material-icons' data-toggle='tooltip' data-placement='top' data-original-title='DEVOLVER!'>low_priority</i>
                </a>

                {{-- {{$prestamo->present()->linkProceso()}} --}} 
                
            </td>
            @endrole
        </tr>
        @endforeach
    </tbody>
</table>
