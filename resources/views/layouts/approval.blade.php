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
    <link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- Custom fonts for this template -->
    <link href="{{asset('vendor2/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{{asset('css/new_approve.css')}}" rel="stylesheet">

</head>
</head>
<body id="body-pd">
  <div class="semua">
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

  <!-- Page Wrapper -->
  <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Divider -->

          <!-- Nav Item - Dashboard -->
          <li class="nav-item">
              <a class="nav-link" href="">
                  <i class="far fa-star"></i>
                  <span>Approval Permit</span></a>
          </li>

          <!-- Nav Item - Tables -->

          <li class="nav-item">
            <a class="nav-link" href="">
                <i class="far fa-comment"></i>
                <span>Custumer Colo</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-fw far fa-users"></i>
                <span>Permit Internal</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="far fa-address-card"></i>
                <span>Custemer Survey</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="far fa-list-alt"></i>
                <span>Permit Vendor</span></a>
        </li>

          <!-- Asset  Menu -->
          <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                  aria-expanded="true" aria-controls="collapseTwo">
                  <i class="fas fa-fw fa-cog"></i>
                  <span>Permit BM</span>
              </a>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Option :</h6>
                      <a class="collapse-item" href="">Cleaning</a>
                      <a class="collapse-item" href="">Servis</a>
                      <a class="collapse-item" href="">Other</a>
                  </div>
              </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="">
                <i class="far fa-user-circle"></i>
                <span>Permit Guest</span></a>
        </li>

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
              <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>
      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">
            <div class="container-fluid">
                @yield('content')
              <!-- End of Topbar -->
            </div>
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
      <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a href="{{ route('logout') }}" type="button" class="btn btn-primary sm"
                      onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </div>
      </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('vendor2/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor2/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor2/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

  {{-- SweetAlert2 --}}

  {{-- <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css"> --}}

  <!-- Page level plugins -->
  <script src="{{asset('vendor2/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor2/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

</body>

</html>




