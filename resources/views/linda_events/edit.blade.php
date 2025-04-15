@extends('layouts.app')
@section('content')

    <div class="text-center mb-2">
        <h2>Redigera evenemang</h2>
        <p>Alla fält markerade med <strong>*</strong> är obligatoriska.</p>
    </div>
    <hr>
    <form action="{{ route('linda_events.update', $event->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <label for="name" class="">Namn *</label>
            <input id="name" type="text" placeholder="Namn" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $event->name }}">

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="starts" class="">Starttid *</label>
            <input id="starts" type="datetime-local" placeholder="Starttid" class="form-control{{ $errors->has('starts') ? ' is-invalid' : '' }}" name="starts" value="{{ \Carbon\Carbon::parse($event->starts)->format('Y-m-d\TH:i') }}">

            @if ($errors->has('starts'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('starts') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="ends" class="">Sluttid *</label>
            <input id="ends" type="datetime-local" placeholder="Sluttid" class="form-control{{ $errors->has('ends') ? ' is-invalid' : '' }}" name="ends" value="{{ \Carbon\Carbon::parse($event->ends)->format('Y-m-d\TH:i') }}">

            @if ($errors->has('ends'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('ends') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="status" class="">Status *</label>
            <select id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status">
                <option value="confirmed" {{ $event->status == 'confirmed' ? 'selected' : '' }}>Bekräftad</option>
                <option value="tentative" {{ $event->status == 'tentative' ? 'selected' : '' }}>Preliminär</option>
                <option value="cancelled" {{ $event->status == 'cancelled' ? 'selected' : '' }}>Avbokad</option>
            </select>

            @if ($errors->has('status'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="summary" class="">Sammanfattning *</label>
            <textarea id="summary" rows="4" placeholder="Sammanfattning" class="form-control{{ $errors->has('summary') ? ' is-invalid' : '' }}" name="summary">{{ $event->summary }}</textarea>

            @if ($errors->has('summary'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('summary') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="location" class="">Plats *</label>
            <input id="location" type="text" placeholder="Plats" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ $event->location }}">

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

    <hr>
    <form action="{{ '/linda_events/' . $event->id }}" method="post" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Är du säker på att du vill ta bort detta evenemang?')">
        Ta bort
    </button>
</form>

@endsection
