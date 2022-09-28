@extends('layouts.barang')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 my-3 text-gray-800 text-center">Data Barang Masuk Asset</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('assetExportMasuk') }}" type="button" class="btn btn-sm btn-success mx-2 my-2" >
                <strong>Export Excel</strong>
            </a>

            {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Import CSV
            </button> --}}

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="post" action="{{ url('asset/import/masuk') }}" enctype="multipart/form-data">
                        @csrf
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
                <table class="table table-striped table-hover" id="masuk_table" width="100%">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Ket</th>
                            <th>Tanggal</th>
                            <th>Pencatat</th>
                        </tr>
                    </thead>
                    <tbody class="isi-table text-center">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(function() {
        $('#masuk_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('asset/yajra/masuk')}}',
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
