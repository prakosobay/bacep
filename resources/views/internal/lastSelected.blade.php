@extends('layouts.permit')
@section('content')
<div class="container my-5">
    <div class="card">
        <h1 class="text-center my-3 h1Permit">Access Request &  Change Request Form</h1>
        <form action="{{ url('internal/create')}}" method="POST" class="validate-form">
            @csrf
            <div class="container form-container">

                @if (session('success'))
                    <div class="alert alert-success mx-2 my-2">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="container">
                    @if (session('failed'))
                        <div class="alert alert-danger mx-2 my-2">
                            {{ session('failed') }}
                        </div>
                    @endif
                </div>

                {{-- Requestor --}}
                <div class="row">
                    <div class="col-4">
                        <div class="form-group mb-4">
                            <label for="req_dept" class="form-label">Requestor Department :</label>
                            <input type="text" value="{{ auth()->user()->department }}" id="req_dept" name="req_dept" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mb-4">
                            <label for="req_name" class="form-label">Requestor Name :</label>
                            <input type="text" class="form-control" id="req_name" name="req_name" value="{{ auth()->user()->name }}" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mb-4">
                            <label for="req_phone" class="form-label">Requestor Phone Number:</label>
                            <input type="text" class="form-control" id="req_phone" name="req_phone" value="{{ auth()->user()->phone }}" readonly>
                        </div>
                    </div>
                </div>

                {{-- Purpose of Work --}}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group mb-5">
                            <label for="work" class="form-label">Purpose of Work :</label>
                            <input type="text" class="form-control @error('work') is-invalid @enderror" id="work" name="work" value="{{ $getInternal->work }}" required>
                            @error('work')
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
                        <div class="form-group mt-5">
                            <label for="rack">Rack</label>
                            <select name="rack[]" class="js-example-responsive-theme-multiple form-control" id="rack" multiple="multiple" required>
                                <optgroup label="Server Room">
                                    @foreach ( $getDC as $rack )
                                        <option value="{{ $rack->id }}">{{ $rack->number }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="MMR 1">
                                    @foreach ( $getMMR1 as $rack )
                                        <option value="{{ $rack->id }}">{{ $rack->number }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="MMR 2">
                                    @foreach ( $getMMR2 as $rack )
                                        <option value="{{ $rack->id }}">{{ $rack->number }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="CCTV Room">
                                    @foreach ( $getCCTV as $rack )
                                        <option value="{{ $rack->id }}">{{ $rack->number }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- background & description --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="background" class="form-label">Background and Objectives</label>
                            <input type="text" class="form-control @error('background') is-invalid @enderror" id="background" name="background" value="{{ $getInternal->background }}" required>
                            @error('backround')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="desc" class="form-label">Work Description</label>
                            <input type="text" class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" value="{{ $getInternal->desc }}" required>
                            @error('desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- testing & rollback --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="testing" class="form-label">Testing and Verification</label>
                            <input type="text" class="form-control" id="testing" name="testing" value="{{ $getInternal->testing }}">
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-group mb-5">
                            <label for="rollback" class="form-label">Rollback and Operation</label>
                            <input type="text" class="form-control" id="rollback" name="rollback" value="{{ $getInternal->rollback }}">
                        </div>
                    </div>
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
                            @foreach ($getInternal->details as $p)
                            <tr>
                                <td>
                                    <input type="time" class="form-control @error('time_start') is-invalid @enderror" id="time_start" name="time_start[]" value="{{ $p->time_start }}" required>
                                    @error('time_start')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="time" class="form-control @error('time_end') is-invalid @enderror" id="time_end" name="time_end[]" value="{{ $p->time_end}}" required>
                                    @error('time_end')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control @error('activity') is-invalid @enderror" id="activity" name="activity[]" value="{{ $p->activity }}" required>
                                    @error('activity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control @error('service_impact') is-invalid @enderror" id="service_impact" name="service_impact[]" value="{{ $p->service_impact }}" required>
                                    @error('service_impact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control @error('item') is-invalid @enderror" id="detailTime" name="item[]" value="{{ $p->item }}" required>
                                    @error('item')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            @endforeach
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
                            @foreach ($getInternal->risks as $p)
                            <tr>
                                <td>
                                    <input type="text" class="form-control @error('risk') is-invalid @enderror" name="risk[]" value="{{ $p->risk }}" required>
                                    @error('risk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control @error('poss') is-invalid @enderror" name="poss[]" value="{{ $p->poss }}" required>
                                    @error('poss')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td>
                                    <select name="impact[]" id="impact" class="form-select @error('impact') is-invalid @enderror" required>
                                        <option value=""></option>
                                        <option value="Low">Low</option>
                                        <option value="Medium">Medium</option>
                                        <option value="High">High</option>
                                    </select>
                                    @error('impact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control @error('mitigation') is-invalid @enderror" name="mitigation[]" value="{{ $p->mitigation }}" required>
                                    @error('mitigation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            @endforeach
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
                            @foreach ($getInternal->visitors as $p)
                            <tr>
                                <th>Name</th>
                                <td><input type="text" class="form-control" name="name[]" id="name_id" value="{{ $p->name }}"></td>
                                <th>Phone Number</th>
                                <td><input type="text" class="form-control" name="phone[]" id="phone_id" value="{{ $p->phone }}"></td>
                            </tr>
                            <tr>
                                <th>Number ID</th>
                                <td><input type="text" class="form-control" name="number[]" id="number_id" value="{{ $p->number }}"></td>
                                <th>Company</th>
                                <th><input type="text" class="form-control" name="company[]" id="company_id" value="{{ $p->company }}"></th>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td><input type="text" class="form-control" name="department[]" id="department_id" value="{{ $p->department }}"></td>
                                <th>Responsibility</th>
                                <td><input type="text" class="form-control" name="respon[]" id="respon_id" value="{{ $p->respon }}"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="container mr-3 my-3">
                        <button class="mx-3" id="button_visitor"><b>Add More Fields</b></button>
                        <button type="button" class="mx-3" onclick="myFunction()"><b>Remove Field</b></button>
                    </div>
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
<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<script>
    // $(document).ready(function(){

        // $('.js-example-basic-multiple').select2({
        //     placeholder: 'Select an option',
        //     allowClear : true,
        //     tags : true,
        // });

        let max_row = 15;
        let row = 1;
        let button_detail = $('#button_detail');
        let table_detail = $('#table_detail');
        let button_risk = $('#button_risk');
        let table_risk = $('#table_risk');
        let button_visitor = $('#button_visitor');
        let table_visitor = $('#table_visitor');
        let remove_visitor = $('#remove_visitor');


        function myFunction() {
            document.getElementById("table_visitor").deleteRow(0);
        }

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
                $(table_risk).append('<tr><td><input type="text" class="form-control @error('risk') is-invalid @enderror" name="risk[]" value="{{ old('risk')}}">@error('risk')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</td><td><input type="text" class="form-control @error('poss') is-invalid @enderror" name="poss[]" value="{{ old('poss')}}">@error('poss')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</td><td><select name="impact[]" id="impact" class="form-select @error('impact') is-invalid @enderror"><option value=""></option><option value="Low">Low</option><option value="Medium">Medium</option><option value="High">High</option></select>@error('impact')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</td><td><input type="text" class="form-control @error('mitigation') is-invalid @enderror" name="mitigation[]" value="{{ old('mitigation')}}">@error('mitigation')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</td></tr>');
                row++;
            }
        });

        $(button_visitor).click(function(e){
        e.preventDefault();
        if(row < max_row){
            $(table_visitor).append('<tr><th>Name</th><td><input type="text" class="form-control" name="name[]" value=""></td><th>Phone Number</th><td><input type="text" class="form-control" name="phone[]" value=""></td></tr><tr><th>Number ID</th><td><input type="text" class="form-control" name="number[]" value=""></td><th>Company</th><th><input type="text" class="form-control" name="company[]" value=""></th></tr><tr><th>Department</th><td><input type="text" class="form-control" name="department[]" value=""></td><th>Responsibility</th><td><input type="text" class="form-control" name="respon[]" value=""></td></tr>');
            row++;
        }
    });



        // $('#pilihan1').change(function(){
        //     let id = $(this).val();
        //     $.ajax({
        //         url: "{{url("internal/getVisitor")}}"+'/'+id,
        //         dataType:"json",
        //         type: "get",
        //         success: function(response){
        //             const {data} = response;
        //             console.log(data)
        //         $('#phone_id').val(data.phone);
        //         $('#number_id').val(data.numberId);
        //         $('#company_id').val(data.company);
        //         $('#department_id').val(data.department);
        //         $('#respon_id').val(data.respon);
        //         }
        //     });
        // });
    // });
</script>
@endsection
