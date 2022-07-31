@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver contrato: {{$contrato->id}}
                    </h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Cliente</label>
                                    <input readonly
                                           value="{{$contrato->cliente->nombre_empresa}}"
                                           class="form-control"
                                           name="fecha_inicio">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Representante Firestill</label>
                                    <input readonly
                                           value="{{$contrato->trabajador->nombre}}"
                                           class="form-control"
                                           name="fecha_inicio">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha inicio</label>
                                    <input readonly
                                           type="date"
                                           value="{{$contrato->fecha_inicio}}"
                                           class="form-control"
                                           name="fecha_inicio">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha fin</label>
                                    <input readonly
                                           type="date"
                                           value="{{$contrato->fecha_fin}}"
                                           class="form-control"
                                           name="fecha_fin">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Periodo (Mes)</label>
                                    <input readonly
                                           type="number"
                                           value="{{$contrato->periodo}}"
                                           class="form-control"
                                           name="periodo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Documento</label><br>
                                    <a class="btn btn-secondary btn-block" target="_blank" href="{{asset('contrato/'.$contrato->documento)}}">Ver</a>
                                </div>
                            </div>

                        </div>
                        <a href="{{url('imonitoreo/listaContratos/')}}" class="btn btn-warning">Atrás</a>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Sucursales
                    </h3>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered color-table info-table">
                                <thead>
                                <tr>
                                    <th class="text-center">COD</th>
                                    <th class="text-center">NOMBRE</th>
                                    <th class="text-center">DIRECCION</th>
                                    <th class="text-center">OPC</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contrato->sucursales as $sucursal)
                                    <tr class="text-center">
                                        <td>{{$sucursal->id}}</td>
                                        <td>{{$sucursal->nombre}}</td>
                                        <td>{{$sucursal->direccion}}</td>
                                        <td>
                                            <a href="{{url('imonitoreo/verSucursal/'.$sucursal->id)}}">
                                                <button class="btn btn-secondary">
                                                    Ver
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection

