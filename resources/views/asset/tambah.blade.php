@extends('layouts.barang')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800 text-center">Barang Asset Masuk</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary mr-5 sm" href="{{url('asset/table/show')}}">
                Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" id="asset" class="validate-form" action="{{url('asset/update/masuk', $asset->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nama_barang"><strong>Nama Barang</strong></label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{$asset->nama_barang}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="id"><strong>Kode Barang</strong></label>
                        <input type="number" class="form-control" id="id" name="asset_id" value="{{$asset->id}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="itemcode"><strong>Item Code</strong></label>
                        <input type="number" class="form-control" id="itemcode" name="itemcode" value="{{$asset->itemcode}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="stok"><strong>Stock Total</strong></label>
                        <input type="number" class="form-control" id="stok" value="{{$asset->jumlah}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="use"><strong>Stock Digunakan</strong></label>
                        <input type="number" class="form-control" id="use" value="{{$asset->digunakan}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="sisa"><strong>Stock Sisa</strong></label>
                        <input type="number" class="form-control" id="sisa" value="{{$asset->sisa}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="satuan"><strong>Satuan</strong></label>
                        <input type="text" class="form-control" id="satuan" value="{{$asset->satuan}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="jumlah"><strong>Jumlah</strong></label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah')}}" name="jumlah" required autocomplete="jumlah" id="jumlah" autofocus>
                        @error('jumlah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ket"><strong>Keterangan</strong></label>
                        <input type="text" class="form-control @error('ket') is-invalid @enderror" value="{{ old('ket')}}" name="ket" required autocomplete="ket" id="ket">
                        @error('ket')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pencatat"><strong>Nama Pencatat</strong></label>
                        <input type="text" class="form-control" id="pencatat" name="pencatat" value="{{Auth::user()->name}}" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
