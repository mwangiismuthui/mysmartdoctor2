@extends('layouts.app',['pageTitle' => __(' Doctor Add')])
@section('content')
<style>
    .crop-wrapper {
background-color: rgba(255, 255, 255, 1);
position: relative;
width: 100%;
height: 90vh;
overflow: hidden;
}

.resize-container {
position: relative;
display: inline-block;
cursor: move;
margin: 0 auto;
}

.resize-container-ontop {
position: absolute;
cursor: move;
background-color: rgba(5, 255, 5, 0);
z-index: 1000;
width: 100%;
height: 100%;
}

.resize-container img {
display: block;
}

.resize-container:hover img,
.resize-container:active img {
outline: 2px dashed rgba(0, 0, 0, 0.9);
}

.resize-handle-ne,
.resize-handle-se,
.resize-handle-nw,
.resize-handle-sw {
position: absolute;
display: block;
width: 10px;
height: 10px;
background: rgba(0, 0, 0, 0.9);
z-index: 999;
}

.resize-handle-nw {
top: -5px;
left: -5px;
cursor: nw-resize;
}

.resize-handle-sw {
bottom: -5px;
left: -5px;
cursor: sw-resize;
}

.resize-handle-ne {
top: -5px;
right: -5px;
cursor: ne-resize;
}

.resize-handle-se {
bottom: -5px;
right: -5px;
cursor: se-resize;
}

.top-overlay {
z-index: 990;
background-color: rgba(222, 222, 222, 0.6);
width: 100%;
height: 50%;
margin-top: -150px;
position: absolute;
}

.bottom-overlay {
z-index: 990;
background-color: rgba(222, 222, 222, 0.6);
width: 100%;
height: 50%;
margin-bottom: -150px;
position: absolute;
bottom: 0;
}

.right-overlay {
z-index: 990;
background-color: rgba(222, 222, 222, 0.6);
width: 50%;
height: 300px;
top: 50%;
margin-top: -150px;
margin-left: -150px;
position: absolute;
}

.left-overlay {
z-index: 990;
background-color: rgba(222, 222, 222, 0.6);
width: 50%;
height: 300px;
top: 50%;
right: 0px;
margin-top: -150px;
margin-right: -150px;
position: absolute;
}

.overlay {
position: absolute;
left: 50%;
top: 50%;
margin-left: -150px;
margin-top: -150px;
z-index: 999;
width: 300px;
height: 300px;
border: solid 2px rgba(222, 222, 222, 0.9);
box-sizing: content-box;
pointer-events: none;
}

.overlay:before {
top: 0;
margin-left: -2px;
margin-top: -40px;
}

.overlay:after {
bottom: 0;
margin-left: -2px;
margin-bottom: -40px;
}

.overlay-inner:before {
left: 0;
margin-left: -40px;
margin-top: -2px;
}

.overlay-inner:after {
right: 0;
margin-right: -40px;
margin-top: -2px;
}

.btn {
padding: 6px 10px;
background-color: rgb(222, 60, 80);
border: none;
border-radius: 5px;
color: #fff;
margin: 10px 5px;
line-height: 30px;
}

.btn-crop img {
vertical-align: middle;
margin-left: 8px;
}

</style>
@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __(' Doctor') }}
    @endslot
@endcomponent

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Edit  Doctor') }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/doctor') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="feather-16" data-feather="arrow-left"></i> Back</button></a>
                        <br />
                        <br />
                        <form method="POST" id="oneTimeSubmit" action="{{ url('/admin/doctor/' . $doctor->id) }}" accept-charset="UTF-8" class="form-horizontal needs-validation" novalidate=""  enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.doctor.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>

@endsection
