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
                        Nuevo trabajador
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

                    <form method="POST" action="{{url('trabajadores')}}" autocomplete="off">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre*</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           name="nombre">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Apellido*</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           name="apellido">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="direccion">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Tipo*</label>
                                    <select required name="tipo" class="form-control">
                                        @foreach($tipos as $tipo)
                                            <option value="{{$tipo}}">{{$tipo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Carnet*</label>
                                    <input required
                                           maxlength="10"
                                           type="text"
                                           class="form-control"
                                           name="carnet">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input max="79999999"
                                           type="number"
                                           class="form-control"
                                           name="telefono">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Email*</label>
                                    <input required
                                           type="email"
                                           class="form-control"
                                           name="email">
                                </div>
                            </div>
                        </div>
                        <a href="{{url('trabajadores')}}" class="btn btn-warning">Atrás</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
