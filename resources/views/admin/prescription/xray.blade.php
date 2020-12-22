@extends('layouts.app',['pageTitle' => __(' xray Show')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' xray') }}
@endslot
@endcomponent
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __(' xray') }}</div>
        <div class="card-body">

            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    <button class="btn btn-warning btn-sm" id="print" style="right: 0px;float: right;"><i
                            class="feather-16" data-feather="printer"></i>
                        {{ __(' Print') }}</button>
                    <div id="doc">
                        <div class="d-flex justify-content-center mb-5">
                            <img src="{{ asset('frontEnd/img/logo.png') }}" alt="">
                        </div>

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            <label for="name" class="control-label">{{ __('Name') }}</label>
                            <input class="form-control" name="name" type="text" id="name"
                                value="{{isset($xray->name) ? $xray->name : '' }}">
                            {!! $errors->first('name', '<p class="text-danger">:message</p>
                            ')
                            !!}
                            <div class="invalid-feedback"> What's your name?</div>
                        </div>
                        <div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
                            <label for="age" class="control-label">{{ __('Age') }}</label>
                            <input class="form-control" name="age" type="text" id="age"
                                value="{{isset($xray->age) ? $xray->age : '' }}">
                            {!! $errors->first('age', '<p class="text-danger">:message</p>')
                            !!}
                            <div class="invalid-feedback"> What's your age?</div>
                        </div>
                        <div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
                            <label for="sex" class="control-label">{{ __('Sex') }}</label>
                            <input class="form-control" name="sex" type="text" id="sex"
                                value="{{isset($xray->sex) ? $xray->sex : '' }}">
                            {!! $errors->first('sex', '<p class="text-danger">:messsex</p>')
                            !!}
                            <div class="invalid-feedback"> What's your sex?</div>
                        </div>

                        <div class="form-group {{ $errors->has('dr_name') ? 'has-error' : ''}}">
                            <label for="dr_name" class="control-label">{{ __('Dr Name') }}</label>
                            <input class="form-control" name="dr_name" type="text" id="dr_name"
                                value="{{isset($xray->dr_name) ? $xray->dr_name : '' }}">
                            {!! $errors->first('dr_name', '<p class="text-danger">:message
                            </p>')
                            !!}
                            <div class="invalid-feedback"> What's your dr name?</div>
                        </div>
                        <div class="form-group {{ $errors->has('registration_number') ? 'has-error' : ''}}">
                            <label for="registration_number"
                                class="control-label">{{ __('Medical council Registration Number') }}</label>
                            <input class="form-control" name="registration_number" type="text" id="registration_number"
                                value="{{isset($xray->registration_number) ? $xray->registration_number : '' }}">
                            {!! $errors->first('registration_number', '<p class="text-danger">
                                :message
                            </p>') !!}
                            <div class="invalid-feedback"> What's your Registration Number?
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('digital_signature') ? 'has-error' : ''}}">
                            <label for="digital_signature"
                                class="control-label">{{ __('Digital Signature /Frank') }}</label>
                            <input class="form-control" name="digital_signature" type="text" id="digital_signature"
                                value="{{isset($xray->digital_signature) ? $xray->digital_signature : '' }}">
                            {!! $errors->first('digital_signature', '<p class="text-danger">
                                :message</p>
                            ') !!}
                            <div class="invalid-feedback"> What's your Digital Signature?
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('xray') ? 'has-error' : ''}} ">
                            <label for="xray" class="control-label">{{ __('Order X rays') }}</label>
                            <h6>a)</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Type of Xray</th>
                                        <th>Yes</th>
                                        <th>No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">OPG</td>
                                        <td><input type="radio"  {{$xray->digital_signature == 'yes' ? 'checked' : '' }}  id="OPG" name="OPG" value="yes"></td>
                                        <td><input type="radio" {{$xray->digital_signature == 'no' ? 'checked' : '' }} id="OPG" name="OPG" value="no"></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">cephalogram Lateral</td>
                                        <td><input type="radio" {{$xray->cephalogram_lateral == 'yes' ? 'checked' : '' }} id="cephalogram_lateral" name="cephalogram_lateral"
                                                value="yes"></td>
                                        <td><input type="radio" {{$xray->cephalogram_lateral == 'no' ? 'checked' : '' }} id="cephalogram_lateral" name="cephalogram_lateral"
                                                value="no"></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Upper Standard occlusal</td>
                                        <td><input type="radio" {{$xray->upper_standard_occlusal == 'yes' ? 'checked' : '' }} id="upper_standard_occlusal"
                                                name="upper_standard_occlusal" value="yes"></td>
                                        <td><input {{$xray->upper_standard_occlusal == 'no' ? 'checked' : '' }} type="radio" id="upper_standard_occlusal"
                                                name="upper_standard_occlusal" value="no"></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Lowe standard occlusal</td>
                                        <td><input type="radio" {{$xray->lowe_standard_occlusal == 'yes' ? 'checked' : '' }} id="lowe_standard_occlusal"
                                                name="lowe_standard_occlusal" value="yes"></td>
                                        <td><input type="radio" {{$xray->lowe_standard_occlusal == 'yes' ? 'checked' : '' }} id="lowe_standard_occlusal"
                                                name="lowe_standard_occlusal" value="no"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <h6>b)</h6>
                            <table class="table tab-bordered">
                                <thead>
                                    <tr>
                                        <td>Extra Oral Xray (please
                                            write down the site and
                                            angle </td>
                                        <td scope="row"><textarea name="extra_oral_xray" class="form-control"
                                                id="extra_oral_xray" cols="10" rows="10">{{ $xray->extra_oral_xray }}</textarea></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                    </tr>
                                </tbody>
                            </table>
                            <h6>c) IOPA</h6>
                            <img src="{{ asset('img/xray.jpg') }}" alt="" srcset="">
                            <p>1) IOPA <input type="text" name="IOPA1" id="IOPA1" value="{{isset($xray->IOPA1) ? $xray->IOPA1 : '' }}"></p>
                            <p>2) IOPA <input type="text" name="IOPA2" id="IOPA2" value="{{isset($xray->IOPA2) ? $xray->IOPA2 : '' }}"></p>
                            <p>3) IOPA <input type="text" name="IOPA3" id="IOPA3" value="{{isset($xray->IOPA3) ? $xray->IOPA3 : '' }}"></p>
                            <h6>d) Ultra sound Scan </h6>
                            <input type="text" class="form-control" value="{{isset($xray->ultra_sound_scan) ? $xray->ultra_sound_scan : '' }}" name="ultra_sound_scan" id="ultra_sound_scan">
                        </div>
                         
                        <a href="{{ asset(Storage::url(isset($xray->external_source) ? $xray->external_source : '')) }}">Download
                            Now</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@push('css')
<style>
    input {
        pointer-events: none;
        border: 1px solid #353c48 !important;
        border-style: dotted !important;
    }
</style>
@endpush

@push('js')

<script src="{{ asset('assets') }}/js/jQuery.print.min.js"></script>
<script>
    $("#print").on('click', function () {
        //Print ele4 with custom options
        $("#doc").print({
            //Use Global styles
            globalStyles: false,
            //Add link with attrbute media=print
            mediaPrint: false,
            //Custom stylesheet
            stylesheet: "{{ asset('assets') }}/css/app.min.css",
            //Print in a hidden iframe
            iframe: true,
            //Don't print this
            noPrintSelector: ".avoid-this",
            //Add this at top
            prepend: " ",
            //Add this on bottom
            append: "<span><br/> Bye!</span>",
            //Log to console when printing is done via a deffered callback
            deferred: $.Deferred().done(function () {
                console.log('Printing done', arguments);
            })
        });
    });

</script>
@endpush