@extends('layouts.app',['pageTitle' => __(' Doctor Available Edit')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __(' Doctor Available') }}
    @endslot
@endcomponent

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Edit  Doctor Available') }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/doctor-available') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="feather-16" data-feather="arrow-left"></i> Back</button></a>
                        <br />
                        <br />
                        <form method="POST" id="oneTimeSubmit" action="{{ url('/admin/doctor-available/' . $doctoravailable->id) }}" accept-charset="UTF-8" class="form-horizontal needs-validation" novalidate=""  enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.doctor-available.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>

@endsection
