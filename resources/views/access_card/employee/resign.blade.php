@extends('layouts.barang')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header">
            <h1 class="h3 mb-2 text-gray-800 text-center">Resign</h1>
        </div>
        {{-- <div class="card-header py-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Create New
            </button>

            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#import">
                Import Excel
            </button>
        </div> --}}

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
                            <th>Updated At</th>
                            <th>Deleted At</th>
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
            ajax: "{{ url('employee/resign/yajra')}}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'employee_cards.name'},
                {data: 'dept_card', name: 'dept_card'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'deleted_card', name: 'deleted_card'},
                {data: 'updatedby', name: 'users.name'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush
@endsection
