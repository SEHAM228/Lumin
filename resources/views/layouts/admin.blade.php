<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('fontawesome')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold font-italic fs-3" href="{{ url('/') }}" style="margin-left: -120px;" >
                <img src="/Capture.JPG"  class="rounded me-2" width="40" height="40">
                    {{ ('Lumin') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
              <search-component></search-component>
                   

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item fw-bold font-italic fs-5">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item fw-bold font-italic fs-5">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                       
                        <div class="mx-2">
                        <ul class="list-unstyled d-flex align-items-center" style="margin-top: 10px; margin-right: -100px;" >

       
     
   

                            <li class="nav-item dropdown" style="margin-top: 6px; margin-left: 200px;">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="fw-bold font-italic fs-5">{{ Auth::user()->name }}</span>
                                </a>
            
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
    <a id="navbarDropdownProfile" class="dropdown-item" href="{{route('profile.show')}}" >
    <span class="fw-bold font-italic fs-7">{{ __('Profile') }}</span>
    </a>
    <a id="navbarDropdownSettings" class="dropdown-item" href="">
    <span class="fw-bold font-italic fs-7">{{ __('Settings') }}</span>
    </a>
 
    <div class="dropdown-divider"></div>

    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <span class="fw-bold font-italic fs-7">{{ __('Logout') }}</span>
                                    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

</div>

                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <search-canvas>

        </search-canvas>

        <main class="py-4">
            @include('admin.alert')
            @yield('content')
        </main>
    </div>
    @vite('resources/js/app.js')
</body>
</html>
