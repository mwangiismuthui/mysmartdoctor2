<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ __('Name') }}</label>
    <input class="form-control" name="name" type="text" id="name"
        value="{{ isset($testimonial->name) ? $testimonial->name : old('name')}}" required>
    {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your name?</div>
</div>



<div class="col-4">
    <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
        <label for="image" class="control-label">{{ __('image') }}</label><br>
        <input type='file' name="image" accept=".png, .jpg, .jpeg,.zip,.mp4" onchange="showMyImage(this,'image')"
            value="{{ isset($testimonial->image) ? $testimonial->image : old('image')}}">
        <input type='text' name="oldimage" value="{{ isset($testimonial->image) ? $testimonial->image : ''}}" hidden>
        <div class="avatar-upload">
            <div class="avatar-preview">
                <img id="image" class="avatar-preview"
                    src="{{ isset($testimonial->image) ? Storage::url($testimonial->image) : asset('upload.png')}}"
                    alt="image" />
            </div>
        </div>
        {!! $errors->first('image', '<p class="text-danger">:message</p>') !!}
        <div class="invalid-feedback"> What's your image?</div>
    </div>
</div>




<div class="form-group {{ $errors->has('Description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ __('description') }}</label>
    <textarea name="description" cols="30" required class="form-control"
        rows="10">{{ isset($testimonial->description) ? $testimonial->description : old('image')}}</textarea>
    {!! $errors->first('description', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your description?</div>
</div>




<div class="form-group">
    <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit"
        value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
</div>
