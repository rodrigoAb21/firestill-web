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
                        Editar Sucursal: {{$sucursal->id}}
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

                    <form method="POST" action="{{url('imonitoreo/actualizarSucursal/'.$sucursal -> id)}}" autocomplete="off">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre*</label>
                                    <input required
                                           type="text"
                                           value="{{$sucursal->nombre}}"
                                           class="form-control"
                                           name="nombre">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Dirección*</label>
                                    <input required
                                           type="text"
                                           value="{{$sucursal->direccion}}"
                                           class="form-control"
                                           name="direccion">
                                </div>
                            </div>
                        </div>
                        <a href="{{url('imonitoreo/editarContrato/'.$sucursal->contrato_id)}}" class="btn btn-warning">Atras</a>
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
                        Equipos
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('imonitoreo/nuevoEquipo/'.$sucursal->id)}}">
                                <i class="fa fa-plus"></i>  Nuevo
                            </a>
                        </div>
                    </h3>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered color-table info-table">
                                <thead>
                                <tr>
                                    <th class="text-center">COD</th>
                                    <th class="text-center">NRO SERIE</th>
                                    <th class="text-center">CAPACIDAD</th>
                                    <th class="text-center">TIPO</th>
                                    <th class="text-center">MARCA</th>
                                    <th class="text-center">OPC</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sucursal->equipos as $equipo)
                                    <tr class="text-center">
                                        <td>{{$equipo->id}}</td>
                                        <td>{{$equipo->nro_serie}}</td>
                                        <td>{{$equipo->capacidad}} {{$equipo->unidad_medida}}</td>
                                        <td>{{$equipo->tipo->nombre}}</td>
                                        <td>{{$equipo->marca->nombre}}</td>
                                        <td>
                                            <a href="{{asset('img/equipos/codigos/'.$equipo->id.'.png')}}" download>
                                                <button class="btn btn-primary">
                                                    QR
                                                </button>
                                            </a>
                                            <a href="{{url('imonitoreo/editarEquipo/'.$equipo->id)}}">
                                                <button class="btn btn-warning">
                                                    Editar
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$equipo -> id}}', '{{url('imonitoreo/eliminarEquipo/'.$equipo -> id)}}')">
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
        @push('scripts')
            <script>
                function modalEliminar(nombre, url) {
                    console.log(url);
                    $('#modalEliminarForm').attr("action", url);
                    $('#metodo').val("delete");
                    $('#modalEliminarTitulo').html("Eliminar Equipo");
                    $('#modalEliminarEnunciado').html("Realmente desea eliminar el equipo?");
                    $('#modalEliminar').modal('show');
                }

            </script>

    @endpush()
@endsection

