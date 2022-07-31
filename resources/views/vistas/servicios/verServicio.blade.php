@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver Servicio: {{$venta->id}}
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
<h3>Servicios</h3>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">NRO</th>
                                <th class="text-center w-50">SERVICIO</th>
                                <th class="text-center">PRECIO Bs</th>
                            </tr>
                            </thead>
                            <tbody id="detalle">
                            <div hidden>{{$totalS = 0}}</div>
                            @foreach($venta->servicios as $servicio)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$servicio->nombre}}</td>
                                    <td>{{$servicio->precio}}</td>
                                </tr>
                                <div hidden>{{$totalS = $totalS + $servicio->precio}}</div>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="text-center">
                                <td></td>
                                <td class="text-right"><b>TOTAL SERVICIO</b></td>
                                <td><span id="total">{{$totalS}}</span> Bs</td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>

                    @if(count($venta->detalles) > 0)

                        <h3>Venta</h3>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered color-table info-table">
                                <thead>
                                <tr>
                                    <th class="text-center w-50">PRODUCTO</th>
                                    <th class="text-center">PRECIO U. Bs</th>
                                    <th class="text-center">CANT</th>
                                    <th class="text-center">SUBTOTAL Bs</th>
                                </tr>
                                </thead>
                                <tbody id="detalle">
                                <div hidden>{{$totalV = 0}}</div>
                                @foreach($venta->detalles as $detalle)
                                    <tr class="text-center">
                                        <td>{{$detalle->producto->nombre}}</td>
                                        <td>{{$detalle->precio}}</td>
                                        <td>{{$detalle->cantidad}}</td>
                                        <td>{{$detalle->precio * $detalle->cantidad}}</td>
                                        <div hidden>{{$totalV = $totalV + ($detalle->precio * $detalle->cantidad)}}</div>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr class="text-center">
                                    <td></td>
                                    <td></td>
                                    <td class="text-right"><b>TOTAL VENTA</b></td>
                                    <td><span id="total">{{$totalV}}</span> Bs</td>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="text-center">
                                    <h2>TOTAL: {{$venta->total}} Bs</h2>
                                </div>
                            </div>
                        </div>
                    @endif

                    <a href="{{url('ventas/servicios')}}" class="btn btn-warning">Atrás</a>
                </div>
            </div>
        </div>
    </div>
@endsection