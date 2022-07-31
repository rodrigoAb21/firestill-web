@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver Ficha de Inspeccion: {{$ficha->id}}
                    </h3>
                    <div class="row">

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Fecha</n></label>
                                <input readonly
                                       type="date"
                                       class="form-control"
                                       value="{{$ficha->fecha}}"
                                       >
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Responsable</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$ficha->trabajador->nombre}} {{$ficha->trabajador->apellido}}"
                                >
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Equipo</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$ficha->equipo_id}}"
                                >
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Caño Pesca</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$ficha->eCanioPesca}}"
                                       >
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Zuncho</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$ficha->eZuncho}}"
                                       >
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Chasis</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$ficha->eChasis}}"
                                       >
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Rueda</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$ficha->eRueda}}"
                                       >
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Rosca</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$ficha->eRosca}}"
                                       >
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Manguera</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$ficha->eManguera}}"
                                       >
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Válvula</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$ficha->eValvula}}"
                                       >
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Tobera</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$ficha->eTobera}}"
                                       >
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Robinete</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$ficha->eRobinete}}"
                                       >
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Palanca</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$ficha->ePalanca}}"
                                       >
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Manómetro</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$ficha->eManometro}}"
                                       >
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Vástago</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$ficha->eVastago}}"
                                       >
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Difusor</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$ficha->eDifusor}}"
                                       >
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Disco</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$ficha->eDisco}}"
                                       >
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Carga</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$ficha->carga}}"
                                       >
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Resultado</n></label>
                                <input readonly
                                       type="text"
                                       class="form-control"
                                       value="{{$ficha->resultado}}"
                                       >
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><n>Observación</n></label>
                                <textarea class="form-control" rows="3" readonly>{{$ficha->observacion}}</textarea>
                            </div>
                        </div>


                    </div>
                    <a href="{{url('imonitoreo/listarFichas/'.$ficha->equipo_id)}}" class="btn btn-warning">Atrás</a>
                </div>
            </div>
        </div>
    </div>
@endsection
