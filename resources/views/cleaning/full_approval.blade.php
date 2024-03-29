@extends('layouts.full_approval')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-1">
        <div class="card-header">
            <h4 class="judul text-center">Full Approval Form Cleaning</h4>
        </div>
        <div class="card-header">
            {{-- <a href="{{ route('cleaningExportFullApproval') }}" class="btn btn-sm btn-success mx-1 my-1">Export Excel</a> --}}
            <a href="{{ route('cleaningExportPDF') }}" class="btn btn-sm btn-danger mx-1 my-1">Export PDF</a>
            {{-- <button type="button" class="btn btn-primary btn-sm mx-1 my-1" data-bs-toggle="modal" data-bs-target="#exportPDF">Export PDF</button> --}}
        </div>
        <div class="modal fade" id="exportPDF" tabindex="-1" aria-labelledby="exportPDFLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exportPDFLabel">Export PDF</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
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
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('yajra_full_approve_cleaning')}}',
                columns: [
                    { data: 'cleaning_id', name: 'cleaning_id' },
                    { data: 'validity_from', name: 'validity_from' },
                    { data: 'cleaning_work', name: 'cleaning_work' },
                    { data: 'cleaning_name', name: 'cleaning_name' },
                    { data: 'checkin_personil', name: 'checkin_personil' },
                    { data: 'image_checkin',
                        render: function(data, type, full, meta) {
                            return "<img src=\"" + data + "\" height=\"100\"/>";
                        }
                    },
                    { data: 'checkout_personil', name: 'checkout_personil' },
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
