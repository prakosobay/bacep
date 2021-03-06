@extends('layouts.history')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="judul text-center">Log Form Cleaning</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>ID Permit</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Last Updated</th>
                            <th>Validity</th>
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
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('route_history_cleaning')}}',
                columns: [
                    { data: 'cleaning_id', name: 'cleanings.cleaning_id' },
                    { data: 'role_to', name: 'role_to' },
                    { data: 'status', name: 'status' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'validity_from', name: 'cleanings.validity_from' },
                    { data: 'aktif', name: 'aktif' },
                ]
            });
        });
    </script>
@endpush
@endsection
