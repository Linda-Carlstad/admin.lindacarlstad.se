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
        <hr>
        <a class="btn btn-primary m-1" href="{{ route( 'initiation.create' ) }}">Lägg till dag</a>
        <a class="btn btn-primary m-1" href="{{ route( 'person.create' ) }}">Lägg till nyckelperson</a>
        <a class="btn btn-primary m-1" href="{{ route( 'information.edit' ) }}">Uppdatera information</a>
    </div>

    @if( $keyPeople->isEmpty() )
        <p class="text-center">
            Inga nyckelpersoner tillagda, lägg till en nu!
        </p>
    @else
        <h4 class="text-center">Nyckelpersoner: {{ $keyPeople->count() }}</h4>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Namn</th>
                    <th>Rank</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keyPeople as $keyPerson)
                    <tr>
                        <td>{{ $keyPerson->name }}</td>
                        <td>{{ $keyPerson->rank }}</td>
                        <td>
                            <a href="{{ url( 'person/' . $keyPerson->id . '/edit') }}" class="btn btn-link">
                                Redigera
                            </a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @endif
    <hr>
    @if( $days->isEmpty() )
        <p class="text-center">
            Inga dagar skapade, skapa en nu!
        </p>
    @else
        <h4 class="text-center">Dagar: {{ $days->count() }}</h4>
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
                        <td>{{ $day->date }}</td>
                        <td>{{ $day->order }}</td>
                        <td>
                            <a href="{{ url( 'initiation/' . $day->id . '/edit') }}" class="btn btn-link">
                                Redigera
                            </a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @endif


@endsection
