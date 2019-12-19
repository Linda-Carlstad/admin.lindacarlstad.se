@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>Lägg till dag</h2>
        <br>
    </div>
    <form action="{{ '/initiation' }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="title" class="">Titel</label>
            <input id="title" type="text" placeholder="Namn på dagen" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title' ) }}" >

            @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="description" class="">Beskrivning</label>
            <textarea rows="4" id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">
                {{ old('description' ) }}
            </textarea>

            @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="extra" class="">Extra information</label>
            <input id="extra" type="text" placeholder="Extra information till dagen" class="form-control{{ $errors->has('extra') ? ' is-invalid' : '' }}" name="extra" value="{{ old('extra' ) }}">

            @if ($errors->has('extra'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('extra' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="date" class="">Datum</label>
            <input id="date" type="text" placeholder="e.x 12 augusti" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date' ) }}">

            @if ($errors->has('date'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('date' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="time" class="">Tid</label>
            <input id="time" type="text" placeholder="Starttid" class="form-control{{ $errors->has('time') ? ' is-invalid' : '' }}" name="time" value="{{ old('time' ) }}">

            @if ($errors->has('time'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('time' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="location" class="">Plats</label>
            <input id="location" type="text" placeholder="Google Maps-länk" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ old('location' ) }}">

            @if ($errors->has('location'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('location' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="order" class="">Order</label>
            <input id="order" type="number" placeholder="Order" class="form-control{{ $errors->has('order') ? ' is-invalid' : '' }}" name="order" value="{{ old('order' ) }}">

            @if ($errors->has('order'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('order' ) }}</strong>
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
