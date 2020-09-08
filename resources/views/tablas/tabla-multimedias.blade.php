<table class="table table-condensed table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Serial</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>#</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Serial</th>
            <th>Accion</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($multimedias as $multimedia)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$multimedia->nombre_multimedia}}</td>
            <td>{{$multimedia->marca}}</td>
            <td>{{$multimedia->serial}}</td>
            
            <td class="text-center">

                <a href='#updateMultimedia' data-toggle='modal' class='btn bg-red waves-effect btn-sm' 
                    data-id="{{ $multimedia->id }}" 
                    data-estado="{{ $multimedia->estado }}">
                    <i class='material-icons'  data-toggle='tooltip' data-placement='top' data-original-title='DAR DE BAJA!'>visibility</i>
                </a>     
                
				<a href='#EditMultimedia' data-toggle='modal' class='btn bg-indigo waves-effect btn-sm'
                    data-id="{{ $multimedia->id }}" 
                    data-nombre="{{ $multimedia->nombre_multimedia}}"
                    data-marca="{{ $multimedia->marca }}" 
                    data-serial="{{ $multimedia->serial }}">

                    <i class="material-icons" data-toggle="tooltip" data-placement="top" data-original-title="Editar">create</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>