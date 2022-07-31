@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Asignaciones de herramientas
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('herramientas/nuevaAsignacion')}}">
                                <i class="fa fa-plus"></i>  Nueva
                            </a>
                        </div>
                    </h2>
                    @if(session()->has('message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="tablaAsignacionHerramienta" class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">FECHA</th>
                                <th class="text-center">RESPONSABLE</th>
                                <th class="text-center">ESTADO</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($asignaciones as $asignacion)
                                <tr class="text-center">
                                    <td>{{$asignacion->id}}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $asignacion->fecha)->format('d-m-Y')}}</td>
                                    <td>{{$asignacion->trabajador->nombre}} {{$asignacion->trabajador->apellido}}</td>
                                    <td>{{$asignacion->estado}}</td>
                                    <td>
                                        <a href="{{url('herramientas/verAsignacion/'.$asignacion->id)}}">
                                            <button class="btn btn-secondary">
                                                Ver
                                            </button>
                                        </a>
                                        @if($asignacion->estado == 'Activa')
                                            <a href="{{url('herramientas/reingreso/'.$asignacion->id)}}">
                                                <button class="btn btn-success">
                                                    Reingreso
                                                </button>
                                            </a>

                                            <button type="button" class="btn btn-danger" title="Eliminar" onclick="modalEliminar('{{$asignacion -> id}}', '{{url('herramientas/eliminarAsignacion/'.$asignacion -> id)}}')">
                                                Eliminar
                                            </button>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$asignaciones->links('pagination.default')}}
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
                $('#modalEliminarTitulo').html("Eliminar");
                $('#modalEliminarEnunciado').html("Realmente lo desea eliminar?");
                $('#modalEliminar').modal('show');
            }

        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#tablaAsignacionHerramienta').DataTable(
                    {
                        language: {
                            "decimal": "",
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
                            "infoEmpty": "",
                            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ filas",
                            "loadingRecords": "Cargando...",
                            "processing": "Procesando...",
                            "search": "Buscar:",
                            "zeroRecords": "No se encontraron resultados.",
                            "paginate": {
                                "first": "Primero",
                                "last": "Ultimo",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            }
                        },
                        "columns": [
                            {"name": "COD"},
                            {"name": "FECHA"},
                            {"name": "RESPONSABLE"},
                            {"name": "ESTADO"},
                            {"name": "OPC", "orderable": false},
                        ],
                        "order": [[0, 'desc']],
                    }
                );

            });
        </script>
    @endpush()
@endsection
