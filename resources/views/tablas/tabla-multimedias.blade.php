<table class="table table-condensed table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Multimedia</th>
            <th>Serial</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>#</th>
            <th>Multimedia</th>
            <th>Serial</th>
            <th>Accion</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($multimedias as $multimedia)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$multimedia->nombre_multimedia}} ({{$multimedia->tipo}})</td>
            <td>{{$multimedia->serial}}</td>
            <td class="text-center">
                {{$multimedia->present()->isStatus()}}
				<a href='#EditMultimedia' data-toggle='modal' class='btn bg-indigo waves-effect btn-sm' data-id="{{$multimedia->id}}" data-nombre="{{$multimedia->nombre_multimedia}}" data-tipo="{{$multimedia->tipo}}" data-serial="{{$multimedia->serial}}">
                    <i class="material-icons" data-toggle="tooltip" data-placement="top" data-original-title="Editar">create</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>