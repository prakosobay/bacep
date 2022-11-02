@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Master Data Rack</strong></h1>

    <div class="container mx-3 my-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="container mx-3 my-3">
        @if (session('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
            </div>
        @endif
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary mr-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <strong>Create New Rack</strong>
            </button>

            {{-- Modal New User --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ route('rackStore')}}">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Create New Rack</b></h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="new" class="form-label"><b>No Rack :</b></label>
                                    <input id="new" type="text" class="form-control" name="number" required>
                                </div>
                                <div class="form-group">
                                    <label for="room_id" class="form-label"><b>Ruangan :</b></label>
                                    <select name="room_id" class="form-control" id="room_id">
                                        <option selected>Pilih 1</option>
                                        @foreach ( $getRooms as $room )
                                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="company_id" class="form-label"><b>Company :</b></label>
                                    <select name="company_id" class="form-control" id="company_id">
                                        <option selected>Pilih 1</option>
                                        @foreach ( $getCompanies as $company )
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="rackTable" width="100%">
                    <thead>
                        <tr>
                            <th>No. Rack</th>
                            <th>Room</th>
                            <th>Company</th>
                            <th>Updated By</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(function() {
        $('#rackTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('rackYajra')}}',
            columns: [
                { data: 'number', name: 'number' },
                { data: 'room', name: 'm_rooms.name' },
                { data: 'company', name: 'm_companies.name' },
                { data: 'updatedBy', name: 'users.name' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush
@endsection



