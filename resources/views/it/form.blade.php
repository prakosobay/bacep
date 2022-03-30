<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Permit IT</title>

    <link href="{{asset('css/homepage.css')}}" rel="stylesheet" type="text/css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css')}}">
    <style>
        
    </style>
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
                        <a class="nav-link inter" href="#about">About Us</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link inter" href="#">Log Permit</a>
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
    {{-- Form --}}
    <div class="bgmain display-flex">
        <div class="container form-container">
            <div class="backbtn">
                <a href="#"><img src="{{asset('gambar/home/bell.svg')}}" alt="">Back To Home</a>
            </div>
            <h4 class="margin-row text-center">Form Permit IT</h4>
            <form class="class="margin-row">
                <h5 class="margin-item"> Work Info</h5>
                <div class="margin-item">
                    <label>Purpose of Work</label>
                    <select class="form-select" aria-label="Default select">
                        <option selected>Select Purpose of Work</option>
                        <option value="1">Work One</option>
                        <option value="2">Work Two</option>
                        <option value="3">Work Three</option>
                    </select>
                </div>
                
            {{-- Validity --}}
                <div class="form-group margin-item row">
                    <div class="col col-item">
                        <label>Date of Visit</label>
                        <input class="form-control">
                    </div>
                    <div class="col-separator"></div>
                    <div class="col col-item">
                        <label>Date of Leave</label>
                        <input class="form-control">
                    </div>
                </div>

            {{-- Access --}}
                <div class="margin-item">
                    <label>Authorized Access</label>
                    <select class="form-select" aria-label="Default select">
                        <option selected>Select Access</option>
                        <option value="1">Limited</option>
                        <option value="2">Escorted</option>
                        <option value="3">Full Access</option>
                    </select>
                </div>

            {{-- Authorized Area --}}
                <div class="margin-item row">
                    <label class="col-item">Authorized Entry Area</label>
                    <div class="col-3 col-item">
                        <div class="form-check margin-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            Server Room
                        </div>
                        <div class="form-check margin-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            MMR 1
                        </div>
                        <div class="form-check margin-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            MMR 2
                        </div>
                        <div class="form-check margin-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            UPS Room
                        </div>
                    </div>
                    <div class="col-3 col-item">
                        <div class="form-check margin-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            FSS Room
                        </div>
                        <div class="form-check margin-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            CCTV Room
                        </div>
                        <div class="form-check margin-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            Yard
                        </div>
                        <div class="form-check margin-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            Parking Lot
                        </div>
                    </div>
                    <div class="col-3 col-item">
                        <div class="form-check margin-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            Battery Room
                        </div>
                        <div class="form-check margin-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            Generator Room
                        </div>
                        <div class="form-check margin-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            Panel Room
                        </div>
                        <div class="form-check margin-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            Trafo Room
                        </div>
                    </div>
                    <div class="col-3 col-item">
                        <div class="form-check margin-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            Office 2nd Floor
                        </div>
                        <div class="form-check margin-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            Office 3rd Floor
                        </div>
                        <div class="form-check margin-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            Other
                            <input type="" class="form-control">
                        </div>
                    </div>
                </div>
                
            
                <h5 class="margin-item">Work Info</h5>

                {{-- Table Activity --}}
                <table class="table table-bordered">
                    <label class="col-item">Detail Time Table of Activity</label>
                    <thead>
                        <tr>
                            <th scope="col">Time</th>
                            <th scope="col">Activity Description</th>
                            <th scope="col">Detail Service Impact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="time" class="form-control"></td>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                        </tr>
                        <tr>
                            <td><input type="time" class="form-control"></td>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                        </tr>
                        <tr>
                            <td><input type="time" class="form-control"></td>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
                {{-- DEtail Execution --}}
                <table class="table table-bordered">
                    <label class="col-item">Detail Operation and Execution</label>
                    <thead>
                        <tr>
                            <th class="col-4">Item</th>
                            <th class="col-8">Working Procedure</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                        </tr>
                        <tr>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
                {{-- risk impact --}}
                <table class="table table-bordered">
                    <label class="col-item">Risk Service Area Impact</label>
                    <thead>
                        <tr>
                            <th class="col-3">Risk Description</th>
                            <th class="col-3">Possibility</th>
                            <th class="col-3">Impact</th>
                            <th class="col-3">Mitigation Plan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                        </tr>
                        <tr>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                        </tr>
                        <tr>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                        </tr>
                    </tbody>
                </table>

                {{-- background --}}
                <div class="form-group margin-item">
                    <label>Background and Objectives</label>
                    <input class="form-control">
                </div>
                <div class="form-group margin-item">
                    <label>Scope of Work Description</label>
                    <input class="form-control">
                </div>
                <div class="form-group margin-item row">
                    <div class="col col-item">
                        <label>Testing and Verification</label>
                        <input class="form-control">
                    </div>
                    <div class="col-separator"></div>
                    <div class="col col-item">
                        <label>Rollback Operation</label>
                        <input class="form-control">
                    </div>
                </div>

                {{-- Visitor --}}
                <h5 class="margin-item">Visitors & Person in Charge Identity</h5>
                <div class="form-group margin-item row">
                    <div class="col col-item">
                        <label>Visitor 1 Name (Person in Charge)</label>
                        <input class="form-control">
                    </div>
                    <div class="col-separator"></div>
                    <div class="col col-item">
                        <label>ID Number</label>
                        <input class="form-control">
                    </div>
                    <div class="col-separator"></div>
                    <div class="col col-item">
                        <label>Phone Number</label>
                        <input class="form-control">
                    </div>
                </div>
                <div class="form-group margin-item row">
                    <div class="col col-item">
                        <label>Visitor 2 Name (Person in Charge)</label>
                        <input class="form-control">
                    </div>
                    <div class="col-separator"></div>
                    <div class="col col-item">
                        <label>ID Number</label>
                        <input class="form-control">
                    </div>
                    <div class="col-separator"></div>
                    <div class="col col-item">
                        <label>Phone Number</label>
                        <input class="form-control">
                    </div>
                </div>
                <div class="form-group margin-item row">
                    <div class="col col-item">
                        <label>Visitor 3 Name</label>
                        <input class="form-control">
                    </div>
                    <div class="col-separator"></div>
                    <div class="col col-item">
                        <label>ID Number</label>
                        <input class="form-control">
                    </div>
                    <div class="col-separator"></div>
                    <div class="col col-item">
                        <label>Phone Number</label>
                        <input class="form-control">
                    </div>
                </div>
                <div class="form-group margin-item row">
                    <div class="col col-item">
                        <label>Visitor 4 Name</label>
                        <input class="form-control">
                    </div>
                    <div class="col-separator"></div>
                    <div class="col col-item">
                        <label>ID Number</label>
                        <input class="form-control">
                    </div>
                    <div class="col-separator"></div>
                    <div class="col col-item">
                        <label>Phone Number</label>
                        <input class="form-control">
                    </div>
                </div>
                <div class="form-group margin-item row">
                    <div class="col col-item">
                        <label>Visitor 5 Name</label>
                        <input class="form-control">
                    </div>
                    <div class="col-separator"></div>
                    <div class="col col-item">
                        <label>ID Number</label>
                        <input class="form-control">
                    </div>
                    <div class="col-separator"></div>
                    <div class="col col-item">
                        <label>Phone Number</label>
                        <input class="form-control">
                    </div>
                </div>

                <div class="submit-container margin-item">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="cancel" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Footer --}}
    <footer class="sticky-footer py-2" style="background-color: #072249; height:auto">
        <div class="container my-auto">
            <div class="copyright text-center text-footer my-auto py-auto">
                <span>PT Bali Tower Data Center - 2022</span>
            </div>
        </div>
    </footer>
</body>
</html>
