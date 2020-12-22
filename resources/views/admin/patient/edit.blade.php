@extends('layouts.app',['pageTitle' => __(' Patient Add')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Patient') }}
@endslot
@endcomponent

<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __('Edit  Patient') }}</div>
        <div class="card-body">
            <a href="{{ url('/admin/patient') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                        class="feather-16" data-feather="arrow-left"></i> Back</button></a>
            <br />
            <br />
            <form method="POST" id="oneTimeSubmit" action="{{ url('/admin/patient/' . $patient->id) }}"
                accept-charset="UTF-8" class="form-horizontal needs-validation" novalidate=""
                enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                @include ('admin.patient.form', ['formMode' => 'edit'])

            </form>

        </div>
    </div>
</div>

@endsection

@push('css')
<style>
    td {
        /* display: block; */
        overflow-y: hidden;
        max-height: 20px;
        width: 237px;
        text-align: center;
    }

    input.table-input {
        border: none;
    }

</style>
@endpush
