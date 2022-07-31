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
                        Editar proveedor
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
                    <form method="POST" action="{{url('proveedores/'.$proveedor -> id)}}" autocomplete="off">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre*</label>
                                    <input required
                                           type="text"
                                           value="{{$proveedor->nombre}}"
                                           class="form-control"
                                           name="nombre">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>NIT</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            value="{{$proveedor->nit}}"
                                            name="nit">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input
                                           type="email"
                                           class="form-control"
                                           value="{{$proveedor->email}}"
                                           name="email">
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Dirección*</label>
                                    <input required
                                            type="text"
                                            class="form-control"
                                            value="{{$proveedor->direccion}}"
                                            name="direccion">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Teléfono*</label>
                                    <input required
                                            type="number"
                                            class="form-control"
                                            value="{{$proveedor->telefono}}"
                                            name="telefono">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Información</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            value="{{$proveedor->informacion}}"
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
                                           value="{{$proveedor->titular}}"
                                           name="titular">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Banco</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            value="{{$proveedor->banco}}"
                                            name="banco">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Sucursal</label>
                                    <select class="form-control" name="sucursal" id="">
                                        @foreach($sucursales as $sucursal)
                                            @if($sucursal == $proveedor->sucursal)
                                                <option selected value="{{$sucursal}}">{{$sucursal}}</option>
                                            @else
                                                <option value="{{$sucursal}}">{{$sucursal}}</option>
                                            @endif
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
                                            value="{{$proveedor->nro_cuenta}}"
                                            name="nro_cuenta">
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Moneda</label>
                                    <select class="form-control" name="moneda">
                                        @foreach($monedas as $moneda)
                                            @if($moneda == $proveedor->moneda)
                                                <option selected value="{{$moneda}}">{{$moneda}}</option>
                                            @else
                                                <option value="{{$moneda}}">{{$moneda}}</option>
                                            @endif
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
                                            + value="{{$proveedor->tipo_identificacion}}"
                                            name="tipo_identificacion">
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nro Indentificación</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            value="{{$proveedor->nro_identificacion}}"
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
