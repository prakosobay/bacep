@extends('layouts.barang')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800 text-center">Barang Asset Digunakan</h1>
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
                <form method="post" id="asset" class="validate-form" action="{{ route('assetUpdateDigunakan', $use->id) }}">
                    @method('put')
                    @csrf

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label" for="nama_barang"><strong>Nama Barang</strong></label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{$use->nama_barang}}" readonly>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label" for="stok"><strong>Stock Total</strong></label>
                                <input type="number" class="form-control" id="stok" name="stok" value="{{$use->jumlah}}" readonly>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label" for="use"><strong>Stock Digunakan</strong></label>
                                <input type="number" class="form-control" id="use" name="use" value="{{$use->digunakan}}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label" for="id"><strong>Kode Barang</strong></label>
                                <input type="number" class="form-control" id="id" name="asset_id" value="{{$use->id}}" readonly>
                            </div>

                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label" for="sisa"><strong>Stock Sisa</strong></label>
                                <input type="number" class="form-control" id="sisa" name="sisa" value="{{$use->sisa}}" readonly>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label" for="satuan"><strong>Satuan</strong></label>
                                <input type="text" class="form-control" id="satuan" value="{{$use->satuan}}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label" for="jumlah"><strong>Jumlah yang Digunakan</strong></label>
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" autofocus required>
                                @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label" for="ket"><strong>Keterangan</strong></label>
                                <input type="text" id="ket" name="ket" class="form-control @error('ket') is-invalid @enderror" required>
                                @error('ket')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="pencatat"><strong>Nama Pencatat</strong></label>
                                <input type="text" class="form-control" id="pencatat" name="pencatat" value="{{Auth::user()->name}}" readonly>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
