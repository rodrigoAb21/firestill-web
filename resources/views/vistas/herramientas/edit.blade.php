@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Editar herramienta
                    </h3>
                    <form method="POST" action="{{url('herramientas/'.$herramienta -> id)}}" autocomplete="off">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre*</label>
                                    <input required
                                           type="text"
                                           value="{{$herramienta -> nombre}}"
                                           class="form-control"
                                           name="nombre">
                                </div>
                            </div>

                        </div>
                        <a href="{{url('herramientas')}}" class="btn btn-warning">Atrás</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
