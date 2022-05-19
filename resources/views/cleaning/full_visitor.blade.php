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
                <a type="button" class="btn btn-sm btn-primary mx-1 my-4" href="{{url('cleaning_form')}}">Permit Cleaning</a>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#troubleshoot">
                    Permit Troubleshoot
                  </button>
                <a type="button" class="btn btn-sm btn-dark mx-1 my-4" href="#">Permit Maintenance</a>
                <a type="button" class="btn btn-sm btn-danger mx-1 my-4" href="{{url('cleaning/reject/show')}}">List Permit Reject</a>
                <a type="button" class="btn btn-sm btn-info mx-1 my-4" href="{{url('logall')}}">Log Permit BM</a>
                <a type="button" class="btn btn-sm btn-success mx-1 my-4" href="{{ url('cleaning/action/export')}}">Export PDF</a>
            </div>

            {{-- Modal Troubleshoot --}}
            <div class="modal fade" id="troubleshoot" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pilih Permit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row align-item-center">
                                <div class="col align-self-center">
                                    <a type="button" href="{{ url('bm/troubleshoot/show')}}" class="btn btn-primary">New Permit</a>
                                    <a type="button" href="{{ url('bm/troubleshoot/full/visitor')}}" class="btn btn-primary">Select Last Permit</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control" id="start_date" placeholder="Start Date" readonly>
                    <input type="text" class="form-control" id="end_date" placeholder="End Date" readonly>
                    <button id="filter" class="btn btn-outline-info btn-sm">Filter</button>
                    <button id="reset" class="btn btn-outline-warning btn-sm">Reset</button>
                </div>
            </div> --}}

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
        // $(document).on("click", "#filter", function(e) {
        //     e.preventDefault();
        //     var start_date = $("#start_date").val();
        //     var end_date = $("#end_date").val();
        //     if (start_date == "" || end_date == "") {
        //         alert("Both date required");
        //     } else {
        //         $('#records').DataTable().destroy();
        //         fetch(start_date, end_date);
        //     }
        // });
        // // Reset
        // $(document).on("click", "#reset", function(e) {
        //     e.preventDefault();
        //     $("#start_date").val(''); // empty value
        //     $("#end_date").val('');
        //     $('#records').DataTable().destroy();
        //     fetch();
        // });

    </script>
@endpush
@endsection
