@extends('layouts.admin')

@section('judul_halaman', 'Tabel Relasi User Role')
        @csrf

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Data Relasi User Role</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="text-center"><strong>Data Relasi</strong></h5>
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
            <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#relasi">
                Tambah Relasi Baru
            </button>

            {{-- modal relasi --}}
            <div class="modal fade" id="relasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ url('/relasi.new')}}">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Relasi Baru</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="user" class="form-label">User :</label>
                                    <select name="user_id" id="user" class="form-control">
                                        <option value=""></option>
                                        @foreach ( $users as $user )
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="role" class="form-label">Role :</label>
                                    <select name="role_id" id="role" class="form-control">
                                        <option value=""></option>
                                        @foreach ( $roles as $role )
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
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
                <table class="table table-striped table-hover" id="relasi_table" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID User</th>
                            <th>ID Role</th>
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
        $('#relasi_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('admin/yajra/relasi/show')}}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'user_name', name: 'users.name' },
                { data: 'role_name', name: 'roles.name' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush
@endsection


