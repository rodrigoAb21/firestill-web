@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver Ingreso - COD: {{$ingreso->id}}
                    </h3>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha</label>
                                    <input readonly
                                           type="date"
                                           class="form-control"
                                           value="{{$ingreso->fecha}}"
                                           name="fecha">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nro Factura</label>
                                    <input readonly
                                           type="text"
                                           value="{{$ingreso->nro_factura}}"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Tienda</label>
                                    <input readonly
                                           value="{{$ingreso->tienda}}"
                                           type="text"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <img src="{{asset('img/ingresoHerramienta/'.$ingreso->foto_factura)}}" class="img-thumbnail" height="200px" width="200px" alt="">
                                </div>
                            </div>
                        </div>




                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center w-50">HERRAMIENTA</th>
                                <th class="text-center">CANT</th>
                                <th class="text-center">COSTO U. Bs</th>
                                <th class="text-center">SUBTOTAL</th>
                            </tr>
                            </thead>
                            <tbody id="detalle">
                            @foreach($ingreso->detalles as $detalle)
                                <tr class="text-center">
                                    <td>{{$detalle->herramienta->nombre}}</td>
                                    <td>{{$detalle->cantidad}}</td>
                                    <td>{{$detalle->costo}}</td>
                                    <td>{{$detalle->costo * $detalle->cantidad}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="text-center">
                                <td></td>
                                <td></td>
                                <td><b>TOTAL</b></td>
                                <td><span id="total">{{$ingreso->total}}</span> Bs</td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>

                    <a href="{{url('herramientas/listaIngresos')}}" class="btn btn-warning">Atrás</a>

                </div>
            </div>
        </div>
    </div>
@endsection