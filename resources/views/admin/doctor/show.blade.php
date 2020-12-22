@extends('layouts.app',['pageTitle' => __(' Doctor Add')])
@push('css')
    <link rel="stylesheet" href="{{ asset('assets') }}/statics/main.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/jcrop/jquery.Jcrop.min.css">
    <script>
		var examples = [];
	</script>
@endpush
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Doctor') }}
@endslot
@endcomponent
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __(' Doctor') }}</div>
        <div class="card-body">
            {{--
            <a href="{{ url('/admin/doctor') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                    class="feather-16" data-feather="arrow-left"></i> {{ __(' Back') }}</button></a> --}}
            @if (Helper::authCheck('doctor-edit'))
            <a href="{{ url('/admin/doctor/' . $doctor->id . '/edit') }}" title="Edit"><button
                    class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i>
                    {{ __('Edit') }}</button></a>
            @endif

            @if (Helper::authCheck('doctor-delete'))
            <form method="POST" id="deleteButton{{$doctor->id}}" action="{{ url('admin/doctor' . '/' . $doctor->id) }}"
                accept-charset="UTF-8" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                    onclick="sweetalertDelete({{$doctor->id}})"><i class="feather-16" data-feather="trash-2"></i>
                    {{ __('Delete') }}</button>
            </form>
            @endif
            <br />
            <br />

            <div class="form-group {{ $errors->has('given_name') ? 'has-error' : ''}}">
                <label for="given_name" class="control-label">{{ __('Given Name') }}</label>
                <input class="form-control" name="given_name" type="text" id="given_name"
                    value="{{ isset($doctor->given_name) ? $doctor->given_name : old('given_name')}}" readonly>
                {!! $errors->first('given_name', '<p class="text-danger">:message</p>') !!}
                <div class="invalid-feedback"> What's your given name?</div>
            </div>
            <div class="form-group {{ $errors->has('family_name') ? 'has-error' : ''}}">
                <label for="family_name" class="control-label">{{ __('Family Name') }}</label>
                <input class="form-control" name="family_name" type="text" id="family_name"
                    value="{{ isset($doctor->family_name) ? $doctor->family_name : old('family_name')}}" readonly>
                {!! $errors->first('family_name', '<p class="text-danger">:message</p>') !!}
                <div class="invalid-feedback"> What's your family_name?</div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <label for="email" class="control-label">{{ __('Email') }}</label>
                <input class="form-control" name="email" type="email" id="email"
                    value="{{ isset($doctor->email) ? $doctor->email : old('email')}}" readonly>
                {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
                <div class="invalid-feedback"> What's your email?</div>
            </div>
            <div class="form-group {{ $errors->has('languages_spoken') ? 'has-error' : ''}}">
                <label for="languages_spoken" class="control-label">{{ __('Languages Spoken') }}</label>
                <textarea class="form-control" rows="5" name="languages_spoken" type="textarea" id="languages_spoken"
                    readonly>{{ isset($doctor->languages_spoken) ? $doctor->languages_spoken : ''}}</textarea>
                {!! $errors->first('languages_spoken', '<p class="text-danger">:message</p>') !!}
                <div class="invalid-feedback"> What's your languages_spoken?</div>
            </div>
            <div class="form-group {{ $errors->has('education') ? 'has-error' : ''}}">
                <label for="education" class="control-label">{{ __('Education') }}</label>
                <textarea class="form-control" rows="5" name="education" type="textarea" id="education"
                    readonly>{{ isset($doctor->education) ? $doctor->education : ''}}</textarea>
                {!! $errors->first('education', '<p class="text-danger">:message</p>') !!}
                <div class="invalid-feedback"> What's your education?</div>
            </div>
            <div class="form-group {{ $errors->has('mobile_no') ? 'has-error' : ''}}">
                <label for="mobile_no" class="control-label">{{ __('Mobile No') }}</label>
                <input class="form-control" name="mobile_no" type="number" id="mobile_no"
                    value="{{ isset($doctor->mobile_no) ? $doctor->mobile_no : old('mobile_no')}}" readonly>
                {!! $errors->first('mobile_no', '<p class="text-danger">:message</p>') !!}
                <div class="invalid-feedback"> What's your mobile no?</div>
            </div>
            <div class="form-group {{ $errors->has('alternative_mobile_no') ? 'has-error' : ''}}">
                <label for="alternative_mobile_no" class="control-label">{{ __('Alternative Mobile No') }}</label>
                <input class="form-control" name="alternative_mobile_no" type="number" id="alternative_mobile_no"
                    value="{{ isset($doctor->alternative_mobile_no) ? $doctor->alternative_mobile_no : old('alternative_mobile_no')}}"
                    readonly>
                {!! $errors->first('alternative_mobile_no', '<p class="text-danger">:message</p>') !!}
                <div class="invalid-feedback"> What's your alternative mobile no?</div>
            </div>
            <div class="form-group {{ $errors->has('private_practice_address') ? 'has-error' : ''}}">
                <label for="private_practice_address"
                    class="control-label">{{ __('Private Practice  Address') }}</label>
                <textarea class="form-control" rows="5" name="private_practice_address" type="textarea"
                    id="private_practice_address"
                    readonly>{{ isset($doctor->private_practice_address) ? $doctor->private_practice_address : ''}}</textarea>
                {!! $errors->first('private_practice _address', '<p class="text-danger">:message</p>') !!}
                <div class="invalid-feedback"> What's your private practice address?</div>
            </div>
            <div class="form-group">
                <label for="areas_Of_expertise"
                    class="control-label">{{ __('Areas Of expertise-     General dentist /Oral & Maxiilofacial surgeon/Implantalogist/paedoontcis /consultant Orthodontist /Restorative dental specialist /Community Dentist ') }}</label>

                <label for="areas_Of_expertise1" class="control-label"
                    style=" display: -webkit-inline-box;padding: 0px;">1.<input class="form-control"
                        name="areas_Of_expertise1"
                        value="{{ isset($doctor->areas_Of_expertise1) ? $doctor->areas_Of_expertise1 : old('areas_Of_expertise1')}}"
                        readonly type="text" id="areas_Of_expertise1" style=" margin-left: 21px;"></label><br>
                <label for="areas_Of_expertise2" class="control-label"
                    style=" display: -webkit-inline-box;padding: 0px;">2.<input class="form-control"
                        name="areas_Of_expertise2" readonly
                        value="{{ isset($doctor->areas_Of_expertise2) ? $doctor->areas_Of_expertise2 : old('areas_Of_expertise2')}}"
                        type="text" id="areas_Of_expertise2" style=" margin-left: 21px;"></label><br>
                <label for="areas_Of_expertise3" class="control-label"
                    style=" display: -webkit-inline-box;padding: 0px;">3.<input class="form-control"
                        value="{{ isset($doctor->areas_Of_expertise3) ? $doctor->areas_Of_expertise3 : old('areas_Of_expertise3')}}"
                        readonly name="areas_Of_expertise3" type="text" id="areas_Of_expertise3"
                        style=" margin-left: 21px;"></label>

            </div>
            <div class="form-group {{ $errors->has('qualification') ? 'has-error' : ''}}">
                <label for="qualification" class="control-label">{{ __('Qualification') }}</label>
                <textarea class="form-control" rows="5" name="qualification" type="textarea" id="qualification"
                    readonly>{{ isset($doctor->qualification) ? $doctor->qualification : ''}}</textarea>
                {!! $errors->first('qualification', '<p class="text-danger">:message</p>') !!}
                <div class="invalid-feedback"> What's your qualification?</div>
            </div>
            <div class="form-group {{ $errors->has('professional_experiences') ? 'has-error' : ''}}">
                <label for="professional_experiences" class="control-label">{{ __('Professional Experiences') }}</label>
                <textarea class="form-control" rows="5" name="professional_experiences" type="textarea"
                    id="professional_experiences"
                    readonly>{{ isset($doctor->professional_experiences) ? $doctor->professional_experiences : ''}}</textarea>
                {!! $errors->first('professional_experiences', '<p class="text-danger">:message</p>') !!}
                <div class="invalid-feedback"> What's your professional_experiences?</div>
            </div>

            <div class="form-group">
                <label for="medical_centers_that_you_are_parctsing"
                    class="control-label">{{ __('Hospital name /Medical Centers that you are parctsing  -   ') }}</label><br>

                <label for="medical_centers_that_you_are_parctsing1" class="control-label"
                    style=" display: -webkit-inline-box;padding: 0px;">1.<input class="form-control"
                        name="medical_centers_that_you_are_parctsing1"
                        value="{{ isset($doctor->medical_centers_that_you_are_parctsing1) ? $doctor->medical_centers_that_you_are_parctsing1 : old('medical_centers_that_you_are_parctsing1')}}"
                        readonly type="text" id="medical_centers_that_you_are_parctsing1"
                        style=" margin-left: 21px;"></label><br>
                <label for="medical_centers_that_you_are_parctsing2" class="control-label"
                    style=" display: -webkit-inline-box;padding: 0px;">2.<input class="form-control"
                        name="medical_centers_that_you_are_parctsing2"
                        value="{{ isset($doctor->medical_centers_that_you_are_parctsing2) ? $doctor->medical_centers_that_you_are_parctsing2 : old('medical_centers_that_you_are_parctsing2')}}"
                        readonly type="text" id="medical_centers_that_you_are_parctsing2"
                        style=" margin-left: 21px;"></label><br>
                <label for="medical_centers_that_you_are_parctsing3" class="control-label"
                    style=" display: -webkit-inline-box;padding: 0px;">3.<input class="form-control"
                        name="medical_centers_that_you_are_parctsing3"
                        value="{{ isset($doctor->medical_centers_that_you_are_parctsing3) ? $doctor->medical_centers_that_you_are_parctsing3 : old('medical_centers_that_you_are_parctsing3')}}"
                        readonly type="text" id="medical_centers_that_you_are_parctsing3"
                        style=" margin-left: 21px;"></label>

            </div>
            <div class="form-group">
                <label for="locations_that_you_are_practicing"
                    class="control-label">{{ __('Add the preference District /Regions/Locations  that you are practicing - ') }}</label><br>

                <label for="locations_that_you_are_practicing1" class="control-label"
                    style=" display: -webkit-inline-box;padding: 0px;">1.<input class="form-control"
                        name="locations_that_you_are_practicing1"
                        value="{{ isset($doctor->locations_that_you_are_practicing1) ? $doctor->locations_that_you_are_practicing1 : old('locations_that_you_are_practicing1')}}"
                        readonly type="text" id="locations_that_you_are_practicing1"
                        style=" margin-left: 21px;"></label><br>
                <label for="locations_that_you_are_practicing2" class="control-label"
                    style=" display: -webkit-inline-box;padding: 0px;">2.<input class="form-control"
                        name="locations_that_you_are_practicing2" readonly
                        value="{{ isset($doctor->locations_that_you_are_practicing2) ? $doctor->locations_that_you_are_practicing2 : old('locations_that_you_are_practicing2')}}"
                        type="text" id="locations_that_you_are_practicing2" style=" margin-left: 21px;"></label><br>
                <label for="locations_that_you_are_practicing3" class="control-label"
                    style=" display: -webkit-inline-box;padding: 0px;">3.<input class="form-control"
                        name="locations_that_you_are_practicing3"
                        value="{{ isset($doctor->locations_that_you_are_practicing3) ? $doctor->locations_that_you_are_practicing3 : old('locations_that_you_are_practicing3')}}"
                        readonly type="text" id="locations_that_you_are_practicing3"
                        style=" margin-left: 21px;"></label>

            </div>

            <div class="form-group {{ $errors->has('refereed_person') ? 'has-error' : ''}}">
                <label for="refereed_person" class="control-label">{{ __('Name of the refereed person') }}</label>
                <input class="form-control" name="refereed_person" type="text" id="refereed_person"
                    value="{{ isset($doctor->refereed_person) ? $doctor->refereed_person : old('refereed_person')}}"
                    readonly>
                {!! $errors->first('refereed_person', '<p class="text-danger">:message</p>') !!}
                <div class="invalid-feedback"> What's your refereed_person?</div>
            </div>
            <div class="form-group {{ $errors->has('refereed_person_mobile_number ') ? 'has-error' : ''}}">
                <label for="refereed_person_mobile_number "
                    class="control-label">{{ __('Mobile number (referred person) ') }}</label>
                <input class="form-control" name="refereed_person_mobile_number" type="number"
                    id="refereed_person_mobile_number "
                    value="{{ isset($doctor->refereed_person_mobile_number ) ? $doctor->refereed_person_mobile_number  : old('refereed_person_mobile_number ')}}"
                    readonly>
                {!! $errors->first('refereed_person_mobile_number ', '<p class="text-danger">:message</p>') !!}
                <div class="invalid-feedback"> What's your refereed_person_mobile_number ?</div>
            </div>
            <div class="form-group {{ $errors->has('passport') ? 'has-error' : ''}}">
                <label for="passport"
                    class="control-label">{{ __('NIC or passport No                                       ') }}</label>
                <input class="form-control" name="passport" type="number" id="passport"
                    value="{{ isset($doctor->passport) ? $doctor->passport : old('passport')}}" readonly>
                {!! $errors->first('passport', '<p class="text-danger">:message</p>') !!}
                <div class="invalid-feedback"> What's your passport?</div>
            </div>
            <!-- Upload and crop -->


            <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
                <label for="image"
                    class="control-label">{{ __('Uplaod the passport size profile pict-  ') }}</label><br>
                <input type='text' name="oldimage" value="{{ isset($doctor->image) ? $doctor->image : ''}}" hidden>
                <div class="avatar-upload">
                    <div class="avatar-preview">
                        <img id="image" class="avatar-preview"
                            src="{{URL::to('/') .'/storage/uploads/'. $doctor->image}}"
                            alt="image" />
                    </div>
                </div>
                {!! $errors->first('image', '<p class="text-danger">:message</p>') !!}
                <div class="invalid-feedback"> What's your image?</div>
            </div>

            <div class="form-group {{ $errors->has('registration_no') ? 'has-error' : ''}}">
                <label for="registration_no" class="control-label">{{ __('Medical council Registration No
        ') }}</label>
                <input class="form-control" name="registration_no" type="number" id="registration_no"
                    value="{{ isset($doctor->registration_no) ? $doctor->registration_no : old('registration_no')}}"
                    readonly>
                {!! $errors->first('registration_no', '<p class="text-danger">:message</p>') !!}
                <div class="invalid-feedback"> What's your registration no?</div>
            </div>

            <div class="form-group {{ $errors->has('signature') ? 'has-error' : ''}}">
                <label for="signature" class="control-label">{{ __('Digital signature ') }}</label><br>
                <input type='file' name="signature" accept=".png, .jpg, .jpeg,.zip,.mp4" readonly
                    onchange="showMysignature(this,'signature')"
                    value="{{ isset($doctor->signature) ? $doctor->signature : old('signature')}}">
                <input type='text' name="oldsignature" value="{{ isset($doctor->signature) ? $doctor->signature : ''}}"
                    hidden>
                <div class="avatar-upload">
                    <div class="avatar-preview">
                        <img id="signature" class="avatar-preview"
                            src="{{ isset($doctor->signature) ? Storage::url($doctor->signature) : asset('upload.png')}}"
                            alt="signature" />
                    </div>
                </div>
                {!! $errors->first('signature', '<p class="text-danger">:message</p>') !!}
                <div class="invalid-feedback"> What's your signature?</div>
            </div>


            <div class="form-group {{ $errors->has('conditions') ? 'has-error' : ''}}">
                <label for="conditions" class="control-label"></label>
                <div class="pretty p-default" style=" display: -webkit-box;">
                    <input type="checkbox" name="conditions" readonly
                        {{ isset($doctor->conditions) ? $doctor->conditions=='on' ? 'checked' :'' : old('conditions')}}>
                    <div class="state p-primary" style="margin-left: 10px;">
                        <label>A agree to terms of conditions &amp; Privacy policy …….. Accepted or not accepted
                        </label>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<div id="popup" class="popup" style="display: none;">
    <div class="popup__body"><div class="js-img"></div></div>
    <div style="margin: 0 0 5px; text-align: center;">
        <div class="js-upload btn btn_browse btn_browse_small">Upload</div>
    </div>
</div>


@endsection

@push('js')
    <script src="{{ asset('assets/FileAPI/FileAPI.min.js')}}"></script>
	<script src="{{ asset('assets/FileAPI/jquery.fileapi.js')}}"></script>
	<script src="{{ asset('assets/jcrop/jquery.Jcrop.min.js')}}"></script>
	<script src="{{ asset('assets/statics/jquery.modal.js')}}"></script>


	<script>
		jQuery(function ($){
			var $blind = $('.splash__blind');


			// Init examples
			FileAPI.each(examples, function (fn){
				fn();
			});
		});
    </script>



@endpush
