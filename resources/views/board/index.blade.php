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
        <h2>Styrelsen</h2>
    </div>
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
                    <td>{{ $boardMember->position }}</td>
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
@endsection
