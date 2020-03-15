<div class="modal fade" id="EditEquipo_computos" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="text-center font-bold col-teal">ACTUALIZAR EQUIPOS DE COMPUTO</h2>
                            </div>
                            <div class="body">

                                <form id="form_edit" method="POST" action="{{ route('equipo_computos.update', 'equipo_computo') }}"
                                    autocomplete="off">

                                    @csrf
                                    @method('PATCH')

                                        <input type="hidden" name="id_equipo_computo" id="id_equipo_computo">

                                        <div class="col-md-12">
                                            <label for="nombre" class="col-red">Nombre:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="nombre" id="nombre">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="marca" class="col-red">Marca:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="marca" id="marca">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="serial" class="col-red">Serial:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="serial" id="serial">
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