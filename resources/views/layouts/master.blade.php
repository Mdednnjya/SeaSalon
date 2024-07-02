<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SEA-salon</title>
        <link rel="icon" href="{{ asset('images/logo.svg') }}" type="image/icon" />
        @viteReactRefresh
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('components.header')
        <div class="container">
            @yield('content')
        </div>
        @include('components.footer')
    </body>
</html>
