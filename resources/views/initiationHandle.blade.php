@extends('layouts.app')
@section('content')

    <div class="text-center mb-2">
        <h2>Nollning</h2>
        <p>
            Nu vill jag hantera...
        </p>
        <a class="btn btn-primary m-1" href="{{ route( 'initiation.index' ) }}">Dagar</a>
        <a class="btn btn-primary m-1" href="{{ route( 'person.index' ) }}">Nyckelpersoner</a>
        <a class="btn btn-primary m-1" href="{{ route( 'information.edit' ) }}">Information</a>
    </div>

@endsection
