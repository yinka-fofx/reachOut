<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--custom css-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    <style>@import url('https://fonts.googleapis.com/css?family=Indie+Flower&display=swap');</style>
    <!--custom css-->


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
            <div class="container">

                    <a class="navbar-brand" href="{{ url('/') }}"><span style="font-family: 'Indie Flower', cursive; font-size: larger; font-weight:bolder;" >Reach</span><span class="secondSpan">Out</span></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                                    <li class="nav-item">
                                      <a class="nav-link active" href="/causes">Join a cause</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="#">Notifiction</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="#"></a>
                                    </li>



                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                            <li class="nav-item">
                                    <a class="nav-link" href="/causes/create">Create a post</a>
                            </li>

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

                        {{-- <li class="nav-item">
                            <a class="#" class="nav-link">Start a Cause</a>
                        </li>

                        <li class="nav-item">
                            <a class="#" class="nav-link">Notification</a>
                        </li> --}}

                        {{-- @if(Auth::user()->type !== 'user') --}}






                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/dashboard">Dashboard</a>
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

            @yield('content')
        </main>

    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#article-ckeditor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>
