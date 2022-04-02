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
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">

                            {{-- Validity --}}
                            <div class="form-group margin-item row mb-4">
                                <div class="col col-item">
                                    <label for="date_visit">Date of Visit</label>
                                    <input class="form-control" type="date" name="date_of_visit" value="{{ old('date_of_visit')}}" id="date_visit" required>

                                </div>

                                <div class="col-separator"></div>

                                <div class="col col-item">
                                    <label for="date_leave">Date of Leave</label>
                                    <input class="form-control" type="date" name="date_of_leave" value="{{ old('date_of_leave')}}" id="date_leave" required>
                                </div>
                            </div>

                            {{-- Requestor --}}
                            <h5 class="">Bali Tower Requestor</h5>
                            <div class="row mb-4">
                                <div class="col-4">
                                    <label for="name_req">Name</label>
                                    <input type="text" class="form-control @error('name_req') is-invalid @enderror" value="{{ old('nama_requestor')}}" required autocomplete="name_req" id="name_req" name="nama_requestor" required>
                                        @error('name_req')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-4">
                                    <label for="dept_requestor">Department</label>
                                    <input type="text" class="form-control @error('dept_requestor') is-invalid @enderror" required autocomplete="dept_requestor" value="{{ old('dept_requestor')}}" id="dept_requestor" name="dept_requestor" required>
                                        @error('dept_requestor')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-4">
                                    <label for="phone_requestor">Phone Number</label>
                                    <input type="text" class="form-control @error('phone_requestor') is-invalid @enderror" required autocomplete="phone_requestor" value="{{ old('phone_requestor')}}" id="phone_requestor" name="phone_requestor" required>
                                        @error('phone_requestor')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            {{-- Visitor --}}
                            <h5 class="margin-item">Visitors & Person in Charge Identity</h5>

                            {{-- pic1 --}}
                            <div class="form-group row mb-4">
                                <div class="col-3">
                                    <label for="visitor_name1">Visitor 1 Name</label>
                                    <input type="text" class="form-control @error('visitor_name1') is-invalid @enderror" required autocomplete="visitor_name1" value="{{ old('visitor_name1')}}" id="visitor_name1" name="visitor_name1" required>
                                        @error('visitor_name1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label for="visitor_nik1">ID Number</label>
                                    <input type="text" class="form-control @error('visitor_nik1') is-invalid @enderror" required autocomplete="visitor_nik1" value="{{ old('visitor_nik1')}}" id="visitor_nik1" name="visitor_nik1" required>
                                        @error('visitor_nik1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label for="visitor_phone1">Phone Number</label>
                                    <input type="number" class="form-control @error('visitor_phone1') is-invalid @enderror" required autocomplete="visitor_phone1" value="{{ old('visitor_phone1')}}" id="visitor_phone1" name="visitor_phone1" required>
                                        @error('visitor_phone1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-3">
                                    <label for="visitor_company1">Company</label>
                                    <input type="text" class="form-control @error('visitor_company1') is-invalid @enderror" required autocomplete="visitor_company1" value="{{ old('visitor_company1')}}" id="visitor_company1" name="visitor_company1" required>
                                        @error('visitor_company1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label for="visitor_dept1">Department</label>
                                    <input type="text" class="form-control @error('visitor_dept1') is-invalid @enderror" required autocomplete="visitor_dept1" value="{{old('visitor_dept1')}}" id="visitor_dept1" name="visitor_dept1" required>
                                        @error('visitor_dept1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            {{-- pic2 --}}
                            <div class="form-group row mb-4">
                                <div class="col-3">
                                    <label for="visitor_name2">Visitor 2 Name</label>
                                    <input type="text" class="form-control @error('visitor_name2') is-invalid @enderror"  value="{{ old('visitor_name2')}}" id="visitor_name2" name="visitor_name2" >
                                        @error('visitor_name2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label for="visitor_nik2">ID Number</label>
                                    <input type="text" class="form-control @error('visitor_nik2') is-invalid @enderror" value="{{ old('visitor_nik2')}}" id="visitor_nik2" name="visitor_nik2">
                                        @error('visitor_nik2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label for="visitor_phone2">Phone Number</label>
                                    <input type="number" class="form-control @error('visitor_phone2') is-invalid @enderror"  value="{{ old('visitor_phone2')}}" id="visitor_phone2" name="visitor_phone2">
                                        @error('visitor_phone2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-3">
                                    <label for="visitor_company2">Company</label>
                                    <input type="text" class="form-control @error('visitor_company2') is-invalid @enderror"  value="{{ old('visitor_company2')}}" id="visitor_company2" name="visitor_company2">
                                        @error('visitor_company2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label for="visitor_dept2">Department</label>
                                    <input type="text" class="form-control @error('visitor_dept2') is-invalid @enderror"  value="{{old('visitor_dept2')}}" id="visitor_dept2" name="visitor_dept2">
                                        @error('visitor_dept2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            {{-- pic3 --}}
                            <div class="form-group row mb-4">
                                <div class="col-3">
                                    <label for="visitor_name3">Visitor 3 Name</label>
                                    <input type="text" class="form-control @error('visitor_name3') is-invalid @enderror"  value="{{ old('visitor_name3')}}" id="visitor_name3" name="visitor_name3">
                                        @error('visitor_name3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label for="visitor_nik3">ID Number</label>
                                    <input type="text" class="form-control @error('visitor_nik3') is-invalid @enderror"  value="{{ old('visitor_nik3')}}" id="visitor_nik3" name="visitor_nik3">
                                        @error('visitor_nik3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label for="visitor_phone3">Phone Number</label>
                                    <input type="number" class="form-control @error('visitor_phone3') is-invalid @enderror"  value="{{ old('visitor_phone3')}}" id="visitor_phone3" name="visitor_phone3">
                                        @error('visitor_phone3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-3">
                                    <label for="visitor_company3">Company</label>
                                    <input type="text" class="form-control @error('visitor_company3') is-invalid @enderror"  value="{{ old('visitor_company3')}}" id="visitor_company3" name="visitor_company3">
                                        @error('visitor_company3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label for="visitor_dept3">Department</label>
                                    <input type="text" class="form-control @error('visitor_dept3') is-invalid @enderror"  value="{{old('visitor_dept3')}}" id="visitor_dept3" name="visitor_dept3">
                                        @error('visitor_dept3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            {{-- pic4 --}}
                            <div class="form-group row mb-4">
                                <div class="col-3">
                                    <label for="visitor_name4">Visitor 4 Name</label>
                                    <input type="text" class="form-control @error('visitor_name4') is-invalid @enderror"  value="{{ old('visitor_name4')}}" id="visitor_name4" name="visitor_name4">
                                        @error('visitor_name4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label for="visitor_nik4">ID Number</label>
                                    <input type="text" class="form-control @error('visitor_nik4') is-invalid @enderror"  value="{{ old('visitor_nik4')}}" id="visitor_nik4" name="visitor_nik4">
                                        @error('visitor_nik4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label for="visitor_phone4">Phone Number</label>
                                    <input type="number" class="form-control @error('visitor_phone4') is-invalid @enderror"  value="{{ old('visitor_phone4')}}" id="visitor_phone4" name="visitor_phone4">
                                        @error('visitor_phone4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-3">
                                    <label for="visitor_company4">Company</label>
                                    <input type="text" class="form-control @error('visitor_company4') is-invalid @enderror"  value="{{ old('visitor_company4')}}" id="visitor_company4" name="visitor_company4">
                                        @error('visitor_company4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label for="visitor_dept4">Department</label>
                                    <input type="text" class="form-control @error('visitor_dept4') is-invalid @enderror"  value="{{old('visitor_dept4')}}" id="visitor_dept4" name="visitor_dept4">
                                        @error('visitor_dept4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            {{-- pic5 --}}
                            <div class="form-group row mb-4">
                                <div class="col-3">
                                    <label for="visitor_name5">Visitor 5 Name</label>
                                    <input type="text" class="form-control @error('visitor_name5') is-invalid @enderror" value="{{ old('visitor_name5')}}" id="visitor_name5" name="visitor_name5">
                                        @error('visitor_name5')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label for="visitor_nik5">ID Number</label>
                                    <input type="text" class="form-control @error('visitor_nik5') is-invalid @enderror"  value="{{ old('visitor_nik5')}}" id="visitor_nik5" name="visitor_nik5">
                                        @error('visitor_nik5')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label for="visitor_phone5">Phone Number</label>
                                    <input type="number" class="form-control @error('visitor_phone5') is-invalid @enderror"  value="{{ old('visitor_phone5')}}" id="visitor_phone5" name="visitor_phone5">
                                        @error('visitor_phone5')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-3">
                                    <label for="visitor_company5">Company</label>
                                    <input type="text" class="form-control @error('visitor_company5') is-invalid @enderror"  value="{{ old('visitor_company5')}}" id="visitor_company5" name="visitor_company5">
                                        @error('visitor_company5')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-2">
                                    <label for="visitor_dept5">Department</label>
                                    <input type="text" class="form-control @error('visitor_dept5') is-invalid @enderror"  value="{{old('visitor_dept5')}}" id="visitor_dept5" name="visitor_dept5">
                                        @error('visitor_dept5')
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
