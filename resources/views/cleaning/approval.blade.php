@extends('layouts.approval')

@section('content')
@csrf

<div class="container-fluid">
    {{-- datatable --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800 text-center">Approval Permit Cleaning</h1>
        </div>

        @if (session('success'))
            <div class="alert alert-success mx-2 my-2 text-center">
                <b>{{ session('success') }}</b>
            </div>
        @endif

        @if (session('failed'))
            <div class="alert alert-danger mx-2 my-2 text-center">
                <b>{{ session('failed') }}</b>
            </div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>ID Permit</th>
                            <th>Date of Request</th>
                            <th>Date of Visit</th>
                            <th>Visitor</th>
                            <th>Purpose</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="isi-table text-center">
                        @foreach($cleaning as $p)
                        <tr>
                            <td>{{ $p->cleaning_id }}</td>
                            <td>{{ Carbon\Carbon::parse($p->created_at)->format('d-m-Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($p->validity_from)->format('d-m-Y') }}</td>
                            <td>{{ $p->cleaning_name}}</td>
                            <td>{{ $p->cleaning_work }}</td>
                            <td>
                                {{-- @can('isApproval')
                                    <a href="javascript:void(0)" type="button" id="ok" class="approve btn btn-success btn-sm my-1 mx-1" data-cleaning_id="{{$p->cleaning_id}}">Approve</a>
                                    <a href="javascript:void(0)" type="button" id="not" class="reject btn btn-danger btn-sm my-1 mx-1" data-cleaning_id="{{$p->cleaning_id}}">Reject</a>
                                @elsecan('isHead')
                                    <a href="javascript:void(0)" type="button" id="ok" class="approve btn btn-success btn-sm my-1 mx-1" data-cleaning_id="{{$p->cleaning_id}}">Approve</a>
                                    <a href="javascript:void(0)" type="button" id="not" class="reject btn btn-danger btn-sm my-1 mx-1" data-cleaning_id="{{$p->cleaning_id}}">Reject</a>
                                @elsecan('isSecurity')
                                    <a href="javascript:void(0)" type="button" id="ok" class="approve btn btn-success btn-sm my-1 mx-1" data-cleaning_id="{{$p->cleaning_id}}">Approve</a>
                                @endcan
                                    <a href="/cleaning_pdf/{{$p->cleaning_id}}" class="btn btn-primary btn-sm my-1 mx-1" target="_blank">File</a> --}}
                                    <a href="{{ route('cleaningReviewARCR', $p->cleaning_id)}}" class="btn btn-primary btn-sm my-1 mx-1">Review</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')

    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();

            // // approve
            // $(document).on('click', '.approve', function(event){

            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('input[name="_token"]').val()
            //         }
            //     });

            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         type: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, approve it!'
            //     })
            //     .then((result) => {
            //         if (result.isConfirmed) {
            //                 $('#ok').click(function () {
            //                     return false;
            //                 });
            //             let cleaning_id = $(this).data('cleaning_id');
            //             console.log(cleaning_id);
            //             $.ajax({
            //                 type:'POST',
            //                 url:"{{url('approve_cleaning')}}",
            //                 data: {cleaning_id},
            //                 error: function (request, error) {
            //                     alert("Cek PDF Dahulu!" + error);
            //                 },
            //                 success:function(data){
            //                     console.log(data);
            //                     if(data.status == 'SUCCESS'){
            //                             Swal.fire(
            //                             'Approved!',
            //                             'The form has been approved.',
            //                             'success'
            //                             ).then(function(){
            //                                 location.reload();
            //                             })
            //                     }else if(data.status == 'FAILED'){
            //                         Swal.fire({
            //                             title: "Failed!",
            //                             text: 'Failed to Reject',
            //                         }).then(function(){
            //                             location.reload();
            //                         });
            //                     }
            //                 }
            //             });
            //         }
            //     });
            // });

            // //reject
            // $(document).on('click', '.reject', function(){
            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('input[name="_token"]').val()
            //         }
            //     });
            //     Swal.fire({
            //         title: 'Are you sure want to reject?',
            //         text: "You won't be able to revert this!",
            //         type: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, reject it!'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             $('#not').click(function () {
            //                     return false;
            //                 });
            //             let cleaning_id = $(this).data('cleaning_id');
            //             console.log(cleaning_id);
            //             $.ajax({
            //                 type:'POST',
            //                 url:"{{url('cleaning_reject')}}",
            //                 data: {cleaning_id},
            //                 error: function (request, error) {
            //                     alert(" Can't do because: " + error);
            //                 },
            //                 success:function(data){
            //                     console.log(data);
            //                     if(data.status == 'SUCCESS'){
            //                             Swal.fire(
            //                             'Rejected!',
            //                             'The form has been rejected.',
            //                             'success'
            //                             ).then(function(){
            //                                 location.reload();
            //                             })
            //                     }else if(data.status == 'FAILED'){
            //                         Swal.fire({
            //                             title: "Failed!",
            //                             text: 'Failed to Reject',
            //                         }).then(function(){
            //                             location.reload();
            //                         });
            //                     }
            //                 }
            //             });
            //         }
            //     });
            // });
        });
    </script>
@endpush
@endsection
