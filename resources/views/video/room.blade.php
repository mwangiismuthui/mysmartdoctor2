@extends('layouts.app',['pageTitle' => __('Video chat')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __('Video chat') }}
@endslot
@endcomponent
<div class="container">
    <div class="card">
        <div class="card-head">
        </div>
        <div class="card-body">
            <div class="">
                <div class="">
                    <div class="d-flex justify-content-center">

                        <div class="col-md-12">

                            <div class="media">

                                <div id="media-div">
                                </div>
                            </div>
                            @if (Auth::user()->role != 'patient')
                            <div>

                                <div class="alert alert-success" id="sendAlert" role="alert">
                                    Message send!
                                </div>
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                            href="#pills-home" role="tab" aria-controls="pills-home"
                                            aria-selected="true">Message</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                            href="#pills-profile" role="tab" aria-controls="pills-profile"
                                            aria-selected="false">Prescription</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-xray-tab" data-toggle="pill" href="#pills-xray"
                                            role="tab" aria-controls="pills-xray" aria-selected="false">X Ray</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-labReport-tab" data-toggle="pill"
                                            href="#pills-labReport" role="tab" aria-controls="pills-labReport"
                                            aria-selected="false">Lab Report</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-referralForm-tab" data-toggle="pill"
                                            href="#pills-referralForm" role="tab" aria-controls="pills-referralForm"
                                            aria-selected="false"> Referral Form</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-CERTIFICATE-tab" data-toggle="pill"
                                            href="#pills-CERTIFICATE" role="tab" aria-controls="pills-CERTIFICATE"
                                            aria-selected="false"> MEDICAL CERTIFICATE</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                        aria-labelledby="pills-home-tab">
                                        <div class="d-flex justify-content-center">
                                            <div class="col-md-12">
                                                <form id="message-form">
                                                    @csrf

                                                    <input type="hidden" name="to" value="{{$_GET['to']}}">
                                                    <input type="hidden" name="from" value="{{$_GET['from']}}">
                                                    <div
                                                        class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
                                                        <label for="content"
                                                            class="control-label">{{ __('Message') }}</label>
                                                        <textarea class="form-control" rows="5" name="content"
                                                            type="textarea" id="message"
                                                            required>{{ isset($chat->content) ? $chat->content : ''}}</textarea>
                                                        {!! $errors->first('content', '<p class="text-danger">:message
                                                        </p>')
                                                        !!}

                                                    </div>
                                                    <button type="button" class="btn btn-success"
                                                        id="send">Send</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <div class="d-flex justify-content-center">
                                            <div class="col-md-12">
                                                <form method="POST" id="oneTimeSubmit"
                                                    action="{{ url('/admin/prescription') }}" accept-charset="UTF-8"
                                                    class="form-horizontal needs-validation" novalidate=""
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div hidden
                                                        class="form-group {{ $errors->has('doctor_id') ? 'has-error' : ''}}">
                                                        <label for="doctor_id"
                                                            class="control-label">{{ __('Doctor Id') }}</label>
                                                        <input class="form-control" name="doctor_id" type="number"
                                                            id="doctor_id" value="{{Auth::user()->doctor->id}}">
                                                        {!! $errors->first('doctor_id', '<p class="text-danger">:message
                                                        </p>
                                                        ') !!}
                                                        <div class="invalid-feedback"> What's your doctor_id?</div>
                                                    </div>
                                                    <div hidden
                                                        class="form-group {{ $errors->has('patient_id') ? 'has-error' : ''}}">
                                                        <label for="patient_id"
                                                            class="control-label">{{ __('Patient Id') }}</label>
                                                        <input class="form-control" name="patient_id" type="number"
                                                            id="patient_id" value="{{$_GET['to'] }}">
                                                        {!! $errors->first('patient_id', '<p class="text-danger">
                                                            :message
                                                        </p>') !!}
                                                        <div class="invalid-feedback"> What's your patient_id?</div>
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                                        <label for="name" class="control-label">{{ __('Name') }}</label>
                                                        <input class="form-control" name="name" type="text" id="name"
                                                            value="{{isset($prescription->name) ? $prescription->name : '' }}">
                                                        {!! $errors->first('name', '<p class="text-danger">:message</p>
                                                        ')
                                                        !!}
                                                        <div class="invalid-feedback"> What's your name?</div>
                                                    </div>
                                                    <div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
                                                        <label for="age" class="control-label">{{ __('Age') }}</label>
                                                        <input class="form-control" name="age" type="text" id="age"
                                                            value="{{isset($prescription->age) ? $prescription->age : '' }}">
                                                        {!! $errors->first('age', '<p class="text-danger">:message</p>')
                                                        !!}
                                                        <div class="invalid-feedback"> What's your age?</div>
                                                    </div>
                                                    <div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
                                                        <label for="sex" class="control-label">{{ __('Sex') }}</label>
                                                        <input class="form-control" name="sex" type="text" id="sex"
                                                            value="{{isset($prescription->sex) ? $prescription->sex : '' }}">
                                                        {!! $errors->first('sex', '<p class="text-danger">:messsex</p>')
                                                        !!}
                                                        <div class="invalid-feedback"> What's your sex?</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="sex"
                                                                    class="control-label">{{ __('Drug name/brand/generic name') }}</label>
                                                                <input class="form-control" name="drug_name" type="text"
                                                                    id="drug_name"
                                                                    value="{{isset($prescription->drug_name) ? $prescription->drug_name : '' }}">
                                                                {!! $errors->first('drug_name', '<p class="text-danger">
                                                                    :message</p>
                                                                ') !!}
                                                                <div class="invalid-feedback"> What's your drug name?
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="sex"
                                                                    class="control-label">{{ __('Frequency') }}</label>
                                                                <input class="form-control" name="frequency" type="text"
                                                                    id="frequency"
                                                                    value="{{isset($prescription->frequency) ? $prescription->frequency : '' }}">
                                                                {!! $errors->first('frequency', '<p class="text-danger">
                                                                    :message</p>
                                                                ') !!}
                                                                <div class="invalid-feedback"> What's your frequency?
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="number_of_days"
                                                                    class="control-label">{{ __('number of days /weeks ') }}</label>
                                                                <input class="form-control" name="number_of_days"
                                                                    type="text" id="number_of_days"
                                                                    value="{{isset($prescription->number_of_days) ? $prescription->number_of_days : '' }}">
                                                                {!! $errors->first('number_of_days', '<p
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
                                                            <div class="form-group">
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
                                                    <div>
                                                        <strong>MEDICATION LIST:</strong><br>
                                                        Chlorhexidine mouthwash 5ml<br>
                                                        Chlorhexidine mouthwash 5ml<br>
                                                        Chlorhexidine gluconate (oral rinse)<br>
                                                        Sensodyne toothpaste<br>
                                                        Thermoseal toothpaste<br>
                                                        Rexidin Mouth wash<br>
                                                        Omeprazole 20mg<br>
                                                        Pantaprozole 40mg<br>
                                                        Digine tablets<br>
                                                        Digine Syrup<br>
                                                        Gelusil Syrup<br>
                                                        Domperidone (Oral) 10mg<br>
                                                        DomperidoneSyrup 5ml<br>
                                                        Aluminium hydroxide 300 mg<br>
                                                        Magnesium hydroxide 25 mg<br>
                                                        Aluminium hydroxide 5ml<br>
                                                        Piriton (Chlorphenamine) 4mg<br>
                                                        Piriton (Chlorphenamine) 2mg<br>
                                                        Piriton Syrup(Chlorphenamine) 5ml<br>
                                                        Piriton syrup (Chlorphenamine) 2.5ml<br>
                                                        Cefuroxime(oral) 500mg<br>
                                                        Cefuroxime(oral) 750mg<br>
                                                        Clindamycin 300mg<br>
                                                        Clindamycin 600mg<br>
                                                        Clindamycin 150mg<br>
                                                        Clindamycin Syrup 5ml<br>
                                                        Clindamycin Syrup 10ml<br>
                                                        Voltaren tablets 100mg<br>
                                                        Voltaren tablets 50mg<br>
                                                        Voltaren tablets 25mg<br>
                                                        Voltaren suppositories 100mg<br>
                                                        Voltaren suppositories 50mg<br>
                                                        Voltaren suppositories 25mg<br>
                                                        Augmentin (oral) 625mg<br>
                                                        Augmentin (oral) 3755mg<br>
                                                        Augmentin (oral suspension/Syrup) 5ml<br>
                                                        Augmentin (oral suspension/Syrup) 2.5ml<br>
                                                        ciprofloxacin (oral) 500mg<br>
                                                        ciprofloxacin (oral) 250mg<br>
                                                        Diclofenac Sodium(oral) 50mg<br>
                                                        Diclofenac Sodium(oral) 25mg<br>
                                                        Diclofenac Sodium(oral) 100mg<br>
                                                        Cataflam(oral) 50mg<br>
                                                        Paracetamol (oral suspension) 5ml<br>
                                                        Paracetamol (oral suspension) 2.5ml<br>
                                                        Paracetamol (Oral) 500mg<br>
                                                        Paracetamol (Oral) Ig<br>
                                                        Dexamethsone tablets(As a mouthwash) 0.5mg<br>
                                                        Dexamethsone tablets(As a mouthwash) 1 mg<br>
                                                        Dexamethsone tablets(As a mouthwash) 2 mg<br>
                                                        Dexamethasone (oral) 4mg<br>
                                                        Dexamethasone (oral) 8mg<br>
                                                        Nystatin(oral suspension) 100000Units<br>
                                                        Nystatin(oral suspension) 200000Units<br>
                                                        Nystatin(oral suspension) 400000Units<br>
                                                        Nystatin(oral suspension) 400000Units<br>
                                                        Kenalog cream /Gel<br>
                                                        BonJela Cream/Gel<br>
                                                        Oraleez cream/Ointment<br>
                                                        Daktarin Oral gel<br>
                                                        Dentogel<br>
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('allergy') ? 'has-error' : ''}}">
                                                        <label for="allergy"
                                                            class="control-label">{{ __('Allergy (Y  /N)') }}</label>
                                                        <input class="form-control" name="allergy" type="text"
                                                            id="allergy"
                                                            value="{{isset($prescription->allergy) ? $prescription->allergy : '' }}">
                                                        {!! $errors->first('allergy', '<p class="text-danger">:message
                                                        </p>')
                                                        !!}
                                                        <div class="invalid-feedback"> What's your Allergy?</div>
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('instructions') ? 'has-error' : ''}}">
                                                        <label for="instructions"
                                                            class="control-label">{{ __('Specific Instructions') }}</label>
                                                        <input class="form-control" name="instructions" type="text"
                                                            id="instructions"
                                                            value="{{isset($prescription->instructions) ? $prescription->instructions : '' }}">
                                                        {!! $errors->first('instructions', '<p class="text-danger">
                                                            :message
                                                        </p>')
                                                        !!}
                                                        <div class="invalid-feedback"> What's your instructions?</div>
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('dr_name') ? 'has-error' : ''}}">
                                                        <label for="dr_name"
                                                            class="control-label">{{ __('Dr Name') }}</label>
                                                        <input class="form-control" name="dr_name" type="text"
                                                            id="dr_name"
                                                            value="{{isset($prescription->dr_name) ? $prescription->dr_name : '' }}">
                                                        {!! $errors->first('dr_name', '<p class="text-danger">:message
                                                        </p>')
                                                        !!}
                                                        <div class="invalid-feedback"> What's your dr name?</div>
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('registration_number') ? 'has-error' : ''}}">
                                                        <label for="registration_number"
                                                            class="control-label">{{ __('Medical council Registration Number') }}</label>
                                                        <input class="form-control" name="registration_number"
                                                            type="text" id="registration_number"
                                                            value="{{isset($prescription->registration_number) ? $prescription->registration_number : '' }}">
                                                        {!! $errors->first('registration_number', '<p
                                                            class="text-danger">
                                                            :message
                                                        </p>') !!}
                                                        <div class="invalid-feedback"> What's your Registration Number?
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('digital_signature') ? 'has-error' : ''}}">
                                                        <label for="digital_signature"
                                                            class="control-label">{{ __('Digital Signature /Frank') }}</label>
                                                        <input class="form-control" name="digital_signature" type="text"
                                                            id="digital_signature"
                                                            value="{{isset($prescription->digital_signature) ? $prescription->digital_signature : '' }}">
                                                        {!! $errors->first('digital_signature', '<p class="text-danger">
                                                            :message</p>
                                                        ') !!}
                                                        <div class="invalid-feedback"> What's your Digital Signature?
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('prescription') ? 'has-error' : ''}} ">
                                                        <label for="prescription"
                                                            class="control-label">{{ __('Prescription') }}</label>
                                                        {{-- <textarea class="form-control" rows="5" name="prescription" type="textarea" id="prescription"
                                                    required>{{ isset($prescription->prescription) ? $prescription->prescription : ''}}</textarea>
                                                        --}}
                                                        <input type="file" name="prescription" class="form-control"
                                                            id="prescription"
                                                            value="{{ isset($prescription->prescription) ? $prescription->prescription : ''}}">
                                                        {!! $errors->first('prescription', '<p class="text-danger">
                                                            :message
                                                        </p>')
                                                        !!}
                                                        <div class="invalid-feedback"> What's your prescription?</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input class="btn btn-primary btn-sm oneTimeSubmit"
                                                                type="submit" value="Save">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="submit"
                                                                class="btn btn-primary btn-sm oneTimeSubmit"
                                                                name="save_send" value="SAVE & SEND">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-xray" role="tabpanel"
                                        aria-labelledby="pills-xray-tab">
                                        <div class="d-flex justify-content-center">
                                            <div class="col-md-12">
                                                <form method="POST" id="oneTimeSubmit"
                                                    action="{{ url('/admin/xray/message') }}" accept-charset="UTF-8"
                                                    class="form-horizontal needs-validation" novalidate=""
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div hidden
                                                        class="form-group {{ $errors->has('doctor_id') ? 'has-error' : ''}}">
                                                        <label for="doctor_id"
                                                            class="control-label">{{ __('Doctor Id') }}</label>
                                                        <input class="form-control" name="doctor_id" type="number"
                                                            id="doctor_id" value="{{Auth::user()->doctor->id}}">
                                                        {!! $errors->first('doctor_id', '<p class="text-danger">:message
                                                        </p>
                                                        ') !!}
                                                        <div class="invalid-feedback"> What's your doctor_id?</div>
                                                    </div>
                                                    <div hidden
                                                        class="form-group {{ $errors->has('patient_id') ? 'has-error' : ''}}">
                                                        <label for="patient_id"
                                                            class="control-label">{{ __('Patient Id') }}</label>
                                                        <input class="form-control" name="patient_id" type="number"
                                                            id="patient_id" value="{{$_GET['to'] }}">
                                                        {!! $errors->first('patient_id', '<p class="text-danger">
                                                            :message
                                                        </p>') !!}
                                                        <div class="invalid-feedback"> What's your patient_id?</div>
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                                        <label for="name" class="control-label">{{ __('Name') }}</label>
                                                        <input class="form-control" name="name" type="text" id="name"
                                                            value="{{isset($prescription->name) ? $prescription->name : '' }}">
                                                        {!! $errors->first('name', '<p class="text-danger">:message</p>
                                                        ')
                                                        !!}
                                                        <div class="invalid-feedback"> What's your name?</div>
                                                    </div>
                                                    <div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
                                                        <label for="age" class="control-label">{{ __('Age') }}</label>
                                                        <input class="form-control" name="age" type="text" id="age"
                                                            value="{{isset($prescription->age) ? $prescription->age : '' }}">
                                                        {!! $errors->first('age', '<p class="text-danger">:message</p>')
                                                        !!}
                                                        <div class="invalid-feedback"> What's your age?</div>
                                                    </div>
                                                    <div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
                                                        <label for="sex" class="control-label">{{ __('Sex') }}</label>
                                                        <input class="form-control" name="sex" type="text" id="sex"
                                                            value="{{isset($prescription->sex) ? $prescription->sex : '' }}">
                                                        {!! $errors->first('sex', '<p class="text-danger">:messsex</p>')
                                                        !!}
                                                        <div class="invalid-feedback"> What's your sex?</div>
                                                    </div>

                                                    <div
                                                        class="form-group {{ $errors->has('dr_name') ? 'has-error' : ''}}">
                                                        <label for="dr_name"
                                                            class="control-label">{{ __('Dr Name') }}</label>
                                                        <input class="form-control" name="dr_name" type="text"
                                                            id="dr_name"
                                                            value="{{isset($prescription->dr_name) ? $prescription->dr_name : '' }}">
                                                        {!! $errors->first('dr_name', '<p class="text-danger">:message
                                                        </p>')
                                                        !!}
                                                        <div class="invalid-feedback"> What's your dr name?</div>
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('registration_number') ? 'has-error' : ''}}">
                                                        <label for="registration_number"
                                                            class="control-label">{{ __('Medical council Registration Number') }}</label>
                                                        <input class="form-control" name="registration_number"
                                                            type="text" id="registration_number"
                                                            value="{{isset($prescription->registration_number) ? $prescription->registration_number : '' }}">
                                                        {!! $errors->first('registration_number', '<p
                                                            class="text-danger">
                                                            :message
                                                        </p>') !!}
                                                        <div class="invalid-feedback"> What's your Registration Number?
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('digital_signature') ? 'has-error' : ''}}">
                                                        <label for="digital_signature"
                                                            class="control-label">{{ __('Digital Signature /Frank') }}</label>
                                                        <input class="form-control" name="digital_signature" type="text"
                                                            id="digital_signature"
                                                            value="{{isset($prescription->digital_signature) ? $prescription->digital_signature : '' }}">
                                                        {!! $errors->first('digital_signature', '<p class="text-danger">
                                                            :message</p>
                                                        ') !!}
                                                        <div class="invalid-feedback"> What's your Digital Signature?
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group {{ $errors->has('prescription') ? 'has-error' : ''}} ">
                                                        <label for="prescription"
                                                            class="control-label">{{ __('Order X rays') }}</label>
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
                                                                    <td><input type="radio" id="OPG" name="OPG"
                                                                            value="yes"></td>
                                                                    <td><input type="radio" id="OPG" name="OPG"
                                                                            value="no"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">cephalogram Lateral</td>
                                                                    <td><input type="radio" id="cephalogram_lateral"
                                                                            name="cephalogram_lateral" value="yes"></td>
                                                                    <td><input type="radio" id="cephalogram_lateral"
                                                                            name="cephalogram_lateral" value="no"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Upper Standard occlusal</td>
                                                                    <td><input type="radio" id="upper_standard_occlusal"
                                                                            name="upper_standard_occlusal" value="yes">
                                                                    </td>
                                                                    <td><input type="radio" id="upper_standard_occlusal"
                                                                            name="upper_standard_occlusal" value="no">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Lowe standard occlusal</td>
                                                                    <td><input type="radio" id="lowe_standard_occlusal"
                                                                            name="lowe_standard_occlusal" value="yes">
                                                                    </td>
                                                                    <td><input type="radio" id="lowe_standard_occlusal"
                                                                            name="lowe_standard_occlusal" value="no">
                                                                    </td>
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
                                                                    <td scope="row"><textarea name="extra_oral_xray"
                                                                            class="form-control" id="extra_oral_xray"
                                                                            cols="30" rows="10"></textarea></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <h6>c) IOPA</h6>
                                                        <img src="{{ asset('img/xray.jpg') }}" alt="" srcset="">
                                                        <p>1) IOPA <input type="text" name="IOPA1" id="IOPA1"></p>
                                                        <p>2) IOPA <input type="text" name="IOPA2" id="IOPA2"></p>
                                                        <p>3) IOPA <input type="text" name="IOPA3" id="IOPA3"></p>
                                                        <h6>d) Ultra sound Scan </h6>
                                                        <input type="text" class="form-control" name="ultra_sound_scan"
                                                            id="ultra_sound_scan">
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('external_source') ? 'has-error' : ''}} ">
                                                        <label for="external_source" class="control-label">{{ __('Up load your own
                                                            X ray (External
                                                            source)') }}</label>
                                                        <input type="file" name="external_source" class="form-control"
                                                            id="external_source"
                                                            value="{{ isset($prescription->prescription) ? $prescription->prescription : ''}}">
                                                        {!! $errors->first('prescription', '<p class="text-danger">
                                                            :message </p>')!!}
                                                        <div class="invalid-feedback"> What's your prescription?</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input class="btn btn-primary btn-sm oneTimeSubmit"
                                                                type="submit" value="Save">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="submit"
                                                                class="btn btn-primary btn-sm oneTimeSubmit"
                                                                name="save_send" value="SAVE & SEND">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-labReport" role="tabpanel"
                                        aria-labelledby="pills-labReport-tab">
                                        <div class="d-flex justify-content-center">
                                            <div class="col-md-12">
                                                <form method="POST" id="oneTimeSubmit"
                                                    action="{{ url('/admin/lab-report/message') }}"
                                                    accept-charset="UTF-8" class="form-horizontal needs-validation"
                                                    novalidate="" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div hidden
                                                        class="form-group {{ $errors->has('doctor_id') ? 'has-error' : ''}}">
                                                        <label for="doctor_id"
                                                            class="control-label">{{ __('Doctor Id') }}</label>
                                                        <input class="form-control" name="doctor_id" type="number"
                                                            id="doctor_id" value="{{Auth::user()->doctor->id}}">
                                                        {!! $errors->first('doctor_id', '<p class="text-danger">:message
                                                        </p>
                                                        ') !!}
                                                        <div class="invalid-feedback"> What's your doctor_id?</div>
                                                    </div>
                                                    <div hidden
                                                        class="form-group {{ $errors->has('patient_id') ? 'has-error' : ''}}">
                                                        <label for="patient_id"
                                                            class="control-label">{{ __('Patient Id') }}</label>
                                                        <input class="form-control" name="patient_id" type="number"
                                                            id="patient_id" value="{{$_GET['to'] }}">
                                                        {!! $errors->first('patient_id', '<p class="text-danger">
                                                            :message
                                                        </p>') !!}
                                                        <div class="invalid-feedback"> What's your patient_id?</div>
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                                        <label for="name" class="control-label">{{ __('Name') }}</label>
                                                        <input class="form-control" name="name" type="text" id="name"
                                                            value="{{isset($prescription->name) ? $prescription->name : '' }}">
                                                        {!! $errors->first('name', '<p class="text-danger">:message</p>
                                                        ')
                                                        !!}
                                                        <div class="invalid-feedback"> What's your name?</div>
                                                    </div>
                                                    <div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
                                                        <label for="age" class="control-label">{{ __('Age') }}</label>
                                                        <input class="form-control" name="age" type="text" id="age"
                                                            value="{{isset($prescription->age) ? $prescription->age : '' }}">
                                                        {!! $errors->first('age', '<p class="text-danger">:message</p>')
                                                        !!}
                                                        <div class="invalid-feedback"> What's your age?</div>
                                                    </div>
                                                    <div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
                                                        <label for="sex" class="control-label">{{ __('Sex') }}</label>
                                                        <input class="form-control" name="sex" type="text" id="sex"
                                                            value="{{isset($prescription->sex) ? $prescription->sex : '' }}">
                                                        {!! $errors->first('sex', '<p class="text-danger">:messsex</p>')
                                                        !!}
                                                        <div class="invalid-feedback"> What's your sex?</div>
                                                    </div>

                                                    <div
                                                        class="form-group {{ $errors->has('dr_name') ? 'has-error' : ''}}">
                                                        <label for="dr_name"
                                                            class="control-label">{{ __('Dr Name') }}</label>
                                                        <input class="form-control" name="dr_name" type="text"
                                                            id="dr_name"
                                                            value="{{isset($prescription->dr_name) ? $prescription->dr_name : '' }}">
                                                        {!! $errors->first('dr_name', '<p class="text-danger">:message
                                                        </p>')
                                                        !!}
                                                        <div class="invalid-feedback"> What's your dr name?</div>
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('registration_number') ? 'has-error' : ''}}">
                                                        <label for="registration_number"
                                                            class="control-label">{{ __('Medical council Registration Number') }}</label>
                                                        <input class="form-control" name="registration_number"
                                                            type="text" id="registration_number"
                                                            value="{{isset($prescription->registration_number) ? $prescription->registration_number : '' }}">
                                                        {!! $errors->first('registration_number', '<p
                                                            class="text-danger">
                                                            :message
                                                        </p>') !!}
                                                        <div class="invalid-feedback"> What's your Registration Number?
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
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
                                                                    <td><input type="text" name="FastingBloodSugar">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Random Blood Sugar</td>
                                                                    <td><input type="text" name="RandomBloodSugar"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Post Prandial Blood Sugar
                                                                    </td>
                                                                    <td><input type="text"
                                                                            name="PostPrandialBloodSugar"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Full blood Count

                                                                    </td>
                                                                    <td><input type="text" name="FullbloodCount"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Blood Group


                                                                    </td>
                                                                    <td><input type="text" name="BloodGroup"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lipid profile
                                                                    </td>
                                                                    <td><input type="text" name="Lipidprofile"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Serum electrolytes
                                                                    </td>
                                                                    <td><input type="text" name="Serumelectrolytes">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Liver Profile
                                                                    </td>
                                                                    <td><input type="text" name="LiverProfile"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>UFR
                                                                    </td>
                                                                    <td><input type="text" name="UFR"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ESR
                                                                    </td>
                                                                    <td><input type="text" name="ESR"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>CRP
                                                                    </td>
                                                                    <td><input type="text" name="CRP"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>T3/T4/TSH
                                                                    </td>
                                                                    <td><input type="text" name="T3"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Urine Culture/ABST
                                                                    </td>
                                                                    <td><input type="text" name="UrineCulture"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Stool culture/ABST
                                                                    </td>
                                                                    <td><input type="text" name="Stoolculture"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Serum Creatinine</td>
                                                                    <td><input type="text" name="SerumCreatinine"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>BT/CT</td>
                                                                    <td><input type="text" name="BT"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>PT/INR</td>
                                                                    <td><input type="text" name="PT"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Clotting profile</td>
                                                                    <td><input type="text" name="Clottingprofile"></td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <h5>Other lab Tests </h5>
                                                    <p>1) <input type="text" name="otherLabTest1"> </p>
                                                    <p>2) <input type="text" name="otherLabTest2"> </p>
                                                    <p>3) <input type="text" name="otherLabTest3"> </p>
                                                    <div
                                                        class="form-group {{ $errors->has('digital_signature') ? 'has-error' : ''}}">
                                                        <label for="digital_signature"
                                                            class="control-label">{{ __('Digital Signature /Frank') }}</label>
                                                        <input class="form-control" name="digital_signature" type="text"
                                                            id="digital_signature"
                                                            value="{{isset($prescription->digital_signature) ? $prescription->digital_signature : '' }}">
                                                        {!! $errors->first('digital_signature', '<p class="text-danger">
                                                            :message</p>
                                                        ') !!}
                                                        <div class="invalid-feedback"> What's your Digital Signature?
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('external_source') ? 'has-error' : ''}} ">
                                                        <label for="external_source" class="control-label">{{ __('Up load your own
                                                            X ray (External
                                                            source)') }}</label>
                                                        <input type="file" name="external_source" class="form-control"
                                                            id="external_source" value="">
                                                        {!! $errors->first('prescription', '<p class="text-danger">
                                                            :message </p>')!!}
                                                        <div class="invalid-feedback"> What's your prescription?</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input class="btn btn-primary btn-sm oneTimeSubmit"
                                                                type="submit" value="Save">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="submit"
                                                                class="btn btn-primary btn-sm oneTimeSubmit"
                                                                name="save_send" value="SAVE & SEND">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-referralForm" role="tabpanel"
                                        aria-labelledby="pills-referralForm-tab">
                                        <div class="d-flex justify-content-center">
                                            <div class="col-md-12">
                                                <form method="POST" id="oneTimeSubmit"
                                                    action="{{ url('/admin/referral/message') }}" accept-charset="UTF-8"
                                                    class="form-horizontal needs-validation" novalidate=""
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div hidden
                                                        class="form-group {{ $errors->has('doctor_id') ? 'has-error' : ''}}">
                                                        <label for="doctor_id"
                                                            class="control-label">{{ __('Doctor Id') }}</label>
                                                        <input class="form-control" name="doctor_id" type="number"
                                                            id="doctor_id" value="{{Auth::user()->doctor->id}}">
                                                        {!! $errors->first('doctor_id', '<p class="text-danger">:message
                                                        </p>
                                                        ') !!}
                                                        <div class="invalid-feedback"> What's your doctor_id?</div>
                                                    </div>
                                                    <div hidden
                                                        class="form-group {{ $errors->has('patient_id') ? 'has-error' : ''}}">
                                                        <label for="patient_id"
                                                            class="control-label">{{ __('Patient Id') }}</label>
                                                        <input class="form-control" name="patient_id" type="number"
                                                            id="patient_id" value="{{$_GET['to'] }}">
                                                        {!! $errors->first('patient_id', '<p class="text-danger">
                                                            :message
                                                        </p>') !!}
                                                        <div class="invalid-feedback"> What's your patient_id?</div>
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                                        <label for="name"
                                                            class="control-label">{{ __('Referral To [DOCTOR/CLINIC] NAME') }}</label>
                                                        <input class="form-control" name="DOCTOR_CLINIC_name"
                                                            type="text" id="name"
                                                            value="{{isset($prescription->name) ? $prescription->name : '' }}">
                                                        {!! $errors->first('name', '<p class="text-danger">:message</p>
                                                        ')
                                                        !!}
                                                        <div class="invalid-feedback"> What's your DOCTOR/CLINIC name?
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                                                        <label for="Date" class="control-label">{{ __('Date') }}</label>
                                                        <input class="form-control" name="Date" type="Date" id="Date"
                                                            value="{{isset($prescription->age) ? $prescription->age : '' }}"
                                                            required>
                                                        {!! $errors->first('Date', '<p class="text-danger">:message</p>
                                                        ')
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
                                                                    <td><input type="text" name="doctor_name" id="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Specialty</td>
                                                                    <td><input type="text" name="Specialty" id=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Practice hospital
                                                                    </td>
                                                                    <td><input type="text" name="Practice_hospital"
                                                                            id=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Email</td>
                                                                    <td><input type="email" name="email" id=""></td>
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
                                                                    <td><input type="text" name="patient_name" id="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Age</td>
                                                                    <td><input type="text" name="Age" id=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Contact Details
                                                                    </td>
                                                                    <td><input type="text" name="Contact_Details" id="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Reason for Referral
                                                                    </td>
                                                                    <td><input type="text" name="Reason_for_Referral"
                                                                            id=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Symptoms
                                                                    </td>
                                                                    <td><input type="text" name="Symptoms" id=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Present medication/Suggestions
                                                                    </td>
                                                                    <td><input type="text" name="Present_medication"
                                                                            id=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Past medication/Suggestions
                                                                    </td>
                                                                    <td><input type="text" name="past_medication" id="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Past Medical Diagnosis
                                                                    </td>
                                                                    <td><input type="text" name="Past_Medical_Diagnosis"
                                                                            id=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Relevant medical history/treatment
                                                                        offerd
                                                                    </td>
                                                                    <td><input type="text"
                                                                            name="Relevant_medical_history" id=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Medical Council Registration No
                                                                    </td>
                                                                    <td><input type="text"
                                                                            name="Medical_Council_Registration_No"
                                                                            id=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Digital signature/Frank
                                                                    </td>
                                                                    <td><input type="text" name="Digital_signature"
                                                                            id=""></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input class="btn btn-primary btn-sm oneTimeSubmit"
                                                                type="submit" value="Save">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="submit"
                                                                class="btn btn-primary btn-sm oneTimeSubmit"
                                                                name="save_send" value="SAVE & SEND">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-CERTIFICATE" role="tabpanel"
                                        aria-labelledby="pills-CERTIFICATE-tab">
                                        <div class="d-flex justify-content-center">
                                            <div class="col-md-12">
                                                <form method="POST" id="oneTimeSubmit"
                                                    action="{{ url('/admin/certificate/message') }}"
                                                    accept-charset="UTF-8" class="form-horizontal needs-validation"
                                                    novalidate="" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div hidden
                                                        class="form-group {{ $errors->has('doctor_id') ? 'has-error' : ''}}">
                                                        <label for="doctor_id"
                                                            class="control-label">{{ __('Doctor Id') }}</label>
                                                        <input class="form-control" name="doctor_id" type="number"
                                                            id="doctor_id" value="{{Auth::user()->doctor->id}}">
                                                        {!! $errors->first('doctor_id', '<p class="text-danger">:message
                                                        </p>
                                                        ') !!}
                                                        <div class="invalid-feedback"> What's your doctor_id?</div>
                                                    </div>
                                                    <div hidden
                                                        class="form-group {{ $errors->has('patient_id') ? 'has-error' : ''}}">
                                                        <label for="patient_id"
                                                            class="control-label">{{ __('Patient Id') }}</label>
                                                        <input class="form-control" name="patient_id" type="number"
                                                            id="patient_id" value="{{$_GET['to'] }}">
                                                        {!! $errors->first('patient_id', '<p class="text-danger">
                                                            :message
                                                        </p>') !!}
                                                        <div class="invalid-feedback"> What's your patient_id?</div>
                                                    </div>

                                                    <div
                                                        class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                                                        <label for="Date" class="control-label">{{ __('Date') }}</label>
                                                        <input class="form-control" name="Date" type="Date" id="Date"
                                                            value="{{isset($prescription->age) ? $prescription->age : '' }}"
                                                            required>
                                                        {!! $errors->first('Date', '<p class="text-danger">:message</p>
                                                        ')
                                                        !!}
                                                        <div class="invalid-feedback"> What's your Date?</div>
                                                    </div>
                                                    <p>
                                                        To whom it may concern
                                                        THIS IS TO CERTIFY THAT - <input type="text" name="text1" id="">
                                                        is diagnosed today with
                                                        Following illness/conditions: (Patient full name and age)
                                                        <input type="text" name="fullName" id="">
                                                        The examiner has advised that, for the sake of indivual’s
                                                        overall health ,this person should be allowed
                                                        absence from work/Job duties for below period .
                                                        --I recommend <input type="text" name="days" id=""> days leave
                                                        from <input type="text" name="starting_date" id="">.to <input
                                                            type="text" name="ending_date" id="">.
                                                    </p>
                                                    <div class="form-group">
                                                        <h5>Doctor Details</h5>
                                                        <table class="table">

                                                            <tbody>
                                                                <tr>
                                                                    <td scope="row">Name of Doctor
                                                                    </td>
                                                                    <td><input type="text" name="doctor_name" id="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Qualification</td>
                                                                    <td><input type="text" name="Qualification" id="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Specialty</td>
                                                                    <td><input type="text" name="Specialty" id=""></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Medical council Regiatartion NO</td>
                                                                    <td><input type="text" name="Regiatartion" id="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row">Digital signature</td>
                                                                    <td><input type="text" name="signature" id=""></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input class="btn btn-primary btn-sm oneTimeSubmit"
                                                                type="submit" value="Save">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="submit"
                                                                class="btn btn-primary btn-sm oneTimeSubmit"
                                                                name="save_send" value="SAVE & SEND">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            @endif
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
    /* #media-div {
        align-content: center;
    } */
    #media {
        width: 100%;
        /* Firefox */
        display: -moz-box;
        -moz-box-pack: center;
        -moz-box-align: center;
        /* Safari and Chrome */
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: center;
        /* W3C */
        display: box;
        box-pack: center;
        box-align: center;
    }

    /* .nav-item {
    padding: 13px;
    border: 1px solid;
    text-decoration: none;
}
div#nav-tab {
    padding: 20px;
} */
    #sendAlert {
        display: none
    }

</style>
@endpush

@push('js')
<script src="//media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>
<script>
    Twilio.Video.createLocalTracks({
        audio: true,
        video: {
            width: 300
        }
    }).then(function (localTracks) {
        return Twilio.Video.connect('{{ $accessToken }}', {
            name: '{{ $roomName }}',
            tracks: localTracks,
            video: {
                width: 300
            }
        });
    }).then(function (room) {
        console.log('Successfully joined a Room: ', room.name);

        room.participants.forEach(participantConnected);

        var previewContainer = document.getElementById(room.localParticipant.sid);
        if (!previewContainer || !previewContainer.querySelector('video')) {
            participantConnected(room.localParticipant);
        }

        room.on('participantConnected', function (participant) {
            console.log("Joining: ", participant.identity);
            participantConnected(participant);
        });

        room.on('participantDisconnected', function (participant) {
            console.log("Disconnected: ", participant.identity);
            participantDisconnected(participant);
        });
    });

    // additional functions will be added after this point

    function participantConnected(participant) {
        console.log('Participant "%s" connected', participant.identity);

        const div = document.createElement('div');
        div.id = participant.sid;
        div.setAttribute("style", "float: left; margin: 10px;");
        div.innerHTML = "<div style='clear:both'><h4>" + participant.identity + "</div>";

        participant.tracks.forEach(function (track) {
            trackAdded(div, track)
        });

        participant.on('trackAdded', function (track) {
            trackAdded(div, track)
        });
        participant.on('trackRemoved', trackRemoved);

        document.getElementById('media-div').appendChild(div);
    }

    function participantDisconnected(participant) {
        console.log('Participant "%s" disconnected', participant.identity);

        participant.tracks.forEach(trackRemoved);
        document.getElementById(participant.sid).remove();
    }

    function trackAdded(div, track) {
        div.appendChild(track.attach());
        var video = div.getElementsByTagName("video")[0];
        if (video) {
            video.setAttribute("style", "max-width:300px;");
        }
    }


    room.disconnect();

    toggleButtons();

</script>
<script>
    function trackRemoved(track) {
        track.detach().forEach(function (element) {
            element.remove()
        });
    }
    const leaveButton = document.getElementById("leave-button");
    leaveButton.addEventListener("click", onLeaveButtonClick);

    const onLeaveButtonClick = (event) => {
        room.localParticipant.tracks.forEach((publication) => {
            const track = publication.track;
            // stop releases the media element from the browser control
            // which is useful to turn off the camera light, etc.
            track.stop();
            const elements = track.detach();
            elements.forEach((element) => element.remove());
        });
    }

</script>
{{-- <script src="{{ asset('frontEnd') }}/js/jquery-2.2.4.min.js"></script> --}}

<script>
    $('#send').click(function (e) {
        e.preventDefault();
        var formValues = $('#message-form').serialize();

        $.post("/admin/chat", formValues, function (data) {
            // Display the returned data in browser
            // $("#result").html(data);
            $('#message').val('');
        $('#sendAlert').show();
        });
        

    });
    $('#preSend').click(function (e) {
        e.preventDefault();
        var formValues = $('#message-form').serialize();

        $.post("/admin/chat", formValues, function (data) {
            // Display the returned data in browser
            // $("#result").html(data);
            $('#message').val('');
        $('#sendAlert').show();
        });
        

    });
    jq
    // $("#message-form").on("submit", function (event) {
    //     event.preventDefault();


    // });

</script>
@endpush