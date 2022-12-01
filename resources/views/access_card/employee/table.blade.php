@extends('layouts.barang')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header">
            <h1 class="h3 mb-2 text-gray-800 text-center">New Employee</h1>
        </div>
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Create New
            </button>
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
                                <label for="dept" class="form-label">Department :</label>
                                <select name="dept" id="dept" class="form-control">
                                    @foreach ( $getDepts as $dept)
                                        <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                    @endforeach
                                </select>
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

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="department" width="100%" cellspacing="0">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Card Number</th>
                            <th>Created At</th>
                            <th>Created By</th>
                            {{-- <th>Action</th> --}}
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
                {data: 'id', name: 'employee_cards.id'},
                {data: 'name', name: 'employee_cards.name'},
                {data: 'departmentcardid.name', name: 'departmentcardid.name'},
                {data: 'number_card', name: 'employee_cards.number_card'},
                {data: 'updated_at', name: 'employee_cards.updated_at'},
                {data: 'updatedby.name', name: 'updatedby.name'},
                // { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush
@endsection
