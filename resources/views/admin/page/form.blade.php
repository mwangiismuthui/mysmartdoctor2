<div class="form-group {{ $errors->has('page_name') ? 'has-error' : ''}}">
    <label for="page_name" class="control-label">{{ __('Page Name') }}</label>
    <input class="form-control" name="page_name" type="text" id="page_name" readonly
        value="{{ isset($page->page_name) ? $page->page_name : old('page_name')}}" required>
    {!! $errors->first('page_name', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your page_name?</div>
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ __('Content') }}</label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="editor"
        required>{{ isset($page->content) ? $page->content : ''}}</textarea>
    {!! $errors->first('content', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your content?</div>
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit"
        value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
</div>

@push('js')
{{-- <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script> --}}
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script> --}}
<script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

</script>
{{-- <script>
    CKEDITOR.replace('editor');

</script> --}}
@endpush
