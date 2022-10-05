@extends('layouts.full_approval')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow py-3">
        <h4 class="judul text-center">Full Approval Permit Internal</h4>
        <div class="card-header py-2">
            <a type="button" class="btn btn-success mx-1 my-1" href="{{ route('internalExportFullApprove')}}">
                Export Excel
            </a>
        </div>

        <!-- Modal Export-->
        {{-- <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exportModalLabel">Choose Department</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('internalExportFullApprove')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="dept" class="form-label">Choose One</label>
                                <select name="dept" id="dept" class="form-select">
                                    <option value="bss">BSS</option>
                                    <option value="erp">ERP</option>
                                    <option value="ipcore">IP Core</option>
                                    <option value="ipmedia">IP Media</option>
                                    <option value="it">IT</option>
                                    <option value="jds">JDS</option>
                                    <option value="owen">Pak Owen</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="internal" width="100%" cellspacing="0">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>ID Permit</th>
                            <th>Date of Visit</th>
                            <th>Purpose of Work</th>
                            <th>Name</th>
                            <th>Checkin</th>
                            <th>Checkout</th>
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
                    { data: 'id', name: 'id' },
                    { data: 'visit', name: 'visit' },
                    { data: 'work', name: 'work' },
                    { data: 'visitor', name: 'visitor' },
                    { data: 'checkin', name: 'checkin' },
                    { data: 'checkout', name: 'checkout' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush
@endsection
