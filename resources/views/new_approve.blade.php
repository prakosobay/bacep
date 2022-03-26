<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Approval Permit</title>
    <!-- Load an icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/new_approve.css')}}" type="text/css">
    
</head>
<div class="body">
    <nav class="navbar navbar-expand-lg navbar-dark py-0 my-0 navbar-bg" position="fixed">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('gambar/approval/logo_approve.png')}}" alt="" style="width: 170px; height:70px" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-5">
                        <a class="nav-link" aria-current="page" href="{{url('/home')}}">Home</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="#about">Approval</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="#">Full Approval</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="#">Inventory</a>
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
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <img src="{{asset('gambar/home/box-arrow-right.svg')}}" alt="">
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- The sidebar -->
    <div class="sidebar">
        <a href="#home"><i class="fa fa-star-o"></i>Approval Permit</a>
        <a href="#services"><i class="fa fa-weixin"></i>Customer Colo</a>
        <a href="#clients"><i class="fa fa-fw fa-user"></i>Permit Internal</a>
        <a href="#contact"><i class="fa fa-suitcase"></i>Customer Survey</a>
        <a href="#contact"><i class="fa fa-address-card"></i>Permit Vendor </a>
        <a href="#contact"><i class="fa fa-user-secret"></i>Permit BM</a>
        <a href="#contact"><i class="fa fa-users"></i>Permit Guest</a>
    </div>

    <div class="content">
        <h1>HOME</h1>
    </div>

    {{-- YANG INI JANGAN DU HAPUS !!! --}}
    <main>
        @yield('content')
    </main>
    {{-- !!!!!!!!!!!! --}}


</div>
</html>
