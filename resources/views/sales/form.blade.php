@extends('layouts.permit')

@section('content')
<div class="container my-5">
    <div class="card">
        <h1 class="text-center my-3 h1Permit">Fill Requestor Identity</h1>
        <form action="{{ url('survey/create')}}" method="POST" class="validate-form">
            @csrf
            <div class="container form-container">

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
                $(table_visitor).append('<tr><th>Name</th><td><input type="text" class="form-control" name="nama[]" value=""></td><th>Phone Number</th><td><input type="text" class="form-control" name="phone[]" value=""></td></tr><tr><th>Number ID</th><td><input type="text" class="form-control" name="numberId[]" value=""></td><th>Company</th><th><input type="text" class="form-control" name="company[]" value=""></th></tr><tr><th>Department</th><td><input type="text" class="form-control" name="department[]" value=""></td></tr>');
                row++;
            }
        });
    });
</script>

@endsection
