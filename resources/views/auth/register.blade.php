@extends('layouts.template')

@section('content')
<div class="auth-form">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h3>Sign Up</h3>
        <div>
            <label for="name">{{ __('Name') }}</label>
            <input placeholder="Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div >
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
            <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
            <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div>
                <button type="submit" class="btn btn-submit">
                    {{ __('Register') }}
                </button>
        </div>
    </form>
</div>
@endsection
