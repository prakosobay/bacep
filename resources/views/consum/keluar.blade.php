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

        <div class="row">
            <div class="col-12">
                <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Import Excel -->
                    <table id="keluar" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Tanggal</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Nama Pencatat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp
                            {{-- @foreach($ck as $s)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{$s->id}}</td>
                                <td>{{$s->tanggal }}</td>
                                <td>{{$s->nama_barang}}</td>
                                <td>{{$s->jumlah}}</td>
                                <td>{{$s->ket}}</td>
                                <td>{{$s->pencatat}}</td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
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
            // ajax: {{ url('/index')}},
            ajax: '{{ url('/out') }}',
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
