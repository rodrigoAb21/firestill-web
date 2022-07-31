@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver Venta: {{$venta->id}}
                    </h3>

                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Fecha</label>
                                <input readonly
                                       type="date"
                                       class="form-control"
                                       value="{{$venta->fecha}}"
                                       name="fecha">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Cliente</label>
                                <input readonly
                                       type="text"
                                       value="{{$venta->cliente->nombre_empresa}}"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Trabajador</label>
                                <input readonly
                                       type="text"
                                       value="{{$venta->trabajador->nombre}} {{$venta->trabajador->apellido}}"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Total Bs</label>
                                <input readonly
                                       value="{{$venta->total}}"
                                       type="text"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center w-50">PRODUCTO</th>
                                <th class="text-center">PRECIO U. Bs</th>
                                <th class="text-center">CANT</th>
                                <th class="text-center">SUBTOTAL</th>
                            </tr>
                            </thead>
                            <tbody id="detalle">
                            @foreach($venta->detalles as $detalle)
                                <tr class="text-center">
                                    <td>{{$detalle->producto->nombre}}</td>
                                    <td>{{$detalle->precio}}</td>
                                    <td>{{$detalle->cantidad}}</td>
                                    <td>{{$detalle->precio * $detalle->cantidad}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="text-center">
                                <td></td>
                                <td></td>
                                <td><b>TOTAL</b></td>
                                <td><span id="total">{{$venta->total}}</span> Bs</td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>

                    <a href="{{url('ventas/ventas')}}" class="btn btn-warning">Atrás</a>
                </div>
            </div>
        </div>
    </div>
@endsection