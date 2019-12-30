@extends('layouts.app')
@section('content')

    <div class="text-center mb-2">
        <h2>Events</h2>
        <hr>
        @if( $events->isEmpty() )
            <p>
                Inga event skapade, skapa en nu!
            </p>
        @endif

        <a class="btn btn-primary m-1" href="{{ route( 'event.create' ) }}">Lägg till event</a>
    </div>
    @if( !$events->isEmpty() )
        <h4 class="text-center">Antal: {{ $events->count() }}</h4>
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Titel</th>
                <th>Aktiv</th>
                <th>Länk</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>
                        @if( $event->active )
                            Ja
                        @else
                            Nej
                        @endif
                    </td>
                    <td>
                        @if( $event->link )
                            <a target="_blank" href="{{ $event->link }}">{{ $event->link_title }}</a>
                        @else
                            Ingen länk
                        @endif
                    </td>
                    <td>
                        <a href="{{ url( 'event/' . $event->id . '/edit') }}" class="btn btn-link">
                            Redigera
                        </a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    @endif

@endsection
