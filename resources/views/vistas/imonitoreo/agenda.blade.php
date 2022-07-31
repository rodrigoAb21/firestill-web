@extends('layouts.index')
@push('scripts')
    <link href="{{asset('fullcalendar/main.css')}}" rel="stylesheet" />
    <script src="{{asset('fullcalendar/main.js')}}"></script>
    <style>
        .fc-event{
            cursor: pointer;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                firstDay: 1,
                locale: 'es',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                editable: false,
                selectable: true,
                dayMaxEvents: true,
                events: [
                    {
                        title: 'All Day Event',
                        start: '2021-02-01',
                        color: '#378006',
                    },
                    {
                        title: 'All Day Event',
                        start: '2021-02-04',
                    },
                    {
                        title: 'All Day Event',
                        start: '2021-02-04',
                        color: '#800629',
                    },
                    {
                        title: 'All Day Event',
                        start: '2021-02-04',
                    },
                    {
                        title: 'All Day Event',
                        start: '2021-02-04',
                        color: '#062580',
                    },
                    {
                        title: 'All Day Event',
                        start: '2021-02-04',
                    },
                    {
                        title: 'All Day Event',
                        start: '2021-02-08',
                    },
                    {
                        title: 'All Day Event',
                        start: '2021-02-10',
                        color: '#378006',
                    },
                    {
                        title: 'All Day Event',
                        start: '2021-02-28',
                    },
                    {
                        title: 'All Day Event',
                        start: '2021-02-20',
                        color: '#378006',
                    },
                ]
            });
            calendar.render();
        });

    </script>
@endpush()
@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        Agenda
                    </h2>
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
@endsection
