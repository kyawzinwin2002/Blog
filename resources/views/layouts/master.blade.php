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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app" class=" min-vh-100 d-flex flex-column">
        @include('layouts.nav')

        @auth
        <main class="py-4">
            @yield('content')
        </main>
        @endauth

        @guest
            <main class=" py-4">
               <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10">

                        @yield('content')
                    </div>

                </div>
               </div>
            </main>
        @endguest
        @include('layouts.footer')
    </div>
</body>
</html>
