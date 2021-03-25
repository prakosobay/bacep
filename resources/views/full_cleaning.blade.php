@extends('full_approval')

@section('judul_halaman', 'Table Cleaning Full Approval')


@section('konten')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h2 class="card-title">Table Full Approval Cleaning</h2>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Permit</th>
                                <th>Visitor Name</th>
                                <th>Visitor Name</th>
                                <th>Purpose Work</th>
                                <th>Status</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{$num = 1}}
                            @foreach($cleaningFull as $p)
                                <tr>
                                    <td>{{ $num++ }}</td>
                                    <td>{{ $p->cleaning_id }}</td>
                                    <td>{{ $p->cleaning_name_1 }}</td>
                                    <td>{{ $p->cleaning_name_2 }}</td>
                                    <td>{{ $p->cleaning_work }}</td>
                                    <td>{{ $p->status }}</td>
                                    <td><a href="{{ $p->link }}">PDF</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
{{--
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
<script>
$(function () {
$("#example1").DataTable({
  "responsive": true,
  "autoWidth": true,
});
$('#example2').DataTable({
  "paging": true,
  "lengthChange": false,
  "searching": false,
  "ordering": true,
  "info": true,
  "autoWidth": false,
  "responsive": true,
});
});
</script> --}}

@endsection
