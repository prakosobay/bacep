@extends('layouts.log-visitor')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-1">
        <div class="card-header py-3">
            <h4 class="judul text-center">Log Reject Form BM</h4>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <a type="button" class="btn btn-sm btn-primary mx-1 my-2" href="{{url('cleaning_form')}}"><b>Create Permit Cleaning</b></a>
                <a type="button" class="btn btn-sm btn-secondary mx-1 my-2" href="#"><b>Create Permit Other</b></a>
                <a type="button" class="btn btn-sm btn-danger mx-1 my-2" href="{{url('cleaning/reject/show')}}"><b>List Permit Reject</b></a>
                <a type="button" class="btn btn-sm btn-info mx-1 my-2" href="{{url('logall')}}"><b>Log Permit BM</b></a>
                <a type="button" class="btn btn-sm btn-success mx-1 my-2" href="#"><b>Export Excel</b></a>
            </div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="judul-table text-center">
                                <th>ID Permit</th>
                                <th>Date of Visit</th>
                                <th>Purpose of Work</th>
                                <th>Visitor Name</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody class="isi-table text-center">
                        </tbody>
                    </table>
                </div>
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
                ajax: '{{ url('yajra_reject_cleaning_other')}}',
                columns: [
                    { data: 'cleaning_id', name: 'cleaning_id' },
                    { data: 'validity_from', name: 'validity_from' },
                    { data: 'cleaning_work', name: 'cleaning_work' },
                    { data: 'cleaning_name', name: 'cleaning_name' },
                    { data: 'note', name: 'note' },
                ]
            });
        });
    </script>
@endpush
@endsection
