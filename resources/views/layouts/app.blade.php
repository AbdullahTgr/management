<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
  
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
<!-- CSS only -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.css"/>

{{-- <link rel="stylesheet" href="{{asset('css/argon-tables.css')}}">
 --}}

<link rel="stylesheet" href="{{asset('css/nucleo-icons.css')}}">
<link rel="stylesheet" href="{{asset('css/nucleo-svg.css')}}">
<link rel="stylesheet" href="{{asset('css/soft-ui-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('css/soft-ui-dashboard.css.map')}}">
<link rel="stylesheet" href="{{asset('css/soft-ui-dashboard.min.css')}}">
<link rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{asset('css/tasks.css')}}">

@if (!Auth::check())
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endif

</head> 
<body>
    <div id="app">
         @if (!isset($nav) && Auth::check())
         @include('layouts.sidebar')
         
         @endif 

         <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
            @include('layouts.navbar')
            @yield('content')
        </main>
    </div>

    @yield('scripts')  
</body>
</html>
