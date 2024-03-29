@extends('layouts.history')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="judul text-center">Log Form Eksternal</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="history" width="100%" cellspacing="0">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>ID Permit</th>
                            <th>Date of Visit</th>
                            <th>Status</th>
                            <th>By</th>
                            <th>Updated</th>
                            <th>Ket</th>
                            <th>Role</th>
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
                ajax: "{{ route('eksternalYajraHistory')}}",
                columns: [
                    { data: 'id', name: 'eksternals.id' },
                    { data: 'visit', name: 'eksternals.visit' },
                    { data: 'status', name: 'status' },
                    { data: 'updatedby', name: 'eksternal_histories.created_by' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'aktif', name: 'aktif' },
                    { data: 'role_to', name: 'role_to' },
                ]
            });
        });
    </script>
@endpush
@endsection
