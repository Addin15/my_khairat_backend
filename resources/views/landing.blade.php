<!DOCTYPE html>
<html>

    <head>
        <title>myKhairat</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="container sticky-top ">
            <div class="flex row">
                <div class="col-lg pt-3 ps-3">myKhairat</div>
                <div class="d-flex justify-content-end pt-3 pe-3 col">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row justify-content-center bg-primary">
                <!-- Download section -->
                <div class="col bg-secondary pt-5">
                    Download
                </div>
                <!-- Welcome section -->
                <div class="col">
                    SELAMAT DATANG KE<br>
                    MYKHAIRAT
                </div>
            </div>
        </div>
    </body>

</html>