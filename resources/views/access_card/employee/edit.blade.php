@extends('layouts.barang')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header">
            <h1 class="h3 mb-2 text-gray-800 text-center">Update Employee</h1>
        </div>

        <div class="card-header py-3">
            <a type="button" class="btn btn-primary" href="{{ route('employeeShow') }}">Back</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success mx-2 my-2">
                <b>{{ session('success') }}</b>
            </div>
        @endif

        @if (session('failed'))
            <div class="alert alert-danger mx-2 my-2">
                <b>{{ session('failed') }}</b>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body">
            <div class="container">
                <form action="{{ url('employee/update', $get->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name" class="form-label">Name : </label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $get->name}}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="number_card" class="form-label">Card Number :</label>
                                <input type="text" class="form-control" id="number_card" name="number_card" value="{{ $get->number_card}}">
                            </div>
                            <div class="form-group">
                                <label for="status" class="form-label">Status Employee :</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="Employee">Employee</option>
                                    <option value="Intern">Intern</option>
                                    <option value="Resign">Resign</option>
                                </select>
                            </div>
                            <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="dept_card" class="form-label">Department :</label>
                                <input type="text" class="form-control" id="dept_card" name="dept_card" value="{{ $get->dept_card }}" required>
                            </div>
                            <div class="form-group">
                                <label for="status_card" class="form-label">Status Card :</label>
                                <select name="status_card" id="status_card" class="form-control" required>
                                    <option value="Deleted">Deleted</option>
                                    <option value="Changed">Changed</option>
                                    <option value="Lost">Lost</option>
                                    <option value="Registered">Registered</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
