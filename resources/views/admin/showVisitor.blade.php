@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Manajemen Visitor</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="text-center"><strong>Data Visitor</strong></h5>
            <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#user">
                <strong>Tambahkan Visitor Baru</strong>
            </button>
            <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ url('revisi/visitor/new')}}">
                        @csrf

                        {{-- Modal --}}
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Visitor Baru</h5>
                            </div>
                            <div class="modal-body">
                                <label>Nama Lengkap:</label>
                                <div class="form-group">
                                    <input id="new" type="text" class="form-control" name="name" required="required"  autofocus>
                                </div>
                                <label>Email :</label>
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control" name="email" required="required">
                                </div>
                                <label>Password :</label>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" required="required">
                                </div>
                                <label>Slug :</label>
                                <div class="form-group">
                                    {{-- <input id="slug" type="text" class="form-control" name="slug"  required="required"> --}}
                                    <select class="form-control" name="slug">
                                        <option selected>Pilih 1 Slug</option>
                                        <option value="approval">Approval</option>
                                        <option value="bm">BM</option>
                                        <option value="head">Head</option>
                                        <option value="security">Security</option>
                                        <option value="visitor">Visitor</option>
                                    </select>
                                </div>
                                <label>Dept :</label>
                                <div class="form-group">
                                    <input id="dept" type="text" class="form-control" name="department"  required="required">
                                </div>
                                <label>Company :</label>
                                <div class="form-group">
                                    <input id="company" type="text" class="form-control" name="company"  required="required">
                                </div>
                                <label>No. HP :</label>
                                <div class="form-group">
                                    <input id="hp" type="number" class="form-control" name="phone"  required="required">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush
@endsection
