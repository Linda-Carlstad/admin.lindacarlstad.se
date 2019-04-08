@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>{{ $boardMember->position }}</h2>
    </div>

    <div class="col-md-6 offset-md-3">
        <form action="{{ '/board/' . $boardMember->id }}" method="post">
            @csrf
            {{ method_field( 'patch' ) }}
            <div class="form-group row">
                <label for="position">Position</label>
                <input id="position" type="text" placeholder="Position" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" value="{{ $boardMember->position }}" required>
            </div>
            <div class="form-group row">
                <label for="email">Email</label>
                <input id="email" type="text" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $boardMember->email }}" required>
            </div>
            <div class="form-group row">
                <label for="name">Namn</label>
                <input id="name" type="text" placeholder="Namn" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $boardMember->name }}" required>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name' ) }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group row">
                <label for="description">Beskrivning</label>
                <input id="description" type="text" placeholder="Beskrivning" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $boardMember->description }}" required>

                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description' ) }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group row">
                <a class="btn btn-secondary mr-1" href="{{ route( 'board.index' ) }}">Avbryt</a>
                <button type="submit" class="btn btn-primary ml-0">
                    Spara
                </button>
            </div>
        </form>
    </div>

@endsection
