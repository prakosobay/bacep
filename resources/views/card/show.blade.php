@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Data Kartu Visitor</strong></h1>

    <div class="container mx-3 my-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="container mx-3 my-3">
        @if (session('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
            </div>
        @endif
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#card">
                <strong>Tambahkan Kartu Baru</strong>
            </button>

            {{-- Modal New card --}}
            <div class="modal fade" id="card" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ route('cardStore')}}">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Kartu Baru</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="new" class="form-label"><b>Nomor Kartu:</b></label>
                                    <input id="new" type="text" class="form-control" name="number" required>
                                </div>
                                <div class="form-group">
                                    <label for="tipe" class="form-label"><b>Tipe :</b></label>
                                    <select name="card_type_id" id="tipe" class="form-control">
                                        <option selected>Pilih 1</option>
                                        @foreach ( $getTypes as $type )
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="card_table" width="100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Type</th>
                            {{-- <th>Created By</th> --}}
                            <th>Updated By</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- <script src="{{asset('vendor2/jquery/jquery.min.js')}}"></script> --}}
@push('scripts')
<script>
    $(function() {
        $('#card_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('cardYajra')}}',
            columns: [
                { data: 'number', name: 'number' },
                { data: 'type_name', name: 'type_name' },
                // { data: 'createdBy', name: 'createdBy' },
                { data: 'updatedBy', name: 'updatedBy' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush
@endsection



