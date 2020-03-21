<div class="modal fade" id="crearPrestamo" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="text-center font-bold col-teal">REGISTRO DE PRESTAMO</h2>
                            </div>
                            <div class="body">

                                {{-- Inicio de Prestamo --}}
                                <div class="panel-group" id="accordion_16" role="tablist" aria-multiselectable="true">

                                    <div class="panel panel-col-light-blue">
                                        <div class="panel-heading" role="tab" id="headingOne_16">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion_16"
                                                    href="#collapseOne_16" aria-expanded="false"
                                                    aria-controls="collapseOne_16">
                                                    <i class="material-icons">next_week</i> CREAR
                                                    PRESTAMO
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne_16" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingOne_16">
                                            <div class="panel-body">

                                                <form id="form_create" method="POST"
                                                    action="{{ route('prestamos.store') }}" autocomplete="off">

                                                    @csrf

                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <label for="empleado_id">Empleado</label>
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <select name="empleado_id"
                                                                        class="form-control show-tick" data-live-search="true"
                                                                        onchange="findEmpleado(this.value);">
                                                                        <option value="">-- Escoja una opcion --
                                                                        </option>
                                                                        @foreach($empleados as $empleado)
                                                                        <option value="{{$empleado->id}}">
                                                                            {{$empleado->nombre_completo}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">

                                                            <a class="btn bg-pink waves-effect m-b-15" role="button"
                                                                data-toggle="collapse" href="#collapseDomicile"
                                                                aria-expanded="true" aria-controls="collapseDomicile">
                                                                INFORMACION
                                                            </a>

                                                            <div class="collapse in" id="collapseDomicile">
                                                                <div class="well">
                                                                    <label>Empleado: <span id="empleado_name">
                                                                            ----------</span></label><br>
                                                                    <label>Tipo: <span
                                                                            id="empleado_tipo">---------</span></label>
                                                                    <br>
                                                                    <label>Dependencia: <span
                                                                            id="empleado_dependencia">---------</span>
                                                                    </label> <br>
                                                                </div>
                                                            </div>


                                                        </div>


                                                    </div>



                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <label for="multimedia_id" class="col-green">Multimedias (Disponibles):</label>
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <select name="multimedia_id"
                                                                        class="form-control show-tick" data-live-search="true">
                                                                        <option value="">-- Escoja una opcion --
                                                                        </option>
                                                                        @foreach($multimedias as $multimedia)
                                                                        <option value="{{$multimedia->id}}">
                                                                            {{$multimedia->nombre_multimedia}} ({{$multimedia->serial}})
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="fecha_prestamo">Fecha Prestamo:</label>
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="date" class="form-control"  name="fecha_prestamo">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="hora_prestamo">Hora Prestamo:</label>
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="time" class="form-control"  name="hora_prestamo">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="descripcion">Descripcion:</label>
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <textarea class="form-control" name="observacion"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="fecha_devolucion">Fecha Devolucion:</label>
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="date" class="form-control"  name="fecha_devolucion">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="hora_devolucion">Hora Devolucion:</label>
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="time" class="form-control"  name="hora_devolucion">
                                                                </div>
                                                            </div>
                                                        </div>
                            
                        
                                                    </div>


                                                    <button type="button" id="btnsave" class="btn bg-teal waves-effect">
                                                        <i class="material-icons">save</i>
                                                        <span>GUARDAR</span>
                                                    </button>

                                                </form>


                                            </div>
                                        </div>
                                    </div>


                                </div>

                                {{-- Fin de Prestamo --}}

                                {{-- Inicio de Empleado --}}
                                <div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">

                                    <div class="panel panel-col-deep-purple">
                                        <div class="panel-heading" role="tab" id="headingOne_17">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion_17"
                                                    href="#collapseOne_17" aria-expanded="false"
                                                    aria-controls="collapseOne_17">
                                                    <i class="material-icons">how_to_reg</i> CREAR
                                                    EMPLEADO
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne_17" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingOne_17">
                                            <div class="panel-body">

                                                <form id="form_create_empleado" method="POST"
                                                    action="{{ route('empleados.store') }}" autocomplete="off">

                                                    @csrf

                                                    <div class="col-md-6">
                                                        <label for="tipo_id">Tipo Empleado</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <select name="tipo_id" class="form-control">
                                                                    <option value="">-- Escoja una opcion --</option>
                                                                    @foreach($tipos as $tipo)
                                                                    <option value="{{$tipo->id}}">{{$tipo->nombre_tipo}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="dependencia_id">Dependencia</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <select name="dependencia_id" class="form-control show-tick" data-live-search="true">
                                                                    <option value="">-- Escoja una opcion --</option>
                                                                    @foreach($dependencias as $dependencia)
                                                                    <option value="{{$dependencia->id}}">
                                                                        {{$dependencia->nombre_dependencia}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="nombres" class="col-red">Nombre Empleado:</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" name="nombres">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="apellidos">Apellido Empleado:</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input class="form-control" name="apellidos">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <button type="button" id="btnsaveempleado" class="btn bg-teal waves-effect">
                                                        <i class="material-icons">save</i>
                                                        <span>GUARDAR</span>
                                                    </button>

                                                </form>


                                            </div>
                                        </div>
                                    </div>


                                </div>

                                {{-- Fin de empleado --}}


                                {{-- Inicio de Dependencia --}}

                                <div class="panel-group" id="accordion_18" role="tablist" aria-multiselectable="true">

                                    <div class="panel panel-col-light-green">
                                        <div class="panel-heading" role="tab" id="headingOne_18">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion_18"
                                                    href="#collapseOne_18" aria-expanded="false"
                                                    aria-controls="collapseOne_18">
                                                    <i class="material-icons">business</i> CREAR
                                                    DEPENDENCIA
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne_18" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingOne_18">
                                            <div class="panel-body">

                                                <form id="form_create_dependencia" method="POST"
                                                    action="{{ route('dependencias.store') }}" autocomplete="off">

                                                    @csrf

                                                    <div class="col-md-6">
                                                        <label for="nombre_dependencia" class="col-red">Dependencia:</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" name="nombre_dependencia">
                                                            </div>
                                                        </div>
                                                    </div>
            
                                                    <div class="col-md-6">
                                                        <label for="descripcion">Descripcion:</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <textarea class="form-control"
                                                                    name="descripcion"></textarea>
                                                            </div>
                                                        </div>        
                                                    </div>
            
                                                    <button type="button" id="btnsavedependencia" class="btn bg-teal waves-effect">
                                                        <i class="material-icons">save</i>
                                                        <span>GUARDAR</span>
                                                    </button>

                                                </form>


                                            </div>
                                        </div>
                                    </div>


                                </div>


                                {{-- Fin de Dependencia --}}



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