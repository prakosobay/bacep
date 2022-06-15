@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>User Role Manajemen</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="text-center"><strong>Data Users</strong></h5>
            <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#user">
                <strong>Tambahkan User Baru</strong>
            </button>

            {{-- Modal New User --}}
            <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ url('/user.new')}}">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah User Baru</h5>
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
                <table class="table table-striped table-hover" id="user_table" width="100%">
                    <thead>
                        <tr>
                            <th>ID User</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Slug</th>
                            <th>Department</th>
                            <th>Company</th>
                            <th>No. HP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- <script src="{{asset('vendor2/jquery/jquery.min.js')}}"></script> --}}
@push('scripts')
<script>
    $(function() {
        $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('admin/yajra/user/show')}}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'slug', name: 'slug' },
                { data: 'department', name: 'department' },
                { data: 'company', name: 'company' },
                { data: 'phone', name: 'phone' },
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush
@endsection



