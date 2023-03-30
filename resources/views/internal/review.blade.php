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
                            <input type="text" value="{{ $colo->requestorId->department }}" id="req_dept" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group my-2">
                            <label for="req_name" class="form-label">Requestor Name :</label>
                            <input type="text" class="form-control" id="req_name" value="{{ $colo->requestorId->name }}" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group my-2">
                            <label for="req_phone" class="form-label">Requestor Phone Number:</label>
                            <input type="text" class="form-control" id="req_phone" value="{{ $colo->requestorId->phone }}" readonly>
                        </div>
                    </div>
                </div>

                {{-- Purpose of Work --}}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group my-3">
                            <label for="work" class="form-label">Purpose of Work :</label>
                            <input type="text" class="form-control" id="work" value="{{ $colo->work }}" readonly>
                        </div>
                    </div>
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

                    {{-- <div class="col-4">
                        <div class="form-group mt-5">
                            <label for="rack">Rack</label>
                            <select name="rack[]" class="js-example-responsive-theme-multiple form-control" id="rack" multiple="multiple" required>
                                @foreach ( $getRacks as $rack )
                                    <option value="{{ $rack->id }}">{{ $rack->mRoomId->name }} / {{ $rack->number }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                </div>

                {{-- Date of Visit & Leave --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-5">
                            <label for="visit" class="form-label">Date of Visit :</label>
                            <input type="date" class="form-control" id="visit" value="{{ $colo->visit }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-5">
                            <label for="leave" class="form-label">Date of Leave</label>
                            <input type="date" class="form-control" id="leave" value="{{ $colo->leave }}" readonly>
                        </div>
                    </div>
                </div>

                {{-- background & description --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="background" class="form-label">Background and Objectives</label>
                            <input type="text" class="form-control" id="background" name="background" value="{{ $colo->background }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="desc" class="form-label">Work Description</label>
                            <input type="text" class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" value="{{ $colo->desc }}" readonly>
                        </div>
                    </div>
                </div>

                {{-- testing & rollback --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="testing" class="form-label">Testing and Verification</label>
                            <input type="text" class="form-control" id="testing" name="testing" value="{{ $colo->testing }}" readonly>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-group mb-5">
                            <label for="rollback" class="form-label">Rollback and Operation</label>
                            <input type="text" class="form-control" id="rollback" name="rollback" value="{{ $colo->rollback }}" readonly>
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
                            @foreach ( $colo->coloDetails as $p )
                                <tr>
                                    <td>
                                        <input type="time" class="form-control" id="time_start" name="time_start[]" value="{{ $p->time_start }}" required>
                                    </td>
                                    <td>
                                        <input type="time" class="form-control" id="time_end" name="time_end[]" value="{{ $p->time_end }}" required>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="activity" name="activity[]" value="{{ $p->activity }}" required>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="service_impact" name="service_impact[]" value="{{ $p->service_impact }}" required>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="item" name="item[]" value="{{ $p->item }}" required>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
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
                            @foreach ( $colo->coloRisks as $p )
                                <tr>
                                    <td>
                                        {{-- <select name="risk[]" class="form-control" id="risk" readonly>
                                            <option selected value="{{ $p->mRiskId->id }}">{{ $p->mRiskId->risk }}</option>
                                            @foreach ( $risks as $risk )
                                                <option value="{{ $risk->id }}">{{ $risk->risk }}</option>
                                            @endforeach
                                        </select> --}}
                                        <input type="text" class="form-control" value="{{ $p->mRiskId->risk }}" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="" value="{{ $p->mRiskId->poss }}" id="poss" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="" value="{{ $p->mRiskId->impact }}" id="impact" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="" value="{{ $p->mRiskId->mitigation }}" id="mitigation" readonly>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{-- <button id="button_risk"><b>Add More Fields</b></button> --}}
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
                            @foreach ( $colo->coloVisitors as $p )
                                <tr>
                                    <th>Name</th>
                                    <td>
                                        <select name="name[]" id="name" class="form-select" required>
                                            <option selected value="{{ $p->mVisitorId->id }}">{{ $p->mVisitorId->visit_nama }}</option>
                                            @foreach ( $visitors as $pic )
                                                <option value="{{ $pic->id }}">{{ $pic->visit_nama }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <th>Phone Number</th>
                                    <td><input type="text" class="form-control" name="" value="{{ $p->mVisitorId->visit_phone }}" id="phone" readonly></td>
                                </tr>
                                <tr>
                                    <th>Number ID</th>
                                    <td><input type="text" class="form-control" name="" value="{{ $p->mVisitorId->visit_nik }}" id="number" readonly></td>
                                    <th>Company</th>
                                    <th><input type="text" class="form-control" name="" value="{{ $p->mVisitorId->visit_company }}" id="company" readonly></th>
                                </tr>
                                <tr>
                                    <th>Department</th>
                                    <td><input type="text" class="form-control" name="" value="{{ $p->mVisitorId->visit_department }}" id="department" readonly></td>
                                    <th>Responsibility</th>
                                    <td><input type="text" class="form-control" name="" value="{{ $p->mVisitorId->visit_respon }}" id="respon" readonly></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <button id="button_visitor"><b>Add More Fields</b></button> --}}
                </div>

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
