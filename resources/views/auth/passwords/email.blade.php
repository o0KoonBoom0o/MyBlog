@extends('layouts.template')

@section('content')
<div class="auth-form" style="margin: 120px 0;">
    <h3>Reset Password</h3>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input placeholder="Email Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div>
            <button type="submit" class="btn btn-submit">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </form>
</div>
@endsection
