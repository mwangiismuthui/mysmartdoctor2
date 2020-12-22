@extends('layouts.app',['pageTitle' => __(' Page Edit')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Page') }}
@endslot
@endcomponent

<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __('Edit  Page') }}</div>
        <div class="card-body">
            <br />
            <br />
            <form method="POST" id="oneTimeSubmit" action="{{ url('/admin/page/' . $page->id) }}" accept-charset="UTF-8"
                class="form-horizontal needs-validation" novalidate="" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                @include ('admin.page.form', ['formMode' => 'edit'])

            </form>

        </div>
    </div>
</div>

@endsection
