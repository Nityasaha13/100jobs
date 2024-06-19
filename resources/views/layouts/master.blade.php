<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="resources/css/style.css" />

    <!--Load CSS -->
    @vite(['resources/css/style.css'])

    <!--Load JS -->
    @vite(['resources/js/jquery-3.6.0.min.js'])
    @vite(['resources/js/bootstrap.bundle.5.1.3.min.js'])
    @vite(['resources/js/instantpages.5.1.0.min.js'])
    @vite(['resources/js/lazyload.17.6.0.min.js'])
    @vite(['resources/js/slick.min.js'])
    @vite(['resources/js/lightbox.min.js'])
    @vite(['resources/js/custom.js'])

    <title>@yield('title')</title>
    @yield('customstyle')
</head>
<body>
    <header>
        @include('layouts.partials.header')
    </header>
    
    <main class="container my-4">
        @yield('content')
    </main>
    
    <footer class="bg-light text-center py-3">
        @include('layouts.partials.footer')
    </footer>

    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
