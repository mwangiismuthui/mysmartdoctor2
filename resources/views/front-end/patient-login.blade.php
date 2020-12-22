@extends('front-end.layouts.app',['pageTitle' => __('Patient Login')])
@section('content')
<main>
    <div id="hero_register">
        <div class="container margin_120_95">
            <div class="row">
                <!-- /col -->
                <div class="col-lg-6 offset-3">
                    <h1 class="offset-3 mb-5">Patient Login</h1>
                    <div class="box_form">
                        @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('error')}}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="username" tabindex="1" class="form-control" name="username"
                                    value="{{ old('username') }}" required>
                                {!! $errors->first('username', '<p class="text-danger">:message</p>') !!}
                                <div class="invalid-feedback">Please fill in your username</div>
                            </div>
                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                    {{-- <div class="float-right">
                                        @if (Route::has('password.request'))
                                        <a class="text-small" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div> --}}
                            </div>
                            <input id="password" type="password" tabindex="2" class="form-control  " name="password"
                                required>
                            {!! $errors->first('password', '<p class="text-danger">:message</p>') !!}
                            <div class="invalid-feedback"> please fill in your password </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">

                            <input class="custom-control-input" tabindex="3" type="checkbox" name="remember"
                                id="remember-me">

                            <label class="custom-control-label" for="remember-me">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Login
                        </button>
                    </div>
                    </form>
                    <p class="text-center link_bright">Do not have an account yet? <a href="{{ url('patient/signup', []) }}"><strong>Register now!</strong></a></p>
                </div>
            </div>
            </p>

            </form>
        </div>
        <!-- /box_form -->
    </div>
    <!-- /col -->
    </div>
    <!-- /row -->
    </div>
    <!-- /container -->
    </div>
    <!-- /hero_register -->
</main>
@endsection
@push('css')
<style>
    #seemore {
        display: none;
    }

</style>
@endpush
@push('js')
<script>
    $("#see").click(function () {
        $("#seemore").toggle();
    });

</script>
@endpush
