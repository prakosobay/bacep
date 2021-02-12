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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.min.css" rel="stylesheet">

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
                        <li><a href="/ReadMore" data-after="ReadMore">BM</a></li>
                        @else
                        <li><a href="/ReadMore" data-after="ReadMore">Approval</a></li>
                        @endif
                        <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
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
    <section id="hero">
        <div class="hero container">
            <div>
                <h1>Welcome <span></span></h1>
                <h1>to <span></span></h1>
                <h1>Data Center Department <span></span></h1>
                <a href="#ReadMore" type="button" class="cta">Read More</a>
            </div>
        </div>
    </section>

    @if(Auth::user()->role == 'visitor')
    <section id="VisitDC">
        <div class="VisitDC container">
            <div class="VisitDC-top">
                <h1 class="section-title">Visit Data Center</h1>
                <p>Welcome to Data Center Department, do you need help ? choose what you need and let us help you</p>
            </div>
            <div class="VisitDC-bottom">
                <div class="VisitDC-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
                    <h2>Survey Data Center</h2>
                    <a href="survey" type="button" ><p>AR</p></a>

                </div>
                <div class="VisitDC-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
                    <h2>Maintenance</h2>
                    <a href="maintenance" type="button" ><p>AR/CR/ACL</p></a>

                </div>
                <div class="VisitDC-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
                    <h2>Troubleshoot</h2>
                    <a href="troubleshoot" type="button" ><p>AR/CR/ACL</p></a>

                </div>
                <div class="VisitDC-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
                    <h2>Mounting/Un-Mounting</h2>
                    <a href="mount" type="button" ><p>AR/CR/ACL</p></a>

                </div>
            </div>
        </div>
    </section>

    <section id="ReadMore">
        <div class="ReadMore container">
            <div class="ReadMore-header">
                <h1 class="section-title">More About Us</span>
                </h1>
            </div>
            <div class="all-ReadMore">
                <div class="ReadMore-item">
                    <div class="ReadMore-info">
                        <h1>ISO</h1>
                        <h2>abut ISO bla bla bla</h2>
                        <p>Story</p>
                    </div>
                    <div class="project-img">
                        <img src="/gambar/img-1.png" alt="img">
                    </div>
                </div>
                <div class="ReadMore-item">
                    <div class="ReadMore-info">
                        <h1>Rated 3</h1>
                        <h2>Rated ? do you know that ?</h2>
                        <p>Rated is bla bla bla for bla bla bla</p>
                    </div>
                    <div class="project-img">
                        <img src="gambar/img-3.jpg" alt="img">
                    </div>
                </div>
                <div class="project-item">
                    <div class="project-info">
                        <h1>Facility</h1>
                        <h2>What we have ?</h2>
                        <p>we have bla bla bla and bla bla bla</p>
                    </div>
                    <div class="project-img">
                        <img src="/gambar/img-4.jpg" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

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
