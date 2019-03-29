@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>Vad vill du göra idag?</h2>
        <p>Jag vill hantera...</p>
        <a class="btn btn-primary m-1" href="{{ route( 'members' ) }}">Medlemmar</a>
        <a class="btn btn-primary m-1" href="{{ route( 'overalls' ) }}">Overaller</a>
        <a class="btn btn-primary m-1" href="{{ route( 'initiation' ) }}">Nollning</a>
    </div>

@endsection
