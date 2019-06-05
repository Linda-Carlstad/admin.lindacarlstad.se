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
        <h2>Sånger</h2>
        <hr>
        <a class="btn btn-primary m-1" href="{{ route( 'song.create' ) }}">Lägg till sång</a>
    </div>

    @if( $songs->isEmpty() )
        <p class="text-center">
            Inga sånger tillagda, lägg till en nu!
        </p>
    @else
        <h4 class="text-center">Antal: {{ $songs->count() }}</h4>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Namn</th>
                    <th>Melodi</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($songs as $song)
                    <tr>
                        <td>{{ $song->title }}</td>
                        <td>{{ $song->melody }}</td>
                        <td>
                            <a href="{{ url( 'song/' . $song->id . '/edit') }}" class="btn btn-link">
                                Redigera
                            </a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @endif

@endsection
