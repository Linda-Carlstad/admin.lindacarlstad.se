@extends('layouts.app')
@section('content')

    <div class="text-center mb-2">
        <h2>Nollning</h2>
        <p>Jag vill hantera...</p>
        <a class="btn btn-primary m-1" href="{{ route( 'initiation.index' ) }}">Nollningsår</a>
        <a class="btn btn-primary m-1" href="{{ route( 'day.index' ) }}">Dagar</a>
        <a class="btn btn-primary m-1" href="{{ route( 'person.index' ) }}">Nyckelpersoner</a>
    </div>

@endsection
