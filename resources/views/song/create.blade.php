@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>Lägg till ny sång</h2>
        <hr>
    </div>

    <form action="{{ '/song' }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="title">Namn</label>
            <input id="title" type="text" placeholder="Namn" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old( 'title' ) }}" required autofocus>

            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="text">Text</label>
            <textarea name="text" id="text" rows="8" class="form-control {{ $errors->has('text') ? ' is-invalid' : '' }}" required>{{ old( 'text' ) }}</textarea>

            @if ($errors->has('text'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('text' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="melody">Melodi</label>
            <input id="melody" type="text" placeholder="Melodi" class="form-control {{ $errors->has('melody') ? ' is-invalid' : '' }}" name="melody" value="{{ old( 'melody' ) }}" required>

            @if ($errors->has('melody'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('melody' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input {{ $errors->has('secret') ? ' is-invalid' : '' }}" id="secret" name="secret" value="1" {{ old( 'secret' ) ? 'checked' : '' }}>
            <label class="form-check-label" for="secret">
                Hemlig sång
                <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Klicka i för att göra sången hemlig"></i>
            </label>

            @if ($errors->has('secret'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('secret' ) }}</strong>
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
