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
                    <h3 class="pb-2">Nuevo Equipo</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{url('imonitoreo/guardarEquipo')}}" autocomplete="off" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <input type="hidden" value="{{$sucursal_id}}" name="sucursal_id">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nro Serie*</label>
                                    <input required
                                           type="number"
                                           class="form-control"
                                           name="nro_serie">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Año de fabricación*</label>
                                    <input required
                                           type="number"
                                           class="form-control"
                                           name="ano_fabricacion">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Tipo*</label>
                                    <select required name="tipo_clasificacion_id" class="form-control">
                                        @foreach($tipos as $tipo)
                                            <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Marca*</label>
                                    <select required name="marca_clasificacion_id" class="form-control">
                                        @foreach($marcas as $marca)
                                            <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Capacidad*</label>
                                    <input required
                                           type="number"
                                           step="0.01"
                                           class="form-control"
                                           name="capacidad">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>U.Medida*</label>
                                    <select required name="unidad_medida" class="form-control">
                                        @foreach($unidades as $unidad)
                                            <option value="{{$unidad}}">{{$unidad}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea

                                            name="descripcion"
                                            cols="30"
                                            class="form-control"
                                            rows="3"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Ubicación</label>
                                    <textarea

                                            name="ubicacion"
                                            cols="30"
                                            class="form-control"
                                            rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('imonitoreo/editarSucursal/'.$sucursal_id)}}" class="btn btn-warning">Atrás</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
