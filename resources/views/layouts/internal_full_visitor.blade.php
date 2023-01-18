<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log Permit</title>

    {{-- bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- bootstrap datatable --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/>
    <link rel="stylesheet" href="{{asset('css/log_visitor.css')}}" type="text/css">

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark navbar-bg">
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
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="{{ url('logall')}}">Log Permit</a>
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

    {{-- Tab Panel --}}
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-1">
            <div class="card-header py-3">
                <h4 class="judul text-center">Log Form Visitor</h4>
            </div>

            <div class="container-fluid">
                @if (session('success'))
                <div class="alert alert-success mx-2 my-2 text-center">
                    {{ session('success') }}
                </div>
                @endif
            </div>

            <div class="card-body">
                <div class="tab-content" id="myTabContent">

                    {{-- IT --}}
                    @if(Auth::user()->email == 'it@mail.com')

                        <div class="container-fluid">
                            <div class="card-body">
                                <button class="btn btn-primary btn-sm mx-1 my-2" data-bs-toggle="modal" data-bs-target="#itModal">Create Form</button>
                                <a type="button" class="btn btn-sm btn-info mx-1 my-2" href="{{url('logall')}}">Log Form</a>
                                <a type="button" class="btn btn-sm btn-danger mx-1 my-2" href="{{ url('/it/cancel/show')}}">Canceled Form</a>
                            </div>
                        </div>
                        <div class="modal fade" id="itModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pilih Form</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <a class="btn btn-sm btn-success mx-1 my-1" href="{{ url('internal/form')}}">AR CR Form</a>
                                        <a class="btn btn-sm btn-success mx-1 my-1" href="{{ url('order/form')}}">Consumable Form</a>
                                        <a class="btn btn-sm btn-success mx-1 my-1" href="{{ url('internal/formBarang')}}">AR CR + Barang Form</a>
                                        <a class="btn btn-sm btn-success mx-1 my-1" href="{{ url('internal/formConsumableBarang')}}">AR CR + Consumable + Barang Form</a>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Select</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="it_table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="judul-table text-center">
                                            <th>No.</th>
                                            <th>Purpose of Work</th>
                                            <th>Date of Visit</th>
                                            <th>Name</th>
                                            <th>Checkin</th>
                                            <th>Checkout</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="isi-table text-center">
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    {{-- IP Core --}}
                    @elseif(Auth::User()->email == 'ipcore@mail.com')

                        <div class="container-fluid">
                            <div class="card-body">
                                <button class="btn btn-primary btn-sm mx-1 my-2" data-bs-toggle="modal" data-bs-target="#ipcoreModal">Create Form</button>
                                <a type="button" class="btn btn-sm btn-info mx-1 my-2" href="{{url('logall')}}">Log Form</a>
                                <a type="button" class="btn btn-sm btn-success mx-1 my-2" href="{{ url('finished/show')}}">Finished Permit</a>
                            </div>
                        </div>
                        <div class="modal fade" id="ipcoreModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pilih Form</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <a class="btn btn-sm btn-success mx-1 my-1" href="{{ url('internal/form')}}">AR CR Form</a>
                                        <a class="btn btn-sm btn-success mx-1 my-1" href="{{ url('order/form')}}">Consumable Form</a>
                                        <a class="btn btn-sm btn-success mx-1 my-1" href="{{ url('internal/formBarang')}}">AR CR + Barang Form</a>
                                        <a class="btn btn-sm btn-success mx-1 my-1" href="{{ url('internal/formConsumableBarang')}}">AR CR + Consumable + Barang Form</a>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Select</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="ipcore_table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="judul-table text-center">
                                            <th>Purpose of Work</th>
                                            <th>Requestor</th>
                                            <th>Date of Visit</th>
                                            <th>Date of Leave</th>
                                            <th>Name</th>
                                            <th>Checkin</th>
                                            <th>Checkout</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="isi-table text-center">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    {{-- BSS --}}
                    @elseif(Auth::user()->email == 'bss@mail.com')
                        <div class="container-fluid">
                            <div class="card-body">
                                <button class="btn btn-primary btn-sm mx-1 my-2" data-bs-toggle="modal" data-bs-target="#bssmodal">Create Form</button>
                                <a type="button" class="btn btn-sm btn-info mx-1 my-2" href="{{url('logall')}}">Log Form</a>
                                <a type="button" class="btn btn-sm btn-danger mx-1 my-2" href="{{ url('/bss/cancel/show')}}">Canceled Form</a>
                            </div>
                        </div>
                        <div class="modal fade" id="bssmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pilih Form</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <a class="btn btn-sm btn-success mx-1 my-1" href="{{ url('internal/form')}}">AR CR Form</a>
                                        <a class="btn btn-sm btn-success mx-1 my-1" href="{{ url('order/form')}}">Consumable Form</a>
                                        <a class="btn btn-sm btn-success mx-1 my-1" href="{{ url('internal/formBarang')}}">AR CR + Barang Form</a>
                                        <a class="btn btn-sm btn-success mx-1 my-1" href="{{ url('internal/formConsumableBarang')}}">AR CR + Consumable + Barang Form</a>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Select</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="bss_table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="judul-table text-center">
                                            <th>No.</th>
                                            <th>Purpose of Work</th>
                                            <th>Date of Visit</th>
                                            <th>Date of Leave</th>
                                            <th>Name</th>
                                            <th>Checkin</th>
                                            <th>Checkout</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="isi-table text-center">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- YANG INI JANGAN DI HAPUS !!! --}}
    @yield('content')
    {{-- !!!!!!!!!!!! --}}

    {{-- modal logout--}}
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
                    <a href="{{ route('logoutWeb') }}" type="button" class="btn btn-primary sm"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logoutWeb') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- datatable --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>

    @stack('scripts')
</body>
</html>
