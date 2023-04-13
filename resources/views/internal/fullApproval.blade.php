@extends('layouts.full_approval')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow py-3">
        <h4 class="judul text-center">Full Approval Permit Colo</h4>
        <div class="card-header py-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Export PDF
            </button>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#excelModal">
                Export Excel
            </button>
        </div>

        <!-- Modal Export PDF-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exportModalLabel">Select Date</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('internalLogBookPDF')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="from" class="form-label">From :</label>
                                <input type="date" class="form-control" name="from">
                            </div>
                            <div>
                                <label for="to" class="form-label">To :</label>
                                <input type="date" class="form-control" name="to">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Modal Export Excel --}}
        <div class="modal fade 2" id="excelModal" tabindex="-1" aria-labelledby="excelLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="excelLabel">Select Date</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('internalLogbookExcel')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="from" class="form-label">From :</label>
                                <input type="date" class="form-control" name="from">
                            </div>
                            <div>
                                <label for="to" class="form-label">To :</label>
                                <input type="date" class="form-control" name="to">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="internal" width="100%" cellspacing="0">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>ID Permit</th>
                            <th>Requestor</th>
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
    {{-- <script>
        $(function() {
            $('#internal').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('internalYajraFullApproval')}}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'requestor', name: 'users.name' },
                    { data: 'visit', name: 'visit' },
                    { data: 'work', name: 'work' },
                    { data: 'visitor', name: 'internal_visitors.name' },
                    { data: 'checkin', name: 'internal_visitors.checkin' },
                    { data: 'checkout', name: 'internal_visitors.checkout' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script> --}}
@endpush
@endsection
