@extends('layouts.log-visitor')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-md-center mt-4">
        <div class="col-11 text-start">
            <a class="" href="{{ url('home')}}">
                <img src="{{asset('gambar/log-visitor/house-fill.svg')}}" class="img-fluid" alt="">Back To Home
            </a>
        </div>
    </div>
    <div class="row justify-content-md-center mt-3">
        <div class="col-11 text-start">
            <h4 class="table-font">
                Table Log Permit Survey
            </h4>
        </div>
    </div>
    <div class="row justify-content-md-center mt-3">
        <div class="col-11 text-center">
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
    </script>
@endpush
