@extends('layouts.full_approval')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card ml-5 mt-3">
                    <h4 class="judul">Table Full Approval Permit Cleaning</h4>
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr class="judul-table text-center">
                                    <th>ID Permit</th>
                                    <th>Date of Visit</th>
                                    <th>Visitor Name</th>
                                    <th>Purpose Work</th>
                                    {{-- <th>Link</th> --}}
                                </tr>
                            </thead>
                            <tbody>
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
        $(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('route_full_cleaning')}}',
                columns: [
                    { data: 'cleaning_id', name: 'cleaning_id' },
                    { data: 'validity_from', name: 'validity_from' },
                    { data: 'cleaning_name', name: 'cleaning_name' },
                    { data: 'cleaning_work', name: 'cleaning_work' },
                ]
            });
        });
    </script>
@endpush
@endsection
