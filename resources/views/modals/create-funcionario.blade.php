<div class="modal fade" id="crearFuncionario" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="text-center font-bold col-teal">REGISTRO DE FUNCIONARIO</h2>
                            </div>
                            <div class="body">

                                <form id="form_create" method="POST" action="{{ route('funcionarios.store') }}"
                                    autocomplete="off">

                                    @csrf

                                        <div class="col-md-12">
                                            <label for="id_dependencia" class="col-red">Dependencia</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="id_dependencia" name="id_dependencia" class="form-control">
                                                    @foreach($funcionarios as $funcionario)
                                                    <option value="{{ $funcioanario->id }}">{{ $funcionario->$dependencia->nombre_dependencia}} </option>
                                                    @endforeach
                                                    </select>  
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label for="nombre_funcionario" class="col-red">Nombre Funcionario:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="nombre_funcionario">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="apellido_funcionario">Apellido Funcionario:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" name="apellido_funcionario"></input>
                                                </div>
                                            </div>        
                                        </div>

                                        <div class="col-md-12">
                                            <label for="cargo_funcionario">Cargo Funcionario:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" name="cargo_funcionario"></input>
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

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>