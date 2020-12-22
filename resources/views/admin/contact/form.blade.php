<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ __('Name') }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($contact->name) ? $contact->name : old('name')}}" required>
    {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your name?</div>
</div>
<div class="form-group {{ $errors->has('mobile_number') ? 'has-error' : ''}}">
    <label for="mobile_number" class="control-label">{{ __('Mobile Number') }}</label>
    <input class="form-control" name="mobile_number" type="text" id="mobile_number" value="{{ isset($contact->mobile_number) ? $contact->mobile_number : old('mobile_number')}}" required>
    {!! $errors->first('mobile_number', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your mobile_number?</div>
</div>
<div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
    <label for="message" class="control-label">{{ __('Message') }}</label>
    <input class="form-control" name="message" type="text" id="message" value="{{ isset($contact->message) ? $contact->message : old('message')}}" required>
    {!! $errors->first('message', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your message?</div>
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit" value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
</div>
