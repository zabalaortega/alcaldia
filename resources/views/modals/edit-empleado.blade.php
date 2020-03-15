<div class="modal fade" id="EditEmpleado" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="text-center font-bold col-teal">ACTUALIZAR EMPLEADO</h2>
                            </div>
                            <div class="body">

                                <form id="form_edit" method="POST" action="{{ route('empleados.update', 'empleado') }}"
                                    autocomplete="off">

                                    @csrf
                                    @method('PATCH')

                                        <input type="hidden" name="id_empleado" id="id_empleado">

                                        <div class="col-md-12">
                                            <label for="tipo_id" class="col-red">Tipo Empleado</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="tipo_id" name="tipo_id" class="form-control">
                                                     <option value=""></option>
                                                    </select>  
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="dependencia_id" class="col-red">Nombre Dependencia</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="dependencia_id" name="dependencia_id" class="form-control">
                                                     <option value=""></option>
                                                    </select>  
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label for="nombres" class="col-red">Nombre Empleado:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="nombres" id="nombres">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="apellidos">Apellido Empleado:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" name="apellidos" id="apellidos"></input>
                                                </div>
                                            </div>        
                                        </div>

                                        <div class="col-md-12">
                                            <label for="estado">Estado:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" name="estado" id="estado"></input>
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