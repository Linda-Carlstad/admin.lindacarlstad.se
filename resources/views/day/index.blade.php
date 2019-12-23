@extends('layouts.app')
@section('content')

    <div class="text-center mb-2">
        <h2>Nollning - Dagar</h2>
        <hr>
        <a class="btn btn-primary m-1" href="{{ route( 'day.create' ) }}">Lägg till dag</a>
    </div>

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
        <p>
            Tillbaka till...
        </p>
        <a class="btn btn-primary m-1" href="{{ route( 'initiationHandle' ) }}">Nollning</a>
    </div>




@endsection
