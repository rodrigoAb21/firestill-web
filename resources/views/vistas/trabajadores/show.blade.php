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
                        Ver trabajador
                        <div class="float-right">
                            <a class="btn btn-warning" href="{{url('trabajadores/'.$trabajador->id.'/edit')}}">
                                Editar
                            </a>
                        </div>
                    </h3>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input readonly
                                           type="text"
                                           class="form-control"
                                           value="{{$trabajador->nombre}}"
                                           name="nombre">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input readonly
                                            type="text"
                                           class="form-control"
                                            value="{{$trabajador->apellido}}"
                                           name="apellido">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input readonly
                                            type="text"
                                            class="form-control"
                                            value="{{$trabajador->direccion}}"
                                            name="direccion">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Carnet</label>
                                    <input  readonly
                                           type="text"
                                           class="form-control"
                                           value="{{$trabajador->carnet}}"
                                           name="carnet">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input readonly
                                           type="text"
                                           class="form-control"
                                           value="{{$trabajador->telefono}}"
                                           name="telefono">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input readonly
                                           type="text"
                                           class="form-control"
                                           value="{{$trabajador->email}}"
                                           name="email">
                                </div>
                            </div>
                        </div>
                        <a href="{{url('trabajadores')}}" class="btn btn-warning">Atrás</a>
                </div>
            </div>
        </div>
    </div>
@endsection
