@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Contratos
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('imonitoreo/nuevoContrato')}}">
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
                        <table id="tablaContrato" class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">CLIENTE</th>
                                <th class="text-center">ESTADO</th>
                                <th class="text-center">F. INICIO</th>
                                <th class="text-center">F. FIN</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contratos as $contrato)
                                <tr class="text-center">
                                    <td>{{$contrato->id}}</td>
                                    <td>{{$contrato->cliente->nombre_empresa}}</td>
                                    <td>{{$contrato->estado}}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $contrato->fecha_inicio)->format('d - m - Y')}}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $contrato->fecha_fin)->format('d - m - Y')}}</td>
                                    <td>
                                        @if($contrato->edicion)

                                            <a href="{{url('imonitoreo/editarContrato/'.$contrato->id)}}">
                                                <button class="btn btn-warning"  title="Editar">
                                                    Editar
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-outline-danger"
                                                    onclick="modalFinalizar('{{$contrato -> id}}', '{{url('imonitoreo/finalizarEdicion/'.$contrato -> id)}}')">
                                                Finalizar Edicion
                                            </button>
                                        @else
                                            <a href="{{url('imonitoreo/verContrato/'.$contrato->id)}}">
                                                <button class="btn btn-secondary">
                                                    Ver
                                                </button>
                                            </a>
                                        @endif

                                        <button type="button"
                                                class="btn btn-danger"
                                                onclick="modalEliminar('{{$contrato -> id}}', '{{url('imonitoreo/eliminarContrato/'.$contrato -> id)}}')">
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
                $('#metodo').prop("delete");
                $('#modalEliminarTitulo').html("Eliminar");
                $('#modalEliminarEnunciado').html("Realmente lo desea eliminar?");
                $('#modalEliminar').modal('show');
            }

             function modalFinalizar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').prop("disabled", true);
                $('#modalEliminarTitulo').html("Finalizar edición");
                $('#modalEliminarEnunciado').html("Realmente desea finalizar la edición?");
                $('#btn_eliminar').html('Finalizar');
                $('#modalEliminar').modal('show');
            }


        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#tablaMarca').DataTable(
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
                            {"name": "CLIENTE"},
                            {"name": "ESTADO"},
                            {"name": "CLIENTE"},
                            {"name": "F. INICIO", "orderable": false},
                            {"name": "F. FIN", "orderable": false},
                            {"name": "OPC", "orderable": false},
                        ],
                        "order": [[0, 'desc']],
                    }
                );

            });
        </script>
    @endpush()
@endsection
