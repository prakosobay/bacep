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

    @can('isVisitor')

    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-0 my-0">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('gambar/home/logo_bts.png')}}" alt="" style="width: 170px; height:70px" class="img-fluid">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item mx-5">
                    <a class="nav-link inter" aria-current="page" href="{{url('/home')}}">Home</a>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link inter" href="#about">About Us</a>
                </li>
                <li class="nav-item mx-5">
                    @can('isInternal')
                        <a class="nav-link inter" href="{{ route('dashboardInternal', auth()->user()->department) }}">Log Permit</a>
                    @elsecan('isEksternal')
                        <a class="nav-link inter" href="{{ route('dashboardEksternal', auth()->user()->company) }}">Log Permit</a>
                    @elsecan('isSurvey')
                        <a class="nav-link inter" href="{{ route('dashboardInternal', auth()->user()->department) }}">Log Permit</a>
                    @endcan
                </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item mx-3">
                        <a href="#"><img src="{{asset('gambar/home/bell.svg')}}" alt=""></a>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <img src="{{asset('gambar/home/box-arrow-right.svg')}}" class="img-fluid" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        @can('isInternal')
            <div class="container-fluid" id="banner">
                <div class="container banner-content">
                    <div >
                        <p class="fs-5 inter-600-oren">
                            DATA CENTER BALITOWER
                        </p>
                        <p class="fs-5 lora-700">
                            Hi, {{Auth::user()->name}}
                        </p>
                        <h3 class="lora-800">
                            Welcome to
                        </h3>
                        <h3 class="lora-800">
                            Bali Tower
                        </h3>
                        <p class="inter-400-putih">
                            Protecting Your Technology Investment
                        </p>
                        <p class="">
                            <a href="{{ route('dashboardInternal', auth()->user()->department ) }}" type="button" class="new-btn inter-btn">Create New Form</a>
                        </p>
                    </div>
                </div>
            </div>

        @elsecan('isEksternal')
            <div class="container-fluid" id="banner">
                <div class="container banner-content">
                    <div >
                        <p class="fs-5 inter-600-oren">
                            DATA CENTER BALITOWER
                        </p>
                        <p class="fs-5 lora-700">
                            Hi, {{Auth::user()->name}}
                        </p>
                        <h3 class="lora-800">
                            Welcome to
                        </h3>
                        <h3 class="lora-800">
                            Bali Tower
                        </h3>
                        <p class="inter-400-putih">
                            Protecting Your Technology Investment
                        </p>
                        <p class="">
                            <a href="{{ route('dashboardEksternal') }}" type="button" class="new-btn inter-btn">Create New Form</a>
                        </p>
                    </div>
                </div>
            </div>

        @elsecan('isSurvey')
            <div class="container-fluid" id="banner">
                <div class="container banner-content">
                    <div >
                        <p class="fs-5 inter-600-oren">
                            DATA CENTER BALITOWER
                        </p>
                        <p class="fs-5 lora-700">
                            Hi, {{Auth::user()->name}}
                        </p>
                        <h3 class="lora-800">
                            Welcome to
                        </h3>
                        <h3 class="lora-800">
                            Bali Tower
                        </h3>
                        <p class="inter-400-putih">
                            Protecting Your Technology Investment
                        </p>
                        <p class="">
                            <a href="{{ route('dashboardSurvey') }}" type="button" class="new-btn inter-btn">Create New Form</a>
                        </p>
                    </div>
                </div>
            </div>
        @endcan

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
    <div class="container py-5 px-5" id="about">
        <div class="row justify-content-center">
            <div class="col-4 text-center">
                <h4 class="text-about">
                    <b>ABOUT US: BALI TOWER DATA CENTER</b>
                </h4>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-4 px-0">
                <img src="{{asset('gambar/home/wallpaper.png')}}" alt="" class="img-fluid">
            </div>
            <div class="col-6">
                <h3 class="lora-about">
                    PT. Bali Towerindo Sentra - Data Center Building
                </h3>
                <p class="paragraph1">
                    Bali Tower Data center offers many benefits and a reliable system. We housing for your IT and network systems in a high availability, secure environment, also the best possible physical and technical infrastructure.
                </p>
                <p class="paragraph1">
                    Bali Tower Data Center is a division of PT. Bali Towerindo Sentra. Tbk established in 2018. Being a leading telecommunication infrastructure provider in Bali, the company provide  tower equipped with integrated transmitting facilities both through fiber optic and wireless technology. Come over to <a href="https://www.balitower.co.id/" style="text-decoration: none; color : #EA8C00">www.balitower.co.id</a> for more info about companies package.
                </p>
            </div>
        </div>
    </div>

    {{-- benefit --}}
    <div class="container-fluid py-4 bg-benefit">
        <div class="container px-5">
            <div class="row">
                <div class="text-center">
                    <p class="fs-4 text-benefit">
                        Our Benefits
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-3">
                    <p>
                        <img src="{{asset('gambar/home/ceklis.png')}}" alt="" class="img-fluid">
                    </p>
                    <p class="fs-5 fw-bold text-benefit-sub">
                        Certified Data Center
                    </p>
                    <p class="text-benefit-isi">
                        Bali Tower Data Center holds RATED 3 –TIA 942 & ISO 27001 certification. Also connected to major carrier hubs and cloud networks
                    </p>
                </div>
                <div class="col-3">
                    <p>
                        <img src="{{asset('gambar/home/star.png')}}" alt="" class="img-fluid">
                    </p>
                    <p class="fs-5 fw-bold text-benefit-sub">
                        Ring 1 Area
                    </p>
                    <p class="text-benefit-isi">
                        Located at the heart of Jakarta (ring 1) area, we provide you with easy access, 24 hour electricity and flood-free location.
                    </p>
                </div>
                <div class="col-3">
                    <p>
                        <img src="{{asset('gambar/home/gembok.png')}}" alt="" class="img-fluid">
                    </p>
                    <p class="fs-5 fw-bold text-benefit-sub">
                        High Availability
                    </p>
                    <p class="text-benefit-isi">
                        24/7 Data Center and NOC operation, High bandwith internet, 15 minute respond time standard remote hand & eye availability 24/7.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-3">
                    <a href="#" class="" style="color: #EA8C00; text-decoration: none">
                        <img src="{{asset('gambar/home/Arrows.png')}}" alt="" class="img-fluid">
                        See Our Certificate
                    </a>
                </div>
                <div class="col-3">
                    <a href="#" class="" style="color: #EA8C00; text-decoration: none">
                        <img src="{{asset('gambar/home/Arrows.png')}}" alt="" class="img-fluid">
                        <a href="https://www.google.com/maps/place/PT.+Bali+Towerindo+Sentra,+Tbk./@-6.1622723,106.8206658,17z/data=!3m1!4b1!4m5!3m4!1s0x2e69f5ea2b8b1ba5:0xb4683bd0933b376a!8m2!3d-6.1623528!4d106.822869">See Our Location</a>
                    </a>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>

    {{-- create new permit --}}
    <div class="container-fluid py-5 bg-new">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="text-center">
                    <h3 class="fs-7 text-book-oren">
                        BOOK A VISIT TO OUR DATA CENTER
                    </h3>
                    <h1 class="fs-1 lora-800">
                        Create New Permit
                    </h1>
                    <p class="text-book-putih">
                        Book a visit to our Data Center with <b>Permit</b>. Permit is a one-way access for our Data Center Building.
                    </p>
                    <p>
                        <a href="{{ url('logall') }}" type="button" id="" class="new-btn-oren" data-cleaning_id="">Create New Permit</a>
                    </p>
                </div>
            </div>
        </div>
    </div>


    @elsecan('isBm')
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-0 my-0">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('gambar/home/logo_bts.png')}}" alt="" style="width: 170px; height:70px" class="img-fluid">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item mx-5">
                    <a class="nav-link inter" aria-current="page" href="{{url('/home')}}">Home</a>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link inter" href="#about">About Us</a>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link inter" href="{{url('logall')}}">Log Permit</a>
                </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item mx-3">
                        <a href="#"><img src="{{asset('gambar/home/bell.svg')}}" alt=""></a>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <img src="{{asset('gambar/home/box-arrow-right.svg')}}" class="img-fluid" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- background image --}}
    <div class="container-fluid" id="banner">
        <div class="container banner-content">
            <div >
                <p class="fs-5 inter-600-oren">
                    DATA CENTER BALITOWER
                </p>
                <p class="fs-5 lora-700">
                    Hi, {{Auth::user()->name}}
                </p>
                <h3 class="lora-800">
                    Welcome to
                </h3>
                <h3 class="lora-800">
                    Bali Tower
                </h3>
                <p class="inter-400-putih">
                    Protecting Your Technology Investment
                </p>
                <p class="">
                    <a href="{{ route('logall') }}" type="button" id="" class="new-btn inter-btn" data-cleaning_id="">Create New Form</a>
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
    <div class="container py-5 px-5" id="about">
        <div class="row justify-content-center">
            <div class="col-4 text-center">
                <h4 class="text-about">
                    <b>ABOUT US: BALI TOWER DATA CENTER</b>
                </h4>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-4 px-0">
                <img src="{{asset('gambar/home/wallpaper.png')}}" alt="" class="img-fluid">
            </div>
            <div class="col-6">
                <h3 class="lora-about">
                    PT. Bali Towerindo Sentra - Data Center Building
                </h3>
                <p class="paragraph1">
                    Bali Tower Data center offers many benefits and a reliable system. We housing for your IT and network systems in a high availability, secure environment, also the best possible physical and technical infrastructure.
                </p>
                <p class="paragraph1">
                    Bali Tower Data Center is a division of PT. Bali Towerindo Sentra. Tbk established in 2018. Being a leading telecommunication infrastructure provider in Bali, the company provide  tower equipped with integrated transmitting facilities both through fiber optic and wireless technology. Come over to <a href="https://www.balitower.co.id/" style="text-decoration: none; color : #EA8C00">www.balitower.co.id</a> for more info about companies package.
                </p>
            </div>
        </div>
    </div>

    {{-- benefit --}}
    <div class="container-fluid py-4 bg-benefit">
        <div class="container px-5">
            <div class="row">
                <div class="text-center">
                    <p class="fs-4 text-benefit">
                        Our Benefits
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-3">
                    <p>
                        <img src="{{asset('gambar/home/ceklis.png')}}" alt="" class="img-fluid">
                    </p>
                    <p class="fs-5 fw-bold text-benefit-sub">
                        Certified Data Center
                    </p>
                    <p class="text-benefit-isi">
                        Bali Tower Data Center holds RATED 3 –TIA 942 & ISO 27001 certification. Also connected to major carrier hubs and cloud networks
                    </p>
                </div>
                <div class="col-3">
                    <p>
                        <img src="{{asset('gambar/home/star.png')}}" alt="" class="img-fluid">
                    </p>
                    <p class="fs-5 fw-bold text-benefit-sub">
                        Ring 1 Area
                    </p>
                    <p class="text-benefit-isi">
                        Located at the heart of Jakarta (ring 1) area, we provide you with easy access, 24 hour electricity and flood-free location.
                    </p>
                </div>
                <div class="col-3">
                    <p>
                        <img src="{{asset('gambar/home/gembok.png')}}" alt="" class="img-fluid">
                    </p>
                    <p class="fs-5 fw-bold text-benefit-sub">
                        High Availability
                    </p>
                    <p class="text-benefit-isi">
                        24/7 Data Center and NOC operation, High bandwith internet, 15 minute respond time standard remote hand & eye availability 24/7.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-3">
                    <a href="#" class="" style="color: #EA8C00; text-decoration: none">
                        <img src="{{asset('gambar/home/Arrows.png')}}" alt="" class="img-fluid">
                        See Our Certificate
                    </a>
                </div>
                <div class="col-3">
                    <a href="#" class="" style="color: #EA8C00; text-decoration: none">
                        <img src="{{asset('gambar/home/Arrows.png')}}" alt="" class="img-fluid">
                        <a href="https://www.google.com/maps/place/PT.+Bali+Towerindo+Sentra,+Tbk./@-6.1622723,106.8206658,17z/data=!3m1!4b1!4m5!3m4!1s0x2e69f5ea2b8b1ba5:0xb4683bd0933b376a!8m2!3d-6.1623528!4d106.822869">See Our Location</a>
                    </a>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>

    {{-- create new permit --}}
    <div class="container-fluid py-5 bg-new">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="text-center">
                    <h3 class="fs-7 text-book-oren">
                        BOOK A VISIT TO OUR DATA CENTER
                    </h3>
                    <h1 class="fs-1 lora-800">
                        Create New Permit
                    </h1>
                    <p class="text-book-putih">
                        Book a visit to our Data Center with <b>Permit</b>. Permit is a one-way access for our Data Center Building.
                    </p>
                    <p>
                        <a href="{{ url('logall') }}" type="button" id="" class="new-btn-oren" data-cleaning_id="">Create New Permit</a>
                    </p>
                </div>
            </div>
        </div>
    </div>


    {{-- ------------------------------- Approval Section -------------------------------------- --}}

    @else
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
                @can('isSecurity')
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" aria-current="page" href="{{url('/home')}}">Home</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" href="{{url('approval/all')}}">Approval</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" href="{{ url('history/all') }}">Log Permit</a>
                    </li>
                </ul>

                @elsecan('isAdmin')
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" aria-current="page" href="{{url('/home')}}">Home</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" href="{{ url('/table_user') }}">Admin Panel</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" href="{{ url('/table_barang') }}">General</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" href="{{ url('history/all') }}">Log Permit</a>
                    </li>
                </ul>

                @else
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" aria-current="page" href="{{url('/home')}}">Home</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" href="{{url('approval/all')}}">Approval</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" href="{{ url('full/all') }}">Full Approval</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" href="{{ url('/table_barang') }}">General</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" href="{{ url('history/all') }}">Log Permit</a>
                    </li>
                </ul>

                @endcan
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item mx-3">
                        <a href="#"><img src="{{asset('gambar/home/bell.svg')}}" alt=""></a>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <img src="{{asset('gambar/home/box-arrow-right.svg')}}" class="img-fluid" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- background image --}}
    <div class="container-fluid" id="banner">
        <div class="container banner-content">
            <div >
                <p class="fs-5 inter-600-oren">
                    DATA CENTER BALITOWER
                </p>
                <p class="fs-5 lora-700">
                    Hi, {{Auth::user()->name}}
                </p>
                <h3 class="lora-800">
                    Welcome to
                </h3>
                <h3 class="lora-800">
                    Bali Tower
                </h3>
                <p class="inter-400-putih">
                    Protecting Your Technology Investment
                </p>
                <p class="">
                    <a href="{{url('approval/all')}}" type="button" id="" class="new-btn inter-btn" data-cleaning_id="">Approve Permit</a>
                </p>
            </div>
        </div>
    </div>
    @endcan

    {{-- contact us --}}
    <div class="container-fluid py-5 bg-contact">
        <div class="container px-5">
            <div class="row justify-content-around px-5">
                <div class="col-5">
                    <p class="fs-6 pt-2 text-contact">
                        CONTACT US
                    </p>
                    <h5 class="fs-2 my-3 text-contact2">
                        Feel Free to Contact Us At
                    </h5>
                    <h5 class="text-contact3">
                        Data Center PT. Bali Towerindo Sentra
                    </h5>
                    <h5 class="text-contact3">
                        Jl. Batu Ceper no.53, Jakarta 10120
                    </h5>
                    <h5 class="text-contact3">
                        Phone: <b>+62 882 3150 0851</b>
                    </h5>
                    <h5 class="text-contact3">
                        Email: <b>customer.support@balitower.co.id</b>
                    </h5>
                </div>
                <div class="col-6">
                    <img src="{{asset('gambar/home/maps.png')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="sticky-footer py-2" style="background-color: #072249; height:auto">
        <div class="container my-auto">
            <div class="copyright text-center text-footer my-auto py-auto">
                <span>PT Bali Tower Data Center - 2022</span>
            </div>
        </div>
    </footer>

    {{-- modal --}}
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('logoutWeb') }}" type="button" class="btn btn-primary sm"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                    </a>

                    {{-- <button id="logout-form" type="submit" class="btn btn-primary">Logout</button> --}}
                    <form id="logout-form" action="{{ route('logoutWeb') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>


