@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>Redigera nollningsår {{ $initiation->year }}</h2>
        <p>Alla fält markerade med <strong>*</strong> är obligatoriska.</p>
        <hr>
    </div>

    <form action="{{ '/initiation/' . $initiation->id }}" method="post">
        @csrf
        {{ method_field( 'patch' ) }}
        <div class="form-group row">
            <label for="year">År *</label>
            <input id="year" type="text" placeholder="Välj år" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ $initiation->year }}" required autofocus>

            @if ($errors->has('year'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('year' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="description">Information</label>
            <textarea rows="3" id="description" type="text" placeholder="{{ $initiation->description }}" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ $initiation->description }}</textarea>

            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="price">
                Pris <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Klicka i rutan för att visa priset på webbsidan"></i>
            </label>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input id="show_price" name="show_price" type="checkbox" value="1" aria-label="Checkbox for following text input" {{ $initiation->show_price == 1 ? 'checked' : '' }}>
                    </div>
                </div>
                <input id="price" type="number" placeholder="Pris" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ $initiation->price }}">
                <div class="input-group-append">
                    <span class="input-group-text">kr</span>
                </div>
            </div>
            @if ($errors->has('price'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('price' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="facebook_group">Facebookgrupp-länk</label>
            <input id="facebook_group" type="text" placeholder="Facebookgrupp-länk" class="form-control{{ $errors->has('facebook_group') ? ' is-invalid' : '' }}" name="facebook_group" value="{{ $initiation->facebook_group }}">

            @if ($errors->has('facebook_group'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('facebook_group' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="playlist">Spellista</label>
            <input id="playlist" type="text" placeholder="Länk till spellista" class="form-control{{ $errors->has('playlist') ? ' is-invalid' : '' }}" name="playlist" value="{{ $initiation->playlist }}">

            @if ($errors->has('playlist'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('playlist' ) }}</strong>
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
    <form onSubmit="return confirm('Är su säker på att du vill ta bort den här nollningen? Denna åtgärd är permanent.');" action="{{ '/initiation/' . $initiation->id }}" method="post">
        @csrf
        {{ method_field( 'delete' ) }}
            <div class="text-center">
                <h4>Ta bort nollningem</h4>
                <p>Denna åtgärd är permanent.</p>
                <button type="submit" class="btn btn-danger">
                    Ta bort
                </button>
            </div>
    </form>

@endsection
