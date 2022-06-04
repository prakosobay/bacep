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
                <a type="button" class="btn btn-sm btn-primary mx-1 my-2" href="{{url('cleaning_form')}}">Create Permit Cleaning</a>
                <a type="button" class="btn btn-sm btn-info mx-1 my-2" href="{{url('logall')}}">Log Permit Cleaning</a>
                <a type="button" class="btn btn-sm btn-success mx-1 my-2" href="{{ url('cleaning/action/export')}}">Export PDF</a>
                <a type="button" class="btn btn-sm btn-success mx-1 my-2" href="#">Export Excel</a>
            </div>
            <div class="card-body">
                <button class="btn btn-sm btn-dark mx-1 my-2" data-bs-toggle="modal" data-bs-target="#maintenance">Create Permit Maintenance</button>
                <a type="button" class="btn btn-sm btn-info mx-1 my-2" href="{{url('other/maintenance/full')}}">Log Permit Maintenance</a>
            </div>
            <div>
            <card-body>
                <button class="btn btn-secondary btn-sm mx-1 my-2" data-bs-toggle="modal" data-bs-target="#troubleshoot"> Create Permit Troubleshoot</button>
                <a type="button" class="btn btn-sm btn-info mx-1 my-2" href="{{url('logall')}}">Log Permit Troubleshoot</a>
            </card-body>

            {{-- Modal Troubleshoot --}}
            <div class="modal fade" id="troubleshoot" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pilih Permit Troubleshoot</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row align-item-center">
                                <div class="col align-self-center">
                                    <a type="button" href="{{ url('other/troubleshoot/show')}}" class="btn btn-secondary">New Permit</a>
                                    <a type="button" href="#" class="btn btn-secondary">Select Last Permit</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Maintenance --}}
            <div class="modal fade" id="maintenance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pilih Permit Maintenance</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row align-item-center">
                                <div class="col align-self-center">
                                    <a type="button" href="{{ url('other/maintenance/show')}}" class="btn btn-dark">New Permit</a>
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
                                <th>Date of Leave</th>
                                <th>Purpose of Work</th>
                                {{-- <th>Visitor Name</th>
                                <th>Checkin</th>
                                <th>Checkout</th> --}}
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
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('/other/maintenance/yajra/full/visitor')}}',
                columns: [
                    { data: 'other_id', name: 'other_id' },
                    { data: 'visit', name: 'visit' },
                    { data: 'leave', name: 'leave' },
                    { data: 'work', name: 'work' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush
@endsection
