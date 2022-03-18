@extends('approval')
@section('judul_halaman', 'Table Revisi Other')
        {{ csrf_field() }}

@section('konten')

<section class="content">
    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Permit</th>
                                <th>Date of Request</th>
                                <th>Visitor Name</th>
                                <th>Purpose of Work</th>
                                <th>Validity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($revisi as $p)
                                <tr>
                                    <td>{{ $p->other_id }}</td>
                                    <td>{{ Carbon\Carbon::parse($p->created_at)->format('d-m-Y') }}</td>
                                    <td>{{ $p->pic1 }}<br>
                                    <td>{{ $p->other_work }}</td>
                                    <td>{{ $p->val_from }}</td>
                                    <td>
                                        @can('isBm')
                                            <a href="{{url('/rev', $p->other_id)}}" type="button" id="edit" class="edit btn btn-primary mr-2">Edit</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

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
@endsection
