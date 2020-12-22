@extends('layouts.app',['pageTitle' => __(' Doctor Available Add')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Doctor Available') }}
@endslot
@endcomponent


<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __('Create  Doctor Available') }}</div>

        <div class="card-body">
            <a href="{{ url('/admin/doctor-available') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                        class="feather-16" data-feather="arrow-left"></i> {{ __('Back') }}
                </button></a>
            <br />
            <br />


            <form method="POST" id="oneTimeSubmit" action="{{ url('/admin/doctor-available') }}" accept-charset="UTF-8"
                class="form-horizontal needs-validation" novalidate="" enctype="multipart/form-data">
                {{ csrf_field() }}

                {{-- @include ('admin.doctor-available.form', ['formMode' => 'create']) --}}

                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                </div>

                @endif

                <div class="form-group">
                    <label for="my-input">Text</label>
                    <input id="my-input" class="form-control" type="date" min="{{date('Y-m-d')}}" name="date">


                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Starting Time</td>
                            <td>Ending Time</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        function addMinutesToTime( $time, $plusMinutes ) {

                            $time = DateTime::createFromFormat( 'g:i:s', $time );
                            $time->add( new DateInterval( 'PT' . ( (integer) $plusMinutes ) . 'M' ) );
                            $newTime = $time->format( 'g:i:s' );

                            return $newTime;
                        }

                        function starting_time($date){
                        $date = date($date);
                        $time = strtotime($date);
                        $time = $time - (15 * 60);
                        $date = date("g:i:s", $time);
                        return $date; 
                        }
                        $starting_time ='';
                        $ending_time = '9:00:00';
                        $time=[];
                        for($i=0;$i<40;$i++){
                            $time[$i] = addMinutesToTime( $ending_time, 15 ); 
                            $ending_time = $time[$i]; 
                            echo '<tr><td><div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox'.$i.'" name="option[]">
                        <label class="form-check-label" for="inlineCheckbox'.$i.'"> &#10003;</label>
                      </div></td><td><input readonly type="text" value="'.starting_time($ending_time).'" name="starting_time[]" id=""></td><td><input readonly value="'.$ending_time.'" type="text" name="ending_time[]" id=""></td></tr>';
                       }
                 ?>

                    </tbody>
                </table>
                <button class="btn btn-success" type="submit">Submit</button>
            </form>
            {{-- @php
            // dd(\App\DoctorAvailable::groupBy('date')->get());
            // $posts = \App\DoctorAvailable::all()->groupBy(function($item){ return $item->date; });
            // // dd($posts);
            // echo $posts->items;
            // foreach ($posts as $key => $value) {
            // // echo $value;
            // foreach ($value as $key => $value1) {
            //    echo $value1->starting_time;
            //    echo $value1->ending_time;
            // }
            // }
            $now =Carbon\Carbon::now();
            echo $now->year;
            echo $now->month;
            echo $now->weekOfYear;
            @endphp --}}
        </div>
    </div>
</div>

@endsection
@push('css')
<style>
    input[type="text"] {
        border: none !important;
    }

</style>
@endpush
