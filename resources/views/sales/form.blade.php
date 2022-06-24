@extends('layouts.permit')

@section('content')

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
                                    <input type="text" class="form-control @error('dept_requestor') is-invalid @enderror" required autocomplete="dept_requestor" value="{{ old('dept_requestor')}}" id="dept_requestor" name="dept_requestor" required>
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
                                        <td><input class="input border" type="text" name="visitor_name[]" required></td>
                                        <td><input class="input border" type="text" name="id_number[]" required></td>
                                        <td><input class="input border" type="text" name="phone_number[]" required></td>
                                        <td><input class="input border" type="text" name="company[]" required></td>
                                        <td><input class="input border" type="text" name="department[]" required></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button id="detail_visitor"><b>Add More Fields</b></button>
                        </div>

                        <div class="submit-container margin-item">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/select2/select2.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{--add table--}}
<script>
    $(document).ready(function(){
        let max_row = 5;
        let row = 1;
        let detail_visitor = $('#detail_visitor');
        let row_detail_visitor = $('#table_detail_visitor');

        $(detail_visitor).click(function(e){
            e.preventDefault();
            if(row < max_row){
                $(row_detail_visitor).append('<tr><td><input class="input border" type="text" name="visitor_name[]" required></td><td><input class="input border" type="text" name="id_number[]" required></td><td><input class="input border" type="text" name="phone_number[]" required></td><td><input class="input border" type="text" name="company[]" required></td><td><input class="input border" type="text" name="department[]" required></td></tr>');
                row++;
            }
        });
    });
</script>

@endsection
