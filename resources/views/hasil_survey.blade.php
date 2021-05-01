@extends('approval')

@section('judul_halaman', 'Table Approval Survey ')
        {{ csrf_field() }}

@section('konten')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                        <h2 class="card-title"><strong>Data Aproval Permit Survey</strong></h2>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID Permit</th>
                                    <th>Date of Request</th>
                                    <th>Visitor Name</th>
                                    <th>Company</th>
                                    <th>Purpose</th>
                                    <th>Action</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($survey as $p)
                                    <tr>
                                        <td>{{ $p->survey_id }}</td>
                                        <td>{{ $p->created_at }}</td>
                                        <td>{{ $p->visitor_name }}</td>
                                        <td>{{ $p->visitor_company }}</td>
                                        <td>{{ $p->purpose_work }}</td>
                                        @if(Auth::user()->role != 'security')
                                        <td><a href="javascript:void(0)" class="approve" data-survey_id="{{$p->survey_id}}">Approve</a> |
                                            <a href="javascript:void(0)" class="reject" data-survey_id="{{$p->survey_id}}">Reject</a> |
                                            <a href="/detail_survey/{{$p->survey_id}}">History</a></td>
                                        @else<td>
                                            <a href="javascript:void(0)" class="approve" data-survey_id="{{$p->survey_id}}">Approve</a> |
                                            <a href="/detail_survey/{{$p->survey_id}}">History</a></td>
                                        @endif
                                        <td><a href="/survey_pdf/{{$p->survey_id}}" class="btn btn-primary" target="_blank">LIHAT PDF</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
    <!-- jQuery -->
{{-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
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

//   $(function () {
//     $("#example1").DataTable({
//       "responsive": true,
//       "autoWidth": true,
//     });
//     $('#example2').DataTable({
//       "paging": true,
//       "lengthChange": false,
//       "searching": false,
//       "ordering": true,
//       "info": true,
//       "autoWidth": false,
//       "responsive": true,
//     }); --}}


    </body>
    </html>
