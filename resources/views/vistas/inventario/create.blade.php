@extends('layouts.index')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Nuevo producto
                    </h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{url('inventario')}}" autocomplete="off">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Nombre*</label>
                                    <input required
                                           type="text"
                                           class="form-control"
                                           value="{{ old('nombre') }}"
                                           name="nombre">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Precio Bs*</label>
                                    <input required
                                           type="number"
                                           step="any"
                                           min="0"
                                           class="form-control"
                                           value="{{ old('precio') }}"
                                           name="precio">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Categoría*</label>
                                    <select required name="categoria_id" class="form-control">
                                        @foreach($categorias as $categoria)
                                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Origen*</label>
                                    <select required name="origen" class="form-control selectpicker" data-live-search="true" >
                                        @foreach($paises as $origen)
                                            <option value="{{$origen}}">{{$origen}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea name="descripcion" rows="3" class="form-control">{{ old('descripcion') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('inventario')}}" class="btn btn-warning">Atrás</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('arriba')
        <link rel="stylesheet" href="{{asset('plantilla/assets/plugins/select/bootstrap-select.min.css')}}">
    @endpush
    @push('scripts')
        <script src="{{asset('plantilla/assets/plugins/select/bootstrap-select.min.js')}}"></script>
    @endpush
@endsection
