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
    <link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/>
    <link href="{{asset('vendor2/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{{asset('css/new_approve.css')}}" rel="stylesheet">

</head>
<body id="body-pd">

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
                            <a class="nav-link inter" href="{{ url('full/all')}}">Full Approval</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link inter" href="{{ url('/table_barang')}}">General</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link inter" href="{{ url('history/all')}}">History Permit</a>
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
                        <a class="nav-link inter" href="{{ url('/table_barang')}}">General</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" href="{{ url('history/all')}}">History Permit</a>
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
                            <a class="nav-link inter" href="{{ url('history/all')}}">History Permit</a>
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

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="far fa-star"></i>
                    <span>Approval Permit</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInternal"
                    aria-expanded="true" aria-controls="collapseInternal">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Internal</span>
                </a>
                <div id="collapseInternal" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Option :</h6>
                        <a class="collapse-item" href="{{ url('history/internal')}}">AR CR Form</a>
                        {{-- <a class="collapse-item" href="{{ url('#')}}">Consumable</a> --}}
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEksternal"
                    aria-expanded="true" aria-controls="collapseEksternal">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Eksternal</span>
                </a>
                <div id="collapseEksternal" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Option :</h6>
                        <a class="collapse-item" href="{{ url('history/eksternal')}}">Eksternal</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSurvey"
                    aria-expanded="true" aria-controls="collapseSurvey">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Customer Survey</span>
                </a>
                <div id="collapseSurvey" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Option :</h6>
                        <a class="collapse-item" href="{{ url('history/survey')}}">Customer Survey</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVendor"
                    aria-expanded="true" aria-controls="collapseVendor">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Permit Vendor DC</span>
                </a>
                <div id="collapseVendor" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Option :</h6>
                        <a class="collapse-item" href="#">PAC</a>
                        <a class="collapse-item" href="#">FSS</a>
                        <a class="collapse-item" href="#">Interactive</a>
                        <a class="collapse-item" href="#">Vektor</a>
                        <a class="collapse-item" href="#">Malika</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Permit BM</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Option :</h6>
                        <a class="collapse-item" href="{{ url('history/cleaning')}}">Cleaning</a>
                        <a class="collapse-item" href="{{ url('history/maintenance')}}">Maintenance</a>
                        <a class="collapse-item" href="{{ url('history/troubleshoot')}}">Troubleshoot</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="far fa-user-circle"></i>
                    <span>Permit Guest</span>
                </a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <main>
                    @yield('content')
                <!-- End of Topbar -->
                </main>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
    </div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor2/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor2/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor2/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

{{-- datatable --}}
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>

@stack('scripts')
</body>
</html>

