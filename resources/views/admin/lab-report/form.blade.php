<div class="form-group {{ $errors->has('report_name') ? 'has-error' : ''}}">
    <label for="report_name" class="control-label">{{ __('Report Name') }}</label>
    <input class="form-control" name="report_name" type="text" id="report_name"
        value="{{ isset($labreport->report_name) ? $labreport->report_name : old('report_name')}}" required>
    {!! $errors->first('report_name', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your report_name?</div>
</div>



<div class="col-4">
    <div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
        <label for="file" class="control-label">{{ __('file') }}</label><br>
        <input type='file' name="file" accept=".png, .jpg, .jpeg,.zip,.mp4" onchange="showMyImage(this,'file')"
            value="{{ isset($labreport->file) ? $labreport->file : old('image')}}">
        <input type='text' name="oldfile" value="{{ isset($labreport->file) ? $labreport->file : ''}}" hidden>
        <div class="avatar-upload">
            <div class="avatar-preview">
                <img id="file" class="avatar-preview"
                    src="{{ isset($labreport->file) ? Storage::url($labreport->file) : asset('upload.png')}}"
                    alt="image" />
            </div>
        </div>
        {!! $errors->first('file', '<p class="text-danger">:message</p>') !!}
        <div class="invalid-feedback"> What's your file?</div>
    </div>
</div>

{{-- <div class="form-group {{ $errors->has('patient_id') ? 'has-error' : ''}}">
<label for="patient_id" class="control-label">{{ __('Patient Id') }}</label>
<input class="form-control" name="patient_id" type="number" id="patient_id"
    value="{{ isset($labreport->patient_id) ? $labreport->patient_id : old('patient_id')}}" required>
{!! $errors->first('patient_id', '<p class="text-danger">:message</p>') !!}
<div class="invalid-feedback"> What's your patient_id?</div>
</div> --}}


<div class="form-group">
    <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit"
        value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
</div>
