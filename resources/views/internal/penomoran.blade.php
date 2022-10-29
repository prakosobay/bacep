@extends('layouts.approval')

@section('content')
@csrf

<div class="container-fluid">
    {{-- datatable --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800 text-center">Penomoran Permit Internal</h1>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="ar" width="100%" cellspacing="0">
                            <thead>
                                <tr class="judul-table text-center">
                                    <th>AR</th>
                                    <th>Updated</th>
                                    <th>Requestor</th>
                                </tr>
                            </thead>
                            <tbody class="isi-table text-center">
                                @foreach($ar as $p)
                                    <tr>
                                        <td>{{ $p->number }}/{{ $p->month }}/{{ $p->year }}</td>
                                        <td>{{ $p->updated_at }}</td>
                                        <td>{{ $p->internal->requestor->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="cr" width="100%" cellspacing="0">
                            <thead>
                                <tr class="judul-table text-center">
                                    <th>CR</th>
                                    <th>Updated</th>
                                    <th>Requestor</th>
                                </tr>
                            </thead>
                            <tbody class="isi-table text-center">
                                @foreach($cr as $o)
                                    <tr>
                                        <td>{{ $o->number }}/{{ $o->month }}/{{ $o->year }}</td>
                                        <td>{{ $o->updated_at }}</td>
                                        <td>{{ $p->internal->requestor->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
    $(document).ready( function () {
        $('#ar').DataTable();
    });
    $(document).ready( function () {
        $('#cr').DataTable();
    });
</script>
@endpush
@endsection
