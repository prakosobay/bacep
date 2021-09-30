@extends('layouts.barang')

@section('title', 'Tambah Barang')
@section('content')
<div class="content-wrapper">
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

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Import Excel -->
                            <table id="keluar" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Tanggal</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                        <th>Nama Pencatat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php $i=1 @endphp --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
        $(function() {
            $('#keluar').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('/out') }}',
                columns: [
                    { data: 'consum_id', name: 'consum_id' },
                    { data: 'tanggal', name: 'tanggal' },
                    { data: 'nama_barang', name: 'nama_barang' },
                    { data: 'jumlah', name: 'jumlah' },
                    { data: 'ket', name: 'ket' },
                    { data: 'pencatat', name: 'pencatat' },
                ]
            });
        });
        </script>

    </section>
</div>
@endsection
