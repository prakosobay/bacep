@extends('layouts.permit')

@section('content')
<div class="container my-5">
    <div class="card">
        <h1 class="text-center my-3 h1Permit">Fill Requestor Identity</h1>
        <form action="{{ url('survey/create')}}" method="POST" class="validate-form">
            @csrf
            <div class="container form-container">

<<<<<<< HEAD
    {{-- Form --}}
    <div class="bgmain display-flex">
        <div class="container form-container">
            <div class="backbtn">
                <a href="{{url('/home')}}">
                    <img src="{{asset('gambar/home/bell.svg')}}" alt="">Back To Home
                </a>
            </div>
            <h4 class="margin-row text-center">Form Permit Survey</h4>
            <div class="margin-row">
                <div class="table-responsive">
                    <form class="validate-form" method="POST" action="{{ url('survey/create')}}">
                        @csrf
                        @if (session('Sukses'))
                    <div class="alert alert-success mt-2">
                        {{ session('Sukses') }}
                    </div>
                @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">

                            {{-- Validity --}}
                            <div class="form-group margin-item row mb-4">
                                <div class="col col-item">
                                    <label for="date_visit">Date of Visit</label>
                                    <input class="form-control" type="date" name="date_of_visit" value="{{ old('date_of_visit')}}" id="date_visit" required>

                                </div>

                                <div class="col-separator"></div>

                                <div class="col col-item">
                                    <label for="date_leave">Date of Leave</label>
                                    <input class="form-control" type="date" name="date_of_leave" value="{{ old('date_of_leave')}}" id="date_leave" required>
                                </div>
                            </div>

                            {{-- Requestor --}}
                            <h5 class="">Bali Tower Requestor</h5>
                            <div class="row mb-4">
                                <div class="col-4">
                                    <label for="name_req">Name</label>
                                    <input type="text" class="form-control @error('name_req') is-invalid @enderror" value="{{ old('nama_requestor')}}" required autocomplete="name_req" id="name_req" name="nama_requestor" required>
                                        @error('name_req')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-4">
                                    <label for="dept_requestor">Department</label>
                                    <input type="text" class="form-control @error('dept_requestor') is-invalid @enderror" required autocomplete="dept_requestor" value="SALES" id="dept_requestor" readonly>
                                        @error('dept_requestor')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-4">
                                    <label for="phone_requestor">Phone Number</label>
                                    <input type="text" class="form-control @error('phone_requestor') is-invalid @enderror" required autocomplete="phone_requestor" value="{{ old('phone_requestor')}}" id="phone_requestor" name="phone_requestor" required>
                                        @error('phone_requestor')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            {{-- Visitor --}}
                            <h5 class="margin-item">Visitors & Person in Charge Identity</h5>

                            <table class="table table-hover table-bordered" id="table_detail_visitor">
                                <thead class="bg1">
                                    <tr>
                                        <th>Visitor Name</th>
                                        <th>ID Number</th>
                                        <th>Phone Number</th>
                                        <th>Company</th>
                                        <th>Departmen</th>
                                    </tr>
                                </thead>
                                <tbody class="bg1">
                                    <tr>
                                        <td><input class="input border" type="text" name="visitor_name" required></td>
                                        <td><input class="input border" type="text" name="id_number" required></td>
                                        <td><input class="input border" type="text" name="visitor_phone" required></td>
                                        <td><input class="input border" type="text" name="visitor_company" required></td>
                                        <td><input class="input border" type="text" name="visitor_dept" required></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button id="detail_visitor"><b>Add More Fields</b></button>
=======
                @if (session('success'))
                    <div class="alert alert-success mt-2">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Requestor --}}
                <div class="row">
                    <div class="col-4">
                        <div class="form-group mb-4">
                            <label for="req_dept" class="form-label">Requestor Department :</label>
                            <input type="text" value="Sales" id="req_dept" name="req_dept" class="form-control" readonly>
>>>>>>> 8e5a3ac6191483e2faf0aeb3f9b6ee86bf6d0098
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mb-4">
                            <label for="req_name" class="form-label">Requestor Name :</label>
                            <input type="text" class="form-control @error('req_name') is-invalid @enderror" id="req_name" name="req_name" value="{{ old('req_name')}}" required>
                            @error('req_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mb-4">
                            <label for="req_phone" class="form-label">Requestor Phone Number:</label>
                            <input type="text" class="form-control @error('req_phone') is-invalid @enderror" id="req_phone" name="req_phone" value="{{ old('req_phone')}}" required>
                            <div id="phoneHelp" class="form-text">Example : 08xx-xxxx-xxxx</div>
                            @error('req_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Date of Visit & Leave --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-5">
                            <label for="visit" class="form-label">Date of Visit :</label>
                            <input type="date" class="form-control @error('visit') is-invalid @enderror" id="visit" name="visit" value="{{ old('visit')}}" required>
                            @error('visit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-5">
                            <label for="leave" class="form-label">Date of Leave</label>
                            <input type="date" class="form-control @error('leave') is-invalid @enderror" id="leave" name="leave" value="{{ old('leave')}}" required>
                            @error('leave')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Visitor --}}
                <div class="mb-3">
                    <table class="table table-bordered table-hover" id="table_visitor">
                        <thead>
                            <tr>
                                <th colspan="4">Visitor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td><input type="text" class="form-control" name="nama[]" value="{{ old('nama')}}" required></td>
                                <th>Phone Number</th>
                                <td><input type="text" class="form-control" name="phone[]" value="{{ old('phone')}}" required></td>
                            </tr>
                            <tr>
                                <th>Number ID</th>
                                <td><input type="text" class="form-control" name="numberId[]" value="{{ old('numberId')}}" required></td>
                                <th>Company</th>
                                <th><input type="text" class="form-control" name="company[]" value="{{ old('company')}}" required></th>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td><input type="text" class="form-control" name="department[]" value="{{ old('department')}}" required></td>
                            </tr>
                        </tbody>
                    </table>
                    <button id="button_visitor"><b>Add More Fields</b></button>
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Submit --}}
                <button type="submit" class="btn btn-lg btn-success mx-2">Submit</button>
                <button type="reset" class="btn btn-lg btn-warning mx-2">Reset</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        let max_row = 5;
        let row = 1;
        let button_visitor = $('#button_visitor');
        let table_visitor = $('#table_visitor');

        $(button_visitor).click(function(e){
            e.preventDefault();
            if(row < max_row){
<<<<<<< HEAD
                $(row_detail_visitor).append('<tr><td><input class="input border" type="text" name="visitor_name" required></td><td><input class="input border" type="text" name="id_number" required></td><td><input class="input border" type="text" name="visitor_phone" required></td><td><input class="input border" type="text" name="visitor_company" required></td><td><input class="input border" type="text" name="visitor_dept" required></td></tr>');
=======
                $(table_visitor).append('<tr><th>Name</th><td><input type="text" class="form-control" name="nama[]" value=""></td><th>Phone Number</th><td><input type="text" class="form-control" name="phone[]" value=""></td></tr><tr><th>Number ID</th><td><input type="text" class="form-control" name="numberId[]" value=""></td><th>Company</th><th><input type="text" class="form-control" name="company[]" value=""></th></tr><tr><th>Department</th><td><input type="text" class="form-control" name="department[]" value=""></td></tr>');
>>>>>>> 8e5a3ac6191483e2faf0aeb3f9b6ee86bf6d0098
                row++;
            }
        });
    });
</script>

@endsection
