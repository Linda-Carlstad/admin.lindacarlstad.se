<html lang="{{ str_replace( '_', '-', app()->getLocale() ) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config( 'app.name', 'Linda Carlstad' ) }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,800" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset( 'css/main.min.css' ) }}" rel="stylesheet">

    <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script defer src="{{ asset( 'js/main.js' ) }}"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url( '/' ) }}">Start</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route( 'members' ) }}">Medlemmar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route( 'overalls' ) }}">Overaller</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route( 'initiation' ) }}">Nollning</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route( 'board' ) }}">Styrelsen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route( 'documents' ) }}">Dokument</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route( 'logout' ) }}" onclick="event.preventDefault();
                                           document.getElementById( 'logout-form' ).submit();">
                            Logga ut
                        </a>
                        <form id="logout-form" action="{{ route( 'logout' ) }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container mt-2">
        <div class="content d-flex align-items-center justify-content-center">
            <div class="col-md-10 col-lg-8">
                @yield( 'content' )
            </div>
        </div>
    </main>
</body>

</html>
