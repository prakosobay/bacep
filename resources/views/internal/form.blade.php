@extends('layouts.permit')
@section('content')
<div class="container my-5">
    <div class="card">
        <h1 class="text-center my-3 h1Permit">Access Request &  Change Request Form</h1>
        <form action="{{ route('internalStore')}}" method="POST" class="validate-form">
            @csrf
            <div class="container form-container">

                <div class="container">
                    @if (session('success'))
                        <div class="alert alert-success mt-2">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                <div class="container">
                    @if (session('failed'))
                        <div class="alert alert-danger mt-2">
                            {{ session('failed') }}
                        </div>
                    @endif
                </div>

                {{-- Requestor --}}
                <div class="row">
                    <div class="col-4">
                        <div class="form-group my-2">
                            <label for="req_dept" class="form-label">Requestor Department :</label>
                            <input type="text" value="{{ auth()->user()->department }}" id="req_dept" name="req_dept" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group my-2">
                            <label for="req_name" class="form-label">Requestor Name :</label>
                            <input type="text" class="form-control" id="req_name" value="{{ auth()->user()->name }}" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group my-2">
                            <label for="req_phone" class="form-label">Requestor Phone Number:</label>
                            <input type="text" class="form-control" id="req_phone" value="{{ auth()->user()->phone }}" readonly>
                        </div>
                    </div>
                </div>

                {{-- Purpose of Work --}}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group my-3">
                            <label for="work" class="form-label">Purpose of Work :</label>
                            <input type="text" class="form-control @error('work') is-invalid @enderror" id="work" name="work" value="{{ old('work') }}" required>
                            @error('work')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-4">
                        <div class="form-group mt-5">
                            <label for="room">Entry Area</label>
                            <select name="room[]" class="js-example-responsive-theme-multiple form-control" id="room" multiple="multiple" required>
                                @foreach ( $getRooms as $room )
                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                </div>

                <div class="row">
                    <div class="col-4 my-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="dc" name="dc">
                            <label for="dc" class="form-check-label">Server Room</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="mmr1" name="mmr1">
                            <label for="mmr1" class="form-check-label">MMR 1</label>
                        </div>
                    </div>

                    <div class="col-4 my-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="mmr2" name="mmr2">
                            <label for="mmr2" class="form-check-label">MMR 2</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="cctv" name="cctv">
                            <label for="cctv" class="form-check-label">CCTV Room</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group mt-5">
                            <label for="rack">Rack</label>
                            <select name="rack[]" class="js-example-responsive-theme-multiple form-control" id="rack" multiple="multiple" required>
                                {{-- <optgroup label="Server Room">
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
                                </optgroup> --}}
                                @foreach ( $getRacks as $rack )
                                    <option value="{{ $rack->id }}">{{ $rack->mRoomId->name }} / {{ $rack->number }}</option>
                                @endforeach
                            </select>
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

                {{-- background & description --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="background" class="form-label">Background and Objectives</label>
                            <input type="text" class="form-control @error('background') is-invalid @enderror" id="background" name="background" value="{{ old('background')}}" required>
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
                            <input type="text" class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" value="{{ old('desc')}}" required>
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
                            <input type="text" class="form-control" id="testing" name="testing" value="{{ old('testing')}}">
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-group mb-5">
                            <label for="rollback" class="form-label">Rollback and Operation</label>
                            <input type="text" class="form-control" id="rollback" name="rollback" value="{{ old('rollback')}}">
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
                                <th>Service Impact</th>
                                <th>Item</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="time" class="form-control" id="time_start" name="time_start[]" value="{{ old('time_start')}}" required>
                                </td>
                                <td>
                                    <input type="time" class="form-control" id="time_end" name="time_end[]" value="{{ old('time_end')}}" required>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="activity" name="activity[]" value="{{ old('activity')}}" required>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="service_impact" name="service_impact[]" value="{{ old('service_impact')}}" required>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="item" name="item[]" value="{{ old('item')}}" required>
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
                                    <select name="risk[]" class="form-control" id="risk" required>
                                        <option selected></option>
                                        @foreach ( $risks as $risk )
                                            <option value="{{ $risk->id }}">{{ $risk->risk }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="" value="" id="poss" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="" value="" id="impact" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="" value="" id="mitigation" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="risk[]" class="form-control" id="risk2" >
                                        <option selected></option>
                                        @foreach ( $risks as $risk )
                                            <option value="{{ $risk->id }}">{{ $risk->risk }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="" value="" id="poss2" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="" value="" id="impact2" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="" value="" id="mitigation2" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="risk[]" class="form-control" id="risk3" >
                                        <option selected></option>
                                        @foreach ( $risks as $risk )
                                            <option value="{{ $risk->id }}">{{ $risk->risk }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="" value="" id="poss3" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="" value="" id="impact3" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="" value="" id="mitigation3" readonly>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- <button id="button_risk"><b>Add More Fields</b></button> --}}
                </div>

                {{-- Visitor --}}
                {{-- <div class="mb-3">
                    <table class="table table-bordered table-hover" id="table_visitor">
                        <thead>
                            <tr>
                                <th colspan="4">Visitor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td><input type="text" class="form-control" name="name[]" value="{{ old('name')}}" required></td>
                                <th>Phone Number</th>
                                <td><input type="text" class="form-control" name="phone[]" value="{{ old('phone')}}" required></td>
                            </tr>
                            <tr>
                                <th>Number ID</th>
                                <td><input type="text" class="form-control" name="number[]" value="{{ old('number')}}" required></td>
                                <th>Company</th>
                                <th><input type="text" class="form-control" name="company[]" value="{{ old('company')}}" required></th>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td><input type="text" class="form-control" name="department[]" value="{{ old('department')}}" required></td>
                                <th>Responsibility</th>
                                <td><input type="text" class="form-control" name="respon[]" value="{{ old('respon')}}"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button id="button_visitor"><b>Add More Fields</b></button>
                </div> --}}

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
                                <td>
                                    <select name="name[]" id="name" class="form-select" required>
                                        <option selected></option>
                                        @foreach ( $visitors as $pic )
                                            <option value="{{ $pic->id }}">{{ $pic->visit_nama }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <th>Phone Number</th>
                                <td><input type="text" class="form-control" name="" value="" id="phone" readonly></td>
                            </tr>
                            <tr>
                                <th>Number ID</th>
                                <td><input type="text" class="form-control" name="" value="" id="number" readonly></td>
                                <th>Company</th>
                                <th><input type="text" class="form-control" name="" value="" id="company" readonly></th>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td><input type="text" class="form-control" name="" value="" id="department" readonly></td>
                                <th>Responsibility</th>
                                <td><input type="text" class="form-control" name="" value="" id="respon" readonly></td>
                            </tr>

                            <tr>
                                <th>Name</th>
                                <td>
                                    <select name="name[]" id="name2" class="form-select">
                                        <option selected></option>
                                        @foreach ( $visitors as $pic )
                                            <option value="{{ $pic->id }}">{{ $pic->visit_nama }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <th>Phone Number</th>
                                <td><input type="text" class="form-control" name="" value="" id="phone2" readonly></td>
                            </tr>
                            <tr>
                                <th>Number ID</th>
                                <td><input type="text" class="form-control" name="" value="" id="number2" readonly></td>
                                <th>Company</th>
                                <th><input type="text" class="form-control" name="" value="" id="company2" readonly></th>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td><input type="text" class="form-control" name="" value="" id="department2" readonly></td>
                                <th>Responsibility</th>
                                <td><input type="text" class="form-control" name="" value="" id="respon2" readonly></td>
                            </tr>

                            <tr>
                                <th>Name</th>
                                <td>
                                    <select name="name[]" id="name3" class="form-select">
                                        <option selected></option>
                                        @foreach ( $visitors as $pic )
                                            <option value="{{ $pic->id }}">{{ $pic->visit_nama }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <th>Phone Number</th>
                                <td><input type="text" class="form-control" name="" value="" id="phone3" readonly></td>
                            </tr>
                            <tr>
                                <th>Number ID</th>
                                <td><input type="text" class="form-control" name="" value="" id="number3" readonly></td>
                                <th>Company</th>
                                <th><input type="text" class="form-control" name="" value="" id="company3" readonly></th>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td><input type="text" class="form-control" name="" value="" id="department3" readonly></td>
                                <th>Responsibility</th>
                                <td><input type="text" class="form-control" name="" value="" id="respon3" readonly></td>
                            </tr>

                            <tr>
                                <th>Name</th>
                                <td>
                                    <select name="name[]" id="name4" class="form-select">
                                        <option selected></option>
                                        @foreach ( $visitors as $pic )
                                            <option value="{{ $pic->id }}">{{ $pic->visit_nama }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <th>Phone Number</th>
                                <td><input type="text" class="form-control" name="" value="" id="phone4" readonly></td>
                            </tr>
                            <tr>
                                <th>Number ID</th>
                                <td><input type="text" class="form-control" name="" value="" id="number4" readonly></td>
                                <th>Company</th>
                                <th><input type="text" class="form-control" name="" value="" id="company4" readonly></th>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td><input type="text" class="form-control" name="" value="" id="department4" readonly></td>
                                <th>Responsibility</th>
                                <td><input type="text" class="form-control" name="" value="" id="respon4" readonly></td>
                            </tr>

                            <tr>
                                <th>Name</th>
                                <td>
                                    <select name="name[]" id="name5" class="form-select">
                                        <option selected></option>
                                        @foreach ( $visitors as $pic )
                                            <option value="{{ $pic->id }}">{{ $pic->visit_nama }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <th>Phone Number</th>
                                <td><input type="text" class="form-control" name="" value="" id="phone5" readonly></td>
                            </tr>
                            <tr>
                                <th>Number ID</th>
                                <td><input type="text" class="form-control" name="" value="" id="number5" readonly></td>
                                <th>Company</th>
                                <th><input type="text" class="form-control" name="" value="" id="company5" readonly></th>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td><input type="text" class="form-control" name="" value="" id="department5" readonly></td>
                                <th>Responsibility</th>
                                <td><input type="text" class="form-control" name="" value="" id="respon5" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- <button id="button_visitor"><b>Add More Fields</b></button> --}}
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

    $('.js-example-responsive-theme-multiple').select2({
        placeholder: 'Select an option',
        allowClear : true,
        tags : true,
        theme : 'classic',
        width: 'resolve',
    });

    $('#risk').change(function(){
        let id = $(this).val();
        $.ajax({
            url: "{{ url("internal/get/risk") }}"+'/'+id,
            dataType:"json",
            type: "get",
            success: function(response){
                const {risk} = response;
                console.log(risk)
            $('#poss').val(risk.poss);
            $('#impact').val(risk.impact);
            $('#mitigation').val(risk.mitigation);
            }
        });
    });

    $('#risk2').change(function(){
        let id = $(this).val();
        $.ajax({
            url: "{{ url("internal/get/risk") }}"+'/'+id,
            dataType:"json",
            type: "get",
            success: function(response){
                const {risk} = response;
                console.log(risk)
            $('#poss2').val(risk.poss);
            $('#impact2').val(risk.impact);
            $('#mitigation2').val(risk.mitigation);
            }
        });
    });

    $('#risk3').change(function(){
        let id = $(this).val();
        $.ajax({
            url: "{{ url("internal/get/risk") }}"+'/'+id,
            dataType:"json",
            type: "get",
            success: function(response){
                const {risk} = response;
                console.log(risk)
            $('#poss3').val(risk.poss);
            $('#impact3').val(risk.impact);
            $('#mitigation3').val(risk.mitigation);
            }
        });
    });

    $('#name').change(function(){
        let id = $(this).val();
        $.ajax({
            url: "{{ url("internal/get/pic") }}"+'/'+id,
            dataType:"json",
            type: "get",
            success: function(response){
                const {pic} = response;
                console.log(pic)
            $('#phone').val(pic.visit_phone);
            $('#number').val(pic.visit_nik);
            $('#company').val(pic.visit_company);
            $('#department').val(pic.visit_department);
            $('#respon').val(pic.visit_respon);
            }
        });
    });

    $('#name2').change(function(){
        let id = $(this).val();
        $.ajax({
            url: "{{ url("internal/get/pic") }}"+'/'+id,
            dataType:"json",
            type: "get",
            success: function(response){
                const {pic} = response;
                console.log(pic)
            $('#phone2').val(pic.visit_phone);
            $('#number2').val(pic.visit_nik);
            $('#company2').val(pic.visit_company);
            $('#department2').val(pic.visit_department);
            $('#respon2').val(pic.visit_respon);
            }
        });
    });

    $('#name3').change(function(){
        let id = $(this).val();
        $.ajax({
            url: "{{ url("internal/get/pic") }}"+'/'+id,
            dataType:"json",
            type: "get",
            success: function(response){
                const {pic} = response;
                console.log(pic)
            $('#phone3').val(pic.visit_phone);
            $('#number3').val(pic.visit_nik);
            $('#company3').val(pic.visit_company);
            $('#department3').val(pic.visit_department);
            $('#respon3').val(pic.visit_respon);
            }
        });
    });

    $('#name4').change(function(){
        let id = $(this).val();
        $.ajax({
            url: "{{ url("internal/get/pic") }}"+'/'+id,
            dataType:"json",
            type: "get",
            success: function(response){
                const {pic} = response;
                console.log(pic)
            $('#phone4').val(pic.visit_phone);
            $('#number4').val(pic.visit_nik);
            $('#company4').val(pic.visit_company);
            $('#department4').val(pic.visit_department);
            $('#respon4').val(pic.visit_respon);
            }
        });
    });

    $('#name5').change(function(){
        let id = $(this).val();
        $.ajax({
            url: "{{ url("internal/get/pic") }}"+'/'+id,
            dataType:"json",
            type: "get",
            success: function(response){
                const {pic} = response;
                console.log(pic)
            $('#phone5').val(pic.visit_phone);
            $('#number5').val(pic.visit_nik);
            $('#company5').val(pic.visit_company);
            $('#department5').val(pic.visit_department);
            $('#respon5').val(pic.visit_respon);
            }
        });
    });

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
            $(table_detail).append('<tr><td><input type="time" class="form-control" id="time_start" name="time_start[]"></td><td><input type="time" class="form-control" id="time_end" name="time_end[]"></td><td><input type="text" class="form-control" id="activity" name="activity[]"></td><td><input type="text" class="form-control" id="service_impact" name="service_impact[]"></td><td><input type="text" class="form-control" id="item" name="item[]"></td></tr>');
            row++;
        }
    });

    // $(button_visitor).click(function(e){
    //     e.preventDefault();
    //     if(row < max_row){
    //         $(table_visitor).append('<tr><th>Name</th><td><input type="text" class="form-control" name="name[]" ></td><th>Phone Number</th><td><input type="text" class="form-control" name="phone[]" ></td></tr><tr><th>Number ID</th><td><input type="text" class="form-control" name="number[]" ></td><th>Company</th><th><input type="text" class="form-control" name="company[]" ></th></tr><tr><th>Department</th><td><input type="text" class="form-control" name="department[]" ></td><th>Responsibility</th><td><input type="text" class="form-control" name="respon[]" ></td></tr>');
    //         row++;
    //     }
    // });
});
</script>
@endsection
