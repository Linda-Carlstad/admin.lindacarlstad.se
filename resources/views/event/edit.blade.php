@extends('layouts.app')
@section('content')

    <div class="text-center mb-2">
        <h2>Redigera event</h2>
    </div>
    <hr>
    <form action="{{ '/event/' . $event->id }}" method="post">
        @csrf
        {{ method_field( 'patch' ) }}
        <div class="form-group row">
            <label for="title" class="">Titel</label>
            <input id="title" type="text" placeholder="Titel" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $event->title }}">

            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="text" class="">Text</label>
            <textarea rows="4" id="text" placeholder="Text till eventet" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="text">{{ $event->text }}</textarea>

            @if ($errors->has('text'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('text' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="link" class="">Länk</label>
            <input id="link" type="text" placeholder="Länk" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" value="{{ $event->link }}">

            @if ($errors->has('link'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('link' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="link_title" class="">Länktext</label>
            <input id="link_title" type="text" placeholder="Länktext" class="form-control{{ $errors->has('link_title') ? ' is-invalid' : '' }}" name="link_title" value="{{ $event->link_title }}">

            @if ($errors->has('link_title'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('link_title' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group form-check">
            <input {{ $event->active ? 'checked' : '' }} type="checkbox" class="form-check-input" id="active" name="active" value="1">
            <label class="form-check-label" for="active">Aktiv?</label>

            @if ($errors->has('active'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('active' ) }}</strong>
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

    <hr>
    <form onSubmit="return confirm('Är su säker på att du vill ta bort det här eventet? Denna åtgärd är permanent.');" action="{{ '/event/' . $event->id }}" method="post">
        @csrf
        {{ method_field( 'delete' ) }}
        <div class="text-center">
            <h4>Ta bort event</h4>
            <p>Denna åtgärd är permanent.</p>
            <button type="submit" class="btn btn-danger">
                Ta bort
            </button>
        </div>
    </form>

@endsection
