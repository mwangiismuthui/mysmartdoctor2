@extends('layouts.app',['pageTitle' => __(' X Ray Edit')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __(' X Ray') }}
    @endslot
@endcomponent

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Edit  X Ray') }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/x-ray') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="feather-16" data-feather="arrow-left"></i> Back</button></a>
                        <br />
                        <br />
                        <form method="POST" id="oneTimeSubmit" action="{{ url('/admin/x-ray/' . $xray->id) }}" accept-charset="UTF-8" class="form-horizontal needs-validation" novalidate=""  enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.x-ray.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>

@endsection
