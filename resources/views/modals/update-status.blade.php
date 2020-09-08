<div class="modal fade" id="updateMultimedia" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="text-center font-bold col-teal">DAR DE BAJA</h2>
                            </div>
                            <div class="body">

                                <form method="POST" action="{{ route('multimedias.change') }}"
                                    autocomplete="off">

                                    @csrf
                                    
                                    <input type="hidden" name="id_multi" id="id_multi">
                                    <input type="hidden" name="estado" id="estado">

                                    <div class="col-md-12">
                                        <label for="observacion">Motivo De la Baja:</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="observacion" id="observacion" cols="30" rows="4" class="form-control" required></input> 
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit"  class="btn bg-teal waves-effect">
                                        <i class="material-icons">save</i>
                                        <span>DAR DE BAJA</span>
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