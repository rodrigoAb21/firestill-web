@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fa fa-tools"></i> Herramientas
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{url('herramientas/reporte')}}">
                                <i class="fa fa-file-pdf"></i>  PDF
                            </a>
                            <a class="btn btn-success" href="{{url('herramientas/create')}}">
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
                        <table id="tablaHerramienta" class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">TALLER</th>
                                <th class="text-center">ASIGNADAS</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($herramientas as $herramienta)
                                <tr class="text-center">
                                    <td>{{$herramienta->id}}</td>
                                    <td>{{$herramienta->nombre}}</td>
                                    <td>{{$herramienta->cantidad_taller}}</td>
                                    <td>{{$herramienta->cantidad_asignada}}</td>
                                    <td>{{$herramienta->cantidad_total}}</td>
                                    <td>
                                        <a href="{{url('herramientas/'.$herramienta->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                Editar
                                            </button>
                                        </a>
                                        @if($herramienta->cantidad_taller>0)
                                            <a href="{{url('herramientas/darBaja/'.$herramienta->id)}}">
                                                <button class="btn btn-outline-danger">
                                                    Baja
                                                </button>
                                            </a>
                                        @endif
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$herramienta -> nombre}}', '{{url('herramientas/'.$herramienta -> id)}}')">
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
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar Herramienta");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar la herramienta?");
                $('#modalEliminar').modal('show');
            }

        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#tablaHerramienta').DataTable(
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
                            {"name": "NOMBRE"},
                            {"name": "TALLER"},
                            {"name": "ASIGNADAS"},
                            {"name": "TOTAL"},
                            {"name": "OPC", "orderable": false},
                        ],
                        "order": [[0, 'desc']],
                    }
                );

            });
        </script>
    @endpush()
@endsection
