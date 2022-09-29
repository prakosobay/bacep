@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Manajemen Visitor</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="text-center"><strong>Data Visitor</strong></h5>
            <a type="button" class="btn btn-primary mr-5" href="{{ url('revisi/visitor/create')}}">
                <strong>Tambahkan Visitor Baru</strong>
            </a>

            @if (session('success'))
                <div class="alert alert-success mt-1">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('gagal'))
                <div class="alert alert-warning mt-1">
                    {{ session('gagal') }}
                </div>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="visitorTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Lengkap</th>
                            <th>Perusahaan</th>
                            <th>Department</th>
                            <th>Responsibility</th>
                            <th>No. HP</th>
                            <th>No. ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(function() {
        $('#visitorTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('revisi/visitor/yajra')}}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'visit_nama', name: 'visit_nama' },
                { data: 'visit_company', name: 'visit_company' },
                { data: 'visit_department', name: 'visit_department' },
                { data: 'visit_respon', name: 'visit_respon' },
                { data: 'visit_phone', name: 'visit_phone' },
                { data: 'visit_nik', name: 'visit_nik' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush
@endsection
