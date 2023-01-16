@extends('layouts.approval')

@section('content')
@csrf

<div class="container-fluid">
    {{-- datatable --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800 text-center">Approval Permit Maintenance</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="approve_maintenance" width="100%" cellspacing="0">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>ID Permit</th>
                            <th>Requestor</th>
                            <th>Date of Request</th>
                            <th>Date of Visit</th>
                            <th>Purpose</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="isi-table text-center">
                        @foreach($getMaintenance as $p)
                        <tr>
                            <td>{{ $p->other_id }}</td>
                            <td>{{ $p->created_by }}</td>
                            <td>{{ Carbon\Carbon::parse($p->created_at)->format('d-m-Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($p->visit)->format('d-m-Y') }}</td>
                            <td>{{ $p->work }}</td>
                            <td>
                                {{-- @can('isApproval')
                                    <a href="javascript:void(0)" type="button" id="ok" class="approve btn btn-success btn-sm my-1 mx-1" data-other_id="{{$p->other_id}}">Approve</a>
                                    <a href="javascript:void(0)" type="button" id="not" class="reject btn btn-danger btn-sm my-1 mx-1" data-other_id="{{$p->other_id}}">Reject</a>
                                @elsecan('isHead')
                                    <a href="javascript:void(0)" type="button" id="ok" class="approve btn btn-success btn-sm my-1 mx-1" data-other_id="{{$p->other_id}}">Approve</a>
                                    <a href="javascript:void(0)" type="button" id="not" class="reject btn btn-danger btn-sm my-1 mx-1" data-other_id="{{$p->other_id}}">Reject</a>
                                @elsecan('isSecurity')
                                    <a href="javascript:void(0)" type="button" id="ok" class="approve btn btn-success btn-sm my-1 mx-1" data-other_id="{{$p->other_id}}">Approve</a>
                                @endcan --}}
                                    {{-- <a href="{{ route('maintenancePDF', $p->other_id) }}" class="btn btn-primary btn-sm my-1 mx-1" target="_blank">File</a> --}}
                                    <a href="{{ route('maintenanceReviewARCR', $p->other_id )}}" class="btn btn-primary btn-sm my-1 mx-1">Review</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')

    <script>
        $(document).ready( function () {
            $('#approve_maintenance').DataTable();
        });
    </script>
@endpush
@endsection
