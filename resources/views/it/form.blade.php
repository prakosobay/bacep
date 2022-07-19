@extends('layouts.permit')
@section('content')
<div class="container my-5">
    <div class="card">
        <form action="" method="POST" id="itForm"></form>
            <h1 class="text-center my-3 h1Permit">Fill Requestor Identity</h1>
            <div class="container form-container">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group mb-3">
                            <label for="req_dept" class="form-label">Requestor Department :</label>
                            <input type="text" value="IT" id="req_dept" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mb-3">
                            <label for="req_name" class="form-label">Requstor Name :</label>
                            <input type="text" class="form-control" id="req_name" name="req_name" value="{{ old('req_name')}}" required autofocus>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mb-3">
                            <label for="req_phone" class="form-label">Requestor Phone Number:</label>
                            <input type="text" class="form-control" id="req_phone" name="req_phone" value="{{ old('req_phone')}}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="work" class="form-label">Purpose of Work :</label>
                    <input type="text" class="form-control" id="work" name="work" value="{{ old('work')}}" required>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="visit" class="form-label">Date of Visit :</label>
                            <input type="date" class="form-control" id="visit" name="visit" value="{{ old('visit')}}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="leave" class="form-label">Date of Leave</label>
                            <input type="date" class="form-control" id="leave" name="leave" value="{{ old('leave')}}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 mt-2">
                        <div class="form-check mb-3">
                            <label for="dc" class="form-check-label">Server Room</label>
                            <input type="checkbox" class="form-check-input" id="dc" name="dc" value="1" >
                        </div>
                        <div class="form-check mb-3">
                            <label for="mmr1" class="form-check-label">MMR 1</label>
                            <input type="checkbox" class="form-check-input" id="mmr1" name="mmr1" value="1">
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <div class="form-check mb-3">
                            <label for="mmr2" class="form-check-label">MMR 2</label>
                            <input type="checkbox" class="form-check-input" id="mmr2" name="mmr2" value="1">
                        </div>
                        <div class="form-check mb-3">
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

            </div>

            <div class="container form-container">
                <div class="row"></div>
            </div>

        </form>
    </div>
</div>
@stack('script')
@endsection
