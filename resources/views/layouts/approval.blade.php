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
    <link rel="stylesheet" href="{{asset('css/new_approve.css')}}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>
<body id="body-pd">
    <nav class="navbar navbar-expand-lg navbar-dark py-0 my-0 navbar-bg" >
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
    {{-- YANG INI JANGAN DU HAPUS !!! --}}
    <main>
        @yield('content')
    </main>
    {{-- !!!!!!!!!!!! --}}

      <div class="sidebar close">
        <ul class="nav-links">
          <li>
            <a href="#">
              <i class='bx bx-grid-alt' ></i>
              <span class="link_name">Approval Permit</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="#">Approval Permit</a></li>
            </ul>
          </li>
          <li>
              <a href="#">
                <i class='bx bx-collection' ></i>
                <span class="link_name">Customer Colo</span>
              </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="#">Customer Colo</a></li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class='bx bx-pie-chart-alt-2' ></i>
              <span class="link_name">Permit Internal</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="#">Permit Internal</a></li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class='bx bx-line-chart' ></i>
              <span class="link_name">Customer Survey</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="#">Customer Survey</a></li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class='bx bx-compass' ></i>
              <span class="link_name">Permit Vendor</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="#">Permit Vendor</a></li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class='bx bx-history'></i>
              <span class="link_name">Permit BM</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="#">Permit BM</a></li>
            </ul>
          </li>
          <li>
            <a href="#">
              <i class='bx bx-plug' ></i>
              <span class="link_name">Permit Guest</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="#">Permit Gues</a></li>
            </ul>
        </li>

        <li>
            <section class="home-section">
              <li class="home-content">
                  <i class='bx bx-menu' ></i>
                <a href="#">
                    <span class="link_name">Sidebar</span>
                  </a>
              </li>

            </section>
          </li>

    </ul>
    </div>
 </body>

</html>

