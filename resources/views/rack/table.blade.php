@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Racks</strong></h1>

    <div class="container mx-3 my-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary mr-5" href="{{ url('rack/create')}}">
                <strong>Create New Rack</strong>
            </a>

            {{-- Modal New User --}}
            <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ url('rack/store')}}">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Create New Rack</b></h5>
                            </div>
                            <div class="modal-body">
                                <label><b>Name :</b></label>
                                <div class="form-group">
                                    <input id="new" type="text" class="form-control" name="name" required>
                                </div>
                                <label><b>Address :</b></label>
                                <div class="form-group">
                                    <input id="address" type="text" class="form-control" name="address" required>
                                </div>
                                <label><b>Phone :</b></label>
                                <div class="form-group">
                                    <input id="phone" type="text" class="form-control" name="phone" required>
                                </div>
                                <label><b>Website :</b></label>
                                <div class="form-group">
                                    <input id="web" type="text" class="form-control" name="website" required>
                                </div>
                                <label><b>Created By :</b></label>
                                <div class="form-group">
                                    <input id="created" type="text" class="form-control" name="created_by" value="{{auth()->user()->name}}" required readonly>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getRacks as $rack)
                            <tr>
                                <td>{{$rack->number}}</td>
                                <td>{{ $rack->m_room_id }}</td>
                                <td>{{ $rack->m_company_id}}</td>
                                <td>
                                    update, delete
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
{{-- <script>
    $(function() {
        $('#rackTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('rack/yajra')}}',
            columns: [
                { data: 'number', name: 'number' },
                { data: 'm_company_id', name: 'm_company_id' },
                { data: 'm_room_id', name: 'm_room_id' },
                // {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script> --}}
@endpush
@endsection



