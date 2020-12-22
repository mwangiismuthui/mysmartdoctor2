@extends('layouts.app',['pageTitle' => __(' lab Report Show')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' lab Report') }}
@endslot
@endcomponent
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __(' labReport') }}</div>
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
                                value="{{isset($labReport->name) ? $labReport->name : '' }}">
                            {!! $errors->first('name', '<p class="text-danger">:message</p>
                            ')
                            !!}
                            <div class="invalid-feedback"> What's your name?</div>
                        </div>
                        <div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
                            <label for="age" class="control-label">{{ __('Age') }}</label>
                            <input class="form-control" name="age" type="text" id="age"
                                value="{{isset($labReport->age) ? $labReport->age : '' }}">
                            {!! $errors->first('age', '<p class="text-danger">:message</p>')
                            !!}
                            <div class="invalid-feedback"> What's your age?</div>
                        </div>
                        <div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
                            <label for="sex" class="control-label">{{ __('Sex') }}</label>
                            <input class="form-control" name="sex" type="text" id="sex"
                                value="{{isset($labReport->sex) ? $labReport->sex : '' }}">
                            {!! $errors->first('sex', '<p class="text-danger">:messsex</p>')
                            !!}
                            <div class="invalid-feedback"> What's your sex?</div>
                        </div>

                        <div class="form-group {{ $errors->has('dr_name') ? 'has-error' : ''}}">
                            <label for="dr_name" class="control-label">{{ __('Dr Name') }}</label>
                            <input class="form-control" name="dr_name" type="text" id="dr_name"
                                value="{{isset($labReport->dr_name) ? $labReport->dr_name : '' }}">
                            {!! $errors->first('dr_name', '<p class="text-danger">:message
                            </p>')
                            !!}
                            <div class="invalid-feedback"> What's your dr name?</div>
                        </div>
                        <div class="form-group {{ $errors->has('registration_number') ? 'has-error' : ''}}">
                            <label for="registration_number"
                                class="control-label">{{ __('Medical council Registration Number') }}</label>
                            <input class="form-control" name="registration_number" type="text" id="registration_number"
                                value="{{isset($labReport->registration_number) ? $labReport->registration_number : '' }}">
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
                                value="{{isset($labReport->digital_signature) ? $labReport->digital_signature : '' }}">
                            {!! $errors->first('digital_signature', '<p class="text-danger">
                                :message</p>
                            ') !!}
                            <div class="invalid-feedback"> What's your Digital Signature?
                            </div>
                        </div>

                        <div
                                                        class="form-group">
                                                        <label for="digital_signature"
                                                            class="control-label">{{ __('Order lab Reports') }}</label>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Type</th>
                                                                    <th>Mark (X) 
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Fasting Blood Sugar 
                                                                    </td>
                                                                    <td><input type="text" name="FastingBloodSugar" value="{{ $labReport->FastingBloodSugar }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Random Blood Sugar</td>
                                                                    <td><input type="text" name="RandomBloodSugar"  value="{{ $labReport->RandomBloodSugar }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Post Prandial Blood Sugar
                                                                    </td>
                                                                    <td><input type="text" name="PostPrandialBloodSugar" value="{{ $labReport->PostPrandialBloodSugar }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Full blood Count

                                                                    </td>
                                                                    <td><input type="text" name="FullbloodCount" value="{{ $labReport->FullbloodCount }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Blood Group


                                                                    </td>
                                                                    <td><input type="text" name="BloodGroup" value="{{ $labReport->BloodGroup }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lipid profile 
                                                                    </td>
                                                                    <td><input type="text" name="Lipidprofile" value="{{ $labReport->Lipidprofile }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Serum electrolytes
                                                                    </td>
                                                                    <td><input type="text" name="Serumelectrolytes" value="{{ $labReport->Serumelectrolytes }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Liver Profile
                                                                    </td>
                                                                    <td><input type="text" name="LiverProfile" value="{{ $labReport->LiverProfile }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>UFR
                                                                    </td>
                                                                    <td><input type="text" name="UFR" value="{{ $labReport->UFR }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ESR
                                                                    </td>
                                                                    <td><input type="text" name="ESR" value="{{ $labReport->ESR }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>CRP
                                                                    </td>
                                                                    <td><input type="text" name="CRP" value="{{ $labReport->CRP }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>T3/T4/TSH
                                                                    </td>
                                                                    <td><input type="text" name="T3" value="{{ $labReport->T3 }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Urine Culture/ABST
                                                                    </td>
                                                                    <td><input type="text" name="UrineCulture" value="{{ $labReport->UrineCulture }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Stool culture/ABST 
                                                                    </td>
                                                                    <td><input type="text" name="Stoolculture" value="{{ $labReport->Stoolculture }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Serum Creatinine</td>
                                                                    <td><input type="text" name="SerumCreatinine" value="{{ $labReport->SerumCreatinine }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>BT/CT</td>
                                                                    <td><input type="text" name="BT" value="{{ $labReport->BT }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>PT/INR</td>
                                                                    <td><input type="text" name="PT" value="{{ $labReport->PT }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Clotting profile</td>
                                                                    <td><input type="text" name="Clottingprofile" value="{{ $labReport->Clottingprofile }}"></td>
                                                                </tr>
                                                                 
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <h5>Other lab Tests </h5>
                                                    <p>1) <input type="text" name="otherLabTest1" value="{{ $labReport->otherLabTest1 }}"> </p>
                                                    <p>2) <input type="text" name="otherLabTest2" value="{{ $labReport->otherLabTest2 }}"> </p>
                                                    <p>3) <input type="text" name="otherLabTest3" value="{{ $labReport->otherLabTest3 }}"> </p>
                         
                        <a href="{{ asset(Storage::url(isset($labReport->external_source) ? $labReport->external_source : '')) }}">Download
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