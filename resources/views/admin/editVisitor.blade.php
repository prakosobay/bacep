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
                        <label for="visit_nama"><strong>Nama Lengkap</strong></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" required autocomplete="visit_nama" id="visit_nama" name="visit_nama" value="{{$visitor->visit_nama}}" autofocus><br>
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        <label for="visit_company"><strong>Perusahaan</strong></label>
                        <input type="text" class="form-control @error('pt') is-invalid @enderror" id="visit_company" name="visit_company" value="{{$visitor->visit_company}}" required autocomplete="visit_company"><br>
                            @error('pt')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        <label for="visit_department"><strong>Department</strong></label>
                        <input type="text" class="form-control @error('department') is-invalid @enderror" id="visit_department" name="visit_department" value="{{$visitor->visit_department}}" required autocomplete="visit_department"><br>
                            @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        
                        <label for="visit_respon"><strong>Role</strong></label>
                        <input type="text" class="form-control @error('Role') is-invalid @enderror" id="visit_respon" name="visit_respon" value="{{$visitor->visit_respon}}" required autocomplete="visit_respon"><br>
                            @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        
                        <label for="visit_phone"><strong>No. HP</strong></label>
                        <input type="text" id="visit_phone" name="visit_phone" class="form-control @error('phone') is-invalid @enderror" value="{{$visitor->visit_phone}}" required autocomplete="visit_phone"><br>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        <label for="visit_nik"><strong>No ID Karyawan</strong></label>
                        <input type="text" class="form-control @error('NIK') is-invalid @enderror" id="visit_nik" name="visit_nik" value="{{$visitor->visit_nik}}" required autocomplete="visit_nik" readonly><br>
                            @error('department')
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
