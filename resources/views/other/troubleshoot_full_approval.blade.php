@extends('layouts.full_approval')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-1">
        <div class="card-header py-3">
            <h4 class="judul text-center">Full Approval Form Troubleshoot</h4>
        </div>
        <div class="card-header py-3">
            <a href="{{ route('troubleshootExportFullPDF')}}" type="button" class="btn btn-sm btn-danger">Export PDF</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="full_troubleshoot" width="100%" cellspacing="0">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>ID Permit</th>
                            <th>Date of Visit</th>
                            <th>Date of Leave</th>
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
            $('#full_troubleshoot').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('troubleshootYajraFullApproval')}}',
                columns: [
                    { data: 'permit_id', name: 'permit_id' },
                    { data: 'visit', name: 'troubleshoot_bm_fulls.visit' },
                    { data: 'leave', name: 'troubleshoot_bm_fulls.leave' },
                    { data: 'work', name: 'troubleshoot_bm_fulls.work' },
                    { data: 'nama', name: 'troubleshoot_bm_personils.nama' },
                    { data: 'checkin', name: 'troubleshoot_bm_personils.checkin' },
                    { data: 'image_checkin',
                        render: function(data, type, full, meta) {
                            return "<img src=\"" + data + "\" height=\"100\"/>";
                        }
                    },
                    { data: 'checkout', name: 'troubleshoot_bm_personils.checkout' },
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
