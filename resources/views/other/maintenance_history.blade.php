@extends('layouts.history')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="judul text-center">Log Form Maintenance</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="history" width="100%" cellspacing="0">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>ID Permit</th>
                            <th>Validity</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Ket</th>
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
            $('#history').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('maintenanceYajraHistory')}}',
                columns: [
                    { data: 'other_id', name: 'other_id' },
                    { data: 'visit', name: 'others.visit' },
                    { data: 'role_to', name: 'role_to' },
                    { data: 'status', name: 'status' },
                    { data: 'created_by', name: 'created_by' },
                    { data: 'aktif', name: 'aktif' },
                ]
            });
        });
    </script>
@endpush
@endsection
