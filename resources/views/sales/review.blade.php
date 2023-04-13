@extends('layouts.permit')
@section('content')
<div class="container my-5">
    <div class="card">
        <h1 class="text-center my-3 h1Permit">Review Access Request</h1>
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
                    <tr>
                        @switch($log->status)
                            @case('requested')
                                <td class="text-center">
                                    {{ $colo->histories[0]->createdBy->name }}</br>
                                    {{ $colo->created_at }}
                                </td>
                                <td class="text-center">

                                </td>
                                <td class="text-center">

                                </td>
                                <td class="text-center">

                                </td>
                                @break

                            @case('reviewed')
                                <td class="text-center">
                                    {{ $colo->histories[0]->createdBy->name }}</br>
                                    {{ $colo->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $colo->histories[1]->createdBy->name }}</br>
                                    {{ $colo->histories[1]->created_at }}
                                </td>
                                <td class="text-center">

                                </td>
                                <td class="text-center">

                                </td>
                                @break

                            @case('checked')
                                <td class="text-center">
                                    {{ $colo->histories[0]->createdBy->name }}</br>
                                    {{ $colo->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $colo->histories[1]->createdBy->name }}</br>
                                    {{ $colo->histories[1]->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $colo->histories[2]->createdBy->name }}</br>
                                    {{ $colo->histories[2]->created_at }}
                                </td>
                                <td class="text-center">

                                </td>
                                @break

                            @case('acknowledge')
                                <td class="text-center">
                                    {{ $colo->histories[0]->createdBy->name }}</br>
                                    {{ $colo->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $colo->histories[1]->createdBy->name }}</br>
                                    {{ $colo->histories[1]->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $colo->histories[2]->createdBy->name }}</br>
                                    {{ $colo->histories[2]->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ ($colo->histories[3]->createdBy->name) }}</br>
                                    {{ ($colo->histories[3]->created_at) }}
                                </td>
                                @break
                        @endswitch
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
