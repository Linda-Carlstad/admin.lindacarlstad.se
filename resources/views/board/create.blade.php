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
        <h2>Lägg till ny styrelsetitle</h2>
        <hr>
    </div>

    <form class="col-md-6 offset-md-3" action="{{ '/board' }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="title">Position</label>
            <input id="title" type="text" placeholder="Position" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old( 'title' ) }}" required autofocus>

            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="name">Namn</label>
            <input id="name" type="text" placeholder="Namn" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old( 'name' ) }}" required>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="email">Email</label>
            <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old( 'email' ) }}" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email' ) }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row">
            <label for="description">Beskrivning</label>
            <textarea rows="3" type="text" placeholder="Beskrivning" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old( 'description' ) }}" ></textarea>

            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description' ) }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group row">
            <label for="order">Order</label>
            <input id="order" type="number" placeholder="Order" class="form-control{{ $errors->has('order') ? ' is-invalid' : '' }}" name="order" value="{{ old( 'order' ) }}" >

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

@endsection
