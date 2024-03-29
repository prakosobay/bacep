@extends('layouts.approval')

@section('content')
@csrf

<div class="container-fluid">
    {{-- datatable --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800 text-center">Approval Form Consumable</h1>
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
                            <th>ID</th>
                            <th>Date of Request</th>
                            <th>Requestor Dept</th>
                            <th>Requestor Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="isi-table text-center">
                        @foreach($getOrder as $p)
                        <tr>
                            <td>{{ $p->order->id }}</td>
                            <td>{{ Carbon\Carbon::parse($p->order->created_at)->format('d-m-Y') }}</td>
                            <td>{{ $p->order->req_dept }}</td>
                            <td>{{ $p->order->req_name }}</td>
                            <td>
                                @can('isApproval')
                                    <form action="{{ url('order/approve', $p->order->id)}}" method="post">
                                        @csrf
                                        <button id="ok" class="btn btn-success btn-sm my-1 mx-1">Approve</button>
                                    </form>

                                    <button id="not" class="btn btn-danger btn-sm my-1 mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Reject</button>

                                @elsecan('isHead')
                                    <form action="{{ url('order/approve', $p->order->id)}}" method="post">
                                        @csrf
                                        <button id="ok" class="btn btn-success btn-sm my-1 mx-1">Approve</button>
                                    </form>

                                    <button id="not" class="btn btn-danger btn-sm my-1 mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Reject</button>

                                @endcan
                                    <a href="/order/pdf/{{$p->order->id}}" class="btn btn-primary btn-sm my-1 mx-1" target="_blank">File</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alasan di Reject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('order/reject', $p->order->id )}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="note" class="form-label">Note :</label>
                        <input type="text" class="form-control" name="note" id="note" value="" placeholder="Alasan di reject" required autofocus>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready( function () {
        $('#approve_order').DataTable();
    });
</script>
@endpush
@endsection
