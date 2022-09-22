@extends('layouts.barang')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800 text-center">Data Barang Keluar Asset</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-1">
            <a type="button" class="btn btn-primary mr-5 sm" href="{{ route('assetTable') }}">
                Kembali
            </a>

            @if (session('failed'))
                <div class="alert alert-danger mt-1">
                    {{ session('failed') }}
                </div>
            @endif
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <form method="post" id="asset" class="validate-form" action="{{ route('assetUpdateKeluar', $asset->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label" for="nama_barang"><strong>Nama Barang</strong></label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{$asset->nama_barang}}" readonly>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="id"><strong>Kode Barang</strong></label>
                                <input type="number" class="form-control" id="id" name="asset_id" value="{{$asset->id}}" readonly>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="stok"><strong>Stock Total</strong></label>
                                <input type="number" class="form-control" id="stok" value="{{$asset->jumlah}}" readonly>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label" for="sisa"><strong>Stock Sisa</strong></label>
                                <input type="number" class="form-control" id="sisa" value="{{$asset->sisa}}" readonly>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="use"><strong>Stock Digunakan</strong></label>
                                <input type="number" class="form-control" id="use" value="{{$asset->digunakan}}" readonly>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="satuan"><strong>Satuan</strong></label>
                                <input type="text" class="form-control" id="satuan" value="{{$asset->satuan}}" readonly>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label" for="jumlah_sisa"><strong>Jumlah Barang Keluar dari Stok Sisa</strong></label>
                                <input type="number" class="form-control @error('jumlah_sisa') is-invalid @enderror"
                                id="jumlah_sisa" name="jumlah_sisa" value="{{ old('jumlah_sisa') }}" autofocus>
                                @error('jumlah_sisa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="jumlah_digunakan"><strong>Jumlah Barang Keluar dari Stok Digunakan</strong></label>
                                <input type="number" class="form-control @error('jumlah_digunakan') is-invalid @enderror"
                                id="jumlah_digunakan" name="jumlah_digunakan" value="{{ old('jumlah_digunakan') }}">
                                @error('jumlah_digunakan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="ket"><strong>Keterangan</strong></label>
                                <input type="text" id="ket" name="ket" class="form-control @error('ket') is-invalid @enderror" required value="{{ old('ket') }}">
                                @error('ket')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="pencatat"><strong>Nama Pencatat</strong></label>
                            <input type="text" class="form-control" id="pencatat" name="pencatat" value="{{Auth::user()->name}}" readonly>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
