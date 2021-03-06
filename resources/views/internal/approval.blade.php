@extends('layouts.approval')

@section('content')
@csrf

<div class="container-fluid">
    {{-- datatable --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800 text-center">Approval Permit Internal</h1>
        </div>
        @if (session('success'))
            <div class="alert alert-success mx-5 my-2">
                <b>{{ session('success') }}</b>
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="approve_internal" width="100%" cellspacing="0">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>ID Permit</th>
                            <th>Requestor Name</th>
                            <th>Requestor Dept</th>
                            <th>Date of Request</th>
                            <th>Date of Visit</th>
                            <th>Date of Leave</th>
                            <th>Purpose</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="isi-table text-center">
                        @foreach($getInternal as $p)
                        <tr>
                            <td>{{ $p->internal_id }}</td>
                            <td>{{ $p->req_name }}</td>
                            <td>{{ $p->req_dept }}</td>
                            <td>{{ Carbon\Carbon::parse($p->created_at)->format('d-m-Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($p->visit)->format('d-m-Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($p->leave)->format('d-m-Y') }}</td>
                            <td>{{ $p->work }}</td>
                            <td>
                                @can('isApproval')
                                <form action="{{ url('internal/approve', $p->internal_id)}}" method="post">
                                    @csrf
                                    <button id="ok" class="btn btn-success btn-sm my-1 mx-1">Approve</button>
                                </form>
                                    <a href="javascript:void(0)" type="button" id="not" class="reject btn btn-danger btn-sm my-1 mx-1" data-id="{{$p->id}}">Reject</a>
                                @elsecan('isHead')
                                <form action="{{ url('internal/approve', $p->internal_id)}}" method="post">
                                    @csrf
                                    <button id="ok" class="btn btn-success btn-sm my-1 mx-1">Approve</button>
                                </form>
                                    <a href="javascript:void(0)" type="button" id="not" class="reject btn btn-danger btn-sm my-1 mx-1" data-id="{{$p->id}}">Reject</a>
                                @elsecan('isSecurity')
                                <form action="{{ url('internal/approve', $p->internal_id)}}" method="post">
                                    @csrf
                                    <button id="ok" class="btn btn-success btn-sm my-1 mx-1">Approve</button>
                                </form>
                                @endcan
                                    <a href="/internal/it/pdf/{{$p->internal_id}}" class="btn btn-primary btn-sm my-1 mx-1" target="_blank">File</a>
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
        $('#approve_internal').DataTable();
    });
</script>
@endpush
@endsection
