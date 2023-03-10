<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRUD</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <nav class="navbar navbar-expand-md navbar-light sticky-top" style="background-color: yellow">
            <a class="navbar-brand" style="color: blue"href="{{ route('welcome') }}">CRUD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="{{ route('user.profile') }}">
                               Perfil
                            </a>
                            <a class="dropdown-item" href="{{ route('home') }}">
                                Usuarios
                             </a>
                        </div>
                    </li>
                @endguest

        </nav>

    </head>
    <body class="bg-dark">
        <div id="app" class="" >
            <h1 class="align-content-center" style="color: blue" align="center" >Coppel</h1>
            <div class="col-12">
                <div class="row align-items-center">
                    {{-- <crud /> --}}
                    <products />
                </div>
            </div>
        </div>

        <div class="container"></div>
        @include('partials.login')
    </body>
</html>
<script>
</script>
<style>
    h1{
        font-family: sans-serif;
        margin: auto auto;
        font-weight: 100;
        font-size: 8vw;
    }
    p {
        color: white;
    }
</style>
