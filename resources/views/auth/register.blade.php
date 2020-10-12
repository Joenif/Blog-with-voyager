@extends('layouts.admin')

@section('content')
    <div class="">
        <p class="text-md">Sign up below:</p>

        <form method="POST" action="{{ route('PostRegister') }}">
            @csrf

            <div class="form-group row" id="nameGroup">
                <label for="name" class="col-md-12 col-lg-4 col-form-label">{{ __('Name') }}</label>
                <div class="col-md-12 col-lg-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row" id="emailGroup">
                <label for="email" class="col-md-12 col-lg-4 col-form-label">{{ __('E-Mail Address') }}</label>
                <div class="col-md-12 col-lg-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row" id="PasswordGroup">
                <label for="password" class="col-md-12 col-lg-4 col-form-label">{{ __('Password') }}</label>

                <div class="col-md-12 col-lg-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-12 col-lg-4 col-form-label">{{ __('Confirm Password') }}</label>

                <div class="col-md-12 col-lg-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-block login-button">
                        <span class="signingin hidden"><span class="voyager-refresh"></span> Signing up...</span>
                        <span class="signin">Sign up</span>
                    </button>
                </div>
            </div>
        </form>

        <p>Already a member? <a href="{{ route('voyager.login') }}">Login here</a></p>
        
    </div>
@endsection
