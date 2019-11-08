@extends('layouts.app')
@section('content')

    <div class="text-center mb-2">
        <h2>Nollning - Nyckelpersoner</h2>
        <hr>
        <a class="btn btn-primary m-1" href="{{ route( 'person.create' ) }}">Lägg till nyckelperson</a>
    </div>

    @if( $people->isEmpty() )
        <p class="text-center">
            Inga nyckelpersoner tillagda, lägg till en nu!
        </p>
    @else
        <h4 class="text-center">Antal: {{ $people->count() }}</h4>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Namn</th>
                    <th>Rank</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($people as $person)
                    <tr>
                        <td>{{ $person->name }}</td>
                        <td>{{ $person->rank }}</td>
                        <td>
                            <a href="{{ url( 'person/' . $person->id . '/edit') }}" class="btn btn-link">
                                Redigera
                            </a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @endif
    <hr>
    <div class="text-center">
        <p>
            Tillbaka till...
        </p>
        <a class="btn btn-primary m-1" href="{{ route( 'initiationHandle' ) }}">Nollning</a>
    </div>




@endsection
