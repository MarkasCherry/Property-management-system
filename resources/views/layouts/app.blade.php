<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="@if(auth()->user()->dark_mode) is-dark @endif">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title'){{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}"/>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet">

    @stack('styles_before')
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/libraries/css/notyf/notyf.min.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/libraries/css/notyf/notyf.min.css') }}">
    @stack('styles_after')

    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/star-rating.css') }}"/>

    @livewireStyles

</head>

<body class="@if(auth()->user()->dark_mode) is-dark @endif">
<div class="app-wrapper">
    <div class="app-overlay"></div>
    <div class="pageloader is-full"></div>
    <div class="infraloader is-full is-active"></div>
    @include('layouts.header.navigation')
    <div id="edit-profile" class="view-wrapper is-webapp">

        <div class="page-content-wrapper">
            <div class="page-content is-relative">

                <div class="page-title has-text-centered is-webapp">

                    <div class="title-wrap">
                        <h1 class="title is-4">@yield('title')</h1>
                    </div>

                    <div class="toolbar ml-auto">
                        @include('layouts.header.mode-switch')
                    </div>
                </div>

                <div class="page-content-inner is-webapp">
                    @yield('content')
                </div>

            </div>
        </div>

    </div>
</div>

@stack('modals')

@livewireScripts

<!-- Scripts -->
<script
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initAutocomplete&libraries=places&v=weekly"
    defer
></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script src="{{ mix('assets/libraries/js/notyf/notyf.min.js') }}"></script>
<script src="{{ mix('assets/js/app.js') }}" defer></script>

<script src="{{ asset('assets/libraries/js/app.js') }}"></script>
<script src="{{ asset('assets/libraries/js/functions.js') }}"></script>
<script src="{{ asset('assets/libraries/js/main.js') }}"></script>
<script src="{{ asset('assets/js/remember-tab.js') }}"></script>

@stack('scripts')

</body>
</html>
