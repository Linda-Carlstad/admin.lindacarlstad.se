<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/login.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="login d-flex align-items-center justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="bg-dark p-3 p-md-5">
                <div class="text-center">
                    <img src="{{ asset( '/img/logo.png' ) }}" class="img-fluid">
                </div>
                <br>
                @yield('content')
            </div>
        </div>
</body>
</html>
