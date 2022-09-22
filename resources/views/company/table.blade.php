@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Companies</strong></h1>

    <div class="container mx-3 my-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#user">
                <strong>Create New Company</strong>
            </button>

            {{-- Modal New User --}}
            <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ route('companyStore')}}">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Create New Company</b></h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name" class="form-label"><b>Name :</b></label>
                                    <input id="name" type="text" class="form-control" name="company" required>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="form-label"><b>Address :</b></label>
                                    <input id="address" type="text" class="form-control" name="address" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="form-label"><b>Phone :</b></label>
                                    <input id="phone" type="text" class="form-control" name="phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="website" class="form-label"><b>Website :</b></label>
                                    <input id="website" type="text" class="form-control" name="website" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label"><b>Email :</b></label>
                                    <input id="email" type="text" class="form-control" name="email" required>
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
                <table class="table table-striped table-hover" id="companyTable" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Website</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(function() {
        $('#companyTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('companyYajra')}}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'address', name: 'address' },
                { data: 'phone', name: 'phone' },
                { data: 'website', name: 'website' },
                { data: 'email', name: 'email' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush
@endsection



