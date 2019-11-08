@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>Overaller</h2>
    </div>
    <hr>
    <form class="" action="{{ 'updateOveralls' }}" method="post">
        @csrf
        {{ method_field( 'patch' ) }}
        <div class="d-block row d-md-flex justify-content-center">
            @foreach( $overalls as $overall )
                <div class="col-12 col-md-4 text-center">
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="{{ $overall->size }}">{{ $overall->size }}</span>
                        </div>
                        <input type="text" name="{{ $overall->size }}" value="{{ $overall->quantity }}" class="overall-input form-control">
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Uppdatera</button>
        </div>
    </form>

@endsection
