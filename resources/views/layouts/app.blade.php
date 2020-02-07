<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="An amazing site - Not just another blog..." />
    <meta name="keywords" content="Jobsity, Rodrigo Vidal, Tweetsity" />
    <meta name="author" content="Rodrigo Vidal">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tweetsity') }}</title>

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ url('assets/images/favicon.png') }}">

    <!--BootStrap -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/normalize.css') }}" rel="stylesheet">

    <!-- Main Style -->
    <link href="{{ url('assets/css/style.css') }}?{{time()}}" rel="stylesheet">

    <!--[if IE]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="preloader"></div>

@include('layouts.header')

@yield('content')

@include('layouts.footer')

<!-- Scripts -->

<script src="{{ url('assets/js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ url('assets/js/plugins.js') }}"></script>
<script src="{{ url('assets/js/bootstrap.min.js') }}"></script>

<!-- Custom scripts for each page -->
@yield('scripts')
