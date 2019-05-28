<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TodoBodegas</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


    <!-- Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/todobodegas.css">
    <style>

        html, body {
            font-family: 'OpenSans', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
            text-shadow: 1px 3px 3px #555;
        }

        .m-b-md {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <nav class="navbar navbar-expand-lg top-right links">
            @auth
                <a class="nav-link" href="{{ url('/home') }}">Hogar</a>
            @else
                <a class="nav-link" href="https://docs.google.com/forms/d/1L0oheRbgH4w8CZ_NeXVHsObFZD1LRSMy11LqBjvlZrQ/viewform?ts=5b098cb6">Encuesta</a>
                <a class="nav-link" href="{{ route('login') }}">Ingresar</a>

                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                @endif
            @endauth
        </nav>
    @endif


    <div class="content container">
        <h1 class="title m-b-md font-weight-bold">
            TodoBodegas
        </h1>

        <div id="myCarousel" class="carousel slide " data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item">
                    <img class="first-slide" src="img/Bodega_1.jpg" alt="Primer slide">
                    <div class="container">
                        <div class="carousel-caption text-warning text-left">
                            <h1>¿Porque sufrir para encontrar la bodega adecuada?</h1>
                            <p>Para de sufrir, TodoBodegas esta aqui para responder tus oraciones.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item active">
                    <img class="second-slide" src="img/Bodega_2.jpg" alt="Segundo slide">
                    <div class="container">
                        <div class="carousel-caption text-warning">
                            <h1>El tiempo es dinero.</h1>
                            <p>En TodoBodegas encontraras rapidamente la bodega adecuada. Si no la
                                encuentras, te devolvemos tu dinero!</p>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="third-slide" src="img/Bodega_3.jpg" alt="Tercer slide">
                    <div class="container">
                        <div class="carousel-caption text-warning text-right">
                            <h1>¿Mayor informacion?</h1>
                            <p>LLama ahora mismo a la linea atencion inmediata del Guey.</p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>
</div>
<footer>
    <hr>
    <img src="img/pbfbsd2.gif" alt="Powered by FreeBSD" class="rounded float-right d-block"/>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
</body>
</html>
