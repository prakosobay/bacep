@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Personil Tim Cleaner</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="text-center"><strong>Data Personil</strong></h5>
            <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#user">
                <strong>Tambahkan Personil Baru</strong>
            </button>
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
                                    <input id="slug" type="text" class="form-control" name="slug"  required="required">
                                </div>
                                <label>Dept :</label>
                                <div class="form-group">
                                    <input id="dept" type="text" class="form-control" name="department"  required="required">
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
                <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>Nama Lengkap</th>
                            <th>No. ID</th>
                            <th>No. HP</th>
                            <th>Perusahaan</th>
                            <th>Responsibility</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ob as $c)
                            <tr>
                                <td>{{$c->ob_id}}</td>
                                <td>{{$c->nama}}</td>
                                <td>{{$c->id_number}}</td>
                                <td>{{$c->phone_number}}</td>
                                <td>{{$c->pt}}</td>
                                <td>{{$c->responsible}}</td>
                                <td>{{$c->department}}</td>
                                <td>
                                    <a href="{{url('ob.edit', $c->ob_id)}}" type="button" class="btn btn-success mr-2 col-xs-2 margin-bottom">Edit</a>
                                    <form action="{{ url('ob.destroy',$c->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"class="btn btn-danger mr-2 col-xs-2 margin-bottom hapus">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit User -->
    {{-- <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" id="edit_form" action="{{ url('/user.edit')}}">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="user_id" name="id" value="">
                        <label>Name :</label>
                        <div class="form-group">
                            <input id="edit_name" type="text" name="name" class="form-control">
                        </div>
                        <label>Department "</label>
                        <div class="form-group">
                            <input id="edit_dept" type="text" name="dept" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <a type="submit" class="btn btn-primary edit">Edit</a>
                    </div>
                </div>
            </form>
        </div>
    </div> --}}
<script src="{{asset('vendor2/jquery/jquery.min.js')}}"></script>
@endsection



