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
        <h2>{{ $initiationDay->title }}</h2>
        <hr>
    </div>

    <form class="col-md-6 offset-md-3" action="{{ '/initiation/' . $initiationDay->id }}" method="post">
        @csrf
        {{ method_field( 'patch' ) }}
        <div class="form-group row">
            <label for="title">Title</label>
            <input id="title" type="text" placeholder="Position" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $initiationDay->title }}" required autofocus>
        </div>
        <div class="form-group row">
            <label for="description">Beskrivning</label>
            <textarea rows="4" id="description" type="text" placeholder="{{ $initiationDay->description }}" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">
                {{ $initiationDay->description }}
            </textarea>
        </div>
        <div class="form-group row">
            <label for="date">Datum</label>
            <input id="date" type="text" placeholder="Datum" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ $initiationDay->date }}">

            @if ($errors->has('date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('date' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="time">Tid</label>
            <input id="time" type="text" placeholder="Tid" class="form-control{{ $errors->has('time') ? ' is-invalid' : '' }}" name="time" value="{{ $initiationDay->time }}">

            @if ($errors->has('time'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('time' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="location">Plats</label>
            <input id="location" type="text" placeholder="Plats" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ $initiationDay->location }}">

            @if ($errors->has('location'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('location' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="order">Order</label>
            <input id="order" type="number" placeholder="Order" class="form-control{{ $errors->has('order') ? ' is-invalid' : '' }}" name="order" value="{{ $initiationDay->order }}">

            @if ($errors->has('order'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('order' ) }}</strong>
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
    <form action="{{ '/initiation/' . $initiationDay->id }}" method="post">
        @csrf
        {{ method_field( 'delete' ) }}
            <div class="text-center">
                <h4>Ta bort nollningsdag</h4>
                <p>Denna åtgärd är permanent.</p>
                <button type="submit" class="btn btn-danger">
                    Ta bort
                </button>
            </div>
    </form>

@endsection
