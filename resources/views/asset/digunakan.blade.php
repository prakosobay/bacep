@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center">Data Barang Asset</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Barang Digunakan</h6>
            {{-- <a href="{{url('/export.a.k')}}" type="button" class="btn btn-success mr-5" >
                <strong>Export Excel</strong>
            </a> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="digunakan_table" width="100%">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Ket</th>
                            <th>Nama Pencatat</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    $(function() {
        $('#digunakan_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('asset/digunakan/yajra/show')}}',
            columns: [
                { data: 'asset_id', name: 'asset_id' },
                { data: 'nama_barang', name: 'nama_barang' },
                { data: 'jumlah', name: 'jumlah' },
                { data: 'ket', name: 'ket' },
                { data: 'pencatat', name: 'pencatat' },
                { data: 'tanggal', name: 'tanggal' },
            ]
        });
    });
</script>
@endpush
@endsection
