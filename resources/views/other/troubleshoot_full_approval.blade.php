@extends('layouts.full_approval')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-1">
        <div class="card-header py-3">
            <h4 class="judul text-center">Full Approval Form Maintenance</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="full_troubleshoot" width="100%" cellspacing="0">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>ID Permit</th>
                            <th>Date of Visit</th>
                            <th>Purpose of Work</th>
                            {{-- <th>Visitor Name</th> --}}
                            {{-- <th>Checkin</th>
                            <th>Checkout</th> --}}
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
                ajax: '{{ url('/other/troubleshoot/yajra/full/approval')}}',
                columns: [
                    { data: 'troubleshoot_bm_id', name: 'troubleshoot_bm_id' },
                    { data: 'visit', name: 'visit' },
                    { data: 'work', name: 'work' },
                    // { data: 'cleaning_name', name: 'cleaning_name' },
                    // { data: 'checkin_personil', name: 'checkin_personil' },
                    // { data: 'checkout_personil', name: 'checkout_personil' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush
@endsection
