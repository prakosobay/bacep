@extends('layouts.admin')

@section('judul_halaman', 'Tabel User Web Permit')
        {{ csrf_field() }}

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Data User</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="text-center"><strong>Data Users</strong></h5>
            {{-- <a href="{{url('/user.new')}}" type="button" class="btn btn-primary mr-5" >
                <strong>Tambahkan User Baru</strong>
            </a> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID User</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Slug</th>
                            <th>Department</th>
                            <th>No. HP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $c)
                            <tr>
                                <td>{{$c->id}}</td>
                                <td>{{$c->name}}</td>
                                <td>{{$c->email}}</td>
                                <td>{{$c->slug}}</td>
                                <td>{{$c->dept}}</td>
                                <td>{{$c->hp}}</td>
                                <td>
                                    <button type="button" class="btn btn-success mr-5 col-xs-2 margin-bottom" data-toggle="modal" data-target="#edit">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger mr-5" data-toggle="modal" data-target="#delete">
                                        Hapus
                                    </button>

                                    {{-- <div class="btn-toolbar">
                                        <a href="{{url('/edit', $c->id)}}" type="button" class="btn btn-success btn-sm col-xs-2 margin-bottom" id="in">Edit</a>
                                    </div>
                                    <div class="btn-toolbar">
                                        <a href="{{url('/user.delete', $c->id)}}" type="button" class="btn btn-danger btn-sm" id="out">Hapus</a>
                                    </div> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit User -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ url('/user.edit')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
                    </div>
                    <div class="modal-body">
                        <label>Nama :</label>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" value="{{$c->name}}" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete User -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ url('/user.delete')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                    </div>
                    <div class="modal-body">
                        <label>Nama :</label>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" value="{{$c->name}}" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>



@endsection


