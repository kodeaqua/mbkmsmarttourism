<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="{{ asset('assets/js/leaflet.ajax.js') }}"></script>

    <!-- Google Fonts - Google Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Google Sans', sans-serif;
        }

        nav {
            backdrop-filter: blur(10px);
        }

        .mtrlyou-nav-active {
            --bs-bg-opacity: 0.25;
            background-color: rgba(var(--bs-primary-rgb), var(--bs-bg-opacity)) !important;
            color: var(--bs-primary);
        }

        .mtrlyou-nav-active:hover {
            --bs-bg-opacity: 0.3;
            background-color: rgba(var(--bs-primary-rgb), var(--bs-bg-opacity)) !important;
            color: var(--bs-primary);
        }

        .mtrlyou-btn-solid {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-primary-rgb), var(--bs-bg-opacity)) !important;
            color: #fff;
        }

        .mtrlyou-btn-solid:hover {
            --bs-bg-opacity: 0.8;
            background-color: rgba(var(--bs-primary-rgb), var(--bs-bg-opacity)) !important;
            color: #fff;
        }



        .mtrlyou-btn-trans {
            --bs-bg-opacity: 0.25;
            background-color: rgba(var(--bs-primary-rgb), var(--bs-bg-opacity)) !important;
        }

        .mtrlyou-btn-trans:hover {
            --bs-bg-opacity: 0.3;
            background-color: rgba(var(--bs-primary-rgb), var(--bs-bg-opacity)) !important;
        }
    </style>
</head>

<body class="bg-light mx-3">
    <!-- Include MaterialYou's Navbar -->
    @include('layouts.materialyou.navbar')

    <main class="container py-4 ">
        <div class="row justify-content-center">
            @yield('content')
        </div>
    </main>

    @include('layouts.materialyou.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
