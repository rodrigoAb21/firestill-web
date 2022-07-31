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
                        Baja de la herramienta: {{$herramienta->nombre}}
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
                    <form method="POST" action="{{url('herramientas/darBaja')}}" autocomplete="off">
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
                            <input type="hidden" name="herramienta_id" value="{{$herramienta->id}}">
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
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Motivo*</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           name="motivo">
                                </div>
                            </div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Cantidad*</label>
                                    <input required
                                           type="number"
                                           class="form-control"
                                           min="1"
                                           max="{{$herramienta->cantidad_taller}}"
                                           name="cantidad">
                                </div>
                            </div>

                        </div>
                        <a href="{{url('herramientas')}}" class="btn btn-warning">Atrás</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
