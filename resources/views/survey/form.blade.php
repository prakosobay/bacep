@extends('layouts.permit')
@section('content')
    <div class="container my-5">
        <div class="card py-2 px-5">
            <div class="backbtn">
                <a href="{{url('/home')}}">
                    <img src="{{asset('gambar/home/bell.svg')}}" alt="">Back To Home
                </a>
            </div>
            <h4 class="margin-row text-center">Form Survey</h4>
            <div class="margin-row">
                <div class="table-responsive">
                    <form class="validate-form" method="POST" action="{{ url('survey/create')}}">
                        @csrf
                        @if (session('Sukses'))
                            <div class="alert alert-success mt-2">
                                {{ session('Sukses') }}
                            </div>
                        @endif
                        {{--
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}

                        {{-- Requestor --}}
                        <div class="row my-4">
                            <div class="col-4">
                                <label for="name_req">Name</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->name }}" id="nama" readonly>
                            </div>
                            <div class="col-4">
                                <label for="dept_requestor">Department</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->department }}" id="department" readonly>
                            </div>
                            <div class="col-4">
                                <label for="phone_requestor">Phone Number</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->phone }}" id="phone_requestor"  readonly>
                            </div>
                        </div>

                        {{-- Validity --}}
                        <div class="row my-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="date_visit">Date of Visit</label>
                                    <input class="form-control @error('visit') is-invalid @enderror" type="date" name="visit" value="{{ old('visit')}}" id="date_visit" required>
                                    @error('visit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="date_leave">Date of Leave</label>
                                    <input class="form-control @error('leave') is-invalid @enderror" type="date" name="leave" value="{{ old('leave')}}" id="date_leave" required>
                                    @error('leave')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Visitor --}}
                        <table class="table table-hover table-bordered my-4" id="table_visitor">
                            <thead>
                                <th colspan="5">Visitor</th>
                            </thead>
                            <thead class="bg1">
                                <tr>
                                    <th>Name</th>
                                    <th>ID Number</th>
                                    <th>Phone Number</th>
                                    <th>Company</th>
                                    <th>Department</th>
                                </tr>
                            </thead>
                            <tbody class="bg1">
                                <tr>
                                    <td>
                                        <input class="form-input @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" name="name[]" id="name_id" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input class="form-input @error('number') is-invalid @enderror" value="{{ old('number') }}" type="text" name="number[]" id="number_id" required>
                                        @error('number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input class="form-input @error('phone') is-invalid @enderror" value="{{ old('phone') }}" type="text" name="phone[]" id="phone_id" required>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input class="form-input @error('company') is-invalid @enderror" value="{{ old('company') }}" type="text" name="company[]" id="company_id" required>
                                        @error('company')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input class="form-input @error('department') is-invalid @enderror" value="{{ old('department') }}" type="text" name="department[]" id="department_id" required>
                                        @error('department')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="container my-3 mx-2">
                            <button id="button_visitor"><b>Add More Fields</b></button>
                        </div>

                        {{-- Submit --}}
                        <div class="container my-2">
                            <button type="submit" class="btn btn-lg btn-success mx-2">Submit</button>
                            <button type="reset" class="btn btn-lg btn-warning mx-2">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function(){
        let max_row = 6;
        let row = 1;
        let button_visitor = $('#button_visitor');
        let table_visitor = $('#table_visitor');

        $(button_visitor).click(function(e){
            e.preventDefault();
            if(row < max_row){
                $(table_visitor).append('<tr><td><input class="form-input @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" name="name[]" id="name_id" required>@error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</td><td><input class="form-input @error('number') is-invalid @enderror" value="{{ old('number') }}" type="text" name="number[]" id="number_id" required>@error('number')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</td><td><input class="form-input @error('phone') is-invalid @enderror" value="{{ old('phone') }}" type="text" name="phone[]" id="phone_id" required>@error('phone')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</td><td><input class="form-input @error('company') is-invalid @enderror" value="{{ old('company') }}" type="text" name="company[]" id="company_id" required>@error('company')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</td><td><input class="form-input @error('department') is-invalid @enderror" value="{{ old('department') }}" type="text" name="department[]" id="department_id" required>@error('department')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</td></tr>');
                row++;
            }
        });
    });
</script>

@endsection
