@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver Asignación - COD: {{$asignacion->id}}
                    </h3>
                    <div class="row">

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Fecha de asignacion</label>
                                <input readonly
                                       type="date"
                                       class="form-control"
                                       value="{{$asignacion->fecha}}"
                                       name="fecha">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Responsable</label>
                                <input readonly
                                       value="{{$asignacion->trabajador->nombre}} {{$asignacion->trabajador->apellido}}"
                                       type="text"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Fecha de asignacion</label>
                                <input readonly
                                       type="date"
                                       class="form-control"
                                       value="{{$asignacion->reingreso->fecha}}"
                                       name="fecha">
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">HERRAMIENTA</th>
                                <th class="text-center">CANT. ASIGNADA</th>
                                <th class="text-center">CANT. REINGRESADA</th>
                                <th class="text-center">MOTIVO</th>
                            </tr>
                            </thead>
                            <tbody id="detalle">
                            @foreach($asignacion->detalles as $detalle)
                                <tr class="text-center">
                                    <td>{{$detalle->herramienta->nombre}}</td>
                                    <td>{{$detalle->cantidad}}</td>
                                    <td>{{$detalle->cantidad_reingreso}}</td>
                                    <td>{{$detalle->motivo}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>

                    <a href="{{url('herramientas/listaAsignaciones')}}" class="btn btn-warning">Atrás</a>

                </div>
            </div>
        </div>
    </div>
@endsection
