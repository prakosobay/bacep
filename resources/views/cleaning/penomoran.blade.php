@extends('layouts.approval')

@section('content')
@csrf

<div class="container-fluid">
    {{-- datatable --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800 text-center">Penomoran</h1>
        </div>
        @if (session('success'))
            <div class="alert alert-success mx-5 my-2">
                <b>{{ session('success') }}</b>
            </div>
        @endif
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
                        @foreach($getNomor as $p)
                        <tr>
                            <td>AR/{{ $p->number_ar }}/{{ $p->month_ar }}/{{ $p->year_ar }}</td>
                            <td>CR/{{ $p->number_cr }}/{{ $p->month_cr }}/{{ $p->year_cr }}</td>
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
