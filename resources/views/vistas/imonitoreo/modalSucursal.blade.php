<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Nueva Sucursal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form  id="modalEliminarForm" method="POST" action="{{url('imonitoreo/guardarSucursal')}}">
                            {{csrf_field()}}

                                <div class="form-group">
                                    <label>Nombre*</label>
                                    <input required class="form-control" name="nombre" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Ubicación*</label>
                                    <input required class="form-control" name="direccion" type="text">
                                </div>
                            <input required type="hidden" value="{{$contrato->id}}" name="contrato_id">
                            <div class="float-right">
                                <button type="submit" class="btn btn-info">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>