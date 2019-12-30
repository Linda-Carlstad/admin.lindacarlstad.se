@extends('layouts.app')
@section('content')

    <div class="text-center mb-2">
        <h2>Nollningar</h2>
        <hr>
        <a class="btn btn-primary m-1" href="{{ route( 'initiation.create' ) }}">Lägg till nollning</a>
    </div>

    @if( $initiations->isEmpty() )
        <p class="text-center">
            Inga nollningar skapade, skapa en nu!
        </p>
    @else
        <h4 class="text-center">Nollnignar: {{ $initiations->count() }}</h4>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>År</th>
                    <th>Pris</th>
                    <th>Beskrivning</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($initiations as $initiation)
                    <tr>
                        <td>{{ $initiation->year }}</td>
                        <td>
                            {{ $initiation->price }}
                            @if( $initiation->show_price )
                                <i data-toggle="tooltip" data-placement="top" title="Pris visas på webbsidan" class="fas fa-check"></i>
                            @endif
                        </td>
                        <td>{{ \Illuminate\Support\Str::limit($initiation->description, 50, $end='...') }}</td>
                        <td>
                            <a href="{{ url( 'initiation/' . $initiation->id ) }}">
                                Visa
                            </a>
                            /
                            <a href="{{ url( 'initiation/' . $initiation->id . '/edit') }}" class="btn btn-link">
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
