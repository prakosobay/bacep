@extends('layouts.approval')

@section('content')
@csrf
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ml-5 mt-3">
                        <h4 class="judul">Table Approval Sales</h4>
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="judul-table text-center">
                                        <th>ID Permit</th>
                                        <th>Date of Request</th>
                                        <th>Validity</th>
                                        {{-- <th>Visitor</th> --}}
                                        <th>Purpose</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($survey as $p)
                                        <tr class="text-center">
                                            <td>{{ $p->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($p->created_at)->format('d-m-Y') }}</td>
                                            <td>{{ Carbon\Carbon::parse($p->visit)->format('d-m-Y') }}</td>
                                            <td>{{ $p->visit_name[0] }}</td> 
                                            @foreach ($json->visit_name[0] as $r)
                                                <td>{{ $r }}</td>
                                            @endforeach
                                            <td>Survey Facility</td>
                                            <td>
                                            @can('isApproval')
                                                    <a href="javascript:void(0)" type="button" id="ok" class="approve btn btn-success btn-sm" data-id="{{$p->id}}">Approve</a>
                                                    <a href="javascript:void(0)" type="button" id="not" class="reject btn btn-danger btn-sm" data-id="{{$p->id}}">Reject</a>
                                            @elsecan('isHead')
                                                    <a href="javascript:void(0)" type="button" id="ok" class="approve btn btn-success btn-sm" data-id="{{$p->id}}">Approve</a>
                                                    <a href="javascript:void(0)" type="button" id="not" class="reject btn btn-danger btn-sm" data-id="{{$p->id}}">Reject</a>
                                            @elsecan('isSecurity')
                                                    <a href="javascript:void(0)" type="button" id="ok" class="approve btn btn-success btn-sm" data-id="{{$p->id}}">Approve</a>
                                            @endcan
                                                <a href="/survey_pdf/{{$p->id}}" class="btn btn-primary btn-sm" target="_blank">File</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();

                // approve
                $(document).on('click', '.approve', function(event){

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        }
                    });

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, approve it!'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                                $('#ok').click(function () {
                                    return false;
                                });
                            let id = $(this).data('id');
                            console.log(id);
                            $.ajax({
                                type:'POST',
                                url:"{{url('approve_survey')}}",
                                data: {id},
                                error: function (request, error) {
                                    alert(" Can't do because: " + error);
                                },
                                success:function(data){
                                    console.log(data);
                                    if(data.status == 'SUCCESS'){
                                            Swal.fire(
                                            'Approved!',
                                            'The form has been approved.',
                                            'success'
                                            ).then(function(){
                                                location.reload();
                                            })
                                    }else if(data.status == 'FAILED'){
                                        Swal.fire({
                                            title: "Failed!",
                                            text: 'Failed to Reject',
                                        }).then(function(){
                                            location.reload();
                                        });
                                    }
                                }
                            });
                        }
                    });
                });

                 //reject
                $(document).on('click', '.reject', function(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        }
                    });
                    Swal.fire({
                        title: 'Are you sure want to reject?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, reject it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#not').click(function () {
                                    return false;
                                });
                            let id = $(this).data('id');
                            console.log(id);
                            $.ajax({
                                type:'POST',
                                url:"{{url('reject_survey')}}",
                                data: {id},
                                error: function (request, error) {
                                    alert(" Can't do because: " + error);
                                },
                                success:function(data){
                                    console.log(data);
                                    if(data.status == 'SUCCESS'){
                                            Swal.fire(
                                            'Rejected!',
                                            'The form has been rejected.',
                                            'success'
                                            ).then(function(){
                                                location.reload();
                                            })
                                    }else if(data.status == 'FAILED'){
                                        Swal.fire({
                                            title: "Failed!",
                                            text: 'Failed to Reject',
                                        }).then(function(){
                                            location.reload();
                                        });
                                    }
                                }
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
