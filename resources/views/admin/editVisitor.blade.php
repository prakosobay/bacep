@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Data Visitor</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary mr-5 sm" href="{{url('revisi/visitor/show')}}">
                Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" id="visitor" class="validate-form" action="{{url('revisi/visitor/edit', $visitor->id)}}">
                    @csrf
                    @method('PUT')

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
                        <label for="nama"><strong>Nama Lengkap :</strong></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" required id="nama" name="nama" value="{{$visitor->visit_nama}}" autofocus>
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="company"><strong>Perusahaan :</strong></label>
                        <input type="text" class="form-control @error('pt') is-invalid @enderror" id="company" name="company" value="{{$visitor->visit_company}}" required>
                        @error('company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="department"><strong>Department :</strong></label>
                        <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{$visitor->visit_department}}" required>
                        @error('department')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="respon"><strong>Responsibility :</strong></label>
                        <input type="text" class="form-control @error('Role') is-invalid @enderror" id="respon" name="respon" value="{{$visitor->visit_respon}}" required>
                        @error('respon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone"><strong>No. HP :</strong></label>
                        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$visitor->visit_phone}}" required>
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nik"><strong>No ID Karyawan :</strong></label>
                        <input type="text" class="form-control @error('NIK') is-invalid @enderror" id="nik" name="nik" value="{{$visitor->visit_nik}}" readonly>
                        @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
