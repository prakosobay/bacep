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
                                <label>Nama Lengkap :</label>
                                <div class="form-group">
                                    <input id="nama" type="text" class="form-control" name="visit_nama" required="required"  autofocus>
                                </div>
                                <label>Perusahaan :</label>
                                <div class="form-group">
                                    <input id="perusahaan" type="text" class="form-control" name="visit_company" required="required"  autofocus>
                                </div>
                                <label>Department :</label>
                                <div class="form-group">
                                    <input id="department" type="text" class="form-control" name="visit_department" required="required"  autofocus>
                                </div>
                                <label>Responsibilty :</label>
                                <div class="form-group">
                                    <input id="responsibilty" type="text" class="form-control" name="visit_respon" required="required"  autofocus>
                                </div>
                                <label>No HP :</label>
                                <div class="form-group">
                                    <input id="hp" type="number" class="form-control" name="visit_phone" required="required"  autofocus>
                                </div>
                                <label>No ID :</label>
                                <div class="form-group">
                                    <input id="no_id" type="text" class="form-control" name="visit_nik " required="required"  autofocus>
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
