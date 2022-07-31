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
                        Reingreso de herramientas
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
                    <form method="POST" action="{{url('herramientas/guardarReingreso/'.$asignacion->id)}}" autocomplete="off">
                        {{csrf_field()}}

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha</label>
                                    <input required
                                           type="date"
                                           class="form-control"
                                           value="{{$asignacion->fecha}}"
                                           name="fecha">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Responsable</label>
                                    <input class="form-control" type="text" readonly value="{{$asignacion->trabajador->nombre}} {{$asignacion->trabajador->apellido}}">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered color-table info-table">
                                <thead>
                                <tr>
                                    <th class="text-center w-50">HERRAMIENTA</th>
                                    <th class="text-center">ASIGNADA</th>
                                    <th class="text-center">DEVUELTA</th>
                                    <th class="text-center w-50">MOTIVO BAJA</th>
                                </tr>
                                </thead>
                                <tbody id="detalle">
                                @foreach($asignacion->detalles as $detalle)
                                    <tr class="text-center">
                                        <td>
                                            {{$detalle->herramienta->nombre}}
                                            <input required name="idHerramientaT[]" type="hidden" value="{{$detalle->herramienta_id}}">
                                        </td>
                                        <td>
                                            {{$detalle->cantidad}}
                                            <input required name="cantidadAT[]" type="hidden" value="{{$detalle->cantidad}}">
                                        </td>
                                        <td>
                                            <input class="form-control" name="cantidadRT[]" type="number" value="{{$detalle->cantidad}}" max="{{$detalle->cantidad}}" required>
                                        </td>
                                        <td>
                                            <input class="form-control" name="motivoT[]" type="text">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                        <a href="{{url('herramientas/listaAsignaciones')}}" class="btn btn-warning">Atrás</a>
                        <button class="btn btn-info" type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
