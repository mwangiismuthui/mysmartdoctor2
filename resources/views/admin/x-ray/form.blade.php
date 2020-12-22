<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ __('Name') }}</label>
    <input class="form-control" name="name" type="text" id="name"
        value="{{ isset($xray->name) ? $xray->name : old('name')}}" required>
    {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your name?</div>
</div>



<div class="col-4">
    <div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
        <label for="file" class="control-label">{{ __('file') }}</label><br>
        <input type='file' name="file" accept=".png, .jpg, .jpeg,.zip,.mp4" onchange="showMyImage(this,'file')"
            value="{{ isset($xray->file) ? $xray->file : old('image')}}">
        <input type='text' name="oldfile" value="{{ isset($xray->file) ? $xray->file : ''}}" hidden>
        <div class="avatar-upload">
            <div class="avatar-preview">
                <img id="file" class="avatar-preview"
                    src="{{ isset($xray->file) ? Storage::url($xray->file) : asset('upload.png')}}" alt="image" />
            </div>
        </div>
        {!! $errors->first('file', '<p class="text-danger">:message</p>') !!}
        <div class="invalid-feedback"> What's your file?</div>
    </div>
</div>

{{-- <div class="form-group {{ $errors->has('patient_id') ? 'has-error' : ''}}">
<label for="patient_id" class="control-label">{{ __('Patient Id') }}</label>
<input class="form-control" name="patient_id" type="number" id="patient_id"
    value="{{ isset($xray->patient_id) ? $xray->patient_id : old('patient_id')}}" required>
{!! $errors->first('patient_id', '<p class="text-danger">:message</p>') !!}
<div class="invalid-feedback"> What's your patient_id?</div>
</div> --}}


<div class="form-group">
    <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit"
        value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
</div>
