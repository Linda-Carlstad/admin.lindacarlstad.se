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
        <h1>Partners</h1>
        <hr>
        <a class="btn btn-primary m-1" href="{{ route( 'partner.create' ) }}">Lägg till partner</a>
        @if( !$partners->isEmpty() || isset( $search ) )
            <form class="col-md-8 offset-md-2 mt-2" action="{{ '/partner' }}" method="get">
                @csrf

                <div class="form-group row">
                    <div class="input-group">
                        <input id="search" type="text" placeholder="Sök.." class="form-control{{ $errors->has('search') ? ' is-invalid' : '' }}" name="search" value="{{ isset( $search ) ? $search : "" }}" autofocus>
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
        @endif
    </div>
    @if( isset( $search ) )
        <h4>Du sökte på: <i>{{ $search }}</i></h4>
    @endif
    @if( $partners->isEmpty() )
        <p class="text-center">
            Inga partner tillagda, lägg till en nu!
        </p>

    @else
        <h4 class="text-center">Antal: {{ $total }}</h4>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Namn</th>
                    <th>Rank</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partners as $partner)
                    <tr>
                        <td>{{ $partner->name }}</td>
                        <td>{{ $partner->type }}</td>
                        <td>
                            <a href="{{ url( 'partner/' . $partner->id . '/edit') }}" class="btn btn-link">
                                Redigera
                            </a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @endif

@endsection
