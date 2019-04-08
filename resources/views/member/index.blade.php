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
        <h2>Medlemmar</h2>
        <hr>
        <a class="btn btn-primary m-1" href="{{ route( 'member.create' ) }}">Lägg till medlem</a>
        <br>
        <br>
        <form class="col-md-8 offset-md-2" action="{{ '/member' }}" method="get">
            @csrf

            <div class="form-group row">
                <div class="input-group">
                    <input id="search" type="text" placeholder="Sök.." class="form-control{{ $errors->has('search') ? ' is-invalid' : '' }}" name="search" value="{{ isset( $search ) ? $search : "" }}" autofocus required>
                    @if ($errors->has('search'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('search' ) }}</strong>
                        </span>
                    @endif
                    <div class="input-group-append">
                        <button type="submit" name="button" class="btn btn-primary btn-file">Sök</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @if( isset( $search ) )
        <h4>Du sökte på: <i>{{ $search }}</i></h4>
    @endif
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Namn</th>
                <th>Personnummer</th>
                <th>Mail</th>
                <th>Medlemskap</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->firstName }} {{ $member->lastName }}</td>
                    <td>{{ $member->id_number }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->membership }} {{ $member->start }}</td>
                    <td>
                        <a href="{{ url( 'member/' . $member->id . '/edit') }}" class="btn btn-link">
                            Redigera
                        </a>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
    {{ $members->links() }}

@endsection
