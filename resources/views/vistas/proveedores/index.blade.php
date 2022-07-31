@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fa fa-truck"></i> Proveedores
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('proveedores/create')}}">
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
                        <table id="tablaProveedor" class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">TELEFONO</th>
                                <th class="text-center">EMAIL</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($proveedores as $proveedor)
                                <tr class="text-center">
                                    <td >{{$proveedor->id}}</td>
                                    <td >{{$proveedor->nombre}}</td>
                                    <td >{{$proveedor->telefono}}</td>
                                    <td >{{$proveedor->email}}</td>

                                    <td>
                                        <a href="{{url('proveedores/'.$proveedor->id)}}">
                                            <button class="btn btn-secondary">
                                                Ver
                                            </button>
                                        </a>
                                        <a href="{{url('proveedores/'.$proveedor->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                Editar
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$proveedor -> nombre}}', '{{url('proveedores/'.$proveedor -> id)}}')">
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
                var table = $('#tablaProveedor').DataTable(
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
                            {"name": "TELEFONO"},
                            {"name": "EMAIL"},
                            {"name": "OPC", "orderable": false},
                        ],
                        "order": [[0, 'desc']],
                    }
                );

            });
        </script>
    @endpush()
@endsection
