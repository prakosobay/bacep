@extends('layouts.full_approval')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-1">
        <div class="card-header py-3">
            <h4 class="judul text-center">Full Approval Form Maintenance</h4>
        </div>
        <div class="card-header py-3">
            <a href="{{ route('maintenanceExportFullPDF') }}" type="button" class="btn btn-sm btn-danger mx-1 my-1">Export PDF</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="full_maintenance" width="100%" cellspacing="0">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>ID Permit</th>
                            <th>Date of Visit</th>
                            <th>Purpose of Work</th>
                            <th>Visitor Name</th>
                            <th>Checkin</th>
                            <th>Photo Checkin</th>
                            <th>Checkout</th>
                            <th>Photo Checkout</th>
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
            $('#full_maintenance').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('maintenanceYajraFullApproval')}}',
                columns: [
                    { data: 'other_id', name: 'other_id' },
                    { data: 'visit', name: 'visit' },
                    { data: 'work', name: 'work' },
                    { data: 'name', name: 'name' },
                    { data: 'checkin', name: 'checkin' },
                    { data: 'image_checkin',
                        render: function(data, type, full, meta) {
                            return "<img src=\"" + data + "\" height=\"100\"/>";
                        }
                    },
                    { data: 'checkout', name: 'checkout' },
                    { data: 'image_checkout',
                        render: function(data, type, full, meta) {
                            return "<img src=\"" + data + "\" height=\"100\"/>";
                        }
                    },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush
@endsection
