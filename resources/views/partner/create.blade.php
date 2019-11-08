@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>Lägg till partner</h2>
        <br>
    </div>
    <form class="col-md-6 offset-md-3" action="{{ '/partner' }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="name" class="">Namn</label>
            <input id="name" type="text" placeholder="Namn" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name' ) }}" required autofocus>

            @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="description" class="">Beskrivning</label>
            <textarea rows="3" id="description" type="text" placeholder="" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"></textarea>

            @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description' ) }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group row">
            <label for="image" class="">Bild</label>
            <input type="file" class="filestyle" name="image" id="fileInput"
                accept="image/*" data-text="Välj bild" data-btnClass="btn-primary btn-file">

        </div>
        <div class="form-group row">
            <label for="type" class="">Typ</label>
            <select class="form-control" id="type" name="type" required>
                <option value="" selected disabled hidden>-- Välj --</option>
                <option value="Sponsor">Sponsor</option>
                <option value="Samarbetspartner">Samarbetspartner</option>
            </select>
            @if ($errors->has('type'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('type' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="started" class="">Startår</label>
            <input id="started" type="number" placeholder="Startår" class="form-control{{ $errors->has('started') ? ' is-invalid' : '' }}" name="started" value="{{ old( 'started' ) }}">

            @if ($errors->has('started'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('started' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="frontPage" class="">Framsidan</label>
            <select class="form-control" id="frontPage" name="frontPage" required>
                <option value="1">Ja</option>
                <option value="0" selected>Nej</option>
            </select>
            @if ($errors->has('frontPage'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('frontPage' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="phone" class="">Telefonnummer</label>
            <input id="phone" type="text" placeholder="Telefonnummer" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old( 'phone' ) }}">

            @if ($errors->has('phone'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('phone' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="email" class="">Email</label>
            <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old( 'email' ) }}">

            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email' ) }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="link" class="">Länk</label>
            <input id="link" type="text" placeholder="Länk" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" value="{{ old('link' ) }}" required autofocus>

            @if ($errors->has('link'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('link' ) }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group row">
            <a class="btn btn-secondary mr-1" href="{{ route( 'partner.index' ) }}">Avbryt</a>
            <button type="submit" class="btn btn-primary ml-0">
                Spara
            </button>
        </div>
    </form>

@endsection
