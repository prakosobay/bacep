<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History Log Permit</title>
    <!-- Load an icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/new_approve.css')}}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/>

</head>
<body id="body-pd">

<div id="wrapper">

    {{-- navbar --}}
    <nav class="navbar navbar-expand-xl navbar-dark py-0 my-0 navbar-bg" >
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('gambar/approval/logo_approve.png')}}" alt="" style="width: 170px; height:70px" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @can('isApproval')
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-5">
                            <a class="nav-link inter" aria-current="page" href="{{url('/home')}}">Home</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link inter" href="{{ url('approval/all')}}">Approval</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link inter" href="{{ url('full')}}">Full Approval</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link inter" href="{{ url('/table_barang')}}">Inventory</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link inter" href="{{ url('history/all')}}">Log Permit</a>
                        </li>
                    </ul>
                @elsecan('isHead')
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" aria-current="page" href="{{url('/home')}}">Home</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" href="{{ url('approval/all')}}">Approval</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" href="{{ url('full/all')}}">Full Approval</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" href="{{ url('/table_barang')}}">Inventory</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" href="{{ url('history/all')}}">Log Permit</a>
                    </li>
                </ul>
                @elsecan('isSecurity')
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-5">
                            <a class="nav-link inter" aria-current="page" href="{{url('/home')}}">Home</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link inter" href="{{ url('approval/all')}}">Approval</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link inter" href="{{ url('history/all')}}">Log Permit</a>
                        </li>
                    </ul>
                @endcan
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

    {{-- sidebar --}}

    <div class="sidebar close">
        <ul class="nav-links">
            <li>
                <a href="{{ url('history/all')}}">
                <i class='bx bx-grid-alt' ></i>
                <span class="link_name">Log Permit</span>
                </a>
                <ul class="sub-menu blank">
                    <span>Log Permit</span>
                </ul>
            </li>
            <li>
                <a href="{{ url('history/colo')}}">
                    <i class='bx bx-collection' ></i>
                    <span class="link_name">Customer Colo</span>
                </a>
                <ul class="sub-menu blank">
                    <span>Customer Colo</span>
                </ul>
            </li>
            <li>
                <a href="{{ url('history/internal')}}">
                    <i class='bx bx-pie-chart-alt-2' ></i>
                    <span class="link_name">Permit Internal</span>
                </a>
                <ul class="sub-menu blank">
                    <span>Permit Internal</span>
                </ul>
            </li>
            <li>
                <a href="{{ url('history/survey')}}">
                    <i class='bx bx-line-chart' ></i>
                    <span class="link_name">Customer Survey</span>
                </a>
                <ul class="sub-menu blank">
                    <span>Customer Survey</span>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-compass' ></i>
                    <span class="link_name">Permit Vendor</span>
                </a>
                <ul class="sub-menu blank">
                    <span>Permit Vendor</span>
                </ul>
            </li>
            <li>
                <a href="{{ url('history/cleaning')}}">
                    <i class='bx bx-history'></i>
                    <span class="link_name">Permit Cleaning</span>
                </a>
                <ul class="sub-menu blank">
                    <span>Permit Cleaning</span>
                </ul>
            </li>
            <li>
                <a href="{{ url('history/other')}}">
                    <i class='bx bx-history'></i>
                    <span class="link_name">Permit Other</span>
                </a>
                <ul class="sub-menu blank">
                    <span>Permit Other</span>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-plug' ></i>
                    <span class="link_name">Permit Guest</span>
                </a>
                <ul class="sub-menu blank">
                    <span class="link_name">Permit Guest</span>
                </ul>
            </li>
            <li>
                <li class="home-content">
                    <i class='bx bx-menu' ></i>
                    <a href="#">
                        <span class="link_name">Sidebar</span>
                    </a>
                </li>
            </li>
        </ul>
    </div>

    <main>
        @yield('content')
    </main>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>

<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e)=>{
        let arrowParent = e.target.parentElement.parentElement;
        arrowParent.classList.toggle("showMenu");
        });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    sidebarBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("close");
    });
</script>

@stack('scripts')
</body>
</html>

