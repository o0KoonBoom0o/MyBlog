@extends('layouts.template')
@section('title', "Blog")
@section('content')
<div class="auth-form">
    <form method="POST" action="{{ route('login') }}">
        <h3>Sign in</h3>
        @csrf
        <div>
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div>
            <label for="password">{{ __('Password') }}</label>
            <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="rememberme">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
        @if (Route::has('password.request'))
        <div class="forgetpassword">
            <a href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        </div>
        @endif
        <div>
            <button type="submit" class="btn btn-submit">
                {{ __('Login') }}
            </button>
        </div>
    </form>
</div>
@endsection
