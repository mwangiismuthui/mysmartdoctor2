@extends('layouts.app',['pageTitle' => __(' referral Show')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' referral') }}
@endslot
@endcomponent
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __(' referral') }}</div>
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
                        <div
                            class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            <label for="name" class="control-label">{{ __('Referral To [DOCTOR/CLINIC] NAME') }}</label>
                            <input class="form-control" name="DOCTOR_CLINIC_name" type="text" id="name"
                                value="{{isset($referral->DOCTOR_CLINIC_name) ? $referral->DOCTOR_CLINIC_name : '' }}">
                            {!! $errors->first('name', '<p class="text-danger">:message</p>
                            ')
                            !!}
                            <div class="invalid-feedback"> What's your DOCTOR/CLINIC name?</div>
                        </div>
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                            <label for="Date" class="control-label">{{ __('Date') }}</label>
                            <input class="form-control" name="Date" type="Date" id="Date"
                                value="{{isset($referral->Date) ? $referral->Date : '' }}" required>
                            {!! $errors->first('Date', '<p class="text-danger">:message</p>')
                            !!}
                            <div class="invalid-feedback"> What's your Date?</div>
                        </div>
                        <div class="form-group">
                          <h5>Referring Doctor Details</h5>
                          <table class="table">
                              
                              <tbody>
                                  <tr>
                                      <td scope="row">Name of Doctor
                                    </td>
                                      <td><input type="text" value="{{ $referral->doctor_name }}" name="doctor_name" id=""></td> 
                                  </tr>
                                  <tr>
                                      <td scope="row">Specialty</td>
                                      <td><input type="text" name="Specialty" value="{{ $referral->Specialty }}" id=""></td> 
                                  </tr>
                                  <tr>
                                      <td scope="row">Practice hospital 
                                    </td>
                                      <td><input type="text" value="{{ $referral->Practice_hospital }}" name="Practice_hospital" id=""></td> 
                                  </tr>
                                  <tr>
                                      <td scope="row">Email</td>
                                      <td><input type="email" name="email" value="{{ $referral->email }}" id=""></td> 
                                  </tr>
                              </tbody>
                          </table>
                        </div>
                        <div class="form-group">
                          <h5>Patient Contact Details</h5>
                          <table class="table">
                              
                              <tbody>
                                  <tr>
                                      <td scope="row">FULL NAME (First and
                                        Family Name)
                                    </td>
                                      <td><input type="text" name="patient_name" value="{{ $referral->patient_name }}" id=""></td> 
                                  </tr>
                                  <tr>
                                      <td scope="row">Age</td>
                                      <td><input type="text" name="Age" value="{{ $referral->Age }}" id=""></td> 
                                  </tr>
                                  <tr>
                                      <td scope="row">Contact Details 
                                    </td>
                                      <td><input type="text" name="Contact_Details" value="{{ $referral->Contact_Details }}" id=""></td> 
                                  </tr>
                                  <tr>
                                      <td scope="row">Reason for Referral
                                    </td>
                                      <td><input type="text" name="Reason_for_Referral" value="{{ $referral->Reason_for_Referral }}" id=""></td> 
                                  </tr>
                                  <tr>
                                      <td scope="row">Symptoms
                                    </td>
                                      <td><input type="text" name="Symptoms" value="{{ $referral->Symptoms }}" id=""></td> 
                                  </tr>
                                  <tr>
                                      <td scope="row">Present medication/Suggestions
                                    </td>
                                      <td><input type="text" name="Present_medication" value="{{ $referral->Present_medication }}" id=""></td> 
                                  </tr>
                                  <tr>
                                      <td scope="row">Past medication/Suggestions
                                    </td>
                                      <td><input type="text" name="past_medication" value="{{ $referral->past_medication }}" id=""></td> 
                                  </tr>
                                  <tr>
                                      <td scope="row">Past Medical Diagnosis
                                    </td>
                                      <td><input type="text" name="Past_Medical_Diagnosis" value="{{ $referral->Past_Medical_Diagnosis }}" id=""></td> 
                                  </tr>
                                  <tr>
                                      <td scope="row">Relevant medical history/treatment offerd
                                    </td>
                                      <td><input type="text" name="Relevant_medical_history" value="{{ $referral->Relevant_medical_history }}" id=""></td> 
                                  </tr>
                                  <tr>
                                      <td scope="row">Medical Council Registration No
                                    </td>
                                      <td><input type="text" name="Medical_Council_Registration_No" value="{{ $referral->Medical_Council_Registration_No }}" id=""></td> 
                                  </tr>
                                  <tr>
                                      <td scope="row">Digital signature/Frank
                                    </td>
                                      <td><input type="text" name="Digital_signature" value="{{ $referral->Digital_signature }}" id=""></td> 
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