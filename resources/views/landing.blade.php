<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>myKhairat</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="css\styles.css">
        <link rel="stylesheet" href="css\Footer-Basic.css">

        <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-light navbar-expand-md">
            <div class="container"><a class="navbar-brand" href="#" style="font-weight: bold;">myKhairat</a><button
                    data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span
                        class="visually-hidden">Toggle navigation</span><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse d-md-flex justify-content-md-end" id="navcol-1">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" href="#">About</a></li>
                        <li class="nav-item"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid" style="margin-top: 20px;margin-bottom: 50px;">
            <div class="row">
                <div class="col-md-6 d-flex flex-column flex-fill align-items-xxl-center"
                    style="padding-top: 150px;padding-bottom: 150px;padding-right: 30px;padding-left: 30px;border-style: none;">
                    <p>Muat turun di</p>
                    <div class="text-center float-none d-xxl-flex justify-content-xxl-center align-items-xxl-center download-button"
                        data-bss-hover-animate="pulse"
                        style="height: 80px;border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-right-radius: 15px;border-bottom-left-radius: 15px;border: 2px solid rgb(78,214,155);margin-right: 100px;margin-left: 100px;width: 300px;">
                        <img class="d-none float-start d-xxl-flex align-items-center align-self-center justify-content-xxl-center align-items-xxl-center"
                            style="width: 64px;height: 64px;margin-left: 15px;" src="img/google-play.png">
                        <h3
                            class="text-center d-inline-flex float-end d-xxl-flex flex-grow-1 justify-content-xxl-center">
                            Google Play</h3>
                    </div>
                    <div class="text-center float-none d-xxl-flex justify-content-xxl-center align-items-xxl-center download-button"
                        data-bss-hover-animate="pulse"
                        style="height: 80px;border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-right-radius: 15px;border-bottom-left-radius: 15px;border: 2px solid rgb(78,214,155);margin-right: 100px;margin-left: 100px;width: 300px;margin-top: 15px;">
                        <img class="d-none float-start d-xxl-flex align-items-center align-self-center justify-content-xxl-center align-items-xxl-center"
                            style="width: 64px;height: 64px;margin-left: 15px;" src="img/app-store.png">
                        <h3 class="text-center d-inline-flex float-end d-xxl-flex flex-grow-1 justify-content-xxl-center"
                            style="color: var(--bs-secondary);">Coming Soon</h3>
                    </div>
                </div>
                <div class="col-md-6" style="padding-top: 80px;padding-right: 150px;">
                    <h1>SELAMAT DATANG KE</h1>
                    <h1 style="color: RGB(78,214,155);">MYKHAIRAT</h1>
                    <p style="margin-top: 15px;">Aplikasi MyKhairat adalah aplikasi khusus untuk pengurusan kutipan khairat 
                    kematian Islam bagi memudahkan pengurusan Masjid yang kini merekodkannya secara manual, selain untuk 
                    jawatankuasa masjid mengendalikan dan mengagihkan khairat kematian. Khairat pada asasnya adalah satu 
                    bentuk derma atau kebajikan yang mengumpul wang pada kadar tertentu dan akan diberikan kepada mana-mana 
                    tanggungan ahli yang layak sekiranya ahli meninggal dunia. Ahli juga boleh menuntut khairat kematian untuk 
                    tanggungan mereka yang berdaftar. Perkhidmatan pengebumian akan diuruskan oleh jawatankuasa masjid dan mana-mana 
                    ahli khairat yang aktif tidak akan dikenakan bayaran untuk perbelanjaan pengebumian.

&nbsp;<br><br></p>
                    <div class="d-xxl-flex justify-content-xxl-center">
                        <div class="col d-xxl-flex flex-column justify-content-xxl-center align-items-xxl-center">
                            <button class="btn btn-primary bg-success bg-gradient d-xxl-flex" type="button" onclick="location.href='admin/login'"
                                style="background: rgb(78,214,155);border-radius: 11px;padding: 10px;padding-right: 25px;padding-left: 25px;max-width: 250px;text-align: center;">Log
                                Masuk sebagai Admin</button>
                            <div class="d-flex" style="padding-top: 5px;">
                                <p>Atau&nbsp;</p><a href="admin/register"
                                    style="color: rgb(78,214,155);font-weight: bold; text-decoration: none;">Daftar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer-basic">
            <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i
                        class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a>
            </div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="#">Services</a></li>
                <li class="list-inline-item"><a href="#">About</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            </ul>
            <p class="copyright">myKhairat © 2022</p>
        </footer>
        <script src="js/bs-init.js"></script>
    </body>

</html>