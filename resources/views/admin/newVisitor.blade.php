@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800 text-center"><b>Tambahkan Visitor</b></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary mr-5 sm" href="{{ url('revisi/visitor/show')}}">
                Kembali
            </a>
        </div>

        @if (session('success'))
                <div class="alert alert-success mt-1">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('failed'))
                <div class="alert alert-warning mt-1">
                    {{ session('failed') }}
                </div>
            @endif

        <div class="card-body">
            <div class="table-responsive">
                <form method="post" class="validate-form" action="{{url('revisi/visitor/create')}}">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama" class="form-label"><b>Full Name :</b></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama')}}" required autofocus>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="company" class="form-label"><b>Company :</b></label>
                                <select name="company" class="form-control" id="company" required>
                                    <option selected>Pilih 1</option>
                                    @foreach ( $companies as $company )
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="respon" class="form-label"><b>Responsibility : </b></label>
                                <input type="text" class="form-control @error('respon') is-invalid @enderror" id="respon" name="respon" value="{{ old('respon')}}" required>
                                @error('respon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="dept" class="form-label"><b>Department :</b></label>
                                <input type="text" class="form-control @error('dept') is-invalid @enderror" id="dept" name="dept" value="{{ old('dept')}}" required>
                                @error('dept')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="phone" class="form-label"><b>Phone Number :</b></label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone')}}" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="nik" class="form-label"><b>ID Number :</b></label>
                                <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik')}}" required>
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>






                        {{-- <div class="col-6">



                        {{-- </div>
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
