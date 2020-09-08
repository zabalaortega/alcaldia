<div class="modal fade" id="EditMultimedia" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="text-center font-bold col-teal">ACTUALIZAR HERRAMIENTAS MULTIMEDIAS</h2>
                            </div>
                            <div class="body">

                                <form id="form_edit" method="POST" action="{{ route('multimedias.update', 'multimedia') }}"
                                    autocomplete="off">

                                    @csrf
                                    @method('PATCH')

                                        <input type="hidden" name="id_multimedia" id="id_multimedia">


                                        <div class="col-md-4">
                                            <label for="nombre_multimedia">Marca</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="nombre_multimedia" name="nombre_multimedia">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="marca">Modelo</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="marca" name="marca">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="serial">Serial</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="serial" name="serial">
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