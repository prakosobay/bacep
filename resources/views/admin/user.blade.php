@extends('layouts.admin')

{{-- @section('judul_halaman', 'Tabel User Web Permit') --}}
        {{-- {{ csrf_field() }} --}}

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Data User</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="text-center"><strong>Data Users</strong></h5>
            {{-- <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#user">
                <strong>Tambahkan User Baru</strong>
            </button> --}}
            <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ url('/user.new')}}">
                        {{ csrf_field() }}
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
                                    <input id="dept" type="text" class="form-control" name="dept"  required="required">
                                </div>
                                <label>No. HP :</label>
                                <div class="form-group">
                                    <input id="hp" type="number" class="form-control" name="hp"  required="required">
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
                                    <button href="" type="button" id="edit" class="btn btn-success mr-2 col-xs-2 margin-bottom" data-toggle="modal" data-id={{ $c->id }} data-target="#edit">
                                        Edit
                                    </button>
                                    <button type="button" class="hapus btn btn-danger mr-2 col-xs-2 margin-bottom" data-toggle="modal" data-target="#delete">
                                        Hapus
                                    </button>
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
    </div>

<script src="{{asset('vendor2/jquery/jquery.min.js')}}"></script>
<script>
    $(document).ready(function(){

        $('body').on('click', '#edit', function (event) {



        // event.preventDefault();
        // var id = $(this).data('id');

        // console.log(id)
        // $.get('u.edit/' + id , function (data) {
        //     // $('#userCrudModal').html("Edit category");
        //     // $('#submit').val("Edit category");
        //     // $('#edit').modal('show');
        //     $('#user_id').val(data.id);
        //     $('#edit_name').val(data.name);
        // })
        // });

        // event.preventDefault();
        // let id = $(this).val();
        //     $.ajax({
        //         url: "{{url("/u.edit")}}"+'/'+id,
        //         dataType:"json",
        //         type: "get",
        //         success: function(response){
        //             const {user} = response;
        //             console.log(user)
        //                 $('#user_id').val(user.id);
        //                 $('#edit_name').val(user.name);
        //         }
        //     })
        // })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });
        // var table = $('#dataTable').DataTable();

        // table.on('click', '.edit', function(){
        //     $tr = $(this).closest('tr');
        //     if($($tr).hasClass('child')){
        //         $tr = $tr.prev('.parent');
        //     }

        //     var data = table.row($tr).data();
        //     console.log(data);

        //     $('#edit_name').val(data[1]);
        // })
        // })


    });

</script>
@endsection



