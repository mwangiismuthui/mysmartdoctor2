@extends('layouts.app',['pageTitle' => __(' Prescription Add')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Prescription') }}
@endslot
@endcomponent


<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __('Create  Prescription') }}</div>

        <div class="card-body">

            <br />
            <br />


            <form method="POST" id="oneTimeSubmit" action="{{ url('/admin/prescription') }}" accept-charset="UTF-8"
                class="form-horizontal needs-validation" novalidate="" enctype="multipart/form-data">
                {{ csrf_field() }}

                @include ('admin.prescription.form', ['formMode' => 'create'])

            </form>

        </div>
    </div>
</div>

@endsection
