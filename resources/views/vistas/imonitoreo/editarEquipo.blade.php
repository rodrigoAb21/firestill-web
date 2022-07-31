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
                        Editar Equipo
                    </h3>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>
                    @endif

                    <form method="POST" action="{{url('imonitoreo/actualizarEquipo/'.$equipo->id)}}" autocomplete="off">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nro Serie*</label>
                                    <input required
                                           type="number"
                                           class="form-control"
                                           value="{{$equipo->nro_serie}}"
                                           name="nro_serie">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Año de fabricación*</label>
                                    <input required
                                           type="number"
                                           class="form-control"
                                           value="{{$equipo->ano_fabricacion}}"
                                           name="ano_fabricacion">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Tipo*</label>
                                    <select required name="tipo_clasificacion_id" class="form-control">
                                        @foreach($tipos as $tipo)
                                            @if($tipo->id == $equipo->tipo_clasificacion_id)
                                                <option selected value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                            @else
                                                <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Marca*</label>
                                    <select required name="marca_clasificacion_id" class="form-control">
                                        @foreach($marcas as $marca)
                                            @if($marca->id == $equipo->marca_clasificacion_id)
                                                <option selected value="{{$marca->id}}">{{$marca->nombre}}</option>
                                            @else
                                                <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                                            @endif
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
                                           value="{{$equipo->capacidad}}"
                                           name="capacidad">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>U.Medida*</label>
                                    <select required name="unidad_medida" class="form-control">
                                        @foreach($unidades as $unidad)
                                            @if($unidad == $equipo->unidad_medida)
                                                <option selected value="{{$unidad}}">{{$unidad}}</option>
                                            @else
                                                <option value="{{$unidad}}">{{$unidad}}</option>
                                            @endif
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
                                              rows="3">{{$equipo->descripcion}}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Ubicacion</label>
                                    <textarea
                                              name="ubicacion"
                                              cols="30"
                                              class="form-control"
                                              rows="3">{{$equipo->ubicacion}}</textarea>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('imonitoreo/editarSucursal/'.$equipo->sucursal_id)}}" class="btn btn-warning">Atrás</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
