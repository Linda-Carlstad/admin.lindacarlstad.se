@extends('layouts.app')
@section('content')


    <div class="text-center">
        <h2>{{ $member->firstName }} {{ $member->lastName }}</h2>
        <hr>
    </div>

    <form class="col-md-6 offset-md-3" action="{{ '/member/' . $member->id }}" method="post">
        @csrf
        {{ method_field( 'patch' ) }}
        <input type="text" name="type" value="manual" hidden>
        <div class="form-group row">
            <label for="firstName">Förnamn</label>
            <input id="firstName" type="text" placeholder="Förnamn" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ $member->firstName }}" required autofocus>

            @if ($errors->has('firstName'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('firstName' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="lastName">Efternamn</label>
            <input id="lastName" type="text" placeholder="Efternamn" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ $member->lastName }}" required>

            @if ($errors->has('lastName'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('lastName' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="id_number">Personnummer</label>
            <input id="id_number" type="text" placeholder="Personnummer" class="form-control{{ $errors->has('id_number') ? ' is-invalid' : '' }}" name="id_number" value="{{ $member->id_number }}" required>

            @if ($errors->has('id_number'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('id_number' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="email">Email</label>
            <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $member->email }}" >

            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="membership">Startår</label>
            <input id="membership" type="text" placeholder="Startår" class="form-control{{ $errors->has('membership') ? ' is-invalid' : '' }}" name="membership" value="{{ date( 'Y' ) }}" required>

            @if ($errors->has('membership'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('membership' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <a class="btn btn-secondary mr-1" href="{{ route( 'member.index' ) }}">Avbryt</a>
            <button type="submit" class="btn btn-primary ml-0">
                Spara
            </button>
        </div>
    </form>
    <hr>
    <form action="{{ '/member/' . $member->id }}" method="post">
        @csrf
        {{ method_field( 'delete' ) }}
            <div class="text-center">
                <h4>Ta bort medlem</h4>
                <p>Denna åtgärd är permanent.</p>
                <button type="submit" class="btn btn-danger">
                    Ta bort
                </button>
            </div>
    </form>

@endsection
