@extends('layouts.app',['pageTitle' => __(' Booking Fee Add')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Booking Fee') }}
@endslot
@endcomponent

<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __('Edit  Booking Fee') }}</div>
        <div class="card-body">
            
            <br />
            <br />
            <form method="POST" id="oneTimeSubmit" action="{{ url('/admin/booking-fee/' . $bookingfee->id) }}"
                accept-charset="UTF-8" class="form-horizontal needs-validation" novalidate=""
                enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                @include ('admin.booking-fee.form', ['formMode' => 'edit'])

            </form>

        </div>
    </div>
</div>

@endsection
