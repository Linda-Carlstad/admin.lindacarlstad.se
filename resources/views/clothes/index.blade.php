@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h1>Kläder</h1>
        <p>
            Här kan du uppdatera inventariet av kläder.
            <br>
            <u class="text-danger">
                Alla formulär uppdateras var för sig. Fyll endast i ett formulär i taget för att inte förlora dina ändringar.
            </u>
        </p>
    </div>
    <div class="text-center">
        <h2>Overaller</h2>
    </div>
    <br>
    <form class="" action="{{ 'updateOveralls' }}" method="post">
        @csrf
        {{ method_field( 'patch' ) }}
        <div class="d-block row d-md-flex justify-content-center">
            @foreach( $overalls as$overall )
                <div class="col-12 col-md-4 text-center">
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="{{$overall->size }}">{{$overall->size }}</span>
                        </div>
                        <input type="text" name="{{$overall->size }}" value="{{$overall->quantity }}" class="shirt-input form-control">
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
        <h2>Faddertröjor</h2>
    </div>
    <br>
    <form class="" action="{{ 'updateShirts' }}" method="post">
        @csrf
        {{ method_field( 'patch' ) }}
        <input type="hidden" name="type" value="fadder">
        <div class="d-block row d-md-flex justify-content-center">
            @foreach( $shirts[ 'fadder' ] as $shirt )
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
        <input type="hidden" name="type" value="nolla">
        <div class="d-block row d-md-flex justify-content-center">
            @foreach( $shirts[ 'nolla' ] as $shirt )
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
