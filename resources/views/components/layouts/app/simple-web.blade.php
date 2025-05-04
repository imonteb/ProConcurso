<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('partials.head')

    <title>Laravel</title>

</head>

<body class="">
    @yield('content')
    <!-- ///////////////// -->
    <x-navbar.nav-web></x-navbar.nav-web>
    <!-- ///////////////////////////// -->

        <main class="">
            {{ $slot }}
        </main>
    

    @if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>