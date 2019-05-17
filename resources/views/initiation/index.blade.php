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

        @if( $initiationDays->isEmpty() )
            <p>
                Inga dagar skapade, skapa en nu!
            </p>
        @endif

        <a class="btn btn-primary m-1" href="{{ route( 'initiation.create' ) }}">Lägg till dag</a>
    </div>

    @if( !$initiationDays->isEmpty() )
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
                @foreach ($initiationDays as $initiationDay)
                    <tr>
                        <td>{{ $initiationDay->title }}</td>
                        <td>{{ $initiationDay->date }}</td>
                        <td>{{ $initiationDay->order }}</td>
                        <td>
                            <a href="{{ url( 'initiation/' . $initiationDay->id . '/edit') }}" class="btn btn-link">
                                Redigera
                            </a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @endif


@endsection
