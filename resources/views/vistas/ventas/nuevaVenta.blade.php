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
                        NUEVA VENTA
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
                    <form method="POST" action="{{url('ventas/guardarVenta')}}" autocomplete="off">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha*</label>
                                    <input required
                                           type="date"
                                           class="form-control"
                                           value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}"
                                           name="fecha">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Cliente*</label>
                                    <select required name="cliente_id" class="form-control">
                                        @foreach($clientes as $cliente)
                                            <option value="{{$cliente->id}}">{{$cliente->nombre_empresa}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Trabajador*</label>
                                    <select required name="trabajador_id" class="form-control">
                                        @foreach($trabajadores as $trabajador)
                                            <option value="{{$trabajador->id}}">{{$trabajador->nombre}} {{$trabajador->apellido}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input name="total" hidden step="0.01" type="number" id="tt">
                        </div>
                        <hr>
                        <h4>Productos</h4>
                        <br>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Producto</label>
                                    <select class="form-control selectpicker" data-live-search="true" id="selectorProducto" >
                                        @foreach($productos as $producto)
                                            <option value="{{$producto->id}}_{{$producto->precio}}_{{$producto->cantidad}}_{{$producto->nombre}}">{{$producto->nombre}} - Total:{{$producto->cantidad}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Precio U. (Bs)</label>
                                    <input class="form-control" title="Precio U. Bs" placeholder="Precio" min="0" type="number" step="0.01" id="precio">
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Cantidad</label>
                                    <input class="form-control" title="Cantidad" placeholder="Cantidad" min="0" type="number" id="cantidad">
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group pt-2">
                                    <br>
                                    <button id="btn_agregar" type="button" onclick="agregar()"  class="btn btn-success btn-block">
                                        Agregar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered color-table info-table">
                                <thead>
                                <tr>
                                    <th class="text-center">OPC</th>
                                    <th class="text-center w-50">PRODUCTO</th>
                                    <th class="text-center">PRECIO BS</th>
                                    <th class="text-center">CANTIDAD</th>
                                    <th class="text-center">SUBTOTAL</th>
                                </tr>
                                </thead>
                                <tbody id="detalle">
                                </tbody>
                                <tfoot>
                                <tr class="text-center">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><b>TOTAL</b></td>
                                    <td><span id="total">0</span> Bs</td>
                                </tr>
                                </tfoot>
                            </table>

                        </div>

                        <a href="{{url('ventas/ventas')}}" class="btn btn-warning">Atrás</a>
                        <button type="submit" id="guardar" class="btn btn-info">Guardar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('arriba')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    @endpush
    @push('scripts')
        <script>
            $(document).ready(
                function () {
                    evaluar();
                    mostrarPrecio();
                }
            );

            var cont = 0;
            var cantidad = 0;
            var precio = 0;
            var total = 0;
            var subtotal = [];
            var max;

            var datosProducto;

            function mostrarPrecio(){
                datosProducto = document.getElementById('selectorProducto').value.split('_');
                $('#precio').val(datosProducto[1]);
            }

            $('#selectorProducto').change(mostrarPrecio);

            function agregar() {
                cantidad = parseInt($('#cantidad').val());
                precio = parseFloat($('#precio').val()).toFixed(2);

                if(cont>=0 && cantidad != null && cantidad > 0 && cantidad <= parseFloat(datosProducto[2]) && precio != null && precio > 0) {
                    subtotal[cont] = (cantidad * precio).toFixed(2);
                    total = parseFloat(total) + parseFloat(subtotal[cont]);
                    total = parseFloat(total).toFixed(2);

                    idProducto = datosProducto[0];
                    nombreProducto = datosProducto[3];
                    var fila =
                        '<tr  class="text-center" id="fila' + cont + '">' +
                        '<td>' +
                        '<button type="button" class="btn btn-danger btn-sm" onclick="quitar(' + cont + ');">' +
                        '<i class="fa fa-times" aria-hidden="true"></i>' +
                        '</button>' +
                        '</td>' +
                        '<td>' +
                        '   <input required name="idProductoT[]" hidden value="'+idProducto+'">'+
                        nombreProducto +
                        '</td>' +

                        '<td>' +
                        '   <input required hidden name="precioT[]" value="'+precio+'">'+
                        precio +
                        '</td>' +
                        '<td>' +
                        '   <input required hidden name="cantidadT[]" value="'+cantidad+'">'+
                        cantidad +
                        '</td>' +
                        '<td>' +
                        subtotal[cont] +
                        '</td>' +
                        '</tr>';
                    cont++;
                    $("#detalle").append(fila); // sirve para anhadir una fila a los detalles
                    $("#total").html(total);

                }
                $('#cantidad').val("");
                $('#precio').val("");
                mostrarPrecio();
                $('#tt').val(total);
                evaluar();
            }

            function quitar(index){
                total = total - subtotal[index];
                $("#total").html(total);
                $('#tt').val(total);
                cont--;
                $("#fila" + index).remove();
                evaluar()
            }



            function evaluar(){
                if (cont > 0) {
                    $("#guardar").show();
                }else{
                    $("#guardar").hide();
                }
            }


        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    @endpush
@endsection