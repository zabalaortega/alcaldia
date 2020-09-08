<div class="modal fade" id="EditPrestamo" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="text-center font-bold col-teal">ACTUALIZAR SOLICITUD DE EQUIPOS MULTIMEDIAS</h2>
                            </div>
                            <div class="body">

                                <form id="form_edit" method="POST" action="{{ route('solicitud_equipos_multimedias.update', 'prestamo') }}"
                                    autocomplete="off">

                                    @csrf
                                    @method('PATCH')

                                    <input type="hidden" name="id_prestamo" id="id_prestamo">

                                    <div class="row">

                                        <div class="col-md-12" id="showAlertEdit" style="display:none;">
                                            <div class="alert alert-info">
                                                <strong>Heads up!</strong> Multimedia Agotados
                                            </div>
                                        </div>
                                    </div>    

                                    <div class="row">

                                        <div class="col-md-4">
                                            <label for="usuario_id">Usuario</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select name="user_id" id="usuario_id"
                                                        class="form-control show-tick">
                                                        <option value="" >-- Escoja una opcion --
                                                        </option>
                                                        @foreach($usuarios as $usuario)
                                                        <option value="{{$usuario->id}}"  >
                                                            {{$usuario->nombre_completo}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="usuario_id">Multimedia Actual:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                <input class="form-control" id="name_multimedia" disabled></input>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4" id="showMultimediaEdit">
                                                <label for="multimedia_id">Multimedias (Disponibles) (*)</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select name="multimedia_id" id="multimedia_id"
                                                            class="form-control show-tick">
                                                            <option value="">-- Escoja una opcion --
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="descripcion">Evento Utilzar</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" name="observacion" id="observacion"></input>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                 
                                    
                                    <button type="button" id="btnupdate" class="btn bg-teal waves-effect">
                                        <i class="material-icons">create</i>
                                        <span>ACTUALIZAR</span>
                                    </button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>