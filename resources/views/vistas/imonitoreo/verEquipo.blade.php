@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="pb-2">
                        Ver Equipo
                    </h3>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Nro Serie</label>
                                            <input readonly
                                                   type="number"
                                                   class="form-control"
                                                   value="{{$equipo->nro_serie}}"
                                                   name="nro_serie">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Año de fabricación</label>
                                            <input readonly
                                                   type="number"
                                                   class="form-control"
                                                   value="{{$equipo->ano_fabricacion}}"
                                                   name="ano_fabricacion">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <input readonly
                                                   class="form-control"
                                                   value="{{$equipo->tipo->nombre}}"
                                                   name="ano_fabricacion">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Marca</label>
                                            <input readonly
                                                   class="form-control"
                                                   value="{{$equipo->marca->nombre}}"
                                                   name="ano_fabricacion">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Capacidad</label>
                                            <input readonly
                                                   type="number"
                                                   step="0.01"
                                                   class="form-control"
                                                   value="{{$equipo->capacidad}}"
                                                   name="capacidad">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>U.Medida</label>
                                            <input readonly
                                                   class="form-control"
                                                   value="{{$equipo->unidad_medida}}"
                                                   name="capacidad">
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Descripción</label>
                                            <textarea name="descripcion"
                                                      readonly
                                                      cols="30"
                                                      class="form-control"
                                                      rows="3">{{$equipo->descripcion}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Ubicación</label>
                                            <textarea name="ubicacion"
                                                      readonly
                                                      cols="30"
                                                      class="form-control"
                                                      rows="3">{{$equipo->ubicacion}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--
                            <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                        <div id="map" style="width: 100%; height: 250px; background: #b4c1cd; margin-bottom: 1rem"></div>
                                    </div>

                                    <div class="pt-2 col-lg-12 col-md-12 col-sm-12">
                                        <div id="chart_div" style="width: 150px; height: 150px; display: block; margin: 0 auto;"></div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2"></div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 text-center">

                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2"></div>

                                </div>
                            </div>
                        -->
                        </div>
                        <a href="{{url('imonitoreo/verSucursal/'.$equipo->sucursal_id)}}" class="btn btn-warning">Atrás</a>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <!--
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js'></script>
        <link href='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.css' rel='stylesheet' />
        <script type="text/javascript">

            var presion;
            google.charts.load('current', {'packages':['gauge']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                data = google.visualization.arrayToDataTable([
                    ['Label', 'Value'],
                    ['PSI', 0],
                ]);

                presion = 0;

                if (!Number.isNaN(parseFloat('{{$equipo -> presion_actual}}'))){
                    presion = parseFloat('{{$equipo -> presion_actual}}');
                }

                var options = {
                    width: 150, height: 150,
                    yellowFrom:0, yellowTo: parseFloat('{{$equipo -> presion_min}}'),
                    greenFrom:parseFloat('{{$equipo -> presion_min}}'), greenTo: parseFloat('{{$equipo -> presion_max}}'),
                    redFrom: parseFloat('{{$equipo -> presion_max}}'), redTo: 400,
                    yellowColor: '#dc3912',
                    min:0, max:400, majorTicks: ['0','400'],
                    minorTicks: 0, animation: {duration: 2500},
                };
                var options2 = {
                    width: 150, height: 150,
                    yellowFrom:0, yellowTo: parseFloat('{{$equipo -> presion_min}}'),
                    greenFrom:parseFloat('{{$equipo -> presion_min}}'), greenTo: parseFloat('{{$equipo -> presion_max}}'),
                    redFrom: parseFloat('{{$equipo -> presion_max}}'), redTo: 400,
                    yellowColor: '#dc3912',
                    min:0, max:400, majorTicks: ['0','400'],
                    minorTicks: 0, animation: {duration: 1500},
                };

                var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

                chart.draw(data, options);
                data.setValue(0, 1, presion);
                chart.draw(data, options);

                setInterval(function() {
                    data.setValue(0, 1, presion);
                    chart.draw(data, options2);
                }, 2000);

            }
            var equipo;
            var marcador;


            var marcador;
            L.mapbox.accessToken = 'pk.eyJ1Ijoicm9kcmlnb2FiMjEiLCJhIjoiY2psenZmcDZpMDN5bTNrcGN4Z2s2NWtqNSJ9.bSdjQfv-28z1j4zx7ljvcg';
            var actual = L.latLng('{{$equipo -> latitud_actual}}', '{{$equipo -> longitud_actual}}');
            var ideal = L.latLng('{{$equipo -> latitud_ideal}}', '{{$equipo -> longitud_ideal}}');
            var map = L.mapbox.map('map')
                .setView(ideal, 10)
                .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11'));
            marcador = L.marker(actual, {
                icon: L.mapbox.marker.icon({
                    'marker-size': 'large',
                    'marker-color': '#f53c40'
                }), title: 'Actual'}).addTo(map);
            L.marker(ideal, {
                icon: L.mapbox.marker.icon({
                    'marker-size': 'large',
                    'marker-color': '#49ba35'
                }), title: 'Ideal'
            }).addTo(map);
/*

            var pusher = new Pusher('b7e5f831a0dbf97652df', {
                cluster: 'us2'
            });

            var channel = pusher.subscribe('arduinoCanal');
            channel.bind('arduinoEvent', (x) => {
                this.equipo = x["datos"];
                presion = equipo["presion_actual"];
                actual.lat = equipo["latitud_actual"];
                actual.lng = equipo["longitud_actual"];
                marcador.setLatLng(actual);
            });

*/
        </script>

        -->
    @endpush
@endsection
