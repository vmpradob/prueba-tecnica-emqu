<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="css/app.css" rel="stylesheet" type="text/css">
        <link href="js/app.js" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #636b6f;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
            <div class="content">
            <div class="card">
                <div class="card-title mt-3">
                    <H1>Manejo de empleados</H1>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form method="GET" action="{{route('employe.export')}}" class="" target="_blank" > 
                            <button type="submit" class="btn btn-success btn-lg btn-block">exportar empleados!</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form method="POST" id="import-form" enctype="multipart/form-data" action="{{route('employe.import')}}" class="" target="_blank" > 
                        
                            <button type="submit" class="btn btn-primary btn-lg btn-block">importar empleados!</button>
                        </form>
                    </div>
                    
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="custom-file">
                                <input type="file" class="custom-file-input" form="import-form" name="file" id="customFile">
                                <label class="custom-file-label" for="customFile" >Seleccione el archivo a importar</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>
