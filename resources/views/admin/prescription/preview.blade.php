<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title> download</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/app.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('assets') }}/img/favicon.ico' />
    <link rel="stylesheet" href="{{ asset('assets') }}/bundles/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/bundles/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/bundles/select2/dist/css/select2.min.css">

    {{-- <script src="{{ asset('assets') }}/bundles/datatables/datatables.min.css"></script> --}}
    <link rel="stylesheet"
        href="{{ asset('assets') }}/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

    @stack('css')

    <style>
        input:focus, textarea:focus, select:focus{
            outline: none;
        }
    </style>

</head>

<body>
<div class='row mt-5'>
<div class='col-md-2'></div>
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __(' Prescription') }}</div>
        <div class="card-body">

            <div class="d-flex justify-content-center">
                <div class="col-md-8">

                    {{-- <div hidden class="form-group {{ $errors->has('doctor_id') ? 'has-error' : ''}}">
                    <label for="doctor_id" class="control-label">{{ __('Doctor Id') }}</label>
                    <input class="form-control" name="doctor_id" type="number" id="doctor_id"
                        value="{{Auth::user()->doctor->id}}">
                    {!! $errors->first('doctor_id', '<p class="text-danger">:message</p>') !!}
                    <div class="invalid-feedback"> What's your doctor_id?</div>
                </div>
                <div hidden class="form-group {{ $errors->has('patient_id') ? 'has-error' : ''}}">
                    <label for="patient_id" class="control-label">{{ __('Patient Id') }}</label>
                    <input class="form-control" name="patient_id" type="number" id="patient_id"
                        value="{{ $prescription->patient_id}}">
                    {!! $errors->first('patient_id', '<p class="text-danger">:message</p>') !!}
                    <div class="invalid-feedback"> What's your patient_id?</div>
                </div> --}}
                <button class="btn btn-warning btn-sm" id="print" style="right: 0px;float: right;"><i class="feather-16"
                        data-feather="printer"></i>
                    {{ __(' Print') }}</button>
                <div id="doc">
                    <div class="">
                        <img src="{{ asset('frontEnd/img/doc_logo_sm.png') }}" class="w-25">
                    </div>
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        <label for="name" class="control-label">{{ __('Name') }}</label>
                        <input class="form-control" name="name" type="text" id="name"
                            value="{{isset($prescription->name) ? $prescription->name : '' }}">
                        {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
                        <div class="invalid-feedback"> What's your name?</div>
                    </div>
                    <div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
                        <label for="age" class="control-label">{{ __('Age') }}</label>
                        <input class="form-control" name="age" type="text" id="age"
                            value="{{isset($prescription->age) ? $prescription->age : '' }}">
                        {!! $errors->first('age', '<p class="text-danger">:message</p>') !!}
                        <div class="invalid-feedback"> What's your age?</div>
                    </div>
                    <div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
                        <label for="sex" class="control-label">{{ __('Sex') }}</label>
                        <input class="form-control" name="sex" type="text" id="sex"
                            value="{{isset($prescription->sex) ? $prescription->sex : '' }}">
                        {!! $errors->first('sex', '<p class="text-danger">:messsex</p>') !!}
                        <div class="invalid-feedback"> What's your sex?</div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
                                <label for="sex" class="control-label">{{ __('Drug name/brand/generic name') }}</label>
                                <input class="form-control" name="drug_name" type="text" id="drug_name"
                                    value="{{isset($prescription->drug_name) ? $prescription->drug_name : '' }}">
                                {!! $errors->first('drug_name', '<p class="text-danger">:message</p>') !!}
                                <div class="invalid-feedback"> What's your drug name?</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group {{ $errors->has('frequency') ? 'has-error' : ''}}">
                                <label for="sex" class="control-label">{{ __('Frequency') }}</label>
                                <input class="form-control" name="frequency" type="text" id="frequency"
                                    value="{{isset($prescription->frequency) ? $prescription->frequency : '' }}">
                                {!! $errors->first('frequency', '<p class="text-danger">:message</p>') !!}
                                <div class="invalid-feedback"> What's your frequency?</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group {{ $errors->has('allergy') ? 'has-error' : ''}}">
                                <label for="number_of_days"
                                    class="control-label">{{ __('number of days /weeks ') }}</label>
                                <input class="form-control" name="number_of_days" type="text" id="number_of_days"
                                    value="{{isset($prescription->number_of_days) ? $prescription->number_of_days : '' }}">
                                {!! $errors->first('number_of_days', '<p class="text-danger">:message</p>') !!}
                                <div class="invalid-feedback"> What's your number of days?</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div
                                class="form-group">

                                <input class="form-control" name="drug_name2"
                                    type="text" id="drug_name"
                                    value="{{isset($prescription->drug_name2) ? $prescription->drug_name2 : '' }}">
                                {!! $errors->first('drug_name2', '<p
                                    class="text-danger">
                                    :message</p>
                                ') !!}
                                <div class="invalid-feedback"> What's your drug name 2?
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div
                                class="form-group">
                                <input class="form-control" name="frequency2"
                                    type="text" id="frequency2"
                                    value="{{isset($prescription->frequency2) ? $prescription->frequency2 : '' }}">
                                {!! $errors->first('frequency2', '<p
                                    class="text-danger">
                                    :message</p>
                                ') !!}
                                <div class="invalid-feedback"> What's your frequency?
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">

                                <input class="form-control" name="number_of_days2"
                                    type="text" id="number_of_days2"
                                    value="{{isset($prescription->number_of_days2) ? $prescription->number_of_days2 : '' }}">
                                {!! $errors->first('number_of_days2', '<p
                                    class="text-danger">
                                    :message</p>') !!}
                                <div class="invalid-feedback"> What's your number of
                                    days?
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control" name="drug_name3"
                                    type="text" id="drug_name"
                                    value="{{isset($prescription->drug_name3) ? $prescription->drug_name3 : '' }}">
                                {!! $errors->first('drug_name3', '<p
                                    class="text-danger">
                                    :message</p>
                                ') !!}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control" name="frequency3"
                                    type="text" id="frequency2"
                                    value="{{isset($prescription->frequency3) ? $prescription->frequency3 : '' }}">
                                {!! $errors->first('frequency3', '<p
                                    class="text-danger">
                                    :message</p>
                                ') !!}

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control" name="number_of_days3"
                                    type="text" id="number_of_days3"
                                    value="{{isset($prescription->number_of_days3) ? $prescription->number_of_days3 : '' }}">
                                {!! $errors->first('number_of_days3', '<p
                                    class="text-danger">
                                    :message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control" name="drug_name4"
                                    type="text" id="drug_name"
                                    value="{{isset($prescription->drug_name4) ? $prescription->drug_name4 : '' }}">
                                {!! $errors->first('drug_name4', '<p
                                    class="text-danger">
                                    :message</p>
                                ') !!}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control" name="frequency4"
                                    type="text" id="frequency2"
                                    value="{{isset($prescription->frequency4) ? $prescription->frequency4 : '' }}">
                                {!! $errors->first('frequency4', '<p
                                    class="text-danger">
                                    :message</p>
                                ') !!}

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control" name="number_of_days4"
                                    type="text" id="number_of_days4"
                                    value="{{isset($prescription->number_of_days4) ? $prescription->number_of_days4 : '' }}">
                                {!! $errors->first('number_of_days4', '<p
                                    class="text-danger">
                                    :message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control" name="drug_name5"
                                    type="text" id="drug_name"
                                    value="{{isset($prescription->drug_name5) ? $prescription->drug_name5 : '' }}">
                                {!! $errors->first('drug_name5', '<p
                                    class="text-danger">
                                    :message</p>
                                ') !!}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control" name="frequency5"
                                    type="text" id="frequency2"
                                    value="{{isset($prescription->frequency5) ? $prescription->frequency5 : '' }}">
                                {!! $errors->first('frequency5', '<p
                                    class="text-danger">
                                    :message</p>
                                ') !!}

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control" name="number_of_days5"
                                    type="text" id="number_of_days5"
                                    value="{{isset($prescription->number_of_days5) ? $prescription->number_of_days5 : '' }}">
                                {!! $errors->first('number_of_days5', '<p
                                    class="text-danger">
                                    :message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control" name="drug_name6"
                                    type="text" id="drug_name"
                                    value="{{isset($prescription->drug_name6) ? $prescription->drug_name6 : '' }}">
                                {!! $errors->first('drug_name6', '<p
                                    class="text-danger">
                                    :message</p>
                                ') !!}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control" name="frequency6"
                                    type="text" id="frequency2"
                                    value="{{isset($prescription->frequency6) ? $prescription->frequency6 : '' }}">
                                {!! $errors->first('frequency6', '<p
                                    class="text-danger">
                                    :message</p>
                                ') !!}

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control" name="number_of_days6"
                                    type="text" id="number_of_days6"
                                    value="{{isset($prescription->number_of_days6) ? $prescription->number_of_days6 : '' }}">
                                {!! $errors->first('number_of_days5', '<p
                                    class="text-danger">
                                    :message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control" name="drug_name7"
                                    type="text" id="drug_name"
                                    value="{{isset($prescription->drug_name7) ? $prescription->drug_name7 : '' }}">
                                {!! $errors->first('drug_name7', '<p
                                    class="text-danger">
                                    :message</p>
                                ') !!}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control" name="frequency7"
                                    type="text" id="frequency2"
                                    value="{{isset($prescription->frequency7) ? $prescription->frequency7 : '' }}">
                                {!! $errors->first('frequency7', '<p
                                    class="text-danger">
                                    :message</p>
                                ') !!}

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control" name="number_of_days7"
                                    type="text" id="number_of_days7"
                                    value="{{isset($prescription->number_of_days7) ? $prescription->number_of_days7 : '' }}">
                                {!! $errors->first('number_of_days5', '<p
                                    class="text-danger">
                                    :message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('allergy') ? 'has-error' : ''}}">
                        <label for="allergy" class="control-label">{{ __('Allergy (Y  /N)') }}</label>
                        <input class="form-control" name="allergy" type="text" id="allergy"
                            value="{{isset($prescription->allergy) ? $prescription->allergy : '' }}">
                        {!! $errors->first('allergy', '<p class="text-danger">:message</p>') !!}
                        <div class="invalid-feedback"> What's your Allergy?</div>
                    </div>
                    <div class="form-group {{ $errors->has('instructions') ? 'has-error' : ''}}">
                        <label for="instructions" class="control-label">{{ __('Specific Instructions') }}</label>
                        <input class="form-control" name="instructions" type="text" id="instructions"
                            value="{{isset($prescription->instructions) ? $prescription->instructions : '' }}">
                        {!! $errors->first('instructions', '<p class="text-danger">:message</p>') !!}
                        <div class="invalid-feedback"> What's your instructions?</div>
                    </div>
                    <div class="form-group {{ $errors->has('dr_name') ? 'has-error' : ''}}">
                        <label for="dr_name" class="control-label">{{ __('Dr Name') }}</label>
                        <input class="form-control" name="dr_name" type="text" id="dr_name"
                            value="{{isset($prescription->dr_name) ? $prescription->dr_name : '' }}">
                        {!! $errors->first('dr_name', '<p class="text-danger">:message</p>') !!}
                        <div class="invalid-feedback"> What's your dr name?</div>
                    </div>
                    <div class="form-group {{ $errors->has('registration_number') ? 'has-error' : ''}}">
                        <label for="registration_number"
                            class="control-label">{{ __('Medical council Registration Number') }}</label>
                        <input class="form-control" name="registration_number" type="text" id="registration_number"
                            value="{{isset($prescription->registration_number) ? $prescription->registration_number : '' }}">
                        {!! $errors->first('registration_number', '<p class="text-danger">:message</p>') !!}
                        <div class="invalid-feedback"> What's your Registration Number?</div>
                    </div>
                    <div class="form-group {{ $errors->has('digital_signature') ? 'has-error' : ''}}">
                        <label for="digital_signature"
                            class="control-label">{{ __('Digital Signature /Frank') }}</label>
                        <input class="form-control" name="digital_signature" type="text" id="digital_signature"
                            value="{{isset($prescription->digital_signature) ? $prescription->digital_signature : '' }}">
                        {!! $errors->first('digital_signature', '<p class="text-danger">:message</p>') !!}
                        <div class="invalid-feedback"> What's your Digital Signature?</div>
                    </div>
                    @if (isset($prescription->prescription))
                    <div class="form-group {{ $errors->has('prescription') ? 'has-error' : ''}} ">
                        <label for="prescription" class="control-label">{{ __('Prescription Extra Doc') }}</label>
                        {{-- <textarea class="form-control" rows="5" name="prescription" type="textarea" id="prescription"
                            required>{{ isset($prescription->prescription) ? $prescription->prescription : ''}}</textarea>
                        --}}
                        <br>
                        <a
                            href="{{ asset(Storage::url(isset($prescription->prescription) ? $prescription->prescription : '')) }}">Download
                            Now</a>
                        {{-- <input type="file" name="prescription" class="form-control" id="prescription"
                            value="{{ isset($prescription->prescription) ? $prescription->prescription : ''}}">
                        {!! $errors->first('prescription', '<p class="text-danger">:message</p>') !!} --}}
                        <div class="invalid-feedback"> What's your prescription?</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<div class='col-md-2'></div>
</div>

<style>
    input {
        pointer-events: none;
        border: 1px solid #353c48 !important;
        border-style: dotted !important;
    }
</style>
  <script src="{{ asset('assets') }}/js/app.min.js"></script>
    <script src="{{ asset('assets') }}/bundles/jquery-selectric/jquery.selectric.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets') }}/js/page/index.js"></script>
    <!-- Template JS File -->
    <script src="{{ asset('assets') }}/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('assets') }}/js/custom.js"></script>
    <script src="{{ asset('assets') }}/bundles/izitoast/js/iziToast.min.js"></script>
    <script src="{{ asset('assets') }}/bundles/sweetalert/sweetalert.min.js"></script>
    <script src="{{ asset('assets') }}/bundles/select2/dist/js/select2.full.min.js"></script>
    <script src="{{ asset('assets') }}/bundles/datatables/datatables.min.js"></script>
    <script src="{{ asset('assets') }}/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>



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
</body>
