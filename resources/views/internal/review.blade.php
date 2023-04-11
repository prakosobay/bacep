@extends('layouts.permit')
@section('content')
<div class="container my-5">
    <div class="card">
        <h1 class="text-center my-3 h1Permit">Access Request &  Change Request Form</h1>
        <form action="{{ route('internal.approve', $colo->id )}}" method="POST" class="validate-form">
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

                {{-- Entry Area --}}
                <div class="row">
                    @foreach ($colo->coloEntries as $p )
                    <div class="col-4 mx-1 my-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked disabled>
                            <label for="dc" class="form-check-label"><b>{{ $p->mRackId->mRoomId->name }} Rack {{ $p->mRackId->number }}</b></label>
                        </div>
                    </div>
                    @endforeach
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
                            <input type="text" class="form-control" id="background" name="background" value="{{ $colo->background }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="desc" class="form-label">Work Description</label>
                            <input type="text" class="form-control" id="desc" name="desc" value="{{ $colo->desc }}" required>
                        </div>
                    </div>
                </div>

                {{-- testing & rollback --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="testing" class="form-label">Testing and Verification</label>
                            <input type="text" class="form-control" id="testing" name="testing" value="{{ $colo->testing }}">
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-group mb-5">
                            <label for="rollback" class="form-label">Rollback and Operation</label>
                            <input type="text" class="form-control" id="rollback" name="rollback" value="{{ $colo->rollback }}">
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
                                    <td><input type="text" class="form-control" name="" value="{{ $p->mVisitorId->visit_nama }}" id="phone" readonly></td>
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
                </div>

                {{-- Approval Table --}}
                <table class="table table-hover" id="approval_table">
                    <tr >
                        <th >Requested By :</th>
                        <th >Reviewed By :</th>
                        <th >Checked By :</th>
                        <th >Acknowledge By :</th>
                    </tr>
                </table>

                {{-- Button --}}
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 text-center">
                            <button type="button" class="btn btn-lg btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Reject
                            </button>
                        </div>
                        <div class="col-6 text-center">
                            <button class="btn btn-lg btn-success my-1 mx-1" id="approve_button" type="submit">
                                Approve
                            </button>
                        </div>
                    </div>
                </div>
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
});
</script>
@endsection
