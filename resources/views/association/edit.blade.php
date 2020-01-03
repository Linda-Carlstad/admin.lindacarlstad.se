@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>{{ $association->title }}</h2>
        <hr>
    </div>

    <form action="{{ '/association/' . $association->id }}" method="post"  enctype="multipart/form-data">
        @csrf
        {{ method_field( 'patch' ) }}
        <div class="form-group row">
            <label for="name">Namn</label>
            <input id="name" type="text" placeholder="Namn" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $association->name }}" required>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="slogan">Slogan</label>
            <input id="slogan" type="text" placeholder="Kort namn" class="form-control{{ $errors->has('slogan') ? ' is-invalid' : '' }}" name="slogan" value="{{ $association->slogan }}">

            @if ($errors->has('slogan'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('slogan' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="image" class="">Bild</label>
            <input type="file" class="filestyle" name="image" id="fileInput"
                accept="image/*" data-text="Välj bild" data-btnClass="btn-primary btn-file">
            @if ($errors->has('image'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('image' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="link">Länk</label>
            <input id="link" type="text" placeholder="Länk" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" value="{{ $association->link }}">

            @if ($errors->has('link'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('link' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="email">Kontakt - email</label>
            <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $association->email }}">

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="description">Beskrivning</label>
            <textarea rows="3" id="description" type="text" placeholder="{{ $association->description }}" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ $association->description }}</textarea>

            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <a class="btn btn-secondary mr-1" href="{{ route( 'association.index' ) }}">Avbryt</a>
            <button type="submit" class="btn btn-primary ml-0">
                Spara
            </button>
        </div>
    </form>
    <hr>
    <form onSubmit="return confirm('Är su säker på att du vill ta bort den här föreningen? Denna åtgärd är permanent.');" action="{{ '/association/' . $association->id }}" method="post">
        @csrf
        {{ method_field( 'delete' ) }}
            <div class="text-center">
                <h4>Ta bort förening</h4>
                <p>Denna åtgärd är permanent.</p>
                <button type="submit" class="btn btn-danger">
                    Ta bort
                </button>
            </div>
    </form>

@endsection
