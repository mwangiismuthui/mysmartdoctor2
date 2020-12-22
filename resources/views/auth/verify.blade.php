@extends('auth.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your phone number') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your phone number.') }}
                    </div>
                    @endif

                    {{ __('Before proceeding, please check your phone for a verification code.') }}
                    {{ __('If you did not receive the phone') }},
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    <form method="POST" action="{{ url('/sms/verify') }}">
                        @csrf
                        <label for="mobile_no">Mobile Number: <small><b></b></small>
                        </label>
                        <div class="form-group">
                            <select class="form-control" name="country_code" id="country-code">
                                <option  value="+94">Sri lanka <small>+94</small></option>
                                <option  value="+977">Nepal  <small>+977</small></option>
                                <option  value="+880">Bangladesh  <small>+880</small></option>
                                <option  value="+61">Australia  <small>+61</small></option>
                            </select>
                        </div>
                        <input type="text" name="mobile_no" placeholder="Enter Mobile no" id="mobile_no" class="form-control" required>
                        <label for="code">Code:</label>
                        <input type="number" name="code" id="code" class="form-control">
                        <button type="submit" class="btn btn-success mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
