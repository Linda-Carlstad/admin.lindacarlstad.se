@extends('layouts.app')
@section('content')

    <div class="text-center mb-2">
        <h2>Medlemmar</h2>
        <hr>
        <a class="btn btn-primary m-1" href="{{ route( 'member.create' ) }}">Lägg till medlem</a>
    </div>
    @if( $members->isEmpty() )
        <p class="text-center">
            Inga medlemmar tillagda, lägg till en nu!
        </p>
    @else
        <h4 class="text-center">Antal: {{ $members->count() }}</h4>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Namn</th>
                    <th>Personnummer</th>
                    <th>Email</th>
                    <th>Medlemsår</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $members as $member )
                    <tr>
                        <td>{{ $member->firstName }} {{ $member->lastName }}</td>
                        <td>{{ $member->id_number }}</td>
                        <td>{{ $member->email }}</td>
                        <td>Livstid {{ $member->membership != 'none' ? $member->membership : '' }}</td>
                        <td>
                            <a href="{{ url( 'member/' . $member->id . '/edit') }}" class="btn btn-link">
                                Redigera
                            </a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @endif

@endsection
