@extends('layouts.app')
@section('title', 'Schedule')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">My Schedule</h4>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}">
@endpush
@push('js')
    <script src="{{ asset('assets/js/jquery2.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/fullcalendar.js') }}"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: '{{ route("schedules.index") }}',
                selectable: true,
                selectHelper: true,
                // select function add
                select:function(start, end, allDay) {
                    var title = prompt('Event Title: ');
                    if (title) {
                        var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                        var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                        $.ajax({
                            url: '{{ route("schedules.store") }}',
                            type: "POST",
                            data: {
                                title, start, end, type: 'add'
                            },
                            success:function(data){
                                calendar.fullCalendar('refetchEvents');
                                alert("Berhasil menambah event")
                            }
                        })
                    }
                },
                // Edit
                // editable:true,
                eventResize:function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: '{{ route("schedules.store") }}',
                        type: "POST",
                        data: {
                            title, start, end, id, type: 'update'
                        },
                        success:function(data){
                            calendar.fullCalendar('refetchEvents');
                            alert("Berhasil mengubah event")
                        }
                    })
                },
                eventDrop:function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: '{{ route("schedules.store") }}',
                        type: "POST",
                        data: {
                            title, start, end, id, type: 'update'
                        },
                        success:function(data){
                            calendar.fullCalendar('refetchEvents');
                            alert("Berhasil mengubah event")
                        }
                    })
                },
                eventClick:function(event){
                    if (confirm("Anda yakin ingin menghapus event?")) {
                        $.ajax({
                            url: '{{ route("schedules.store") }}',
                            type: "POST",
                            data: {
                                id: event.id, type: 'delete'
                            },
                            success:function(data){
                                calendar.fullCalendar('refetchEvents');
                                alert("Berhasil menghapus event")
                            }
                        })
                    }
                }
            });
        });
    </script>
@endpush
