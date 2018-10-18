<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SMP Negeri 4 Depok </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/homestyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/k_slickheadline.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owlc/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owlc/owl.theme.default.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="mainLayout">
        <app-layout></app-layout>
    </div>
</body>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/homeslider.js') }}"></script>
    <script src="{{ asset('js/style.js') }}"></script>
    <script src="{{ asset('js/homestyle.js') }}"></script>
    <script src="{{ asset('js/slick.js') }}"></script>
    <script src="{{ asset('js/headline.js') }}"></script>
    <script src="{{ asset('js/pindahan.js') }}"></script>
    <script src="{{ asset('js/owlc/owl.carousel.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4m3960a0NxbUHCNND05Us9fwb0MSJvoI&callback=myMap"></script>

</html>
