<div class="form-group {{ $errors->has('starting_time') ? 'has-error' : ''}}">
    <label for="starting_time" class="control-label">{{ __('Starting Time') }}</label>
    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="starting_time" type="time" id="starting_time" value="{{ isset($doctoravailable->starting_time) ? $doctoravailable->starting_time : old('starting_time')}}"  placeholder="{{ __('starting_time') }}" >

    {!! $errors->first('starting_time', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your starting_time?</div>
</div>
<div class="form-group {{ $errors->has('ending_time') ? 'has-error' : ''}}">
    <label for="ending_time" class="control-label">{{ __('Ending Time') }}</label>
    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="ending_time" type="time" id="ending_time" value="{{ isset($doctoravailable->ending_time) ? $doctoravailable->ending_time : old('ending_time')}}"  placeholder="{{ __('ending_time') }}" >

    {!! $errors->first('ending_time', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your ending_time?</div>
</div>
<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label">{{ __('Date') }}</label>
    <input class="form-control" name="date" type="date" id="date" value="{{ isset($doctoravailable->date) ? $doctoravailable->date : old('date')}}" >
    {!! $errors->first('date', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your date?</div>
</div>
<div class="form-group {{ $errors->has('doctor_id') ? 'has-error' : ''}}">
    <label for="doctor_id" class="control-label">{{ __('Doctor Id') }}</label>
    <input class="form-control" name="doctor_id" type="number" id="doctor_id" value="{{ isset($doctoravailable->doctor_id) ? $doctoravailable->doctor_id : old('doctor_id')}}" >
    {!! $errors->first('doctor_id', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your doctor_id?</div>
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit" value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
</div>
