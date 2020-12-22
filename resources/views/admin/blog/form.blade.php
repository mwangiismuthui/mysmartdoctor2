<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ __('Name') }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($blog->name) ? $blog->name : old('name')}}" required>
    {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your name?</div>
</div>

    

    <div class="col-4">
        <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
            <label for="image" class="control-label">{{ __('image') }}</label><br>
            <input type='file' name="image" accept=".png, .jpg, .jpeg,.zip,.mp4" onchange="showMyImage(this,'image')"
                value="{{ isset($blog->image) ? $blog->image : old('image')}}">
            <input type='text' name="oldimage" value="{{ isset($blog->image) ? $blog->image : ''}}" hidden>
            <div class="avatar-upload">
                <div class="avatar-preview">
                    <img id="image" class="avatar-preview"
                        src="{{ isset($blog->image) ? Storage::url($blog->image) : asset('upload.png')}}"
                        alt="image" />
                </div>
            </div>
            {!! $errors->first('image', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your image?</div>
        </div>
    </div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ __('Description') }}</label>
    <textarea class="form-control" rows="5" id="editor" name="description" type="textarea" id="description" required>{{ isset($blog->description) ? $blog->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your description?</div>
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit" value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
</div>

@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

</script>
@endpush