<div class="form-group {{ $errors->has('fee') ? 'has-error' : ''}}">
    <label for="fee" class="control-label">{{ __('Fee') }}</label>
    <input class="form-control" name="fee" type="text" id="fee" value="{{ isset($bookingfee->fee) ? $bookingfee->fee : old('fee')}}" required>
    {!! $errors->first('fee', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your fee?</div>
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit" value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
</div>
