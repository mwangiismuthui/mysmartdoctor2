<div class="row">
    <div class="col-6 border p-3 m-1">
        <div class="row">
            <div class="col form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                <label for="first_name" class="control-label">{{ __('First Name') }}</label>
                <input class="form-control" name="first_name" type="text" id="first_name"
                    value="{{ isset($account->first_name) ? $account->first_name : old('first_name')}}" required>
                {!! $errors->first('first_name', '<p class="text-danger">:message</p>') !!}
                <div class="invalid-feedback"> What's your first_name?</div>
            </div>
            <div class="col form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
                <label for="last_name" class="control-label">{{ __('Last Name') }}</label>
                <input class="form-control" name="last_name" type="text" id="last_name"
                    value="{{ isset($account->last_name) ? $account->last_name : old('last_name')}}" required>
                {!! $errors->first('last_name', '<p class="text-danger">:message</p>') !!}
                <div class="invalid-feedback"> What's your last_name?</div>
            </div>
        </div>
        <div class="form-group {{ $errors->has('street_address') ? 'has-error' : ''}}">
            <label for="street_address" class="control-label">{{ __('Street Address') }}</label>
            <textarea class="form-control" rows="5" name="street_address" type="textarea" id="street_address"
                required>{{ isset($account->street_address) ? $account->street_address : ''}}</textarea>
            {!! $errors->first('street_address', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your street_address?</div>
        </div>
        <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
            <label for="city" class="control-label">{{ __('City') }}</label>
            <input class="form-control" name="city" type="text" id="city"
                value="{{ isset($account->city) ? $account->city : old('city')}}" required>
            {!! $errors->first('city', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your city?</div>
        </div>
        <div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
            <label for="country" class="control-label">{{ __('Country') }}</label>
            <input class="form-control" name="country" type="text" id="country"
                value="{{ isset($account->country) ? $account->country : old('country')}}" required>
            {!! $errors->first('country', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your country?</div>
        </div>
        <div class="form-group {{ $errors->has('post_code') ? 'has-error' : ''}}">
            <label for="post_code" class="control-label">{{ __('Post Code') }}</label>
            <input class="form-control" name="post_code" type="text" id="post_code"
                value="{{ isset($account->post_code) ? $account->post_code : old('post_code')}}" required>
            {!! $errors->first('post_code', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your post_code?</div>
        </div>
        <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
            <label for="phone_number" class="control-label">{{ __('Phone Number') }}</label>
            <input class="form-control" name="phone_number" type="text" id="phone_number"
                value="{{ isset($account->phone_number) ? $account->phone_number : old('phone_number')}}" required>
            {!! $errors->first('phone_number', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your phone_number?</div>
        </div>
        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            <label for="email" class="control-label">{{ __('Email') }}</label>
            <input class="form-control" name="email" type="text" id="email"
                value="{{ isset($account->email) ? $account->email : old('email')}}" required>
            {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your email?</div>
        </div>
    </div>
    <div class="col-5 border p-3 m-1">
        <label for="" class="">Payment Method</label>
        <div class="form-group {{ $errors->has('card') ? 'has-error' : ''}}">
            <label for="card" class="control-label">{{ __('Card') }}</label>
            <input class="form-control" name="card" type="text" id="card"
                value="{{ isset($account->card) ? $account->card : old('card')}}" required>
            {!! $errors->first('card', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your card?</div>
        </div>
        <div class="form-group {{ $errors->has('expiry_date') ? 'has-error' : ''}}">
            <label for="expiry_date" class="control-label">{{ __('Expiry Date') }}</label>
            <input class="form-control" name="expiry_date" type="date" id="expiry_date"
                value="{{ isset($account->expiry_date) ? $account->expiry_date : old('expiry_date')}}" required>
            {!! $errors->first('expiry_date', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your expiry_date?</div>
        </div>
    </div>
</div>

<div class="form-group m-1">
    <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit"
        value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
</div>
