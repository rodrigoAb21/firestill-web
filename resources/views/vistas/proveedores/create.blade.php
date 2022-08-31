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
                        Nuevo proveedor
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

                    <form method="POST" action="{{url('proveedores')}}" autocomplete="off">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre*</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           value="{{ old('nombre') }}"
                                           name="nombre">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>NIT</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            value="{{ old('nit') }}"
                                            name="nit">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input
                                           type="email"
                                           class="form-control"
                                           value="{{ old('email') }}"
                                           name="email">
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Dirección*</label>
                                    <input required
                                            type="text"
                                            class="form-control"
                                            value="{{ old('direccion') }}"
                                            name="direccion">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Teléfono*</label>
                                    <input  required
                                            type="number"
                                            class="form-control"
                                            value="{{ old('telefono') }}"
                                            name="telefono">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Información</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            value="{{ old('informacion') }}"
                                            name="informacion">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h4>Datos Bancarios</h4>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Titular</label>
                                    <input
                                           type="text"
                                           class="form-control"
                                           value="{{ old('titular') }}"
                                           name="titular">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Banco</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            value="{{ old('banco') }}"
                                            name="banco">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Sucursal</label>
                                    <select class="form-control" name="sucursal">
                                        @foreach($sucursales as $sucursal)
                                            <option value="{{$sucursal}}">{{$sucursal}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nro Cuenta</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            value="{{ old('nro_cuenta') }}"
                                            name="nro_cuenta">
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Moneda</label>
                                    <select class="form-control" name="moneda">
                                      @foreach($monedas as $moneda)
                                            <option value="{{$moneda}}">{{$moneda}}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Tipo Identificación</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            value="{{ old('tipo_identificacion') }}"
                                            name="tipo_identificacion">
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nro Indentificación</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            value="{{ old('nro_identificacion') }}"
                                            name="nro_identificacion">
                                </div>
                            </div>



                        </div>
                        <a href="{{url('proveedores')}}" class="btn btn-warning">Atrás</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
