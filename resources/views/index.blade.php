@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>Vad vill du göra idag?</h2>
        <p>Jag vill hantera...</p>
        <a class="btn btn-primary m-1" href="{{ route( 'member.index' ) }}">Medlemmar</a>
        <a class="btn btn-primary m-1" href="{{ route( 'overall' ) }}">Overaller</a>
        <a class="btn btn-primary m-1" href="{{ route( 'initiation' ) }}">Nollningen</a>
    </div>

@endsection
