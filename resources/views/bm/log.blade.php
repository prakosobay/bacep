@extends('layouts.log-visitor')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-md-center mt-4">
            <div class="col-11 text-start">
                <img src="{{asset('gambar/log-visitor/house-fill.svg')}}" alt="" class="img-fluid">
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
        <div class="row justify-content-md-center mt-3">
            <div class="col text-center">
                <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>Date of Request</th>
                                <th>Date of Visit</th>
                                <th>Date of Leave</th>
                                <th>Visitor Name</th>
                                <th>Purpose of Work </th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#example').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{url('log_bm')}}",
            columns: [
                { data: 'cleaning_id', name: 'cleaning_id' },
                { data: 'cleaning_date', name: 'cleaning_date' },
                { data: 'validity_from', name: 'validity_from' },
                { data: 'validity_to', name: 'validity_to' },
                { data: 'cleaning_name', name: 'cleaning_name' },
                { data: 'cleaning_work', name: 'cleaning_work' },
                { data: 'status', name: 'status' },
                // { data: 'action', name: '<a href="#" type=button class="btn btn-primary">'},
            ]
        });
    });
</script>
@endpush
