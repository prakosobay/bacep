@extends('layouts.approval')

@section('content')
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
                                        <th>Visitor</th>
                                        <th>Purpose</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($survey as $p)
                                        <tr>
                                            <td>{{ $p->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($p->created_at)->format('d-m-Y') }}</td>
                                            <td>{{ Carbon\Carbon::parse($p->visit)->format('d-m-Y') }}</td>

                                            @foreach ($p->pic as $n)
                                                <td>
                                                    {{ $n->name }}
                                                </td>
                                            @endforeach
                                            <td>Survey Facility</td>
                                            {{-- <td>
                                            @can('isApproval')
                                                <a href="javascript:void(0)" type="button" id="ok" class="approve btn btn-success btn-sm" data-cleaning_id="{{$p->cleaning_id}}">Approve</a>
                                                <a href="javascript:void(0)" type="button" id="not" class="reject btn btn-danger btn-sm" data-cleaning_id="{{$p->cleaning_id}}">Reject</a>
                                            @elsecan('isHead')
                                                <a href="javascript:void(0)" type="button" id="ok" class="approve btn btn-success btn-sm" data-cleaning_id="{{$p->cleaning_id}}">Approve</a>
                                                <a href="javascript:void(0)" type="button" id="not" class="reject btn btn-danger btn-sm" data-cleaning_id="{{$p->cleaning_id}}">Reject</a>
                                            @elsecan('isSecurity')
                                                <a href="javascript:void(0)" type="button" id="ok" class="approve btn btn-success btn-sm" data-cleaning_id="{{$p->cleaning_id}}">Approve</a>
                                            @endcan
                                                <a href="/cleaning_pdf/{{$p->cleaning_id}}" class="btn btn-primary btn-sm" target="_blank">File</a>
                                        </td> --}}
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
            });
        </script>
    @endpush
@endsection
