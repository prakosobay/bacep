@extends('layouts.barang')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header">
            <h1 class="h3 mb-2 text-gray-800 text-center">Master Employees</h1>
        </div>

        <div class="card-header py-3">
            <button type="button" class="btn mx-1 btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Create New
            </button>

            <button type="button" class="btn mx-1 btn-success" data-bs-toggle="modal" data-bs-target="#import">
                Import Excel
            </button>

            <a href="{{ route('employeeExport') }}" class="btn mx-1 btn-secondary" type="submit">Export Excel</a>
        </div>

        {{-- modal import --}}
        <div class="modal fade" id="import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('employeeImport')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label>Pilih file CSV</label>
                            <div class="form-group">
                                <input type="file" name="file" required="required">
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
                                <input type="text" id="number_card" class="form-control" name="number_card" required>
                            </div>
                            <div class="form-group">
                                <label for="dept_card" class="form-label">Department :</label>
                                <input type="text" id="dept_card" class="form-control" name="dept_card" required>
                            </div>
                            <div class="form-group">
                                <label for="status" class="form-label">Status :</label>
                                <select name="status" class="form-control" id="status" required>
                                    <option value="Employee">Employee</option>
                                    <option value="Intern">Intern</option>
                                    <option value="Resign">Resign</option>
                                </select>
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

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="department" width="100%" cellspacing="0">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>No</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Card Number</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Updated By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="isi-table text-center">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(function() {
        $('#department').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('employee/yajra')}}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'employee_cards.name'},
                {data: 'dept_card', name: 'dept_card'},
                {data: 'number_card', name: 'number_card'},
                {data: 'status_employee', name: 'status_employee'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'updatedby', name: 'users.name'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush
@endsection
