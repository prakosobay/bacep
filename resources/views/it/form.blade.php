@extends('layouts.permit')
@section('content')
<div class="container my-5">
    <div class="card">
        <h1 class="text-center my-3 h1Permit">Fill Requestor Identity</h1>
        <form action="{{ url('internal/it/create')}}" method="POST" class="validate-form">
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
                            <input type="text" value="IT" id="req_dept" name="req_dept" class="form-control" readonly>
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

                {{-- Purpose of Work --}}
                <div class="form-group mb-5">
                    <label for="work" class="form-label">Purpose of Work :</label>
                    <input type="text" class="form-control @error('work') is-invalid @enderror" id="work" name="work" value="{{ old('work')}}" required>
                    @error('work')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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

                {{-- Entry Area --}}
                <div class="row">
                    <div class="col-4 mt-2">
                        <div class="form-check mb-3">
                            <label for="dc" class="form-check-label">Server Room</label>
                            <input type="checkbox" class="form-check-input" id="dc" name="dc" value="1" >
                        </div>
                        <div class="form-check mb-5">
                            <label for="mmr1" class="form-check-label">MMR 1</label>
                            <input type="checkbox" class="form-check-input" id="mmr1" name="mmr1" value="1">
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <div class="form-check mb-3">
                            <label for="mmr2" class="form-check-label">MMR 2</label>
                            <input type="checkbox" class="form-check-input" id="mmr2" name="mmr2" value="1">
                        </div>
                        <div class="form-check mb-5">
                            <label for="cctv" class="form-check-label">CCTV Room</label>
                            <input type="checkbox" class="form-check-input" id="cctv" name="cctv" value="1">
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <div class="form-check mb-3">
                            <label for="lain" class="form-label">Other :</label>
                            <input type="text" class="form-control" id="lain" name="lain" value="{{ old('lain')}}" placeholder="Tempat Lainnya">
                        </div>
                    </div>
                </div>

                {{-- Background --}}
                <div class="form-group mb-3">
                    <label for="background" class="form-label">Background and Objectives</label>
                    <input type="text" class="form-control @error('background') is-invalid @enderror" id="background" name="background" value="{{ old('background')}}" required>
                    @error('backround')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="form-group mb-3">
                    <label for="desc" class="form-label">Work Description</label>
                    <input type="text" class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" value="{{ old('desc')}}" required>
                    @error('desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Testing --}}
                <div class="form-group mb-3">
                    <label for="testing" class="form-label">Testing and Verification</label>
                    <input type="text" class="form-control" id="testing" name="testing" value="{{ old('testing')}}">
                </div>

                {{-- Rollback --}}
                <div class="form-group mb-5">
                    <label for="rollback" class="form-label">Rollback and Operation</label>
                    <input type="text" class="form-control" id="rollback" name="rollback" value="{{ old('rollback')}}">
                </div>

                {{-- Detail Time Activity --}}
                <div class="mb-3">
                    <table class="table table-bordered table-hover" id="table_detail">
                        <thead>
                            <tr>
                                <th colspan="5">Detail Time Activity</th>
                            </tr>
                            <tr>
                                <th>Time Start</th>
                                <th>Time End</th>
                                <th>Activity</th>
                                <th>Detail Service Impact</th>
                                <th>Item</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="time" class="form-control @error('time_start') is-invalid @enderror" id="time_start" name="time_start[]" value="{{ old('time_start')}}" required>
                                    @error('time_start')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="time" class="form-control @error('time_end') is-invalid @enderror" id="time_end" name="time_end[]" value="{{ old('time_end')}}" required>
                                    @error('time_end')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control @error('activity') is-invalid @enderror" id="activity" name="activity[]" value="{{ old('activity')}}" required>
                                    @error('activity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control @error('service_impact') is-invalid @enderror" id="service_impact" name="service_impact[]" value="{{ old('service_impact')}}" required>
                                    @error('service_impact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control @error('item') is-invalid @enderror" id="detailTime" name="item[]" value="{{ old('item')}}" required>
                                    @error('item')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button id="button_detail"><b>Add More Fields</b></button>
                </div>

                {{-- Risk Service Area Impact--}}
                <div class="mb-3">
                    <table class="table table-bordered table-hover" id="table_risk">
                        <thead>
                            <tr>
                                <th colspan="4">Risk Service Area Impact</th>
                            </tr>
                            <tr>
                                <th>Risk Description</th>
                                <th>Possibility</th>
                                <th>Impact</th>
                                <th>Mitigation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" class="form-control @error('risk') is-invalid @enderror" name="risk[]" value="{{ old('risk')}}" required>
                                    @error('risk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control @error('poss') is-invalid @enderror" name="poss[]" value="{{ old('poss')}}" required>
                                    @error('poss')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control @error('impact') is-invalid @enderror" name="impact[]" value="{{ old('impact')}}" required>
                                    @error('impact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control @error('mitigation') is-invalid @enderror" name="mitigation[]" value="{{ old('mitigation')}}" required>
                                    @error('mitigation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button id="button_risk"><b>Add More Fields</b></button>
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
                                <th>Responsibility</th>
                                <td><input type="text" class="form-control" name="respon[]" value="{{ old('respon')}}" required></td>
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
@stack('script')
<script>
$(document).ready(function(){

    let max_row = 15;
    let row = 1;
    let button_detail = $('#button_detail');
    let table_detail = $('#table_detail');
    let button_risk = $('#button_risk');
    let table_risk = $('#table_risk');
    let button_visitor = $('#button_visitor');
    let table_visitor = $('#table_visitor');

    $(button_detail).click(function(e){
        e.preventDefault();
        if(row < max_row){
            $(table_detail).append('<tr><td><input type="time" class="form-control" id="time_start" name="time_start[]" value=""></td><td><input type="time" class="form-control" id="time_end" name="time_end[]"></td><td><input type="text" class="form-control" id="activity" name="activity[]"></td><td> <input type="text" class="form-control" id="service_impact" name="service_impact[]" value=""></td><td><input type="text" class="form-control" id="detailTime" name="item[]" value=""></td></tr>');
            row++;
        }
    });

    $(button_risk).click(function(e){
        e.preventDefault();
        if(row < max_row){
            $(table_risk).append('<tr><td><input type="text" class="form-control" name="risk[]" value=""></td><td><input type="text" class="form-control" name="poss[]" value=""></td><td><input type="text" class="form-control" name="impact[]" value=""></td><td><input type="text" class="form-control" name="mitigation[]" value=""></td></tr>');
            row++;
        }
    });

    $(button_visitor).click(function(e){
        e.preventDefault();
        if(row < max_row){
            $(table_visitor).append('<tr><th>Name</th><td><input type="text" class="form-control" name="nama[]" value=""></td><th>Phone Number</th><td><input type="text" class="form-control" name="phone[]" value=""></td></tr><tr><th>Number ID</th><td><input type="text" class="form-control" name="numberId[]" value=""></td><th>Company</th><th><input type="text" class="form-control" name="company[]" value=""></th></tr><tr><th>Department</th><td><input type="text" class="form-control" name="department[]" value=""></td><th>Responsibility</th><td><input type="text" class="form-control" name="respon[]" value=""></td></tr>');
            row++;
        }
    });

});
</script>
@endsection
