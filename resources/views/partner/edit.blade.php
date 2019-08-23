@extends('layouts.app')
@section('content')

    @if( session()->has( 'success' ) )
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get( 'success' ) }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if( session()->has( 'error' ) )
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get( 'error' ) }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="text-center">
        <h2>{{ $partner->name }}</h2>
        <br>
    </div>
    <form class="col-md-6 offset-md-3" action="{{ '/partner/' . $partner->id }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field( 'patch' ) }}
        <div class="form-group row">
            <label for="name" class="">Namn</label>
            <input id="name" type="text" placeholder="Namn" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $partner->name }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="description" class="">Beskrivning</label>
            <textarea rows="3" id="description" type="text" placeholder="" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ $partner->description }}</textarea>

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
            @if ($errors->has('image'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('image' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="type" class="">Typ</label>
            <select class="form-control" id="type" name="type" required>
                <option value="Sponsor" {{ old( 'type', $partner->type ) == 'Sponsor' ? 'selected' : '' }}>Sponsor</option>
                <option value="Samarbetspartner" {{ old( 'type', $partner->type ) == 'Samarbetspartner' ? 'selected' : '' }}>Samarbetspartner</option>
            </select>
            @if ($errors->has('type'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('type' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="started" class="">Startår</label>
            <input id="started" type="number" placeholder="Startår" class="form-control{{ $errors->has('started') ? ' is-invalid' : '' }}" name="started" value="{{ $partner->started }}">

            @if ($errors->has('started'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('started' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="frontPage" class="">Framsidan</label>
            <select class="form-control" id="frontPage" name="frontPage" required>
                <option value="1" {{ old( 'type', $partner->frontPage ) == '1' ? 'selected' : '' }}>Ja</option>
                <option value="0" {{ old( 'type', $partner->frontPage ) == '0' ? 'selected' : '' }}>Nej</option>
            </select>
            @if ($errors->has('frontPage'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('frontPage' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="phone" class="">Telefonnummer</label>
            <input id="phone" type="text" placeholder="Telefonnummer" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $partner->phone }}">

            @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="email" class="">Email</label>
            <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $partner->email }}">

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="link" class="">Länk</label>
            <input id="link" type="text" placeholder="Länk" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" value="{{ $partner->link }}">

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
    <hr>
    <form action="{{ '/partner/' . $partner->id }}" method="post">
        @csrf
        {{ method_field( 'delete' ) }}
            <div class="text-center">
                <h4>Ta bort partner</h4>
                <p>Denna åtgärd är permanent.</p>
                <button type="submit" class="btn btn-danger">
                    Ta bort
                </button>
            </div>
    </form>

@endsection
