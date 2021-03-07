<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Login | {{ env('APP_NAME') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />

    <!--Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    @stack('styles')

</head>

<body>
<div id="huro-app" class="app-wrapper">
    <!-- Pageloader -->
    <div class="pageloader is-full"></div>
    <div class="infraloader is-full is-active"></div>

    @yield('content')

    <!-- Concatenated plugins -->
    <script src="{{ asset('assets/libraries/js/app.js') }}"></script>

    <!-- Huro js -->
    <script src="{{ asset('assets/libraries/js/functions.js') }}"></script>
    <script src="{{ asset('assets/libraries/js/auth.js') }}"></script>

    @stack('scripts')
</div>

</body>

</html>
