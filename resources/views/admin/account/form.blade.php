<div class="row">
    <div class="{{Auth::user()->role == 'doctor' ? 'col-12' :'col-6'}} border p-3 m-1">
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
        <div class="form-group {{ $errors->has('account_holder_name') ? 'has-error' : ''}}">
            <label for="account_holder_name" class="control-label">{{ __('Account holder name') }}</label>
            <input class="form-control" name="account_holder_name" type="text" id="account_holder_name"
                value="{{ isset($account->account_holder_name) ? $account->account_holder_name : old('account_holder_name')}}" required>
            {!! $errors->first('account_holder_name', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your account holder name?</div>
        </div>
        <div class="form-group {{ $errors->has('bankAccountNumber') ? 'has-error' : ''}}">
            <label for="bankAccountNumber" class="control-label">{{ __('Bank account Number') }}</label>
            <input class="form-control" name="bankAccountNumber" type="text" id="bankAccountNumber"
                value="{{ isset($account->bankAccountNumber) ? $account->bankAccountNumber : old('bankAccountNumber')}}" required>
            {!! $errors->first('bankAccountNumber', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your Bank account Number?</div>
        </div>
        <div class="form-group {{ $errors->has('name_of_the_bank') ? 'has-error' : ''}}">
            <label for="name_of_the_bank" class="control-label">{{ __('Name of the bank ') }}</label>
            <input class="form-control" name="name_of_the_bank" type="text" id="name_of_the_bank"
                value="{{ isset($account->name_of_the_bank) ? $account->name_of_the_bank : old('name_of_the_bank')}}" required>
            {!! $errors->first('name_of_the_bank', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your Name of the bank ?</div>
        </div>
        <div class="form-group {{ $errors->has('branch') ? 'has-error' : ''}}">
            <label for="branch" class="control-label">{{ __('Branch') }}</label>
            <input class="form-control" name="branch" type="text" id="branch"
                value="{{ isset($account->branch) ? $account->branch : old('branch')}}" required>
            {!! $errors->first('branch', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your Branch?</div>
        </div>
    </div>
    <div class="col-5 border p-3 m-1" {{Auth::user()->role == 'doctor' ? 'hidden' :''}}>
        <label for="" class="">Payment Method</label>
        <div class="form-group {{ $errors->has('card') ? 'has-error' : ''}}">
            <label for="card" class="control-label">{{ __('Card') }}</label>
            <input class="form-control" name="card" type="text" id="card"
                value="{{ isset($account->card) ? $account->card : old('card')}}">
            {!! $errors->first('card', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your card?</div>
        </div>
        <div class="form-group {{ $errors->has('expiry_date') ? 'has-error' : ''}}">
            <label for="expiry_date" class="control-label">{{ __('Expiry Date') }}</label>
            <input class="form-control" name="expiry_date" type="date" id="expiry_date"
                value="{{ isset($account->expiry_date) ? $account->expiry_date : old('expiry_date')}}">
            {!! $errors->first('expiry_date', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your expiry_date?</div>
        </div>
    </div>
</div>

<div class="form-group m-1">
    <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit"
        value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
</div>
