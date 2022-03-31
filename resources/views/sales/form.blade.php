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
                    <form class="validate-form" method="POST" action="{{ url('survey')}}">
                        @csrf

                        <div class="form-group">

                            {{-- Validity --}}
                            <div class="form-group margin-item row mb-4">
                                <div class="col col-item">
                                    <label for="date_visit">Date of Visit</label>
                                    <input class="form-control" type="date" name="date_visit" id="date_visit" required>

                                </div>

                                <div class="col-separator"></div>

                                <div class="col col-item">
                                    <label for="date_leave">Date of Leave</label>
                                    <input class="form-control" type="date" name="date_leave" id="date_leave" required>
                                </div>
                            </div>

                            {{-- Requestor --}}
                            <h5 class="">Bali Tower Requestor</h5>
                            <div class="row mb-4">
                                <div class="col-4">
                                    <label for="name-req">Name</label>
                                    <input type="text" class="form-control @error('name-req') is-invalid @enderror" required autocomplete="name-req" id="name-req" name="name-req" required>
                                        @error('name-req')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-4">
                                    <label for="dept-req">Department</label>
                                    <input type="text" class="form-control @error('dept-req') is-invalid @enderror" required autocomplete="dept-req" id="dept-req" name="dept-req" required>
                                        @error('dept-req')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-4">
                                    <label for="phone-req">Phone Number</label>
                                    <input type="text" class="form-control @error('phone-req') is-invalid @enderror" required autocomplete="phone-req" id="phone-req" name="phone-req" required>
                                        @error('phone-req')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            {{-- Visitor --}}
                            <h5 class="margin-item">Visitors & Person in Charge Identity</h5>

                            {{-- pic1 --}}
                            {{-- <div class="form-group row mb-4">
                                <div class="col-3">
                                    <label>Visitor 1 Name</label>
                                    <input type="text" class="form-control @error('name1') is-invalid @enderror" required autocomplete="name1" id="name1" name="name1" required>
                                        @error('name1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label>ID Number</label>
                                    <input type="number" class="form-control @error('nik1') is-invalid @enderror" required autocomplete="nik1" id="nik1" name="nik1" required>
                                        @error('nik1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label>Phone Number</label>
                                    <input type="number" class="form-control @error('phone1') is-invalid @enderror" required autocomplete="phone1" id="phone1" name="phone1" required>
                                        @error('phone1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-3">
                                    <label>Company</label>
                                    <input type="text" class="form-control @error('company1') is-invalid @enderror" required autocomplete="company1" id="company1" name="company1" required>
                                        @error('company1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label>Department</label>
                                    <input type="text" class="form-control @error('dept1') is-invalid @enderror" required autocomplete="dept1" id="dept1" name="dept1" required>
                                        @error('dept1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div> --}}

                            {{-- pic2 --}}
                            {{-- <div class="form-group row mb-4">
                                <div class="col-3">
                                    <label>Visitor 2 Name</label>
                                    <input type="text" class="form-control @error('name2') is-invalid @enderror" id="name2" name="name2">
                                        @error('name2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label>ID Number</label>
                                    <input type="number" class="form-control @error('nik2') is-invalid @enderror"  id="nik2" name="nik2">
                                        @error('nik2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label>Phone Number</label>
                                    <input type="number" class="form-control @error('phone2') is-invalid @enderror"  id="phone2" name="phone2">
                                        @error('phone2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-3">
                                    <label>Company</label>
                                    <input type="text" class="form-control @error('company2') is-invalid @enderror"  id="company2" name="company2">
                                        @error('company2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label>Department</label>
                                    <input type="text" class="form-control @error('dept2') is-invalid @enderror" id="dept2" name="dept2">
                                        @error('dept2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div> --}}

                            {{-- pic3 --}}
                            {{-- <div class="form-group row mb-4">
                                <div class="col-3">
                                    <label>Visitor 3 Name</label>
                                    <input type="text" class="form-control @error('name3') is-invalid @enderror" id="name3" name="name3">
                                        @error('name3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label>ID Number</label>
                                    <input type="number" class="form-control @error('nik3') is-invalid @enderror"  id="nik3" name="nik3">
                                        @error('nik3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label>Phone Number</label>
                                    <input type="number" class="form-control @error('phone3') is-invalid @enderror"  id="phone3" name="phone3">
                                        @error('phone3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-3">
                                    <label>Company</label>
                                    <input type="text" class="form-control @error('company3') is-invalid @enderror"  id="company3" name="company3">
                                        @error('company3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label>Department</label>
                                    <input type="text" class="form-control @error('dept3') is-invalid @enderror" id="dept3" name="dept3">
                                        @error('dept3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div> --}}

                            {{-- pic4 --}}
                            <div class="form-group row mb-4">
                                <div class="col-3">
                                    <label>Visitor 4 Name</label>
                                    <input type="text" class="form-control @error('name4') is-invalid @enderror" id="name4" name="name4">
                                        @error('name4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label>ID Number</label>
                                    <input type="number" class="form-control @error('nik4') is-invalid @enderror"  id="nik4" name="nik4">
                                        @error('nik4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label>Phone Number</label>
                                    <input type="number" class="form-control @error('phone4') is-invalid @enderror"  id="phone4" name="phone4">
                                        @error('phone4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-3">
                                    <label>Company</label>
                                    <input type="text" class="form-control @error('company4') is-invalid @enderror"  id="company4" name="company4">
                                        @error('company4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label>Department</label>
                                    <input type="text" class="form-control @error('dept4') is-invalid @enderror" id="dept4" name="dept4">
                                        @error('dept4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            {{-- pic5 --}}
                            <div class="form-group row mb-4">
                                <div class="col-3">
                                    <label>Visitor 5 Name</label>
                                    <input type="text" class="form-control @error('name5') is-invalid @enderror" id="name5" name="name5">
                                        @error('name5')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label>ID Number</label>
                                    <input type="number" class="form-control @error('nik5') is-invalid @enderror"  id="nik5" name="nik5">
                                        @error('nik5')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label>Phone Number</label>
                                    <input type="number" class="form-control @error('phone5') is-invalid @enderror"  id="phone5" name="phone5">
                                        @error('phone5')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-3">
                                    <label>Company</label>
                                    <input type="text" class="form-control @error('company5') is-invalid @enderror"  id="company5" name="company5">
                                        @error('company5')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label>Department</label>
                                    <input type="text" class="form-control @error('dept5') is-invalid @enderror" id="dept5" name="dept5">
                                        @error('dept5')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
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
@endsection
