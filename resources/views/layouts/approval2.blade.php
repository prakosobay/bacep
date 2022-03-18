<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Approval</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link href="{{asset('vendor2/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom styles for this page -->
    <link href="{{asset('vendor2/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>
<body>
    <div id="wrapper">
        {{-- sidbar --}}
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #09458F">

            <a class="sidebar-brand d-flex align-items-center justify-content-center mt-2" href="{{url('home')}}">
                {{-- <div class="sidebar-brand-icon rotate-n-15"> --}}
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                    <img src="{{asset('gambar/data_center.png')}}" alt="" style="height: 85px; width:85px">
                {{-- </div> --}}
            </a>

            <!-- Divider -->
            {{-- <hr class="sidebar-divider"> --}}

            <!-- Approval Permit -->
            <li class="nav-item mt-4">
                <a class="nav-link collapsed" href="#" data-toggle="" data-target="#"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-star"></i>
                    <span>Approval Permit</span>
                </a>
            </li>

            <!-- Customer Colo -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="" data-target="#"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Customer Colo</span>
                </a>
            </li>

            <!-- Internal -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="" data-target="#"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Internal</span>
                </a>
            </li>

            <!-- Customer Survey -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="" data-target="#"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Customer Survey</span>
                </a>
            </li>

            <!-- Vendor -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="" data-target="#"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Vendor</span>
                </a>
            </li>

            <!-- BM -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="" data-target="#"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>BM</span>
                </a>
            </li>

            <!-- Guest -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="" data-target="#"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Guest</span>
                </a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        {{-- navbar --}}
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-black bg-transparent topbar static-top">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                            </li>
                        </ul>
                        </div>
                    </div>
                </nav>
                <!-- End of Topbar -->
            </div>
            <!-- End of Main Content -->
        </div>
    </div>
    @yield('content')

    {{-- Footer --}}
    <footer class="sticky-footer" style="background-color: #062A61">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span><strong>Copyright &copy; PT Bali Tower Data Center 2022</strong></span>
            </div>
        </div>
    </footer>
</body>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor2/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor2/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor2/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('vendor2/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor2/datatables/dataTables.bootstrap4.min.js')}}"></script>
</html>
