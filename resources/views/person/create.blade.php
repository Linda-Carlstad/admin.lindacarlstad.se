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
        <h2>Lägg till nyckelperson</h2>
        <br>
    </div>
    <form class="col-md-6 offset-md-3" action="{{ '/person' }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="name" class="">Namn</label>
            <input id="name" type="text" placeholder="Namn" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name' ) }}" required autofocus>

            @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="rank" class="">Rank</label>
            <select class="form-control" id="rank" name="rank" required>
                <option value="General">General</option>
                <option value="Kapten">Kapten</option>
                <option value="Vice kapten">Vice kapten</option>
                <option value="Annat">Annat</option>
            </select>
            @if ($errors->has('rank'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('rank' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="email" class="">Email</label>
            <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email' ) }}">

            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="phone" class="">Telefonnummer</label>
            <input id="phone" type="text" placeholder="Telefonnummer" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone' ) }}">

            @if ($errors->has('phone'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('phone' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <a class="btn btn-secondary mr-1" href="{{ route( 'initiation.index' ) }}">Avbryt</a>
            <button type="submit" class="btn btn-primary ml-0">
                Spara
            </button>
        </div>
    </form>

@endsection
