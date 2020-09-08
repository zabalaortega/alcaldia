<div class="modal fade" id="updatePrestamo" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="text-center font-bold col-teal">Digite Fecha Y Hora Salida</h2>
                            </div>
                            <div class="body">

                                <form  method="POST" action="{{ route('prestamos.update') }}"
                                    autocomplete="off">

                                    @csrf
                                    
                                    <input type="hidden" name="id_pres" id="id_pres">
                                    <input type="hidden" name="estado" id="estado">


                                    <div class="col-md-6">
                                        <label for="fecha_salida">Fecha Salida</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" name="fecha_salida" id="fecha_salida" cols="30" rows="4" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="Hora_salida">Hora Salida</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="time" name="hora_salida" id="hora_salida" cols="30" rows="4" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn bg-teal waves-effect">
                                        <i class="material-icons">keyboard_return</i>
                                        <span>Devolver Multimedia</span>
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