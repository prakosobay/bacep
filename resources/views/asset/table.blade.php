@extends('layouts.dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center">Data Barang Asset</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#asset_modal">
                IMPORT CSV
            </button>

            <a href="{{url('/a.new')}}" type="button" class="btn btn-primary mr-5" >
                <strong>Tambahkan Barang Asset Baru</strong>
            </a>

            <!-- Import Excel -->
            <div class="modal fade" id="asset_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ url('/asset')}}" enctype="multipart/form-data">
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
                <table class="table table-striped table-hover" id="asset_table" width="100%">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Item Code</th>
                            <th>Nama Barang</th>
                            <th>Total</th>
                            <th>Terpasang</th>
                            <th>Sisa</th>
                            <th>Satuan</th>
                            <th>Kondisi</th>
                            <th>Note</th>
                            <th>Lokasi Penyimpanan</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script> --}}
@push('script')
    <script>
        $(function() {
            $('#asset_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('asset/all/yajra/show')}}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'itemcode', name: 'itemcode' },
                    { data: 'nama_barang', name: 'nama_barang' },
                    { data: 'jumlah', name: 'jumlah' },
                    { data: 'digunakan', name: 'digunakan' },
                    { data: 'sisa', name: 'sisa' },
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
