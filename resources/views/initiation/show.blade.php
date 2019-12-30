@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>Nollning: {{ $initiation->year }}</h2>
        <hr>
    </div>
    <div class="text-center">
        <h4 class="text-center">Dagar: {{ $days->count() }}</h4>
        <a class="btn btn-primary m-1" href="{{ route( 'day.create' ) }}">Lägg till dag</a>
    </div>
    @if( $days->isEmpty() )
        <p class="text-center">
            Inga dagar skapade, skapa en nu!
        </p>
    @else
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Titel</th>
                <th>Datum</th>
                <th>Order</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($days as $day)
                <tr>
                    <td>{{ $day->title }}</td>
                    <td>
                        @if( $day->date )
                            {{ $day->date }}
                        @else
                            Inget datum valt
                        @endif
                    </td>
                    <td>
                        @if( $day->order )
                            {{ $day->order }}
                        @else
                            Inget ordning vald
                        @endif
                    </td>
                    <td>
                        <a href="{{ url( 'day/' . $day->id . '/edit') }}" class="btn btn-link">
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
        <h4 class="text-center">Nyckelpersoner: {{ $persons->count() }}</h4>
        <a class="btn btn-primary m-1" href="{{ route( 'person.create' ) }}">Lägg till nyckelperson</a>
    </div>
    @if( $persons->isEmpty() )
        <p class="text-center">
            Inga nyckelpersoner tillagda, lägg till en nu!
        </p>
    @else
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Namn</th>
                <th>Rank</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($persons as $person)
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
        <a class="btn btn-primary m-1" href="{{ route( 'initiation.index' ) }}">Nollningar</a>
    </div>

@endsection
