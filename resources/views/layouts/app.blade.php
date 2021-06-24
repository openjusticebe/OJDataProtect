<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', '') }}</title>

  <link rel="shortcut icon" type="image/png" href="/favicon.png"/>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">

          <img src="/logo_tiny.png" alt="" width="20px" height="20px">
          <span style="color:#415173;">Registr</span><span style="color:#ef7e24;">ability</span>

        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <a class="nav-link active" href="{{ route('dashboard') }}">Dashboard</a>
            </li>

            @if (Request::is('org-*') AND isset($organisation))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('organisation.show', ($organisation->slug)) }}">{{ $organisation->name }}</a>
              </li>
            @endif
            {{--
            <li class="nav-item">
            <a class="nav-link" href="#">process ???</a>
          </li> --}}


        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif
          @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fa fa-user-circle text-muted"></i> {{ Auth::user()->FullName }} <span class="caret"></span>
              </a>


              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/">My profile
                </a>
                <a class="dropdown-item" href="/">Documentation
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>



              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>

        @endguest
      </ul>
    </div>
  </div>
</nav>

<main class="py-4">
  <div id="app">

    @include('partials.errors_loop_inc')

    @yield('content')

  </div>

</main>
</div>

<footer class="footer">
  <div class="container text-center small">
    <p>An open-source product by <a href="https://openjustice.be" targe="_blank">OpenJustice.be</a> | Version 1.0 <br />
      Licensed with <a href="https://github.com/openjusticebe/registrability/blob/main/LICENSE" targe="_blank">GPL</a> | {{ date('Y') }} | <a href="https://github.com/openjusticebe/registrability" targe="_blank">Source code</a>
    </p>
  </div>
</footer>

<!-- Scripts -->
<script src="{{ mix('/js/app.js') }}" defer></script>

</body>
</html>
