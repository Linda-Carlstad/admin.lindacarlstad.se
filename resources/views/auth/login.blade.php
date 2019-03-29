@extends('layouts.login')
@section('content')

    <form method="POST" action="{{ route( 'login' ) }}">
        @csrf

        <div class="form-group row">
            <div class="col">
                <label class="text-white" for="email" class="">E-Mail Address</label>
                <input id="email" type="text" placeholder="E-Mail Addres" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old( 'email' ) }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first( 'email' ) }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col">
                <label class="text-white" for="password" class="">Password</label>
                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

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
                    Login
                </button>
            </div>
        </div>
    </form>

@endsection
