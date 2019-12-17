@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>Lägg till ny sång</h2>
        <hr>
    </div>

    <form class="col-md-6 offset-md-3" action="{{ '/song/' . $song->id }}" method="post">
        @csrf
        {{ method_field( 'patch' ) }}
        <div class="form-group row">
            <label for="title">Namn</label>
            <input id="title" type="text" placeholder="Namn" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $song->title }}" required autofocus>

            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="text">Text</label>
            <textarea name="text" id="text" rows="8" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" required>{{ $song->text }}</textarea>

            @if ($errors->has('text'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('text' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="melody">Melodi</label>
            <input id="melody" type="text" placeholder="Melodi" class="form-control{{ $errors->has('melody') ? ' is-invalid' : '' }}" name="melody" value="{{ $song->melody }}">

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
    <hr>
    <form onSubmit="return confirm('Är su säker på att du vill ta bort den här sången? Denna åtgärd är permanent.');" action="{{ '/song/' . $song->id }}" method="post">
        @csrf
        {{ method_field( 'delete' ) }}
        <div class="text-center">
            <h4>Ta bort sång</h4>
            <p>Denna åtgärd är permanent.</p>
            <button type="submit" class="btn btn-danger">
                Ta bort
            </button>
        </div>
    </form>

@endsection
