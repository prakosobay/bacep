<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <link href="{{asset('css/homepage.css')}}" rel="stylesheet" type="text/css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <style>

    </style>
</head>
<body>
{{-- navbar --}}
<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{asset('gambar/home/logo_bts.png')}}" alt="" style="width: 160px; height:60px">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item mx-5">
                <a class="nav-link" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item mx-5">
                <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item mx-5">
                <a class="nav-link" href="#">Log Permit</a>
            </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item mx-3">
                    <a href="#"><img src="{{asset('gambar/home/bell.svg')}}" alt=""></a>
                </li>
                <li class="nav-item mx-3">
                    <a href="#"><img src="{{asset('gambar/home/box-arrow-right.svg')}}" alt=""></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- background image --}}
<div class="container-fluid" id="banner">
    <div class="container banner-content">
        <div >
            <p class="fs-5" style="color: #EA8C00">
                DATA CENTER BALITOWER
            </p>
            <p class="fs-5" style="color: #FFFFFF">
                Hi, IP Core Team
            </p>
            <p class="fs-1" style="color: #FFFFFF">
                Welcome to
            </p>
            <p class="fs-1" style="color: #FFFFFF">
                Bali Tower
            </p>
            <p style="color: #FFFFFF">
                Protecting Your Technology Investment
            </p>
            <p class="my-3">
                <button class="btn" id="btn-new">Create New Permit</button>
            </p>
        </div>
    </div>
</div>

{{-- carousel --}}
<div class="container-fluid py-5 bg-carousel">
    <div class="container judul-carousel">
        <div class="text-center">
            <p class="text-carousel-1">
                <b>Grow With Bali Tower</b>
            </p>
            <p class="text-carousel-2">
                Our Services Helps Top Company Secure Their Things and Keep Growing
            </p>
        </div>
    </div>

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <div class="row justify-content-md-center">
                    <div class="col col-lg-2">
                        <img src="{{asset('gambar/home/google.png')}}" class="logo">
                    </div>
                    <div class="col-md-auto">
                        <img src="{{asset('gambar/home/facebook.png')}}" class="logo">
                    </div>
                    <div class="col col-lg-2">
                        <img src="{{asset('gambar/home/akamai.png')}}" class="logo">
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <div class="row justify-content-md-center">
                    <div class="col col-lg-2">
                        <img src="{{asset('gambar/home/cartenz.png')}}" class="logo">
                    </div>
                    <div class="col-md-auto">
                        <img src="{{asset('gambar/home/coalindo.png')}}" class="logo">
                    </div>
                    <div class="col col-lg-2">
                        <img src="{{asset('gambar/home/adia.png')}}" class="logo">
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <div class="row justify-content-md-center">
                    <div class="col col-lg-2">
                        <img src="{{asset('gambar/home/wirecard.png')}}" class="logo">
                    </div>
                    <div class="col-md-auto">
                        <img src="{{asset('gambar/home/perbanas.png')}}" class="logo">
                    </div>
                    <div class="col col-lg-2">
                        <img src="{{asset('gambar/home/idch.png')}}" class="logo">
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <div class="row justify-content-md-center">
                    <div class="col col-lg-2">
                        <img src="{{asset('gambar/home/lintasarta.png')}}" class="logo">
                    </div>
                    <div class="col-md-auto">
                        <img src="{{asset('gambar/home/hsp.png')}}" class="logo">
                    </div>
                    <div class="col col-lg-2">
                        <img src="{{asset('gambar/home/icon.png')}}" class="logo">
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

{{-- about  --}}
<div class="container">
    <div class="col-5">

    </div>
    <div class="col-7">

    </div>
</div>

{{-- Footer --}}
<footer class="sticky-footer" style="background-color: #062A61; height:30px">
    <div class="container my-auto">
        <div class="copyright text-center text-white my-auto py-auto">
            <span>PT Bali Tower Data Center - 2022</span>
        </div>
    </div>
</footer>

    <!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
</body>
</html>


