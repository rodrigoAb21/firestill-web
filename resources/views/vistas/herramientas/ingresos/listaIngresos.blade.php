@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Ingresos de herramientas
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('herramientas/nuevoIngreso')}}">
                                <i class="fa fa-plus"></i>  Nuevo
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
                        <table id="tablaIngresoHerramienta" class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">FECHA</th>
                                <th class="text-center">TIENDA</th>
                                <th class="text-center">TOTAL Bs</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($ingresos as $ingreso)
                                <tr class="text-center">
                                    <td>{{$ingreso->id}}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $ingreso->fecha)->format('d-m-Y')}}</td>
                                    <td>{{$ingreso->tienda}}</td>
                                    <td>{{$ingreso->total}}</td>
                                    <td>
                                        <a href="{{url('herramientas/verIngreso/'.$ingreso->id)}}">
                                            <button class="btn btn-secondary">
                                                Ver
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$ingreso -> nombre}}', '{{url('herramientas/eliminarIngreso/'.$ingreso -> id)}}')">
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
                $('#modalEliminarTitulo').html("Eliminar");
                $('#modalEliminarEnunciado').html("Realmente lo desea eliminar?");
                $('#modalEliminar').modal('show');
            }

        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#tablaIngresoHerramienta').DataTable(
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
                            {"name": "TIENDA"},
                            {"name": "TOTAL Bs"},
                            {"name": "OPC", "orderable": false},

                        ],
                        "order": [[0, 'desc']],
                    }
                );

            });
        </script>
    @endpush()
@endsection
