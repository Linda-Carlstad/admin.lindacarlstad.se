@extends('layouts.app')
@section('content')

    <div class="text-center mb-2">
        <h2>Lägg till ett evenemang</h2>
        <p>Alla fält markerade med <strong>*</strong> är obligatoriska.</p>
    </div>
    <hr>
    <form action="{{ '/linda_events' }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="name" class="">Namn *</label>
            <input id="name" type="text" placeholder="Namn" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}">

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="starts" class="">Starttid *</label>
            <input id="datepicker" type="datetime-text" placeholder="Starttid" class="form-control{{ $errors->has('starts') ? ' is-invalid' : '' }}" name="starts" value="{{ old('starts') }}">

            @if ($errors->has('starts'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('starts') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="ends" class="">Sluttid *</label>
            <input id="datepicker" type="text" placeholder="Sluttid" class="form-control{{ $errors->has('ends') ? ' is-invalid' : '' }}" name="ends" value="{{ old('ends') }}">

            @if ($errors->has('ends'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('ends') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="status" class="">Status *</label>
            <select id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status">
                <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Bekräftad</option>
                <option value="tentative" {{ old('status') == 'tentative' ? 'selected' : '' }}>Preliminär</option>
                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Avbokad</option>
            </select>

            @if ($errors->has('status'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="summary" class="">Sammanfattning *</label>
            <textarea id="summary" rows="4" placeholder="Sammanfattning" class="form-control{{ $errors->has('summary') ? ' is-invalid' : '' }}" name="summary">{{ old('summary') }}</textarea>

            @if ($errors->has('summary'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('summary') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="location" class="">Plats *</label>
            <input id="location" type="text" placeholder="Plats" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ old('location') }}">

            @if ($errors->has('location'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('location') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <a class="btn btn-secondary mr-1" href="{{ route('linda_events.index') }}">Avbryt</a>
            <button type="submit" class="btn btn-primary ml-0">Spara</button>
        </div>
    </form>
    
    <script>
        flatpickr("#datepicker", {
            enableTime: true, 
            dateFormat: "Y-m-d", 
        });
    </script>

@endsection
