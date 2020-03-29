<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="shortcut icon" href="{{asset('img/logo.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/MyStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/blog.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    <div class="navbar">
        <div class="nav">
          <div>
            <a href="/"><img src="{{asset('img/logo.svg')}}" alt=""></a>
          </div>
          <div class="nav-auth">
            @guest
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
              <div>
                  <a href="#" role="button">
                    {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                  </form>
              </div>
            @endguest
          </div>
        </div>
      </div>
    @yield('content')
    <div class="Footer">
        <div>
          Copyright 2020 All rights reserved. Boom's Blog<br />
          Create by Chanotai Krajeam <br />
          <a href="/">Home</a>
        </div>
      </div>
</body>
</html>