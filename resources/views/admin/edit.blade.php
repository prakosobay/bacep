@extends('layouts.admin')

@section('judul_halaman', 'Tabel User Web Permit')
        {{ csrf_field() }}

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Data Users Role</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary mr-5 sm" href="{{url('table_user')}}">
                Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" id="user" class="validate-form" action="{{url('u.edit', $user->id)}}">
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
                        <label for="name"><strong>Nama Lengkap</strong></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" required autocomplete="name" id="name" name="name" value="{{$user->name}}" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        <label for="id"><strong>ID User</strong></label>
                        <input type="number" class="form-control" id="id" name="user_id" value="{{$user->id}}" readonly>

                        <label for="slug"><strong>Slug</strong></label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" required autocomplete="slug" id="slug" name="slug" value="{{$user->slug}}">
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        <label for="dept"><strong>Department</strong></label>
                        <input type="text" id="dept" name="dept" class="form-control @error('dept') is-invalid @enderror" value="{{$user->dept}}" required autocomplete="dept">
                            @error('dept')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        <label for="hp"><strong>Nomer HP</strong></label>
                        <input type="text" class="form-control @error('hp') is-invalid @enderror" id="hp" name="hp" value="{{$user->hp}}" required autocomplete="hp">
                            @error('hp')
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
