@extends('layouts.full_approval')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-1">
        <div class="card-header py-3">
            <h4 class="judul text-center">Full Approval Permit Internal</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="internal" width="100%" cellspacing="0">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>ID Permit</th>
                            <th>Requestor Dept</th>
                            <th>Date of Visit</th>
                            <th>Purpose of Work</th>
                            <th>Name</th>
                            <th>Checkin</th>
                            <th>Link</th>
                        </tr>
                    </thead>
                    <tbody class="isi-table text-center">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function() {
            $('#internal').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('internal/yajra/full/approval')}}',
                columns: [
                    { data: 'internal_id', name: 'internal_id' },
                    { data: 'req_dept', name: 'req_dept' },
                    { data: 'visit', name: 'visit' },
                    { data: 'work', name: 'work' },
                    { data: 'name', name: 'internal_visitors.name' },
                    { data: 'checkin', name: 'internal_visitors.checkin' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush
@endsection
