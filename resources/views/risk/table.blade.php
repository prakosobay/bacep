@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Master Data Risk</strong></h1>

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
                <strong>Create New Data</strong>
            </button>

            {{-- Modal New User --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ route('riskStore')}}">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Create New Rack</b></h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="risk" class="form-label"><b>Risk :</b></label>
                                    <input id="risk" type="text" class="form-control" name="risk" value="{{ old('risk')}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="poss" class="form-label"><b>Possibility :</b></label>
                                    <input id="poss" type="text" class="form-control" name="poss" value="{{ old('poss')}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="impact" class="form-label"><b>Impact :</b></label>
                                    <select name="impact" id="impact" class="form-control">
                                        <option selected>Pilih 1</option>
                                        <option value="Low">Low</option>
                                        <option value="Medium">Medium</option>
                                        <option value="High">High</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="mitigation" class="form-label"><b>Mitigation Plan :</b></label>
                                    <input id="mitigation" type="text" class="form-control" name="mitigation" value="{{ old('mitigation')}}" required>
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
                            <th>No.</th>
                            <th>Risk</th>
                            <th>Possibility</th>
                            <th>Impact</th>
                            <th>Mitigation</th>
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
            ajax: '{{ route('riskYajra')}}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'risk', name: 'risk' },
                { data: 'poss', name: 'poss' },
                { data: 'impact', name: 'impact' },
                { data: 'mitigation', name: 'mitigation' },
                { data: 'updatedby', name: 'updatedby' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush
@endsection



