<div class="modal fade" id="addStock" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="text-center font-bold col-teal">AMPLIAR STOCK</h2>
                            </div>
                            <div class="body">

                                <form id="form_add_stock" method="POST" action="{{ route('inventarios.stock') }}"
                                    autocomplete="off">

                                    @csrf

                                    <div class="col-md-6">
                                        <label for="inventario_id">Inventario:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name="inventario_id"  class="form-control">
                                                 <option value="">-- Escoja una opcion --</option>   
                                                 @foreach($inventarios as $inventario)
                                                 <option value="{{$inventario->id}}">{{$inventario->descripcion}} - (Cantidad Actual: {{$inventario->stock}})</option>
                                                 @endforeach
                                                </select>  
                                            </div>
                                        </div>
                                    </div>


                                        <div class="col-md-6">
                                            <label for="stock">Cantidad A Sumar:</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="number" class="form-control" name="stock" placeholder="EJ: +1 espacio">
                                                </div>
                                            </div>        
                                        </div>


                                    <button type="button" id="btnsavestock" class="btn bg-teal waves-effect">
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