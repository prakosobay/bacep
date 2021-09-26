@extends('layouts.barang')

@section('title', 'Tambah Barang')
@section('content')

<section class="content">
    <div class="container-fluid">
        {{-- notifikasi form validasi --}}
        @if ($errors->has('file'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('file') }}</strong>
        </span>
        @endif

        {{-- notifikasi sukses --}}
        @if ($sukses = Session::get('sukses'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $sukses }}</strong>
        </div>
        @endif

        {{-- Modal --}}
        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" action="{{ url('/import')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
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

        <div class="row">
            <div class="col-12">
                <div class="card">
                <!-- /.card-header -->
                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                    IMPORT CSV
                </button>
                <div class="card-body">
                    <!-- Import Excel -->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Kondisi Stok</th>
                                <th>Note</th>
                                <th>Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
    $(function() {
        $('#example1').DataTable({
            processing: true,
            serverSide: true,
            // ajax: {{ url('/index')}},
            ajax: '{{ url('/datatable') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'nama_barang', name: 'nama_barang' },
                { data: 'jumlah', name: 'jumlah' },
                { data: 'satuan', name: 'satuan' },
                { data: 'kondisi', name: 'kondisi' },
                { data: 'note', name: 'note' },
                { data: 'lokasi', name: 'lokasi' },
            ]
        });
    });
    </script>
</section>
@endsection
