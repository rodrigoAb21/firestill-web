@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Productos dados de Baja
                    </h2>

                    <div class="table-responsive">
                        <table id="tablaBajaProducto" class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">PRODUCTO</th>
                                <th class="text-center">CANT</th>
                                <th class="text-center">FECHA</th>
                                <th class="text-center">MOTIVO</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bajas as $baja)
                                <tr class="text-center">
                                    <td>{{$baja->id}}</td>
                                    <td>{{$baja->producto->nombre}}</td>
                                    <td>{{$baja->cantidad}}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $baja->fecha)->format('d-m-Y')}}</td>
                                    <td>{{$baja->motivo}}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$baja -> nombre}}', '{{url('inventario/anularBaja/'.$baja -> id)}}')">
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
                var table = $('#tablaBajaProducto').DataTable(
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
                            {"name": "PRODUCTO"},
                            {"name": "CANT"},
                            {"name": "FECHA"},
                            {"name": "MOTIVO"},
                            {"name": "OPC", "orderable": false},
                        ],
                        "order": [[0, 'desc']],

                    }
                );

            });
        </script>
    @endpush()
@endsection
