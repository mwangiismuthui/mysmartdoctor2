
    

    <div class="col-4">
        <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
            <label for="image" class="control-label">{{ __('image') }}</label><br>
            <input type='file' name="image" accept=".png, .jpg, .jpeg,.zip,.mp4" onchange="showMyImage(this,'image')"
                value="{{ isset($slider->image) ? $slider->image : old('image')}}">
            <input type='text' name="oldimage" value="{{ isset($slider->image) ? $slider->image : ''}}" hidden>
            <div class="avatar-upload">
                <div class="avatar-preview">
                    <img id="image" class="avatar-preview"
                        src="{{ isset($slider->image) ? Storage::url($slider->image) : asset('upload.png')}}"
                        alt="image" />
                </div>
            </div>
            {!! $errors->first('image', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your image?</div>
        </div>
    </div>

<div class="form-group {{ $errors->has('text') ? 'has-error' : ''}}">
    <label for="text" class="control-label">{{ __('Text') }}</label>
    <input class="form-control" name="text" type="text" id="text" value="{{ isset($slider->text) ? $slider->text : old('text')}}" >
    {!! $errors->first('text', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your text?</div>
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit" value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
</div>
