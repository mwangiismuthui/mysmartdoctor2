@extends('layouts.app',['pageTitle' => __('Calendar')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Calendar') }}
@endslot
@endcomponent

<section class="section" >
    <div class="section-body">
        <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h4>Calendar</h4>
            </div>
            <div class="card-body">
                <div class="fc-overflow">
                <div id="myEvent"></div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>

@endsection

@push('css')

<link rel="stylesheet" href="{{ asset('assets') }}/bundles/fullcalendar/fullcalendar.min.css">
@endpush

@push('js') 
<script
src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
crossorigin="anonymous"></script>
<script src="{{ asset('assets') }}/bundles/fullcalendar/fullcalendar.min.js"></script>

<script>
var today = new Date();
year = today.getFullYear();
month = today.getMonth();
day = today.getDate();
var calendar = $('#myEvent').fullCalendar({
  height: 'auto',
  defaultView: 'month',
  editable: false,
  selectable: true,
  header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,agendaWeek,agendaDay,listMonth'
  },
  events: [
    @if(Auth::user()->role == 'doctor')
        @foreach (App\Booking::where('time','!=',null)->where('doctor_id',Auth::user()->doctor->id)->get() as $item)
            {
                title: 'Booking -- {{$item->doctor->given_name}}',
                start: '{{$item->date.' '.$item->time}}',
                backgroundColor: "#9b59b6"
                
            },
        @endforeach
    @endif
    @if(Auth::user()->role == 'patient')
        @foreach (App\Booking::where('time','!=',null)->where('patient_id',Auth::user()->patient->id)->get() as $item)
                {
                    title: 'Booking -- {{$item->patient->first_name.' '.$item->patient->surname}}',
                    start: '{{$item->date.' '.$item->time}}',
                    backgroundColor: "#9b59b6"

                    
                },
        @endforeach
    @endif
]
});
 
</script> 
@endpush
