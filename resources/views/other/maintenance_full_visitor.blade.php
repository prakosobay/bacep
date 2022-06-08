@extends('layouts.log-visitor')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-1">
        <div class="card-header py-3">
            <h4 class="judul text-center">Log Form BM</h4>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="Lcleaning-tab" data-bs-toggle="tab" data-bs-target="#Lcleaning" type="button" role="tab" aria-controls="Lcleaning" aria-selected="false">Cleaning</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="Lmaintenance-tab" data-bs-toggle="tab" data-bs-target="#Lmaintenance" type="button" role="tab" aria-controls="Lmaintenance" aria-selected="true">Maintenance</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="Ltroubleshoot-tab" data-bs-toggle="tab" data-bs-target="#Ltroubleshoot" type="button" role="tab" aria-controls="Ltroubleshoot" aria-selected="false">Troubleshoot</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">

                {{-- Cleaning --}}
                <div class="tab-pane fade show active" id="Lcleaning" role="tabpanel" aria-labelledby="Lcleaning-tab">
                    <div class="container-fluid">
                        <div class="card-body">
                            <a type="button" class="btn btn-sm btn-primary mx-1 my-2" href="{{url('cleaning_form')}}">Create Permit Cleaning</a>
                            <a type="button" class="btn btn-sm btn-info mx-1 my-2" href="{{url('logall')}}">Log Permit Cleaning</a>
                            <a type="button" class="btn btn-sm btn-danger mx-1 my-2" href="{{ url('/cleaning/reject/show')}}">Permit Reject</a>
                            {{-- <a type="button" class="btn btn-sm btn-success mx-1 my-2" href="{{ url('cleaning/action/export')}}">Export PDF</a>
                            <a type="button" class="btn btn-sm btn-success mx-1 my-2" href="#">Export Excel</a> --}}
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Tabel Cleaning --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="cleaning" width="100%" cellspacing="0">
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

                {{-- Maintenance --}}
                <div class="tab-panel fade" id="Lmaintenance" role="tabpanel" aria-labelledby="Lmaintenance-tab">
                    <div class="container-fluid">
                        <div class="card-body">
                            <button class="btn btn-sm btn-dark mx-1 my-2" data-bs-toggle="modal" data-bs-target="#maintenance">Create Permit Maintenance</button>
                            <a type="button" class="btn btn-sm btn-info mx-1 my-2" href="{{url('other/maintenance/full')}}">Log Permit Maintenance</a>
                            <a type="button" class="btn btn-sm btn-danger mx-1 my-2" href="{{ url('other/maintenance/full/reject')}}">Permit Reject</a>
                            {{-- <a type="button" class="btn btn-sm btn-success mx-1 my-2" href="{{ url('cleaning/action/export')}}">Export PDF</a>
                            <a type="button" class="btn btn-sm btn-success mx-1 my-2" href="#">Export Excel</a> --}}
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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

                    {{-- Table Maintenance --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="maintenance_table" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="judul-table text-center">
                                        <th>No.</th>
                                        <th>Purpose of Work</th>
                                        <th>Date of Visit</th>
                                        <th>Date of Leave</th>
                                        {{-- <th>Visitor Company</th> --}}
                                        {{-- <th>Checkin</th> --}}
                                        {{-- <th>Checkout</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="isi-table text-center">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Troubleshoot --}}
                <div class="tab-pane fade" id="Ltroubleshoot" role="tabpanel" aria-labelledby="Ltroubleshoot-tab">
                    <div class="container-fluid">
                        <div class="card-body">
                            <button class="btn btn-sm btn-dark mx-1 my-2" data-bs-toggle="modal" data-bs-target="#maintenance">Create Permit Troubleshoot</button>
                            <a type="button" class="btn btn-sm btn-info mx-1 my-2" href="{{url('other/maintenance/full')}}">Log Permit Troubleshoot</a>
                            <a type="button" class="btn btn-sm btn-danger mx-1 my-2" href="#">Permit Reject</a>
                            {{-- <a type="button" class="btn btn-sm btn-success mx-1 my-2" href="{{ url('cleaning/action/export')}}">Export PDF</a>
                            <a type="button" class="btn btn-sm btn-success mx-1 my-2" href="#">Export Excel</a> --}}
                        </div>
                    </div>

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

                    {{-- Table Troubleshoot --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="troubleshoot_table" width="100%" cellspacing="0">
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
    </div>
</div>

@push('scripts')
    <script>
        $(function() {
            $('#maintenance_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('other/maintenance/yajra/full/visitor')}}',
                columns: [
                    { data: 'other_id', name: 'other_id' },
                    { data: 'work', name: 'work' },
                    { data: 'visit', name: 'visit' },
                    { data: 'leave', name: 'leave' },
                    // { data: 'checkin_personil', name: 'checkin_personil' },
                    // { data: 'checkout_personil', name: 'checkout_personil' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush
@endsection
