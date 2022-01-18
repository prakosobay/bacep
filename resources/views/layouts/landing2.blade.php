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
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> --}}
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
                        @can('isBm')
                        <li><a href="cleaning.form" data-after="cleaning">Cleaning</a></li>
                        <li><a href="perbaikan" data-after="other">Other</a></li>
                        <li><a href="{{ url('approval/other') }}" data-after="Approval">Approval</a></li>
                        @elsecan('isAdmin')
                        <li><a href="{{ url('/table_user') }}" data-after="Admin">Admin Panel</a></li>
                        @elsecan('isApproval')
                        <li><a href="{{ url('approval/all') }}" data-after="Approval">Approval</a></li>
                        <li><a href="{{ url('full_approval/all') }}" data-after="Full">Full Approval</a></li>
                        <li><a href="{{ url('/table_barang') }}" data-after="barang">Barang</a></li>
                        @elsecan('isHead')
                        <li><a href="{{ url('approval/all') }}" data-after="Approval">Approval</a></li>
                        <li><a href="{{ url('full_approval/all') }}" data-after="Full">Full Approval</a></li>
                        <li><a href="{{ url('/table_barang') }}" data-after="barang">Barang</a></li>
                        @elsecan('isSecurity')
                        <li><a href="{{ url('approval/all') }}" data-after="Approval">Approval</a></li>
                        @endcan
                        <li><a href="{{ url('log/all') }}" data-after="Log">Log</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
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
</body>
</html>
