<div class="row">
    <div class="col-6">
        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
            <label for="first_name" class="control-label">{{ __('First Name') }}</label>
            <input class="form-control" name="first_name" type="text" id="first_name"
                value="{{ isset($patient->first_name) ? $patient->first_name : old('first_name')}}" required>
            {!! $errors->first('first_name', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your first_name?</div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
            <label for="Surname" class="control-label">{{ __('Surname') }}</label>
            <input class="form-control" name="surname" type="text" id="surname"
                value="{{ isset($patient->surname) ? $patient->surname : old('surname')}}" required>
            {!! $errors->first('surname', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your Surname?</div>
        </div>
    </div>
</div>



<div class="form-group {{ $errors->has('parent_detail') ? 'has-error' : ''}}">
    <label for="parent_detail"
        class="control-label">{{ __('If the patient is child (Less than 16 years of age) please mention the guardian or parent details ') }}</label>
    <input class="form-control" name="parent_detail" type="text" id="parent_detail"
        value="{{ isset($patient->parent_detail) ? $patient->parent_detail : old('parent_detail')}}">
    {!! $errors->first('parent_detail', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your parent detail?</div>
</div>

<div class="row">
    <div class="col-4">
        <div class="form-group {{ $errors->has('parent_name') ? 'has-error' : ''}}">
            <label for="parent_name" class="control-label">{{ __(' parent/Guardian Name ') }}</label>
            <input class="form-control" name="parent_name" type="text" id="parent_name"
                value="{{ isset($patient->parent_name) ? $patient->parent_name : old('parent_name')}}">
            {!! $errors->first('parent_name', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your parent name?</div>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group {{ $errors->has('patient_DOB') ? 'has-error' : ''}}">
            <label for="patient_DOB" class="control-label">{{ __('DOB of the patient') }}</label>
            <input class="form-control" name="patient_DOB" type="text" id="patient_DOB"
                value="{{ isset($patient->patient_DOB) ? $patient->patient_DOB : old('patient_DOB')}}">
            {!! $errors->first('patient_DOB', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your patient DOB?</div>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group {{ $errors->has('patient_age') ? 'has-error' : ''}}">
            <label for="patient_age" class="control-label">{{ __('Age') }}</label>
            <input class="form-control" name="patient_age" type="text" id="patient_age"
                value="{{ isset($patient->patient_age) ? $patient->patient_age : old('patient_age')}}">
            {!! $errors->first('patient_age', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your patient age?</div>
        </div>
    </div>
</div>




<div class="form-group {{ $errors->has('patient_address') ? 'has-error' : ''}}">
    <label for="patient_address" class="control-label">{{ __('Address') }}</label>
    <input class="form-control" name="patient_address" type="text" id="patient_address"
        value="{{ isset($patient->patient_address) ? $patient->patient_address : old('patient_address')}}">
    {!! $errors->first('patient_address', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your patient address?</div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group {{ $errors->has('telephone_number') ? 'has-error' : ''}}">
            <label for="telephone_number" class="control-label">{{ __('Telephone number ') }}</label>
            <input class="form-control" name="telephone_number" type="text" id="telephone_number"
                value="{{ isset($patient->telephone_number) ? $patient->telephone_number : old('telephone_number')}}">
            {!! $errors->first('telephone_number', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your telephone number?</div>
        </div>
    </div>
    <div class="col">
        <div class="form-group {{ $errors->has('telephone_number2') ? 'has-error' : ''}}">
            <label for="telephone_number2" class="control-label">{{ __('Telephone number ') }}</label>
            <input class="form-control" name="telephone_number2" type="text" id="telephone_number2"
                value="{{ isset($patient->telephone_number2) ? $patient->telephone_number2 : old('telephone_number2')}}">
            {!! $errors->first('telephone_number2', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your telephone number2?</div>
        </div>
    </div>
</div>


<div class="form-group {{ $errors->has('telephone_number2') ? 'has-error' : ''}}">
    <label for="telephone_number2" class="control-label">{{ __('Reason for seeking dentist - ') }}</label>
    <div class="table-responsive">
        <table class="" border="1">
            <thead>
                <tr>
                    <td>Problem </td>
                    <td>Yes </td>
                    <td>No </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Back pain </td>
                    <td><input type="radio" value="yes"
                            {{ isset($patient->tooth_ache) ? $patient->tooth_ache == 'yes' ? 'checked' :'' : ''}}
                            class="table-input" name="tooth_ache"></td>
                    <td><input type="radio" value="no"
                            {{ isset($patient->tooth_ache) ? $patient->tooth_ache == 'no' ? 'checked' :'' : ''}}
                            class="table-input" name="tooth_ache"></td>
                </tr>
                <tr>
                    <td>Fever </td>
                    <td><input type="radio"
                            {{ isset($patient->joint_pain) ? $patient->joint_pain == 'yes' ? 'checked' :'' : ''}}
                            value="yes" class="table-input" name="joint_pain"></td>
                    <td><input type="radio"
                            {{ isset($patient->joint_pain) ? $patient->joint_pain == 'yes' ? 'checked' :'' : ''}}
                            value="no" class="table-input" name="joint_pain"></td>
                </tr>
                <tr>
                    <td>Normal check up </td>
                    <td><input type="radio"
                            {{ isset($patient->Bad_smell_from_mouth) ? $patient->Bad_smell_from_mouth == 'yes' ? 'checked' :'' : ''}}
                            value="yes" class="table-input" name="Bad_smell_from_mouth"></td>
                    <td><input type="radio"
                            {{ isset($patient->Bad_smell_from_mouth) ? $patient->Bad_smell_from_mouth == 'no' ? 'checked' :'' : ''}}
                            value="no" class="table-input" name="Bad_smell_from_mouth"></td>
                </tr>
                <tr>
                    <td>High blood pressure </td>
                    <td><input type="radio"
                            {{ isset($patient->wisdom_tooth) ? $patient->wisdom_tooth == 'yes' ? 'checked' :'' : ''}}
                            value="yes" class="table-input" name="wisdom_tooth"></td>
                    <td><input type="radio"
                            {{ isset($patient->wisdom_tooth) ? $patient->wisdom_tooth == 'no' ? 'checked' :'' : ''}}
                            value="no" class="table-input" name="wisdom_tooth"></td>
                </tr>
                <tr>
                    <td>Diabetes </td>
                    <td><input type="radio"
                            {{ isset($patient->gum_bleeding) ? $patient->gum_bleeding == 'yes' ? 'checked' :'' : ''}}
                            value="yes" class="table-input" name="gum_bleeding"></td>
                    <td><input type="radio"
                            {{ isset($patient->gum_bleeding) ? $patient->gum_bleeding == 'no' ? 'checked' :'' : ''}}
                            value="no" class="table-input" name="gum_bleeding"></td>
                </tr>
                <tr>
                    <td>Dental problem / tooth ache </td>
                    <td><input type="radio" value="yes"
                            {{ isset($patient->fell_down_and_injury_to_teeth) ? $patient->fell_down_and_injury_to_teeth == 'yes' ? 'checked' :'' : ''}}
                            class="table-input" name="fell_down_and_injury_to_teeth"></td>
                    <td><input type="radio" value="no"
                            {{ isset($patient->fell_down_and_injury_to_teeth) ? $patient->fell_down_and_injury_to_teeth == 'no' ? 'checked' :'' : ''}}
                            class="table-input" name="fell_down_and_injury_to_teeth"></td>
                </tr>
                <tr>
                    <td>Jaw pain/Joint pain </td>
                    <td><input type="radio"
                            {{ isset($patient->lump_in_the_mouth) ? $patient->lump_in_the_mouth == 'yes' ? 'checked' :'' : ''}}
                            value="yes" class="table-input" name="lump_in_the_mouth"></td>
                    <td><input type="radio"
                            {{ isset($patient->lump_in_the_mouth) ? $patient->lump_in_the_mouth == 'no' ? 'checked' :'' : ''}}
                            value="no" class="table-input" name="lump_in_the_mouth"></td>
                </tr>
                <tr>
                    <td>Wisdom tooth </td>
                    <td><input type="radio"
                            {{ isset($patient->referral_from_other_dentist) ? $patient->referral_from_other_dentist == 'yes' ? 'checked' :'' : ''}}
                            value="yes" class="table-input" name="referral_from_other_dentist"></td>
                    <td><input type="radio"
                            {{ isset($patient->referral_from_other_dentist) ? $patient->referral_from_other_dentist == 'no' ? 'checked' :'' : ''}}
                            value="no" class="table-input" name="referral_from_other_dentist"></td>
                </tr>
                {{-- <tr>
                    <td>Cavity /cavities </td>
                    <td><input type="radio" value="yes"
                            {{ isset($patient->cavity_cavities) ? $patient->cavity_cavities == 'yes' ? 'checked' :'' : ''}}
                class="table-input" name="cavity_cavities"></td>
                <td><input type="radio" value="no"
                        {{ isset($patient->cavity_cavities) ? $patient->cavity_cavities == 'no' ? 'checked' :'' : ''}}
                        class="table-input" name="cavity_cavities"></td>
                </tr>
                <tr>
                    <td>Need artificial teeth </td>
                    <td><input type="radio" value="yes"
                            {{ isset($patient->need_artificial_teeth) ? $patient->need_artificial_teeth == 'yes' ? 'checked' :'' : ''}}
                            class="table-input" name="need_artificial_teeth"></td>
                    <td><input type="radio" value="no"
                            {{ isset($patient->need_artificial_teeth) ? $patient->need_artificial_teeth == 'no' ? 'checked' :'' : ''}}
                            class="table-input" name="need_artificial_teeth"></td>
                </tr>
                <tr>
                    <td>Need dental implant </td>
                    <td><input type="radio"
                            {{ isset($patient->need_dental_implant) ? $patient->need_dental_implant == 'yes' ? 'checked' :'' : ''}}
                            value="yes" class="table-input" name="need_dental_implant"></td>
                    <td><input type="radio"
                            {{ isset($patient->need_dental_implant) ? $patient->need_dental_implant == 'no' ? 'checked' :'' : ''}}
                            value="no" class="table-input" name="need_dental_implant"></td>
                </tr>
                <tr>
                    <td>Ugly teeth </td>
                    <td><input type="radio"
                            {{ isset($patient->ugly_teeth) ? $patient->ugly_teeth == 'yes' ? 'checked' :'' : ''}}
                            value="yes" class="table-input" name="ugly_teeth"></td>
                    <td><input type="radio"
                            {{ isset($patient->ugly_teeth) ? $patient->ugly_teeth == 'no' ? 'checked' :'' : ''}}
                            value="no" class="table-input" name="ugly_teeth"></td>
                </tr>
                <tr>
                    <td>Discolored teeth </td>
                    <td><input type="radio"
                            {{ isset($patient->discolored_teeth) ? $patient->discolored_teeth == 'yes' ? 'checked' :'' : ''}}
                            value="yes" class="table-input" name="discolored_teeth"></td>
                    <td><input type="radio"
                            {{ isset($patient->discolored_teeth) ? $patient->discolored_teeth == 'no' ? 'checked' :'' : ''}}
                            value="no" class="table-input" name="discolored_teeth"></td>
                </tr>
                <tr>
                    <td>Fracture jaw </td>
                    <td><input type="radio"
                            {{ isset($patient->fracture_jaw) ? $patient->fracture_jaw == 'yes' ? 'checked' :'' : ''}}
                            value="yes" class="table-input" name="fracture_jaw"></td>
                    <td><input type="radio"
                            {{ isset($patient->fracture_jaw) ? $patient->fracture_jaw == 'no' ? 'checked' :'' : ''}}
                            value="no" class="table-input" name="fracture_jaw"></td>
                </tr> --}}
                <tr>
                    <td>Other (please specify) </td>
                    <td><input type="radio" value="yes"
                            {{ isset($patient->other_please_specify) ? $patient->other_please_specify == 'yes' ? 'checked' :'' : ''}}
                            class="table-input" name="other_please_specify"></td>
                    <td><input type="radio" value="no"
                            {{ isset($patient->other_please_specify) ? $patient->other_please_specify == 'no' ? 'checked' :'' : ''}}
                            class="table-input" name="other_please_specify"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="form-group {{ $errors->has('hospitalization') ? 'has-error' : ''}}">
    <label for="hospitalization"
        class="control-label">{{ __('Have you had any Any  serious hospitalization, operations or serious issue in the last 5 years ') }}</label>

    <div class="radio">
        <label><input type="radio"
                {{ isset($patient->hospitalization) ? $patient->hospitalization == 'yes' ? 'checked' :'' : ''}}
                value="yes" name="hospitalization" checked> Yes</label>
    </div>
    <div class="radio">
        <label><input type="radio"
                {{ isset($patient->hospitalization) ? $patient->hospitalization == 'no' ? 'checked' :'' : ''}}
                value="no" name="hospitalization"> No</label>
    </div>
    {!! $errors->first('hospitalization', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your parent address?</div>
</div>
<div class="form-group">
    <label for="hospitalization" class="control-label">{{ __('If yes please write down the name and  time that was diagnosed 

        Please mark yes if you having following conditions 
        ') }}</label>

</div>
<div class="form-group {{ $errors->has('telephone_number2') ? 'has-error' : ''}}">
    <label for="telephone_number2"
        class="control-label">{{ __('Mark if you have any of the below conditions before  - ') }}</label>
    <div class="table-responsive">
        <table class="" border="1">
            <thead>
                <tr>
                    <td>Problem </td>
                    <td>Yes </td>
                    <td>No </td>
                </tr>
            </thead>
            <tbody>
                {{-- <tr>
                    <td>Allergy </td>
                    <td><input type="radio"
                            {{ isset($patient->allergy) ? $patient->allergy == 'yes' ? 'checked' :'' : ''}} value="yes"
                class="table-input" name="allergy"></td>
                <td><input type="radio" {{ isset($patient->allergy) ? $patient->allergy == 'no' ? 'checked' :'' : ''}}
                        value="no" class="table-input" name="allergy"></td>
                </tr> --}}
                <tr>
                    <td>
                        Breathing problem (Asthma) </td>
                    <td><input type="radio" value="yes" class="table-input"
                            {{ isset($patient->breathing_problem) ? $patient->breathing_problem == 'yes' ? 'checked' :'' : ''}}
                            name="breathing_problem"></td>
                    <td><input type="radio" class="table-input"
                            {{ isset($patient->breathing_problem) ? $patient->breathing_problem == 'no' ? 'checked' :'' : ''}}
                            value="no" name="breathing_problem"></td>
                </tr>
                <tr>
                    <td>High blood pressure </td>
                    <td><input type="radio" value="yes"
                            {{ isset($patient->high_blood_pressure) ? $patient->high_blood_pressure == 'yes' ? 'checked' :'' : ''}}
                            class="table-input" name="high_blood_pressure"></td>
                    <td><input type="radio" value="no"
                            {{ isset($patient->high_blood_pressure) ? $patient->high_blood_pressure == 'no' ? 'checked' :'' : ''}}
                            class="table-input" name="high_blood_pressure"></td>
                </tr>
                <tr>
                    <td>Fever /Cough </td>
                    <td><input type="radio" value="yes"
                            {{ isset($patient->fever) ? $patient->fever == 'yes' ? 'checked' :'' : ''}}
                            class="table-input" name="fever"></td>
                    <td><input type="radio" value="no"
                            {{ isset($patient->fever) ? $patient->fever == 'no' ? 'checked' :'' : ''}}
                            class="table-input" name="fever"></td>
                </tr>
                <tr>
                    <td>Diabetes </td>
                    <td><input type="radio" value="yes"
                            {{ isset($patient->diabetes) ? $patient->diabetes == 'yes' ? 'checked' :'' : ''}}
                            class="table-input" name="diabetes"></td>
                    <td><input type="radio" value="no"
                            {{ isset($patient->diabetes) ? $patient->diabetes == 'no' ? 'checked' :'' : ''}}
                            class="table-input" name="diabetes"></td>
                </tr>
                <tr>
                    <td>Heart problems </td>
                    <td><input type="radio" value="yes"
                            {{ isset($patient->heart_problems) ? $patient->heart_problems == 'yes' ? 'checked' :'' : ''}}
                            class="table-input" name="heart_problems"></td>
                    <td><input type="radio" value="no"
                            {{ isset($patient->heart_problems) ? $patient->heart_problems == 'no' ? 'checked' :'' : ''}}
                            class="table-input" name="heart_problems"></td>
                </tr>
                <tr>
                    <td>Kidney problems </td>
                    <td><input type="radio" value="yes"
                            {{ isset($patient->kidney_problems) ? $patient->kidney_problems == 'yes' ? 'checked' :'' : ''}}
                            class="table-input" name="kidney_problems"></td>
                    <td><input type="radio" value="no"
                            {{ isset($patient->kidney_problems) ? $patient->kidney_problems == 'no' ? 'checked' :'' : ''}}
                            class="table-input" name="kidney_problems"></td>
                </tr>
                <tr>
                    <td>Bleeding problems </td>
                    <td><input type="radio" value="yes"
                            {{ isset($patient->bleeding_problems) ? $patient->bleeding_problems == 'yes' ? 'checked' :'' : ''}}
                            class="table-input" name="bleeding_problems"></td>
                    <td><input type="radio" value="no"
                            {{ isset($patient->bleeding_problems) ? $patient->bleeding_problems == 'no' ? 'checked' :'' : ''}}
                            class="table-input" name="bleeding_problems"></td>
                </tr>
                <tr>
                    <td>Epilepsy (Fit)</td>
                    <td><input type="radio"
                            {{ isset($patient->epilepsy) ? $patient->epilepsy == 'yes' ? 'checked' :'' : ''}}
                            value="yes" class="table-input" name="epilepsy"></td>
                    <td><input type="radio"
                            {{ isset($patient->epilepsy) ? $patient->epilepsy == 'no' ? 'checked' :'' : ''}} value="no"
                            class="table-input" name="epilepsy"></td>
                </tr>
                <tr>
                    <td>Gastro intestinal problem </td>
                    <td><input type="radio" value="yes"
                            {{ isset($patient->gastro_intestinal_problem) ? $patient->gastro_intestinal_problem == 'yes' ? 'checked' :'' : ''}}
                            class="table-input" name="gastro_intestinal_problem"></td>
                    <td><input type="radio" value="no"
                            {{ isset($patient->gastro_intestinal_problem) ? $patient->gastro_intestinal_problem == 'no' ? 'checked' :'' : ''}}
                            class="table-input" name="gastro_intestinal_problem"></td>
                </tr>

                <tr>
                    <td>Other</td>
                    <td><input type="radio" value="yes"
                            {{ isset($patient->other) ? $patient->other == 'yes' ? 'checked' :'' : ''}}
                            class="table-input" name="other"></td>
                    <td><input type="radio" value="no"
                            {{ isset($patient->other) ? $patient->other == 'no' ? 'checked' :'' : ''}}
                            class="table-input" name="other"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="form-group {{ $errors->has('weight') ? 'has-error' : ''}}">
    <label for="weight" class="control-label">{{ __('Weight') }}</label>
    <input class="form-control" name="weight" type="text" id="weight"
        value="{{ isset($patient->weight) ? $patient->weight : old('weight')}}">
    {!! $errors->first('weight', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your Weight ?</div>
</div>
<div class="form-group {{ $errors->has('height') ? 'has-error' : ''}}">
    <label for="height" class="control-label">{{ __('Height ') }}</label>
    <input class="form-control" name="height" type="text" id="height"
        value="{{ isset($patient->height) ? $patient->height : old('height')}}">
    {!! $errors->first('height', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your height ?</div>
</div>
<div class="form-group {{ $errors->has('blood_group') ? 'has-error' : ''}}">
    <label for="blood_group" class="control-label">{{ __('Blood group ') }}</label>
    <input class="form-control" name="blood_group" type="text" id="blood_group"
        value="{{ isset($patient->blood_group) ? $patient->blood_group : old('blood_group')}}">
    {!! $errors->first('blood_group', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your blood group ?</div>
</div>
<div class="form-group {{ $errors->has('smoking') ? 'has-error' : ''}}">
    <label for="smoking" class="control-label">{{ __('Smoking') }}</label>
    <li><label for="">Frequency – how much per day /Number of cigarettes per day </label>
        <input class="form-control" name="per_day" type="text" id="per_day"
            value="{{ isset($patient->per_day) ? $patient->per_day : old('per_day')}}">
    </li>
    <li><label for="">How long </label>
        <input class="form-control" name="how_long" type="text" id="how_long"
            value="{{ isset($patient->how_long) ? $patient->how_long : old('how_long')}}">
    </li>
</div>
<div class="form-group {{ $errors->has('smoking') ? 'has-error' : ''}}">
    <label for="smoking" class="control-label">{{ __('Alchol') }}</label>
    <li>
        <input name="ferquency" type="checkbox" id="ferquency" value=""
            {{ isset($patient->ferquency) ? $patient->ferquency == 'yes' ? 'checked' :'':''}}>
        <label for="ferquency">ferquency</label>
    </li>
    <li>
        <input name="daily_water" type="checkbox" id="daily_water" value=""
            {{ isset($patient->daily_water) ? $patient->daily_water == 'yes' ? 'checked' :'':''}}>
        <label for="daily_water">daily water</label>
    </li>
</div>
<div class="form-group {{ $errors->has('cholesterol') ? 'has-error' : ''}}">
    <label for="cholesterol" class="control-label">{{ __('Cholesterol') }}</label>
    <input class="form-control" name="cholesterol" type="text" id="cholesterol"
        value="{{ isset($patient->cholesterol) ? $patient->cholesterol : old('cholesterol')}}">
    {!! $errors->first('cholesterol', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your Cholesterol?</div>
</div>
<div class="form-group {{ $errors->has('blood_sugar') ? 'has-error' : ''}}">
    <label for="blood_sugar" class="control-label">{{ __('Blood sugar') }}</label>
    <input class="form-control" name="blood_sugar" type="text" id="blood_sugar"
        value="{{ isset($patient->blood_sugar) ? $patient->blood_sugar : old('blood_sugar')}}">
    {!! $errors->first('blood_sugar', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your blood sugar?</div>
</div>
<div class="form-group {{ $errors->has('blood_pressure') ? 'has-error' : ''}}">
    <label for="blood_pressure" class="control-label">{{ __('Blood pressure ') }}</label>
    <input class="form-control" name="blood_pressure" type="text" id="blood_pressure"
        value="{{ isset($patient->blood_pressure) ? $patient->blood_pressure : old('blood_pressure')}}">
    {!! $errors->first('blood_pressure', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your Blood pressure ?</div>
</div>
<div class="form-group {{ $errors->has('heart_rate') ? 'has-error' : ''}}">
    <label for="heart_rate" class="control-label">{{ __('Heart Rate') }}</label>
    <input class="form-control" name="heart_rate" type="text" id="heart_rate"
        value="{{ isset($patient->heart_rate) ? $patient->heart_rate : old('heart_rate')}}">
    {!! $errors->first('heart_rate', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your Heart Rate?</div>
</div>

<div class="form-group {{ $errors->has('Drugs ') ? 'has-error' : ''}}">
    <label for="Drugs  "
        class="control-label">{{ __('upload /Write down medication/Drugs  currently on   ') }}</label><br>
    <input type='file' name="Drugs" accept=".png, .jpg, .jpeg,.zip,.mp4" onchange="showMyImage(this,'Drugs  ')"
        value="{{ isset($patient->Drugs  ) ? $patient->Drugs   : old('Drugs')}}">
    <input type='text' name="oldDrugs" value="{{ isset($patient->Drugs  ) ? $patient->Drugs   : ''}}" hidden>
    <div class="avatar-upload">
        <div class="avatar-preview">
            <img id="Drugs" class="avatar-preview"
                src="{{ isset($patient->Drugs  ) ? Storage::url($patient->Drugs  ) : asset('upload.png')}}"
                alt="image" />
        </div>
    </div>
    {!! $errors->first('Drugs ', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your Drugs ?</div>
</div>
<div class="form-group {{ $errors->has('radilogy_views ') ? 'has-error' : ''}}">
    <label for="radilogy_views" class="control-label">{{ __('X ray and  Radilogy views') }}</label><br>
    <input type='file' name="radilogy_views" accept=".png, .jpg, .jpeg,.zip,.mp4"
        onchange="showMyImage(this,'radilogy_views')"
        value="{{ isset($patient->radilogy_views  ) ? $patient->radilogy_views   : old('radilogy_views')}}">
    <input type='text' name="oldRadilogy_views"
        value="{{ isset($patient->radilogy_views  ) ? $patient->radilogy_views   : ''}}" hidden>
    <div class="avatar-upload">
        <div class="avatar-preview">
            <img id="radilogy_views" class="avatar-preview"
                src="{{ isset($patient->radilogy_views  ) ? Storage::url($patient->radilogy_views  ) : asset('upload.png')}}"
                alt="image" />
        </div>
    </div>
    {!! $errors->first('radilogy_views ', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your radilogy views ?</div>
</div>

<div class="form-group">
    <label for="hospitalization" class="control-label">{{ __('If you want to send your pictuers to dentist please upload the pictuers 
        Instructions on how to get pictures ----------------------------   please see before uploading 
        
        
        Upload your pictuers according to the instructions above ( need to upload 8 views    - 1 – front full face 2 –front smile face  3    lateral or side view 4    upper teeth jaw open   5   Lower teeh jaw open 
        6   -  Right side ( jaw closed & teeth bite)    7       Left side  (Jaw closed&teeth bite )      8   front view teeth (Jaw closed & teeth bite) 
        ') }}</label>

    <img class="image-preview ml-5" src="{{ asset('parent.png') }}" alt="">
</div>

<div class="row">
    <div class="col-4">
        <div class="form-group {{ $errors->has('image1') ? 'has-error' : ''}}">
            <label for="image1" class="control-label">{{ __('image1') }}</label><br>
            <input type='file' name="image1" accept=".png, .jpg, .jpeg" onchange="showMyImage(this,'image1')"
                value="{{ isset($patient->image1) ? $patient->image1 : old('image1')}}">
            <input type='text' name="oldimage1" value="{{ isset($patient->image1) ? $patient->image1 : ''}}" hidden>
            <div class="avatar-upload">
                <div class="avatar-preview">
                    <img id="image1" class="avatar-preview"
                        src="{{ isset($patient->image1) ? Storage::url($patient->image1) : asset('upload.png')}}"
                        alt="image" />
                </div>
            </div>
            {!! $errors->first('image1', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your image1?</div>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group {{ $errors->has('image2') ? 'has-error' : ''}}">
            <label for="image2" class="control-label">{{ __('image2') }}</label><br>
            <input type='file' name="image2" accept=".png, .jpg, .jpeg,.zip,.mp4" onchange="showMyImage(this,'image2')"
                value="{{ isset($patient->image2) ? $patient->image2 : old('image2')}}">
            <input type='text' name="oldimage2" value="{{ isset($patient->image2) ? $patient->image2 : ''}}" hidden>
            <div class="avatar-upload">
                <div class="avatar-preview">
                    <img id="image2" class="avatar-preview"
                        src="{{ isset($patient->image2) ? Storage::url($patient->image2) : asset('upload.png')}}"
                        alt="image" />
                </div>
            </div>
            {!! $errors->first('image2', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your image2?</div>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group {{ $errors->has('image3') ? 'has-error' : ''}}">
            <label for="image3" class="control-label">{{ __('image3') }}</label><br>
            <input type='file' name="image3" accept=".png, .jpg, .jpeg,.zip,.mp4" onchange="showMyImage(this,'image3')"
                value="{{ isset($patient->image3) ? $patient->image3 : old('image3')}}">
            <input type='text' name="oldimage3" value="{{ isset($patient->image3) ? $patient->image3 : ''}}" hidden>
            <div class="avatar-upload">
                <div class="avatar-preview">
                    <img id="image3" class="avatar-preview"
                        src="{{ isset($patient->image3) ? Storage::url($patient->image3) : asset('upload.png')}}"
                        alt="image" />
                </div>
            </div>
            {!! $errors->first('image3', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your image3?</div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group {{ $errors->has('image4') ? 'has-error' : ''}}">
            <label for="image4" class="control-label">{{ __('image4') }}</label><br>
            <input type='file' name="image4" accept=".png, .jpg, .jpeg,.zip,.mp4" onchange="showMyImage(this,'image4')"
                value="{{ isset($patient->image4) ? $patient->image4 : old('image4')}}">
            <input type='text' name="oldimage4" value="{{ isset($patient->image4) ? $patient->image4 : ''}}" hidden>
            <div class="avatar-upload">
                <div class="avatar-preview">
                    <img id="image4" class="avatar-preview"
                        src="{{ isset($patient->image4) ? Storage::url($patient->image4) : asset('upload.png')}}"
                        alt="image" />
                </div>
            </div>
            {!! $errors->first('image4', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your image4?</div>
        </div>
    </div>
    <div class="col">
        <div class="form-group {{ $errors->has('image5') ? 'has-error' : ''}}">
            <label for="image5" class="control-label">{{ __('image5') }}</label><br>
            <input type='file' name="image5" accept=".png, .jpg, .jpeg,.zip,.mp4" onchange="showMyImage(this,'image5')"
                value="{{ isset($patient->image5) ? $patient->image5 : old('image5')}}">
            <input type='text' name="oldimage5" value="{{ isset($patient->image5) ? $patient->image5 : ''}}" hidden>
            <div class="avatar-upload">
                <div class="avatar-preview">
                    <img id="image5" class="avatar-preview"
                        src="{{ isset($patient->image5) ? Storage::url($patient->image5) : asset('upload.png')}}"
                        alt="image" />
                </div>
            </div>
            {!! $errors->first('image5', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your image5?</div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-4">
        <div class="form-group {{ $errors->has('image6') ? 'has-error' : ''}}">
            <label for="image6" class="control-label">{{ __('image6') }}</label><br>
            <input type='file' name="image6" accept=".png, .jpg, .jpeg,.zip,.mp4" onchange="showMyImage(this,'image6')"
                value="{{ isset($patient->image6) ? $patient->image6 : old('image6')}}">
            <input type='text' name="oldimage6" value="{{ isset($patient->image6) ? $patient->image6 : ''}}" hidden>
            <div class="avatar-upload">
                <div class="avatar-preview">
                    <img id="image6" class="avatar-preview"
                        src="{{ isset($patient->image6) ? Storage::url($patient->image6) : asset('upload.png')}}"
                        alt="image" />
                </div>
            </div>
            {!! $errors->first('image6', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your image6?</div>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group {{ $errors->has('image7') ? 'has-error' : ''}}">
            <label for="image7" class="control-label">{{ __('image7') }}</label><br>
            <input type='file' name="image7" accept=".png, .jpg, .jpeg,.zip,.mp4" onchange="showMyImage(this,'image7')"
                value="{{ isset($patient->image7) ? $patient->image7 : old('image7')}}">
            <input type='text' name="oldimage7" value="{{ isset($patient->image7) ? $patient->image7 : ''}}" hidden>
            <div class="avatar-upload">
                <div class="avatar-preview">
                    <img id="image7" class="avatar-preview"
                        src="{{ isset($patient->image7) ? Storage::url($patient->image7) : asset('upload.png')}}"
                        alt="image" />
                </div>
            </div>
            {!! $errors->first('image7', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your image7?</div>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group {{ $errors->has('image8') ? 'has-error' : ''}}">
            <label for="image8" class="control-label">{{ __('image8') }}</label><br>
            <input type='file' name="image8" accept=".png, .jpg, .jpeg,.zip,.mp4" onchange="showMyImage(this,'image8')"
                value="{{ isset($patient->image8) ? $patient->image8 : old('image8')}}">
            <input type='text' name="oldimage8" value="{{ isset($patient->image8) ? $patient->image8 : ''}}" hidden>
            <div class="avatar-upload">
                <div class="avatar-preview">
                    <img id="image8" class="avatar-preview"
                        src="{{ isset($patient->image8) ? Storage::url($patient->image8) : asset('upload.png')}}"
                        alt="image" />
                </div>
            </div>
            {!! $errors->first('image8', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your image8?</div>
        </div>
    </div>
</div>
<div class="border p-5">
    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        <label for="email" class="control-label">{{ __('Email ') }}</label>
        <input class="form-control" name="email" type="email" id="email"
            value="{{ isset($patient->user->email) ? $patient->user->email : old('email')}}" required>
        {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
        <div class="invalid-feedback"> What's your email?</div>
    </div>
    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
        <label for="password" class="control-label">{{ __('Password ') }}</label>
        <input class="form-control" name="password" type="password" id="password" value="" required>
        {!! $errors->first('password', '<p class="text-danger">:message</p>') !!}
        <div class="invalid-feedback"> What's your password?</div>
    </div>

    <div class="form-group">
        <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit"
            value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
    </div>

</div>
