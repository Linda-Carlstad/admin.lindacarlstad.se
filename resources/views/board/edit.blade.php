@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>Redigera {{ $boardMember->title }}</h2>
        <p>Alla fält markerade med <strong>*</strong> är obligatoriska.</p>
        <hr>
    </div>

    <form action="{{ '/board/' . $boardMember->id }}" method="post"  enctype="multipart/form-data">
        @csrf
        {{ method_field( 'patch' ) }}
        <div class="form-group row">
            <label for="title">Position *</label>
            <input id="title" type="text" placeholder="Position" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $boardMember->title }}" required autofocus>

            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="name">Namn *</label>
            <input id="name" type="text" placeholder="Namn" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $boardMember->name }}" required>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name' ) }}</strong>
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
            <label for="email">Email *</label>
            <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $boardMember->email }}" >

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="description">Beskrivning *</label>
            <textarea rows="3" id="description" type="text" placeholder="{{ $boardMember->description }}" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ $boardMember->description }}</textarea>

            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description' ) }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row">
            <label for="order">Order *</label>
            <input id="order" type="number" placeholder="Order" class="form-control{{ $errors->has('order') ? ' is-invalid' : '' }}" name="order" value="{{ $boardMember->order }}" >

            @if ($errors->has('order'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('order' ) }}</strong>
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
    <hr>
    <form onSubmit="return confirm('Är su säker på att du vill ta bort den här styrelsepositionen? Denna åtgärd är permanent.');" action="{{ '/board/' . $boardMember->id }}" method="post">
        @csrf
        {{ method_field( 'delete' ) }}
            <div class="text-center">
                <h4>Ta bort styrelseposition</h4>
                <p>Denna åtgärd är permanent.</p>
                <button type="submit" class="btn btn-danger">
                    Ta bort
                </button>
            </div>
    </form>

@endsection
