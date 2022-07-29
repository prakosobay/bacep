@extends('layouts.permit')
@section('content')
<div class="container my-5">
    <div class="card">
        <h1 class="text-center my-3 h1Permit">Access Request &  Change Request Form</h1>
        <form action="{{ url('internal/update', $getForm->id)}}" method="POST" class="validate-form">
            @method('put')
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
                            <input type="text" value="{{$getForm->req_dept}}" id="req_dept" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mb-4">
                            <label for="req_name" class="form-label">Requestor Name :</label>
                            <input type="text" class="form-control" id="req_name" value="{{ $getForm->req_name }}" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mb-4">
                            <label for="req_phone" class="form-label">Requestor Phone Number:</label>
                            <input type="text" class="form-control" id="req_phone" value="{{ $getForm->req_phone }}" readonly>
                        </div>
                    </div>
                </div>

                {{-- Purpose of Work --}}
                <div class="row">
                    <div class="col-8">
                        <div class="form-group mb-5">
                            <label for="work" class="form-label">Purpose of Work :</label>
                            <input type="text" class="form-control" id="work" value="{{ $getForm->work }}" readonly>
                        </div>
                    </div>
                    {{-- <div class="col-4">
                        <label for="rack">Number of Rack :</label><br>
                        <select class="js-example-basic-multiple" id="rack" name="rack[]" multiple="multiple">
                            <optgroup label="Server Room">
                            @for ($i = 1; $i <= 39; $i++)
                                <option value="A {{$i}}">Rack {{$i}}</option>
                            @endfor
                            </optgroup>
                            <optgroup label="MMR 1">
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="B {{$i}}">Rack {{$i}}</option>
                            @endfor
                            </optgroup>
                            <optgroup label="MMR 2">
                                <option value="C 1">Rack 1</option>
                            </optgroup>
                            <optgroup label="CCTV Room">
                                <option value="D 1">Rack 1</option>
                            </optgroup>
                        </select>
                    </div> --}}
                    <div class="col-4">
                        <div class="form-group mb-5">
                            <label for="rack" class="form-label">Rack :</label>
                            <input type="text" class="form-control" id="rack" value="{{ $getForm->rack }}" readonly>
                        </div>
                    </div>
                </div>

                {{-- Date of Visit & Leave --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-5">
                            <label for="visit" class="form-label">Date of Visit :</label>
                            <input type="date" class="form-control" id="visit" name="visit" value="{{ $getForm->visit }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-5">
                            <label for="leave" class="form-label">Date of Leave</label>
                            <input type="date" class="form-control" id="leave" name="leave" value="{{ $getForm->leave }}" readonly>
                        </div>
                    </div>
                </div>

                {{-- Entry Area --}}
                <div class="row">
                    <div class="col-4 mt-2">
                        @if($getForm->entry->dc == true)
                        <div class="form-check mb-3">
                            <label for="dc" class="form-check-label">Server Room</label>
                            <input type="checkbox" class="form-check-input" id="dc" checked disabled>
                        </div>
                        @else
                        <div class="form-check mb-3">
                            <label for="dc" class="form-check-label">Server Room</label>
                            <input type="checkbox" class="form-check-input" id="dc" value="0" disabled>
                        </div>
                        @endif

                        @if($getForm->entry->mmr1 == true)
                        <div class="form-check mb-5">
                            <label for="mmr1" class="form-check-label">MMR 1</label>
                            <input type="checkbox" class="form-check-input" id="mmr1" checked disabled>
                        </div>
                        @else
                        <div class="form-check mb-5">
                            <label for="mmr1" class="form-check-label">MMR 1</label>
                            <input type="checkbox" class="form-check-input" id="mmr1" value="0" disabled>
                        </div>
                        @endif
                    </div>
                    <div class="col-4 mt-2">
                        @if ($getForm->entry->mmr2 == true)
                        <div class="form-check mb-3">
                            <label for="mmr2" class="form-check-label">MMR 2</label>
                            <input type="checkbox" class="form-check-input" id="mmr2" checked disabled>
                        </div>
                        @else
                        <div class="form-check mb-3">
                            <label for="mmr2" class="form-check-label">MMR 2</label>
                            <input type="checkbox" class="form-check-input" id="mmr2" disabled>
                        </div>
                        @endif

                        @if($getForm->entry->cctv == true)
                        <div class="form-check mb-5">
                            <label for="cctv" class="form-check-label">CCTV Room</label>
                            <input type="checkbox" class="form-check-input" id="cctv" checked disabled>
                        </div>
                        @else
                        <div class="form-check mb-5">
                            <label for="cctv" class="form-check-label">CCTV Room</label>
                            <input type="checkbox" class="form-check-input" id="cctv" disabled>
                        </div>
                        @endif
                    </div>
                    <div class="col-4 mt-2">
                        <div class="form-check mb-3">
                            <label for="lain" class="form-label">Other :</label>
                            <input type="text" class="form-control" id="lain" value="{{ $getForm->entry->lain }}" readonly>
                        </div>
                    </div>
                </div>

                {{-- background & description --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="background" class="form-label">Background and Objectives</label>
                            <input type="text" class="form-control" id="background" value="{{ $getForm->background }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="desc" class="form-label">Work Description</label>
                            <input type="text" class="form-control" id="desc" value="{{ $getForm->desc }}" readonly>
                        </div>
                    </div>
                </div>

                {{-- testing & rollback --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="testing" class="form-label">Testing and Verification</label>
                            <input type="text" class="form-control" id="testing" value="{{ $getForm->testing }}" readonly>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-group mb-5">
                            <label for="rollback" class="form-label">Rollback and Operation</label>
                            <input type="text" class="form-control" id="rollback" value="{{ $getForm->rollback }}" readonly>
                        </div>
                    </div>
                </div>

                {{-- Detail Time Activity --}}
                <div class="mb-5">
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
                            @foreach ($getForm->detail as $p)
                            <tr>
                                <td>
                                    <input type="time" class="form-control" id="time_start" value="{{ $p->time_start }}" readonly>
                                </td>
                                <td>
                                    <input type="time" class="form-control" id="time_end" value="{{ $p->time_end }}" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="activity" value="{{ $p->activity }}" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="service_impact" value="{{ $p->service_impact }}" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="detailTime" value="{{ $p->item }}" readonly>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Risk Service Area Impact--}}
                <div class="mb-5">
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
                            @foreach ($getForm->risk as $p)
                            <tr>
                                <td>
                                    <input type="text" class="form-control" value="{{ $p->risk }}" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="{{ $p->poss }}" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="{{ $p->impact }}" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="{{ $p->mitigation }}" readonly>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                            @foreach ($getForm->visitor as $p)
                                <tr>
                                    <th>Name</th>
                                    <td><input type="text" class="form-control" value="{{ $p->name }}" readonly></td>
                                    <th>Phone Number</th>
                                    <td><input type="text" class="form-control" value="{{ $p->phone }}" readonly></td>
                                </tr>
                                <tr>
                                    <th>Number ID</th>
                                    <td><input type="text" class="form-control" value="{{ $p->numberId }}" readonly></td>
                                    <th>Company</th>
                                    <th><input type="text" class="form-control" value="{{ $p->company }}" readonly></th>
                                </tr>
                                <tr>
                                    <th>Department</th>
                                    <td><input type="text" class="form-control" value="{{ $p->department }}" readonly></td>
                                    <th>Responsibility</th>
                                    <td><input type="text" class="form-control" value="{{ $p->respon }}" readonly></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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

                <button type="submit" class="btn btn-lg btn-success mx-2">Checkin</button>
            </div>
        </form>
    </div>
</div>
@stack('script')
<script>
$(document).ready(function(){

    $('.js-example-basic-multiple').select2({
        placeholder: 'Select an option',
        allowClear : true,
        tags : true,
    });
});
</script>
@endsection
