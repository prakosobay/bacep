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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exportModalLabel">Fill Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('employeeStore')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name" class="form-label">Name :</label>
                                <input type="text" id="name" class="form-control" name="name" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="number_card" class="form-label">Card Number :</label>
                                <input type="number" id="number_card" class="form-control" name="number_card" required>
                            </div>
                            <div class="form-group">
                                <label for="dept_card" class="form-label">Department :</label>
                                <input type="text" id="dept_card" class="form-control" name="dept_card" required>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" name="is_intern" type="checkbox" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Magang
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
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
                                <label for="status" class="form-label">Status :</label>
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
                                <label for="deleted" class="form-label">Deleted Card :</label>
                                <input type="date" class="form-control" id="deleted" name="deleted">
                            </div>
                            <div class="form-group">
                                <label for="is_missing" class="form-label">Is Missing :</label>
                                <select name="is_missing" id="is_missing" class="form-control" required>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
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
