<div class="form-group {{ $errors->has('medication') ? 'has-error' : ''}}">
    <label for="medication" class="control-label">{{ __('Medication') }}</label>
    <textarea class="form-control" rows="5" name="medication" type="textarea" id="medication"
        required>{{ isset($medication->medication) ? $medication->medication : ''}}</textarea>
    {!! $errors->first('medication', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your medication?</div>
</div>
<div class="col-4">
    <div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
        <label for="file" class="control-label">{{ __('file') }}</label><br>
        <input type='file' name="file" accept=".png, .jpg, .jpeg,.zip,.mp4" onchange="showMyImage(this,'file')"
            value="{{ isset($medication->file) ? $medication->file : old('image')}}">
        <input type='text' name="oldfile" value="{{ isset($medication->file) ? $medication->file : ''}}" hidden>
        <div class="avatar-upload">
            <div class="avatar-preview">
                <img id="file" class="avatar-preview"
                    src="{{ isset($medication->file) ? Storage::url($medication->file) : asset('upload.png')}}"
                    alt="image" />
            </div>
        </div>
        {!! $errors->first('file', '<p class="text-danger">:message</p>') !!}
        <div class="invalid-feedback"> What's your file?</div>
    </div>
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit"
        value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
</div>
