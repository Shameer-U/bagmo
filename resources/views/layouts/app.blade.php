<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        {{-- <title>{{config('app.name', 'BAGMO')}}</title>   --}}
        <title>bagmo</title> 
        {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}

        <link rel="stylesheet" href="{{asset('src/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('src/datatables/css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('src/fontawesome/css/all.css')}}">
        <link rel="stylesheet" href="{{ asset('src/css/main.css')}}">

    </head>
    <body>
        {{-- @include('inc.navbar') --}}
            @yield('content')

        {{--@include('inc.footer')--}}  
    </body>
</html>
