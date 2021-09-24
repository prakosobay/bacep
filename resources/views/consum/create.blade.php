@extends('layouts.barang')

@section('title', 'Tambah Barang')
@section('content')

    <div class="container">
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

		<button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
			IMPORT CSV
		</button>

		<!-- Import Excel -->
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

		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Kondisi</th>
                    <th>Note</th>
                    <th>Lokasi</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($consum as $s)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{$s->kode_barang}}</td>
					<td>{{$s->nama_barang}}</td>
					<td>{{$s->jumlah}}</td>
					<td>{{$s->satuan}}</td>
					<td>{{$s->kondisi}}</td>
					<td>{{$s->note}}</td>
					<td>{{$s->lokasi}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>



@endsection
