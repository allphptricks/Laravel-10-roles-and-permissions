<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Simple Laravel 10 User Roles and Permissions - AllPHPTricks.com</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    AllPHPTricks.com
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                            @canany(['create-role', 'edit-role', 'delete-role'])
                                <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Roles</a></li>
                            @endcanany
                            @canany(['create-user', 'edit-user', 'delete-user'])
                                <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                            @endcanany
                            @canany(['create-product', 'edit-product', 'delete-product'])
                                <li><a class="nav-link" href="{{ route('products.index') }}">Manage Products</a></li>
                            @endcanany
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center mt-3">
                    <div class="col-md-12">
                        
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ $message }}
                            </div>
                        @endif

                        <h3 class="text-center mt-3 mb-3">Simple Laravel 10 User Roles and Permissions - <a href="https://www.allphptricks.com/">AllPHPTricks.com</a></h3>
                        @yield('content')
                        
                        <div class="row justify-content-center text-center mt-3">
                            <div class="col-md-12">
                                <p>Back to Tutorial: 
                                    <a href="https://www.allphptricks.com/simple-laravel-10-user-roles-and-permissions/"><strong>Tutorial Link</strong></a>
                                </p>
                                <p>
                                    For More Web Development Tutorials Visit: <a href="https://www.allphptricks.com/"><strong>AllPHPTricks.com</strong></a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
