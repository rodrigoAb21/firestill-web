@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fa fa-boxes"></i> Inventario de productos
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{url('inventario/reporte')}}">
                                <i class="fa fa-file-pdf"></i>  PDF
                            </a>
                            <a class="btn btn-success" href="{{url('inventario/create')}}">
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
                        <table id="tablaProducto" class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">IMG</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">CATEGORIA</th>
                                <th class="text-center">EXISTENCIAS</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productos as $producto)
                                <tr class="text-center">
                                    <td class="align-middle">{{$producto->id}}</td>
                                    <td class="align-middle"><img src="{{asset('img/productos/'.$producto->foto)}}" class="img-thumbnail" width="100px"></td>
                                    <td class="align-middle">{{$producto->nombre}}</td>
                                    <td class="align-middle">{{$producto->categoria->nombre}}</td>
                                    <td class="align-middle">{{$producto->cantidad}}</td>
                                    <td class="align-middle">
                                        <a href="{{url('inventario/'.$producto->id)}}">
                                            <button class="btn btn-secondary">
                                                Ver
                                            </button>
                                        </a>

                                        <a href="{{url('inventario/'.$producto->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                Editar
                                            </button>
                                        </a>

                                        @if($producto->cantidad>0)
                                            <a href="{{url('inventario/darBaja/'.$producto->id)}}">
                                                <button class="btn btn-outline-danger">
                                                    Baja
                                                </button>
                                            </a>
                                        @endif
                                        <button type="button" class="btn btn-danger"
                                                onclick="modalEliminar('{{$producto -> nombre}}', '{{url('inventario/'.$producto -> id)}}')">
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
                $('#modalEliminarTitulo').html("Eliminar Categoria");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar la producto: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#tablaProducto').DataTable(
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
                            {"name": "IMG"},
                            {"name": "NOMBRE"},
                            {"name": "CATEGORIA"},
                            {"name": "EXISTENCIAS"},
                            {"name": "OPC", "orderable": false},
                        ],
                        "order": [[0, 'desc']],
                    }
                );

            });
        </script>
    @endpush()
@endsection
