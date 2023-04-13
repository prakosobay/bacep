@extends('layouts.approval')

@section('content')
@csrf

<div class="container-fluid">
    {{-- datatable --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800 text-center">Approval Permit Colocation</h1>
        </div>
        @if (session('success'))
            <div class="alert alert-success mx-2 my-1">
                <b>{{ session('success') }}</b>
            </div>
        @endif
        @if (session('failed'))
            <div class="alert alert-danger mx-2 my-1">
                <b>{{ session('failed') }}</b>
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="approve_internal" width="100%" cellspacing="0">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>ID</th>
                            <th>Requestor</th>
                            <th>Date of Request</th>
                            <th>Date of Visit</th>
                            <th>Date of Leave</th>
                            <th>Purpose</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="isi-table text-center">
                        @foreach($getInternal as $p)
                        {{-- modal --}}
                        <div class="modal fade" id="reject{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $p->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Alasan di Reject</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('internal/reject', $p->id )}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="no" class="form-label">No ID :</label>
                                                <input type="text" class="form-control" id="no" value="{{$p->id}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="note" class="form-label">Note :</label>
                                                <input type="text" class="form-control" name="note" id="note" value="" placeholder="Alasan di reject" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->requestorId->name }}</td>
                            <td>{{ Carbon\Carbon::parse($p->created_at)->format('d-m-Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($p->visit)->format('d-m-Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($p->leave)->format('d-m-Y') }}</td>
                            <td>{{ $p->work }}</td>
                            <td>
                                @foreach ( $p->coloEntries as $q )
                                    - Rack {{ $q->mRackId->number . '/' . $q->mRackId->mRoomId->name }}</br>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('internal.review', $p->id)}}" class="btn-primary btn btn-sm my-1 mx-1">Review</a>
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
