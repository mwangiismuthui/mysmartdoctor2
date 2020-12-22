@extends('layouts.app',['pageTitle' => __(' Account Edit')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Account') }}
@endslot
@endcomponent


<div class="card">
    <div class="card-header">{{ __('Edit  Account') }}</div>
    <div class="card-body">
        <a href="{{ url('/admin/account') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="feather-16"
                    data-feather="arrow-left"></i> Back</button></a>
        <br />
        <br />
        <form method="POST" id="oneTimeSubmit" action="{{ url('/admin/account/' . $account->id) }}"
            accept-charset="UTF-8" class="form-horizontal needs-validation" novalidate="" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            @include ('admin.account.form', ['formMode' => 'edit'])

        </form>

    </div>
</div>


@endsection
