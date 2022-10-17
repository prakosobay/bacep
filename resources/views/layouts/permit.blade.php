<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Permit</title>

    <link href="{{asset('css/homepage.css')}}" rel="stylesheet" type="text/css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css')}}">

    {{-- Javascript JQuery--}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


</head>
<body>

    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark navbar-bg">
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
                        <a class="nav-link" aria-current="page" href="{{url('/home')}}"><b>Home</b></a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="#about"><b>About Us</b></a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="{{ url('logall')}}"><b>Log Permit</b></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item mx-3">
                        <a href="#"><img src="{{asset('gambar/log-visitor/lonceng.png')}}" alt=""></a>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <img src="{{asset('gambar/log-visitor/logout.png')}}" class="img-fluid" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    {{-- Modal --}}
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

    {{-- Footer --}}
    <footer class="sticky-footer py-2" style="background-color: #072249; height:auto">
        <div class="container my-auto">
            <div class="copyright text-center text-footer my-auto py-auto">
                <span>Data Center - 2022</span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    @stack('script')
</body>
</html>
