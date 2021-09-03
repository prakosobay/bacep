@extends('layouts.admin')

@section('judul_halaman', 'Tabel User Web Permit')
        {{ csrf_field() }}

@section('konten')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID User</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>No. HP</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $p)
                                    <tr>
                                        <td>{{ $p->id }}</td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->email }}</td>
                                        <td>- {{ $p->role1 }}<br>
                                            - {{ $p->role2 }}</td>
                                        <td>No. HP</td>
                                        <td>Department</td>
                                        @if(Auth::user()->role1 == 'admin')
                                        <td>
                                            <a href="javascript:void(0)" id="ok" class="edit" data-id="{{$p->id}}">Edit</a>
                                            <a href="javascript:void(0)" id="not" class="hapus" data-id="{{$p->id}}">Hapus</a>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

            <!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- page script -->

        {{-- <script>
        $(document).on('click', '.approve', function(event){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                }
            });

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!'
            })
            .then((result) => {
                if (result.isConfirmed) {
                        $('#ok').click(function () {
                            return false;
                        });
                    let cleaning_id = $(this).data('cleaning_id');
                    console.log(cleaning_id);
                    $.ajax({
                        type:'POST',
                        url:"{{url('approve_cleaning')}}",
                        data: {cleaning_id},
                        error: function (request, error) {
                            alert(" Can't do because: " + error);
                        },
                        success:function(data){
                            console.log(data);
                            if(data.status == 'SUCCESS'){
                                    Swal.fire(
                                    'Approved!',
                                    'The form has been approved.',
                                    'success'
                                    ).then(function(){
                                        location.reload();
                                    })
                            }else if(data.status == 'FAILED'){
                                Swal.fire({
                                    title: "Failed!",
                                    text: 'Failed to Reject',
                                }).then(function(){
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            });
        });

        $(document).on('click', '.reject', function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                }
            });
            Swal.fire({
                title: 'Are you sure want to reject?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reject it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#not').click(function () {
                            return false;
                        });
                    let cleaning_id = $(this).data('cleaning_id');
                    console.log(cleaning_id);
                    $.ajax({
                        type:'POST',
                        url:"{{url('cleaning_reject')}}",
                        data: {cleaning_id},
                        error: function (request, error) {
                            alert(" Can't do because: " + error);
                        },
                        success:function(data){
                            console.log(data);
                            if(data.status == 'SUCCESS'){
                                    Swal.fire(
                                    'Rejected!',
                                    'The form has been rejected.',
                                    'success'
                                    ).then(function(){
                                        location.reload();
                                    })
                            }else if(data.status == 'FAILED'){
                                Swal.fire({
                                    title: "Failed!",
                                    text: 'Failed to Reject',
                                }).then(function(){
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            });
        });
        </script> --}}

    </section>
    @endsection


