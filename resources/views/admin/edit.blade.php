@extends('layouts.dashboard')

@section('judul_halaman', 'Tabel User Web Permit')
        {{ csrf_field() }}

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Data Users</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary mr-5 sm" href="{{url('a.user')}}">
                Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" id="user" class="validate-form" action="{{url('user_edit', $user->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name"><strong>Nama Lengkap</strong></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" required autocomplete="name" id="name" name="name" value="{{$user->name}}"><br>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        <label for="id"><strong>ID User</strong></label>
                        <input type="number" class="form-control" id="id" name="user_id" value="{{$user->id}}" readonly><br>

                        <label for="role"><strong>Role1</strong></label>
                        <input type="number" class="form-control @error('role') is-invalid @enderror" id="role" name="role1"><br>
                            @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        <label for="role2"><strong>Role2</strong></label>
                        <input type="number" class="form-control @error('role2') is-invalid @enderror" id="role2" name="role2"><br>
                            @error('role2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        <label for="slug"><strong>Slug</strong></label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" required autocomplete="slug" id="slug" name="slug" value="{{$user->slug}}"><br>
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        <label for="dept"><strong>Department</strong></label>
                        <input type="text" id="dept" name="dept" class="form-control @error('dept') is-invalid @enderror" required autocomplete="dept" >
                            @error('dept')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        <label for="hp"><strong>Nomer HP</strong></label>
                        <input type="number" class="form-control @error('dept') is-invalid @enderror" id="hp" name="hp">
                            @error('dept')
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
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
@endsection
