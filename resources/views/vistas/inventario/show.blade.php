@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver producto
                    </h3>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input readonly
                                                   type="text"
                                                   class="form-control"
                                                   value="{{$producto->nombre}}"
                                                   name="nombre">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Precio Bs</label>
                                            <input readonly
                                                   type="text"
                                                   class="form-control"
                                                   value="{{$producto->precio}}"
                                                   name="precio">
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Categoría</label>
                                            <input type="text" class="form-control" readonly value="{{$producto->categoria->nombre}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Origen</label>
                                            <input type="text" class="form-control" readonly value="{{$producto->origen}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Descripción</label>
                                            <textarea readonly name="descripcion" rows="3" class="form-control">{{$producto->descripcion}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="row text-center">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Foto</label> <br>
                                            <img src="{{asset('img/productos/'.$producto -> foto)}}" height="150px" width="150px" class="img-thumbnail"  >
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <a href="{{url('inventario')}}" class="btn btn-warning">Atrás</a>
                </div>
            </div>
        </div>
    </div>
@endsection
