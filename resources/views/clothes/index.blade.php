@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>Overaller</h2>
    </div>
    <br>
    <form class="" action="{{ 'updateOveralls' }}" method="post">
        @csrf
        {{ method_field( 'patch' ) }}
        <div class="d-block row d-md-flex justify-content-center">
            @foreach( $shirts as $shirt )
                <div class="col-12 col-md-4 text-center">
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="{{ $shirt->size }}">{{ $shirt->size }}</span>
                        </div>
                        <input type="text" name="{{ $shirt->size }}" value="{{ $shirt->quantity }}" class="shirt-input form-control">
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Uppdatera</button>
        </div>
    </form>
    <hr>
    <div class="text-center">
        <h2>Nolletröjor</h2>
    </div>
    <br>
    <form class="" action="{{ 'updateShirts' }}" method="post">
        @csrf
        {{ method_field( 'patch' ) }}
        <div class="d-block row d-md-flex justify-content-center">
            @foreach( $shirts as $shirt )
                <div class="col-12 col-md-4 text-center">
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="{{ $shirt->size }}">{{ $shirt->size }}</span>
                        </div>
                        <input type="text" name="{{ $shirt->size }}" value="{{ $shirt->quantity }}" class="shirt-input form-control">
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Uppdatera</button>
        </div>
    </form>

@endsection
