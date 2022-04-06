@extends('layouts.history')

@section('content')
<div class="container">

    <!-- Page Heading -->
    <h1 class="h3 my-2 text-gray-800 text-center">History Form Survey</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#" type="button" class="btn btn-success mr-5" >
                <strong>Export Excel</strong>
            </a>

            <!-- Import Excel -->
            <div class="modal fade" id="asset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ url('/asset')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import File CSV</h5>
                            </div>
                            <div class="modal-body">
                                <label>Pilih file CSV</label>
                                <div class="form-group">
                                    <input type="file" name="file" required="required">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>ID Permit</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Last Updated</th>
                            <th>Validity</th>
                            <th>Ket</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
            ajax: '{{url('route_history_survey')}}',
            columns: [
                { data: 'id', name: 'surveys.id' },
                { data: 'role_to', name: 'role_to' },
                { data: 'status', name: 'status' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'visit', name: 'surveys.visit' },
                { data: 'aktif', name: 'aktif' },
            ]
        });
    });
</script>
@endpush
@endsection
