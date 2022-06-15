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

</head>
<body>

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
                        <a class="nav-link inter" href="{{ url('home')}}">About Us</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" href="{{ url('logall')}}">Log Permit</a>
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

    @yield('content')

    {{-- Footer --}}
    <footer class="sticky-footer py-2" style="background-color: #072249; height:auto">
        <div class="container my-auto">
            <div class="copyright text-center text-footer my-auto py-auto">
                <span>PT Bali Tower Data Center - 2022</span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @stack('script')
</body>
</html>
