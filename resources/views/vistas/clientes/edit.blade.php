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
                        Editar cliente
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
                    <form method="POST" action="{{url('clientes/'.$cliente -> id)}}" autocomplete="off">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                    <h4>Datos Empresa</h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre*</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           value="{{$cliente -> nombre_empresa}}"
                                           name="nombre_empresa">
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>NIT/CI</label>
                                    <input
                                           type="text"
                                           class="form-control"
                                           value="{{$cliente -> nit}}"
                                           name="nit">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input
                                            type="number"
                                            max="79999999"
                                           value="{{$cliente -> telefono_empresa}}"
                                           class="form-control"
                                           name="telefono_empresa">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input
                                           type="email"
                                           class="form-control"
                                           value="{{$cliente -> email}}"
                                           name="email">
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input
                                           type="text"
                                           maxlength="255"
                                           class="form-control"
                                           value="{{$cliente -> direccion}}"
                                           name="direccion">
                                </div>
                            </div>

                        </div>

                    <hr>
                    <h4>Datos Encargado</h4>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input
                                       type="text"
                                       class="form-control"
                                       value="{{$cliente -> nombre_encargado}}"
                                       name="nombre_encargado">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        value="{{$cliente -> email_encargado}}"
                                        name="email_encargado">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Cargo</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        value="{{$cliente -> cargo_encargado}}"
                                        name="cargo_encargado">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input
                                        type="number"
                                        class="form-control"
                                        value="{{$cliente -> telefono_encargado}}"
                                        name="telefono_encargado">
                            </div>
                        </div>
                    </div>
                        <a href="{{url('clientes')}}" class="btn btn-warning">Atrás</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
