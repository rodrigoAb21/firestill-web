@extends('layouts.index')
@section('contenido')

    <!--
	*************************************************************************
	 * Nombre........: create
	 * Tipo..........: Vista
	 * Descripcion...:
	 * Fecha.........: 07-FEB-2021
	 * Autor.........: Rodrigo Abasto Berbetty
	 *************************************************************************
	-->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Nueva asignación
                    </h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{url('herramientas/guardarAsignacion')}}" autocomplete="off">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha*</label>
                                    <input required
                                           type="date"
                                           class="form-control"
                                           value="{{date('Y-m-d')}}"
                                           name="fecha">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Responsable*</label>
                                    <select name="trabajador_id" class="form-control">
                                        @foreach($trabajadores as $trabajador)
                                            <option value="{{$trabajador->id}}">{{$trabajador->nombre}} {{$trabajador->apellido}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3>Herramientas</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <select class="form-control selectpicker" data-live-search="true" id="selectorHerramienta">
                                        @foreach($herramientas as $herramienta)
                                            <option value="{{$herramienta->id}}_{{$herramienta->nombre}}_{{$herramienta->cantidad_taller}}">{{$herramienta->nombre}} - Disp: {{$herramienta->cantidad_taller}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Cantidad" title="Cantidad" type="number" id="cantidad">
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <button id="btn_agregar" type="button" onclick="agregar()"  class="btn btn-success btn-sm btn-block">
                                        <span class="fa fa-plus fa-2x"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered color-table info-table">
                                <thead>
                                <tr>
                                    <th class="text-right">OPC</th>
                                    <th class="text-center w-50">HERRAMIENTA</th>
                                    <th class="text-center">CANTIDAD</th>
                                </tr>
                                </thead>
                                <tbody id="detalle">
                                </tbody>
                            </table>

                        </div>

                        <a href="{{url('herramientas/listaAsignaciones')}}" class="btn btn-warning">Atrás</a>
                        <button type="submit" id="guardar" class="btn btn-info">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('arriba')
        <link rel="stylesheet" href="{{asset('plantilla/assets/plugins/select/bootstrap-select.min.css')}}">
    @endpush
    @push('scripts')
        <script>
            $(document).ready(
                function () {
                    evaluar();
                    cargarDatos();
                }
            );

            var cont = 0;
            var datosHerramienta;
            var agregados = [];

            function evaluar(){
                if (cont > 0) {
                    $("#guardar").show();
                }else{
                    $("#guardar").hide();
                }
            }

            function cargarDatos(){
                datosHerramienta = document.getElementById('selectorHerramienta').value.split('_');
            }

            $('#selectorHerramienta').change(cargarDatos);

            function agregar() {
                cantidad = $('#cantidad').val();
                nombreInsumo = datosHerramienta[1];
                idHerramientaT = datosHerramienta[0];
                if(!agregados.includes(idHerramientaT) && cont >= 0 && cantidad != null && cantidad > 0 && cantidad <= parseFloat(datosHerramienta[2])) {
                    agregados.push(idHerramientaT);
                    var fila =
                        '<tr id="fila' + cont + '">' +
                        '<td>' +
                        '<button type="button" class="btn btn-danger btn-sm" onclick="quitar(' + cont + ',' + idHerramientaT + ');">' +
                        '<i class="fa fa-times" aria-hidden="true"></i>' +
                        '</button>' +
                        '</td>' +
                        '<td>' +
                        '   <input type="hidden" name="idHerramientaT[]" value="'+idHerramientaT+'">'+nombreInsumo+
                        '</td>' +
                        '<td>' +
                        '   <input name="cantidadT[]" type="hidden" value="'+cantidad+'">'+cantidad+
                        '</td>' +
                        '</tr>';
                    cont++;
                    $("#detalle").append(fila); // sirve para anhadir una fila a los detalles

                }
                $('#cantidad').val("");
                evaluar();
            }

            function quitar(index, id){
                let i = agregados.indexOf(String(id));
                if (i > -1) {
                    agregados.splice(i, 1);
                }
                cont--;
                $("#fila" + index).remove();
                evaluar();
            }



        </script>
        <script src="{{asset('plantilla/assets/plugins/select/bootstrap-select.min.js')}}"></script>
    @endpush
@endsection
