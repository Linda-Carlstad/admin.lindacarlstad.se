@extends('layouts.app')
@section('content')

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
        <h5>Antal resultat: <i>{{ $totalSearch }}</i></h5>
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

    @if( isset( $search ) )
        <hr>
        <div class="text-center">
            <a class="btn btn-primary" href="{{ route( 'partner.index' ) }}">Visa alla</a>
        </div>
    @endif

@endsection
