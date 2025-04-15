@extends('layouts.app')
@section('content')

    <div class="text-center mb-2">
        <h2>Evenemang</h2>
        <hr>
        @if( $events->isEmpty() )
            <p>
                Inga evenemang skapade, skapa ett nu!
            </p>
        @endif

        <a class="btn btn-primary m-1" href="{{ route('linda_events.create') }}">Lägg till ett evenemang</a>
    </div>
    @if( !$events->isEmpty() )
        <h4 class="text-center">Antal: {{ $events->count() }}</h4>
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Namn</th>
                <th>Beskrivning</th>
                <th>Starttid</th>
                <th>Sluttid</th>
                <th>Status</th>
                <th>Plats</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->summary }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->starts)->format('Y-m-d H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->ends)->format('Y-m-d H:i') }}</td>
                    <td>{{ ucfirst($event->status) }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                        <a href="{{ url('linda_events/' . $event->id . '/edit') }}" class="btn btn-link">
                            Redigera
                        </a>
                        <form action="{{ '/linda_events/' . $event->id }}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Är du säker på att du vill ta bort detta evenemang?')">
                                Ta bort
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

@endsection
