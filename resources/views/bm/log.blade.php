@extends('layouts.log-visitor')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-md-center mt-4">
            <div class="col-11 text-start">
                <img src="{{ asset('gambar/log-visitor/house-fill.svg')}}" alt="" class="img-fluid">
                <span class="home-abu">
                    Home
                </span>
            </div>
        </div>
        <div class="row justify-content-md-center mt-3">
            <div class="col-11 text-start">
                <h4 class="table-font">
                    Table Log Permit BM
                </h4>
            </div>
        </div>
        <div class="card ml-5 mt-3">
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>ID Permit</th>
                            <th>Date of Request</th>
                            <th>Date of Visit</th>
                            <th>Date of Leave</th>
                            <th>Name</th>
                            <th>Purpose</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{url('log_cleaning')}}",
            columns: [
                { data: 'cleaning_id', name: 'cleaning_id' },
                { data: 'cleaning_date', name: 'cleaning_date' },
                { data: 'validity_from', name: 'validity_from' },
                { data: 'validity_to', name: 'validity_to' },
                { data: 'cleaning_name', name: 'cleaning_name' },
                { data: 'cleaning_work', name: 'cleaning_work' },
                { data: 'status', name: 'status' },
            ]
        });
    });
</script>
@endpush
