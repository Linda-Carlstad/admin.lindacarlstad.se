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
                <img src="{{ asset('/img/logo.png' ) }}" class="img-fluid">
            </div>
            <br>
            <form method="POST" action="{{ route( 'login.post' ) }}">
                @csrf

                <div class="form-group row">
                    <div class="col">
                        <label class="text-white" for="email" class="">Email</label>
                        <input id="email" type="text" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email' ) }}" required autofocus>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email' ) }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label class="text-white" for="password" class="">Lösenord</label>
                        <input id="password" type="password" placeholder="Lösenord" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col">
                        <button type="submit" class="btn btn-primary ml-0">
                            Logga in
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
