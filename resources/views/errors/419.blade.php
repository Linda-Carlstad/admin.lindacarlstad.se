@extends( 'layouts.app' )
@section( 'title', '401' )
@section( 'content' )

    <div class="text-center">
        <h1>{{ $exception->getStatusCode() }}</h1>
        <p>Något gick fel.</p>
    </div>

@endsection
