@extends('layouts.app',['pageTitle' => __(' Medical certoficate Show')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Medical certoficate') }}
@endslot
@endcomponent
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __(' medical certoficate') }}</div>
        <div class="card-body">

            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    <button class="btn btn-warning btn-sm m-5" id="print" style="right: 0px;float: right;"><i
                            class="feather-16" data-feather="printer"></i>
                        {{ __(' Print') }}</button>
                    <div id="doc">
                        <div class="d-flex justify-content-center mb-5">
                            <img src="{{ asset('frontEnd/img/logo.png') }}" alt="">
                        </div>
                        <div class="d-flex justify-content-center mb-5">
                            <h3>MEDICAL CERTIFICATE</h3>
                        </div>

                        <div class="row">
                            
                            <div class="col-md-12 d-flex justify-content-end">
                                <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                                    <label for="Date" class="control-label">{{ __('Date') }}</label>
                                    <input class="form-control" name="Date" type="text" id="Date"
                                        value="{{isset($certoficate->Date) ? $certoficate->Date : '' }}" required>
                                    {!! $errors->first('Date', '<p class="text-danger">:message</p>')
                                    !!}
                                    <div class="invalid-feedback"> What's your Date?</div>
                                </div>
                            </div>
                        </div>
                            
                            <p>
                                <b class="d-flex justify-content-center mb-1">To whom it may concern</b><br>
                                This is to certify that -  <input type="text" name="text1"
                                    value="{{ $certoficate->text1 }}" id=""> is diagnosed today with
                                Following illness/conditions: (Patient full name and age)
                                <input type="text" name="fullName" value="{{ $certoficate->fullName }}" id="">
                                The examiner has advised that, for the sake of indivual’s overall health ,this person
                                should be allowed
                                absence from work/Job duties for below period .
                                --I recommend <input type="text" value="{{ $certoficate->days }}" name="days" id="">
                                days leave from <input type="text" name="starting_date"
                                    value="{{ $certoficate->starting_date }}" id="">.to <input type="text"
                                    value="{{ $certoficate->ending_date }}" name="ending_date" id="">.
                            </p>
                            <div class="form-group">
                                <h5>Doctor Details</h5>
                                <table class="table table-borderless">

                                    <tbody>
                                        <tr>
                                            <td scope="row">Name of Doctor
                                            </td>
                                            <td><input type="text" value="{{ $certoficate->doctor_name }}"
                                                    name="doctor_name" id=""></td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Qualification</td>
                                            <td><input type="text" value="{{ $certoficate->Qualification }}"
                                                    name="Qualification" id=""></td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Specialty</td>
                                            <td><input type="text" value="{{ $certoficate->Specialty }}"
                                                    name="Specialty" id=""></td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Medical council Regiatartion NO</td>
                                            <td><input type="text" value="{{ $certoficate->Regiatartion }}"
                                                    name="Regiatartion" id=""></td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Digital signature</td>
                                            <td><input type="text" value="{{ $certoficate->signature }}"
                                                    name="signature" id=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
        border: none;
        pointer-events: none;
        /* border: 1px solid #353c48 !important; */
        /* border-style: dotted !important; */
        /* border-bottom: 1px solid !important; */
        border-bottom: 1px dotted black;
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
            stylesheet: "{{ asset('assets') }}/css/appPrint.min.css",
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