@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Data Personil</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary mr-5 sm" href="{{url('ob')}}">
                Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" id="ob" class="validate-form" action="{{url('ob.edit', $ob->ob_id)}}">
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
                        <label for="nama"><strong>Nama Lengkap</strong></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" required id="nama" name="nama" value="{{$ob->nama}}" autofocus>
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="id_number"><strong>No. ID</strong></label>
                        <input type="number" class="form-control @error('id_number') is-invalid @enderror" required id="id_number" name="id_number" value="{{$ob->id_number}}" readonly>
                        @error('id_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone_number"><strong>No. HP</strong></label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{$ob->phone_number}}" required>
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pt"><strong>Perusahaan</strong></label>
                        <input type="text" class="form-control @error('pt') is-invalid @enderror" id="pt" name="pt" value="{{$ob->pt}}" required>
                        @error('pt')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="responsible"><strong>Responsible</strong></label>
                        <input type="text" class="form-control @error('responsible') is-invalid @enderror" id="responsible" name="responsible" value="{{$ob->responsible}}" required>
                        @error('responsible')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="department"><strong>Department</strong></label>
                        <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{$ob->department}}" required>
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
