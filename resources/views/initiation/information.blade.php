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
        <h2>Nollningsinformation</h2>
        <hr>
    </div>

    <form class="col-md-6 offset-md-3" action="{{ '/informationUpdate' }}" method="post">
        @csrf
        {{ method_field( 'patch' ) }}
        <div class="form-group row">
            <label for="description">Information</label>
            <textarea rows="3" id="description" type="text" placeholder="{{ $information->description }}" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required autofocus>
                {{ $information->description }}
            </textarea>

            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="price">
                Pris <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Klicka i för att visa priset på webbsidan"></i>
            </label>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input id="showPrice" name="showPrice" type="checkbox" value="1" aria-label="Checkbox for following text input" {{ $information->showPrice === 1 ? 'checked' : '' }}>
                    </div>
                </div>
                <input id="price" type="number" placeholder="Tid" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ $information->price }}" required>
            </div>
            @if ($errors->has('price'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('price' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="facebookGroup">Facebookgrupp-länk</label>
            <input id="facebookGroup" type="text" placeholder="Facebookgrupp-länk" class="form-control{{ $errors->has('facebookGroup') ? ' is-invalid' : '' }}" name="facebookGroup" value="{{ $information->facebookGroup }}" required>

            @if ($errors->has('facebookGroup'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('facebookGroup' ) }}</strong>
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
