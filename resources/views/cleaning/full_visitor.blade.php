@extends('layouts.log-visitor')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-1">
        <div class="card-header py-3">
            <h4 class="judul text-center">Log Form BM</h4>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <a type="button" class="btn btn-sm btn-primary mx-1 my-4" href="{{url('cleaning_form')}}"><b>Create Permit Cleaning</b></a>
                <a type="button" class="btn btn-sm btn-secondary mx-1 my-4" href="#"><b>Create Permit Other</b></a>
                <a type="button" class="btn btn-sm btn-danger mx-1 my-4" href="{{url('cleaning/reject/show')}}"><b>List Permit Reject</b></a>
                <a type="button" class="btn btn-sm btn-info mx-1 my-4" href="{{url('logall')}}"><b>Log Permit BM</b></a>
                <a type="button" class="btn btn-sm btn-success mx-1 my-4" href="{{ url('cleaning/action/export')}}"><b>Export Excel</b></a>
            </div>

            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control" id="start_date" placeholder="Start Date" readonly>
                    <input type="text" class="form-control" id="end_date" placeholder="End Date" readonly>
                    <button id="filter" class="btn btn-outline-info btn-sm">Filter</button>
                    <button id="reset" class="btn btn-outline-warning btn-sm">Reset</button>
                </div>
            </div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="judul-table text-center">
                                <th>No.</th>
                                <th>Date of Visit</th>
                                <th>Purpose of Work</th>
                                <th>Visitor Name</th>
                                {{-- <th>Visitor Company</th> --}}
                                <th>Checkin</th>
                                <th>Checkout</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="isi-table text-center">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>

        $(function() {
            $("#start_date").datepicker({
                "dateFormat": "yy-mm-dd"
            });

            $("#end_date").datepicker({
                "dateFormat": "yy-mm-dd"
            });
        });

        $(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('yajra_full_approve_cleaning_other')}}',
                columns: [
                    { data: 'cleaning_id', name: 'cleaning_id' },
                    { data: 'validity_from', name: 'validity_from' },
                    { data: 'cleaning_work', name: 'cleaning_work' },
                    { data: 'cleaning_name', name: 'cleaning_name' },
                    { data: 'checkin_personil', name: 'checkin_personil' },
                    { data: 'checkout_personil', name: 'checkout_personil' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });


        // Filter
        $(document).on("click", "#filter", function(e) {
            e.preventDefault();
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            if (start_date == "" || end_date == "") {
                alert("Both date required");
            } else {
                $('#records').DataTable().destroy();
                fetch(start_date, end_date);
            }
        });
        // Reset
        $(document).on("click", "#reset", function(e) {
            e.preventDefault();
            $("#start_date").val(''); // empty value
            $("#end_date").val('');
            $('#records').DataTable().destroy();
            fetch();
        });

    </script>
@endpush
@endsection
