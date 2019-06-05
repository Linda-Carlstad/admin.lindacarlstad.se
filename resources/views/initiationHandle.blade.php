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
