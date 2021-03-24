<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/landing2.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/landing2.css') }}" rel="stylesheet">
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.min.css" rel="stylesheet"> --}}

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</head>
<body>
    <section id="header">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{$message}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif

        <div class="header container">
            <div class="nav-bar">
                <div class="brand">
                    <a href="#hero">
                        <h1>PT Bali Towerindo Sentra</h1>
                    </a>
                </div>

                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <ul>
                        <li><a href="/home" data-after="Home">Home</a></li>
                        @if(Auth::user()->role == 'visitor')
                        <li><a href="#VisitDC" data-after="VisitDC">Visit Data Center</a></li>
                        @elseif(Auth::user()->role == 'requestor')
                        <li><a href="#VisitDC" data-after="VisitDC">Visit Data Center</a></li>
                        @elseif(Auth::user()->role == 'bm')
                        <li><a href="#BM" data-after="BM">BM</a></li>
                        @elseif(Auth::user()->role == 'security')
                        <li><a href="#Approval" data-after="Approval">Approval</a></li>
                        @else
                            {{-- @if(Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 ">Register</a>
                                <a href="{{ route('register') }}">register</a>
                            </li>
                            @endif --}}
                        <li><a href="{{ url('full_approval/all') }}" data-after="Full">Full Approval</a></li>
                        <li><a href="#Approval" data-after="Approval">Approval</a></li>
                        @endif
                        <li>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <section id="footer">
        <div class="footer container">
            <div class="brand">
                <h1>Thank You</h1>
            </div>
            <h2>For Visiting Data Center Department</h2>
        </div>
    </section>
    <!-- End Footer -->
    {{-- <script type="text/javascript" src="/js/landing.js"></script> --}}
</body>
</html>
