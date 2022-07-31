@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Bandeja de Alertas
                        <div class="float-right">

                        </div>
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">FECHA</th>
                                <th class="text-center">DESCRIPCION</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($alertas as $alerta)
                                <tr class="text-center">
                                @if($alerta->estado)
                                    <tr class="text-center table-danger">
                                @else
                                    <tr class="text-center">
                                @endif
                                    <td>{{$alerta->id}}</td>
                                    <td>{{$alerta->fecha}}</td>
                                    <td>{{$alerta->descripcion}}</td>
                                    <td>
                                        @if($alerta->estado)
                                            <a href="{{url('alertas/marcarVista/'.$alerta->id)}}">
                                                <button class="btn btn-success"  title="Vista">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </a>
                                        @endif
                                        <a href="{{url('alertas/verEquipo/'.$alerta->id.'/'.$alerta->equipo_id)}}" >
                                            <button class="btn btn-warning" title="Ver Equipo">
                                                <i class="fa fa-arrow-right"></i>
                                            </button>
                                        </a>
                                        <button title="Eliminar" type="button" class="btn btn-danger" onclick="modalEliminar('{{$alerta -> nombre}}', '{{url('alertas/'.$alerta -> id)}}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$alertas->links('pagination.default')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('vistas.modal')
    @push('scripts')
        <script>
            function modalEliminar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar Categoria");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar la alerta: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }
        </script>
    @endpush()
@endsection