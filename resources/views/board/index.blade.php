@extends('layouts.app')
@section('content')

    <div class="text-center mb-2">
        <h2>Styrelsen</h2>
        <hr>
        @if( $boardMembers->isEmpty() )
            <p>
                Inga dagar skapade, skapa en nu!
            </p>
        @endif

        <a class="btn btn-primary m-1" href="{{ route( 'board.create' ) }}">Lägg till styrelseposition</a>
    </div>
    @if( !$boardMembers->isEmpty() )
        <h4 class="text-center">Antal: {{ $boardMembers->count() }}</h4>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Position</th>
                    <th>Namn</th>
                    <th>Email</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($boardMembers as $boardMember)
                    <tr>
                        <td>{{ $boardMember->title }}</td>
                        <td>{{ $boardMember->name }}</td>
                        <td>{{ $boardMember->email }}</td>
                        <td>
                            <a href="{{ url( 'board/' . $boardMember->id . '/edit') }}" class="btn btn-link">
                                Redigera
                            </a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @endif

@endsection
