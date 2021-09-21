@extends('layouts.logg')

@section('content')
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>ID Permit</th>
                {{-- <th>Name</th> --}}
                <th>Role</th>
                <th>Status</th>
                <th>Date of Updated</th>
                <th>Ket</th>
            </tr>
        </thead>
    </table>

<script>
$('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'https://datatables.yajrabox.com/fluent/basic-data'
    });
</script>
@endsection
