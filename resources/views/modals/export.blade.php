<div class="modal fade" id="Exports" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header">
                            <h2 class="text-center font-bold col-teal">REPORTE DE SOLICITUDES</h2>
                        </div>
                        <hr>
                        <div class="body">

                            <form id="form_export" method="GET" action="{{route('export')}}" autocomplete="off">

                                @csrf
                                
                                <div class="col-md-6">
                                    <label for="fecha_inicio">Fecha Inicio</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control" name="fecha_inicio" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="fecha_final">Fecha Final</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control" name="fecha_final" required>
                                        </div>
                                    </div>        
                                </div>

                                <button  type="submit" class="btn bg-green waves-effect">
                                    <i class="material-icons">grid_on</i>
                                    <span>Generar Reporte</span>
                                </button>

                            </form>

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