@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>Lägg till nollning</h2>
        <br>
    </div>
    <form action="{{ '/day' }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="title" class="">Titel *</label>
            <input id="title" type="text" placeholder="Namn på dagen" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title' ) }}" required autofocus>

            @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="initiation_id">Nollning *</label>
            <select class="form-control{{ $errors->has('initiation_id') ? ' is-invalid' : '' }}" id="initiation_id" name="initiation_id" required>
                <option disabled selected>Välj ett nollningsår</option>
                @foreach( $initiations as $initiation )
                    <option {{ old( 'initiation_id' ) == $initiation->id ? 'selected': '' }} value="{{ $initiation->id  }}">{{ $initiation->year }}</option>
                @endforeach
            </select>
            @if ($errors->has('initiation_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('initiation_id' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="date" class="">Datum *</label>
            <input id="date" type="text" placeholder="Välj ett datum" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date' ) }}">

            @if ($errors->has('date'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('date' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="description" class="">Beskrivning</label>
            <textarea rows="4" id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ old('description' ) }}</textarea>

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
            <a class="btn btn-secondary mr-1" href="{{ route( 'day.index' ) }}">Avbryt</a>
            <button type="submit" class="btn btn-primary ml-0">
                Spara
            </button>
        </div>
    </form>

@endsection
