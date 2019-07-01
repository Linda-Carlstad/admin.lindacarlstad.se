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
        <h2>Lägg till ny sång</h2>
        <hr>
    </div>

    <form class="col-md-6 offset-md-3" action="{{ '/song' }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="title">Namn</label>
            <input id="title" type="text" placeholder="Namn" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old( 'title' ) }}" required autofocus>

            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="text">Text</label>
            <textarea name="text" id="text" rows="8" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" required></textarea>

            @if ($errors->has('text'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('text' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="melody">Melodi</label>
            <input id="melody" type="text" placeholder="Melodi" class="form-control{{ $errors->has('melody') ? ' is-invalid' : '' }}" name="melody" value="{{ old( 'melody' ) }}">

            @if ($errors->has('melody'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('melody' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <a class="btn btn-secondary mr-1" href="{{ route( 'song.index' ) }}">Avbryt</a>
            <button type="submit" class="btn btn-primary ml-0">
                Spara
            </button>
        </div>
    </form>

@endsection
