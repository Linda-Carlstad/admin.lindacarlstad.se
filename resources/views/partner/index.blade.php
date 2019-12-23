@extends('layouts.app')
@section('content')

    <div class="text-center mb-2">
        <h1>Partners</h1>
        <hr>
        <a class="btn btn-primary m-1" href="{{ route( 'partner.create' ) }}">Lägg till partner</a>
    </div>
    @if( $partners->isEmpty() )
        <p class="text-center">
            Inga partner tillagda, lägg till en nu!
        </p>
    @else
        <h4 class="text-center">Antal: {{ $partners->count() }}</h4>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Namn</th>
                    <th>Rank</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partners as $partner)
                    <tr>
                        <td>{{ $partner->name }}</td>
                        <td>{{ $partner->type }}</td>
                        <td>
                            <a href="{{ url( 'partner/' . $partner->id . '/edit') }}" class="btn btn-link">
                                Redigera
                            </a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @endif

    @if( isset( $search ) )
        <hr>
        <div class="text-center">
            <a class="btn btn-primary" href="{{ route( 'partner.index' ) }}">Visa alla</a>
        </div>
    @endif

@endsection
