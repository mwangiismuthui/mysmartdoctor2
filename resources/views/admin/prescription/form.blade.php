<div class="d-flex justify-content-center">
    <div class="col-md-8">
        <div hidden class="form-group {{ $errors->has('doctor_id') ? 'has-error' : ''}}">
            <label for="doctor_id" class="control-label">{{ __('Doctor Id') }}</label>
            <input class="form-control" name="doctor_id" type="number" id="doctor_id"
                value="{{Auth::user()->doctor->id}}">
            {!! $errors->first('doctor_id', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your doctor_id?</div>
        </div>
        <div hidden class="form-group {{ $errors->has('patient_id') ? 'has-error' : ''}}">
            <label for="patient_id" class="control-label">{{ __('Patient Id') }}</label>
            <input class="form-control" name="patient_id" type="number" id="patient_id"
                value="{{$_GET['patient_id'] }}">
            {!! $errors->first('patient_id', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your patient_id?</div>
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
                    <label for="number_of_days" class="control-label">{{ __('number of days /weeks ') }}</label>
                    <input class="form-control" name="number_of_days" type="text" id="number_of_days"
                        value="{{isset($prescription->number_of_days) ? $prescription->number_of_days : '' }}">
                    {!! $errors->first('number_of_days', '<p class="text-danger">:message</p>') !!}
                    <div class="invalid-feedback"> What's your number of days?</div>
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
            <label for="digital_signature" class="control-label">{{ __('Digital Signature /Frank') }}</label>
            <input class="form-control" name="digital_signature" type="text" id="digital_signature"
                value="{{isset($prescription->digital_signature) ? $prescription->digital_signature : '' }}">
            {!! $errors->first('digital_signature', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your Digital Signature?</div>
        </div>
        <div class="form-group {{ $errors->has('prescription') ? 'has-error' : ''}} ">
            <label for="prescription" class="control-label">{{ __('Prescription Extra Doc') }}</label>
            {{-- <textarea class="form-control" rows="5" name="prescription" type="textarea" id="prescription"
                required>{{ isset($prescription->prescription) ? $prescription->prescription : ''}}</textarea> --}}
            <input type="file" name="prescription" class="form-control" id="prescription"
                value="{{ isset($prescription->prescription) ? $prescription->prescription : ''}}">
            {!! $errors->first('prescription', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your prescription?</div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit"
                    value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
            </div>
            <div class="col-md-4">
                <input type="submit" class="btn btn-primary btn-sm oneTimeSubmit" name="save_send" id=""
                    value="SAVE & SEND">
            </div>
        </div>
    </div>
</div>
