<div class="modal fade" id="crearMultimedia" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="text-center font-bold col-teal">REGISTRO DE MULTIMEDIA</h2>
                            </div>
                            <div class="body">

                                <form id="form_create" method="POST" action="{{ route('multimedias.store') }}"
                                    autocomplete="off">

                                    @csrf

                                    <div class="col-md-4">
                                        <label for="nombre_multimedia">Nombre Multimedia:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="nombre_multimedia">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="tipo">Tipo:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input class="form-control" name="tipo">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="serial" class="col-red">Serial:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input class="form-control" name="serial">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="inventario_id">Inventario:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name="inventario_id"  class="form-control">
                                                 <option value="">-- Escoja una opcion --</option>   
                                                 @foreach($inventarios as $inventario)
                                                 <option value="{{$inventario->id}}">{{$inventario->descripcion}} - (Cantidad: {{$inventario->stock}})</option>
                                                 @endforeach
                                                </select>  
                                            </div>
                                        </div>
                                    </div>


                                    <button type="button" id="btnsave" class="btn bg-teal waves-effect">
                                        <i class="material-icons">save</i>
                                        <span>GUARDAR</span>
                                    </button>

                                </form>

                                <hr>

                                <div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">

                                    <div class="panel panel-col-deep-purple">
                                        <div class="panel-heading" role="tab" id="headingOne_17">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion_17"
                                                    href="#collapseOne_17" aria-expanded="false"
                                                    aria-controls="collapseOne_17">
                                                    <i class="material-icons">shopping_basket</i> CREAR
                                                    INVENTARIO
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne_17" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingOne_17">
                                            <div class="panel-body">

                                                <form id="form_create_inventory" method="POST"
                                                    action="{{ route('inventarios.store') }}" autocomplete="off">

                                                    @csrf

                                                    <div class="col-md-6">
                                                        <label for="descripcion">¿Nombre del
                                                            Inventario?:</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control"
                                                                    name="descripcion">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <label for="stock" class="col-red">Cantidad
                                                            disponible:</label>
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="number" class="form-control" name="stock">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <button type="button" id="btnsaveinventory"
                                                        class="btn bg-purple waves-effect">
                                                        <i class="material-icons">save</i>
                                                        <span>GENERAR INVENTARIO</span>
                                                    </button>

                                                </form>


                                            </div>
                                        </div>
                                    </div>


                                </div>

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