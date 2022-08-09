@extends('layouts.full_approval')

@section('content')
<div class="container">

    <!-- Page Heading -->
    <h1 class="h3 my-2 text-gray-800 text-center">Full Approve Form Survey</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center" id="full_table" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>ID Permit</th>
                            <th>Visit Date</th>
                            <th>Company</th>
                            <th>Checkin</th>
                            <th>Checkout</th>
                            <th>Link</th>
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

</script>
@endpush
@endsection
