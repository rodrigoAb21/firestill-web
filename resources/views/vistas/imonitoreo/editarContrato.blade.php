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
                        Editar contrato: {{$contrato->id}}
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

                    @if(session()->has('message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form method="POST" action="{{url('imonitoreo/actualizarContrato/'.$contrato -> id)}}" autocomplete="off" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Cliente*</label>
                                    <select required name="cliente_id" class="form-control">
                                        @foreach($clientes as $cliente)
                                            @if($cliente->id == $contrato->cliente_id)
                                                <option selected value="{{$cliente->id}}">{{$cliente->nombre_empresa}}</option>
                                            @else
                                                <option value="{{$cliente->id}}">{{$cliente->nombre_empresa}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Representante Firestill*</label>
                                    <select required name="trabajador_id" class="form-control">
                                        @foreach($trabajadores as $trabajador)
                                            @if($trabajador->id == $contrato->trabajador_id)
                                                <option selected value="{{$trabajador->id}}">{{$trabajador->nombre}}  {{$trabajador->apellido}}</option>
                                            @else
                                                <option value="{{$trabajador->id}}">{{$trabajador->nombre}}  {{$trabajador->apellido}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha inicio*</label>
                                    <input required
                                           type="date"
                                           value="{{$contrato->fecha_inicio}}"
                                           class="form-control"
                                           name="fecha_inicio">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha fin*</label>
                                    <input required
                                           type="date"
                                           value="{{$contrato->fecha_fin}}"
                                           class="form-control"
                                           name="fecha_fin">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Periodo (Mes)*</label>
                                    <input required
                                           type="number"
                                           value="{{$contrato->periodo}}"
                                           class="form-control"
                                           name="periodo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Documento</label>
                                    <div class="float-right">
                                        <a class="btn btn-secondary" target="_blank" href="{{asset('contrato/'.$contrato->documento)}}">Ver Actual</a>
                                    </div>
                                    <input
                                            type="file"
                                            class="form-control-file"
                                            name="documento">
                                </div>
                            </div>

                        </div>
                        <a href="{{url('imonitoreo/listaContratos/')}}" class="btn btn-warning">Atras</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Sucursales
                        <div class="float-right">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus"></i> Nueva
                            </button>
                        </div>
                    </h3>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered color-table info-table">
                                <thead>
                                <tr>
                                    <th class="text-center">COD</th>
                                    <th class="text-center">NOMBRE</th>
                                    <th class="text-center">DIRECCION</th>
                                    <th class="text-center">OPC</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contrato->sucursales as $sucursal)
                                    <tr class="text-center">
                                        <td>{{$sucursal->id}}</td>
                                        <td>{{$sucursal->nombre}}</td>
                                        <td>{{$sucursal->direccion}}</td>
                                        <td>
                                            <a href="{{url('imonitoreo/editarSucursal/'.$sucursal->id)}}">
                                                <button class="btn btn-warning">
                                                    Editar
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$sucursal->id}}', '{{url('imonitoreo/eliminarSucursal/'.$sucursal->id)}}')">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        @include('vistas.modal')
        @include('vistas.imonitoreo.modalSucursal')
        @push('scripts')
            <script>
                function modalEliminar(nombre, url) {
                    $('#modalEliminarForm').attr("action", url);
                    $('#modalEliminarTitulo').html("Eliminar Sucursal");
                    $('#modalEliminarEnunciado').html("Realmente desea eliminar la sucursal?");
                    $('#modalEliminar').modal('show');
                }

            </script>

        @endpush()
@endsection

