<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SMP Negeri 4 Depok </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/homestyle.css') }}" rel="stylesheet">
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
    <script src="{{ asset('js/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/homestyle.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4m3960a0NxbUHCNND05Us9fwb0MSJvoI&callback=myMap"></script>

</html>
