@extends('layouts.app')
@section('content')

    @if( session()->has( 'success' ) )
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get( 'success' ) }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if( session()->has( 'error' ) )
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get( 'error' ) }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="text-center">
        <h2>Importera Excel-fil</h2>
        <p>
            <b>Formattering enligt följande</b>
            <br>
            Förnamn | Efternamn | Personnummer | Email | Medlemsår | Startår
        </p>
    </div>
    <br>
    <form class="col-md-6 offset-md-3" action="{{ '/member' }}" method="post">
        @csrf
        <input type="text" name="type" value="file" hidden>
        <div class="form-group row">
            <input type="file" class="filestyle" name="file" id="fileInput"
                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                    data-text="Välj fil" data-btnClass="btn btn-primary btn-file" required>
        </div>
        <div class="form-group row">
            <a class="btn btn-secondary mr-1" href="{{ route( 'member.index' ) }}">Avbryt</a>
            <button type="submit" class="btn btn-primary ml-0">
                Spara
            </button>
        </div>
    </form>
    <hr>

    <div class="text-center">
        <h2>Lägg till manuellt</h2>
    </div>
    <form class="col-md-6 offset-md-3" action="{{ '/member' }}" method="post">
        @csrf
        <input type="text" name="type" value="manual" hidden>
        <div class="form-group row">
            <label for="firstName" class="">Förnamn</label>
            <input id="firstName" type="text" placeholder="Förnamn" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName' ) }}" required autofocus>

            @if ($errors->has('firstName'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('firstName' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="lastName" class="">Efternamn</label>
            <input id="lastName" type="text" placeholder="Efternamn" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName' ) }}" required>

            @if ($errors->has('lastName'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('lastName' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="id_number" class="">Personnummer</label>
            <input id="id_number" type="text" placeholder="Personnummer" class="form-control{{ $errors->has('id_number') ? ' is-invalid' : '' }}" name="id_number" value="{{ old('id_number' ) }}" required>

            @if ($errors->has('id_number'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('id_number' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="email" class="">Email</label>
            <input id="email" type="text" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email' ) }}">

            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="membership" class="">Startår</label>
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

@endsection
