@extends('layouts.approval')

@section('content')
@csrf

<div class="container-fluid">
    {{-- datatable --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800 text-center">Penomoran Permit Internal</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="approve_internal" width="100%" cellspacing="0">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>AR</th>
                            <th>CR</th>
                        </tr>
                    </thead>
                    <tbody class="isi-table text-center">
                        @foreach($ar as $p)
                        <tr>
                            <td>{{ $p->number }}/{{ $p->month }}/{{ $p->year }}</td>
                        </tr>
                        @endforeach
                        @foreach ( $cr as $o )
                            <tr>
                                <td>{{ $o->number }}/{{ $o->month }}/{{ $o->year }}</td>
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
        $('#approve_internal').DataTable();
    });
</script>
@endpush
@endsection
