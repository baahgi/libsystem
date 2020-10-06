<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="h-screen antialiased leading-none bg-gray-100">
    <div id="app">
        <nav class="py-6 bg-blue-800 shadow">
            <div class="container px-6 mx-auto md:px-0">
                <div class="flex items-center justify-center">
                    <div class="mr-6">
                        <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                    <div class="flex-1 text-right">
                        {{-- @guest is for ppl not logedin with auhentication --}}
                        @guest
                            <a class="p-3 text-sm text-gray-300 no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="p-3 text-sm text-gray-300 no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                            {{-- // else implies u ve logged in --}}
                        @else
                            <span class="p-1 mr-3 text-sm text-gray-300 border rounded-sm">
                                <a href="{{ route('changepassword.create') }}">Change Password</a>
                            </span>

                            <span class="pr-3 text-sm text-gray-300">{{ Auth::user()->name }}</span>

                            <a href="{{ route('logout') }}"
                               class="p-2 text-sm text-gray-300 no-underline hover:underline"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
        <div class="my-2">
            @include('layouts.notification')
        </div>
        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>
