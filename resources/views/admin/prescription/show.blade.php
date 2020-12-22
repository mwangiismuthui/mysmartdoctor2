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
                <button class="btn btn-warning btn-sm mb-5" id="print" style="right: 0px;float: right;"><i class="feather-16"
                        data-feather="printer"></i>
                    {{ __(' Print') }}</button>
                <div id="doc">
                    <div class="mb-5 ml-0" style="border: 2px; border-bottom-color: #228000">
                        <img src="{{ asset('frontEnd/img/doc_logo_sm.png') }}" class="w-25">
                    </div>
                    <hr>
                    <div>
                        <h4 class="text-primary text-lg">{!!isset($prescription->name) ? $prescription->name : 'N/A' !!}</h4>
                    </div>
                    <div class="">
                        <p class="">{{isset($prescription->age) ? $prescription->age : '' }}y {{isset($prescription->sex) ? $prescription->sex: ''}}</p>
                    </div>
                    <hr>
                    <div class="">
                        <p>Allergy Drug: {{isset($prescription->allergy) ? $prescription->allergy : 'None' }}</p>
                    </div>
                    <hr>
                    <h4 class="text-primary text-lg">RX Medications</h4>
                    <table class="table w-100 table-bordered table-inverse" style="border-color: #000000; -moz-border-bottom-colors: black">
                        <thead>
                            <tr>
                                <th>Medication</th>
                                <th>Dose</th>
                                <th>Frequency</th>
                                <th>No. of Days</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope='row'>{{$prescription->drug_name}}</td>
                                    <td>{{$prescription->drug_name}}</td>
                                    <td>{{$prescription->frequecy}}</td>
                                    <td>{{$prescription->number_of_days}}</td>
                                </tr>
                                <tr>
                                    <td scope='row'>{{$prescription->drug_name2}}</td>
                                    <td>{{$prescription->drug_name2}}</td>
                                    <td>{{$prescription->frequecy2}}</td>
                                    <td>{{$prescription->number_of_days2}}</td>
                                </tr>
                                <tr>
                                    <td scope='row'>{{$prescription->drug_name3}}</td>
                                    <td>{{$prescription->drug_name3}}</td>
                                    <td>{{$prescription->frequecy3}}</td>
                                    <td>{{$prescription->number_of_days3}}</td>
                                </tr>
                                <tr>
                                    <td scope='row'>{{$prescription->drug_name4}}</td>
                                    <td>{{$prescription->drug_name4}}</td>
                                    <td>{{$prescription->frequecy4}}</td>
                                    <td>{{$prescription->number_of_days4}}</td>
                                </tr>
                            </tbody>
                    </table>
                    <br>
                    <hr>
                    <h4 class="text-primary text-lg">Special Instructions</h4>
                    <div class="my-3">
                        <p>{{isset($prescription->instructions) ? $prescription->instructions : 'None' }}</p>
                    </div>
                    <hr>
                    <h4 class="text-primary text-lg">Dr Name & Medical council Registration Nu</h4>

                    <div>
                        <p><span>{{isset($prescription->dr_name) ? $prescription->dr_name : '' }}</span>{{isset($prescription->registration_number) ? $prescription->registration_number : 'N/A' }}</p>
                    </div>
                    <h4 class="text-primary text-lg">Digital Signature</h4>
                    <p>
                        {{isset($prescription->digital_signature) ? $prescription->digital_signature : '' }}
                    </p>
                    <hr>
                   <div class="mb-0">

                        Aussie medics Pvt ltd 54/2 C ,3 rd Lane, Hansagiri Road Gampha,Sri Lanka <br>
                        PV00214645<br>
                        Contact - 0777148715/0775566168<br>
                        E mail.support@doctoroncare.org<br>
                        More information visit -www.smartcaredental.org<br>

                   </div>

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
