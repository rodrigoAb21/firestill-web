@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver proveedor
                        <div class="float-right">
                            <a class="btn btn-warning" href="{{url('proveedores/'.$proveedor->id.'/edit')}}">
                                Editar
                            </a>
                        </div>
                    </h3>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input readonly
                                           type="text"
                                           value="{{$proveedor->nombre}}"
                                           class="form-control"
                                           name="nombre">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>NIT</label>
                                    <input readonly
                                            type="text"
                                            class="form-control"
                                            value="{{$proveedor->nit}}"
                                            name="nit">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input  readonly
                                           type="email"
                                           class="form-control"
                                           value="{{$proveedor->email}}"
                                           name="email">
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input readonly
                                            type="text"
                                            class="form-control"
                                            value="{{$proveedor->direccion}}"
                                            name="direccion">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input readonly
                                            type="text"
                                            class="form-control"
                                            value="{{$proveedor->telefono}}"
                                            name="telefono">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Información</label>
                                    <input readonly
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
                                    <input  readonly
                                           type="text"
                                           class="form-control"
                                           value="{{$proveedor->titular}}"
                                           name="titular">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Banco</label>
                                    <input readonly
                                            type="text"
                                            class="form-control"
                                            value="{{$proveedor->banco}}"
                                            name="banco">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Sucursal</label>
                                    <input readonly
                                            type="text"
                                            class="form-control"
                                            value="{{$proveedor->sucursal}}"
                                            name="tipo_identificacion">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nro Cuenta</label>
                                    <input readonly
                                            type="text"
                                            class="form-control"
                                            value="{{$proveedor->nro_cuenta}}"
                                            name="nro_cuenta">
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Moneda</label>
                                    <input readonly
                                            type="text"
                                            class="form-control"
                                            value="{{$proveedor->moneda}}"
                                            name="tipo_identificacion">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Tipo Identificación</label>
                                    <input readonly
                                            type="text"
                                            class="form-control"
                                            value="{{$proveedor->tipo_identificacion}}"
                                            name="tipo_identificacion">
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nro Indentificación</label>
                                    <input readonly
                                            type="text"
                                            class="form-control"
                                            value="{{$proveedor->nro_identificacion}}"
                                            name="nro_identificacion">
                                </div>
                            </div>



                        </div>
                        <a href="{{url('proveedores')}}" class="btn btn-warning">Atrás</a>
                </div>
            </div>
        </div>
    </div>
@endsection
