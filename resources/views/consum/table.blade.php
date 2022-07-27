@extends('layouts.barang')

@section('content')
<div class="container-fluid">
    <h1 class="h3 my-3 text-gray-800 text-center">Data Barang Consumable</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-1">
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Import CSV
            </button>

            <a href="{{url('consum/create/show')}}" type="button" class="btn btn-success btn-sm mx-1 my-1" >
                <strong>Tambahkan Barang Consumable Baru</strong>
            </a>

            @if (session('success'))
                <div class="alert alert-success mt-1">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="post" action="{{ url('consum/import/table')}}" enctype="multipart/form-data">
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
                <table class="table table-striped table-hover" id="consumAll" width="100%">
                    <thead>
                        <tr class="judul-table text-center">
                            <th>Kode Barang</th>
                            <th>Item Code</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Kondisi</th>
                            <th>Note</th>
                            <th>Lokasi</th>
                            <th>Action</th>
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
            $('#consumAll').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('consum/yajra/show')}}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'itemcode', name: 'itemcode' },
                    { data: 'nama_barang', name: 'nama_barang' },
                    { data: 'jumlah', name: 'jumlah' },
                    { data: 'satuan', name: 'satuan' },
                    { data: 'kondisi', name: 'kondisi' },
                    { data: 'note', name: 'note' },
                    { data: 'lokasi', name: 'lokasi' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush
@endsection
