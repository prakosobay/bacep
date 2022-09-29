@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Data Users Role</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary mr-5 sm" href="{{ url('table_user') }}">
                Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" id="user" class="validate-form" action="{{ route('userUpdate', $user->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="container mx-3 my-3">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>

                    <div class="container mx-3 my-3">
                        @if (session('failed'))
                            <div class="alert alert-danger">
                                {{ session('failed') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="name" class="form-label"><strong>Nama Lengkap</strong></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" required id="name" name="name" value="{{$user->name}}" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="user_id"><strong>ID User</strong></label>
                        <input type="number" class="form-control" id="user_id" name="user_id" value="{{$user->id}}" readonly>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="slug"><strong>Slug</strong></label>
                        <select class="form-control" id="slug" name="slug" required>
                            <option value="{{ $user->slug }}" selected>{{ $user->slug }}</option>
                            @foreach ($slugs as $slug)
                                <option value="{{ $slug->id }}">{{ $slug->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="department"><strong>Department</strong></label>
                        <input type="text" id="department" name="department" class="form-control @error('department') is-invalid @enderror" value="{{$user->department}}" required>
                        @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="company"><strong>Company</strong></label>
                        <select name="company" id="company" class="form-control" required>
                            <option value="{{ $user->company }}">{{ $user->company }}</option>
                            @foreach ( $companies as $company )
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="phone"><strong>Nomer HP</strong></label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{$user->phone}}" required>
                        @error('phone')
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
