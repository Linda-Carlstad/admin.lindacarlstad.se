<html lang="{{ str_replace( '_', '-', app()->getLocale() ) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config( 'app.name', 'Linda Carlstad' ) }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,800" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{ asset( 'css/main.min.css' ) }}" rel="stylesheet">

    <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-filestyle/2.1.0/bootstrap-filestyle.min.js"></script>
    <script defer src="{{ asset( 'js/main.js' ) }}"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="{{ url( '/' ) }}">
            <img src="{{ asset( 'img/logo.svg' ) }}" width="30" height="30" alt="Linda Carlstad logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url( '/' ) }}">Start</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route( 'member.index' ) }}">Medlemmar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route( 'overalls' ) }}">Overaller</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route( 'initiationHandle' ) }}">Nollning</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route( 'board.index' ) }}">Styrelsen</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" href="{{ route( 'documents' ) }}">Dokument</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route( 'song.index' ) }}">Sånger</a>
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
        </nav>
    </div>
    <main class="container py-4">
        <div class="content d-flex align-items-center justify-content-center">
            <div class="col-md-10">
                @yield( 'content' )
            </div>
        </div>
    </main>
</body>

</html>
