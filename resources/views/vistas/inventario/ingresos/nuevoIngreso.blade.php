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
                        Nuevo Ingreso
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
                    <form method="POST" action="{{url('inventario/guardarIngreso')}}" autocomplete="off" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha*</label>
                                    <input required
                                           type="date"
                                           class="form-control"
                                           value="{{\Carbon\Carbon::now('America/La_Paz')->toDateString()}}"
                                           name="fecha">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Factura</label>
                                    <input
                                            type="file"
                                            accept="image/*"
                                            name="foto_factura"
                                            class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nro Factura</label>
                                    <input
                                           name="nro_factura"
                                           type="text"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Proveedor*</label>
                                    <select required  name="proveedor_id" class="form-control">
                                        @foreach($proveedores as $proveedor)
                                            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3>Productos</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Producto</label>
                                    <select class="form-control selectpicker" data-live-search="true" id="selectorProducto">
                                        @foreach($productos as $producto)
                                            <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Cantidad</label>
                                    <input class="form-control" placeholder="Cantidad" title="Cantidad" type="number" id="cantidad">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Costo U. (Bs)</label>
                                    <input class="form-control" placeholder="Costo U." title="Costo U. BS" step="0.01" type="number" id="costo">
                                </div>
                            </div>
                            <input name="total" hidden step="0.001" type="number" id="tt">
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label style="color: white">Agregar</label>
                                    <button id="btn_agregar" type="button" onclick="agregar()" class="btn btn-success btn-block">
                                        Agregar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered color-table info-table">
                                <thead>
                                <tr>
                                    <th class="text-right">OPC</th>
                                    <th class="text-center w-50">PRODUCTO</th>
                                    <th class="text-center">CANT</th>
                                    <th class="text-center">COSTO U. Bs</th>
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

                        <a href="{{url('inventario/listaIngresos')}}" class="btn btn-warning">Atrás</a>
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
                }
            );

            var cont = 0;
            var cantidad = 0;
            var costo = 0;
            var total = 0;
            var subtotal = [];

            function agregar() {
                cantidad = $('#cantidad').val();
                costo = $('#costo').val();
                if(cont>=0 && cantidad != null && cantidad > 0 && costo != null && costo > 0) {
                    subtotal[cont] = (cantidad * costo).toFixed(2);
                    total = parseFloat(total) + parseFloat(subtotal[cont]);
                    total = parseFloat(total).toFixed(2);

                    idProducto = $('#selectorProducto').val();
                    nombreProducto = $('#selectorProducto option:selected').text();
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
                        '   <input required hidden name="cantidadT[]" value="'+cantidad+'">'+
                        cantidad +
                        '</td>' +
                        '<td>' +
                        '   <input required hidden name="costoT[]" value="'+costo+'">'+
                        costo +
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
                $('#costo').val("");
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