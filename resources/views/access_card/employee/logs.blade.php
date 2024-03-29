@extends('layouts.barang')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header">
            <h1 class="h3 mb-2 text-gray-800 text-center">Logs Employees</h1>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="department" width="100%" cellspacing="0">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>No</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Card Number</th>
                            <th>Status Card</th>
                            <th>Updated At</th>
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
            ajax: "{{ url('employee/yajra/logs')}}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'dept_card', name: 'employee_cards.dept_card'},
                {data: 'last_card', name: 'last_card'},
                {data: 'status', name: 'status'},
                {data: 'updated_at', name: 'updated_at'},
            ]
        });
    });
</script>
@endpush
@endsection
