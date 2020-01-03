@extends('layouts.app')
@section('content')

    <div class="text-center mb-2">
        <h2>Föreningar</h2>
        <hr>
        @if( $associations->isEmpty() )
            <p>
                Inga föreningar tillagda, lägg till en nu!
            </p>
        @endif

        <a class="btn btn-primary m-1" href="{{ route( 'association.create' ) }}">Lägg till förening</a>
    </div>
    @if( !$associations->isEmpty() )
        <h4 class="text-center">Antal: {{ $associations->count() }}</h4>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Namn</th>
                    <th>Slogan</th>
                    <th>Email</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($associations as $association)
                    <tr>
                        <td>{{ $association->name }}</td>
                        <td>
                            @if( $association->slogan )
                                {{ $association->slogan }}
                            @else
                                Ingen slogan
                            @endif
                        </td>
                        <td>
                            @if( $association->email )
                                <a href="{{ $association->email }}">{{ $association->email }}</a>
                            @else
                                Ingen email
                            @endif
                        </td>
                        <td>
                            <a href="{{ url( 'association/' . $association->id . '/edit') }}" class="btn btn-link">
                                Redigera
                            </a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @endif

@endsection
