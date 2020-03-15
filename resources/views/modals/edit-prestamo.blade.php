<div class="modal fade" id="EditPrestamo" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="text-center font-bold col-teal">ACTUALIZAR PRESTAMO</h2>
                            </div>
                            <div class="body">

                                <form id="form_edit" method="POST" action="{{ route('prestamos.update', 'prestamo') }}"
                                    autocomplete="off">

                                    @csrf
                                    @method('PATCH')

                                        <input type="hidden" name="id_prestamo" id="id_prestamo">

                                        <div class="col-md-12">
                                            <label for="empleado_id" class="col-red">Empleado</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="empleado_id" name="empleado_id" class="form-control">
                                                     <option value=""></option>
                                                    </select>  
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="multimedia_id" class="col-red">Multimedia</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="multimedia_id" name="multimedia_id" class="form-control">
                                                     <option value=""></option>
                                                    </select>  
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label for="fecha_entrada" class="col-red">Fecha Entrada:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="fecha_entrada">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="descripcion">Descripcion:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" name="descripcion"></input>
                                                </div>
                                            </div>        
                                        </div>

                                        <div class="col-md-12">
                                            <label for="estado">Estado:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" name="estado"></input>
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