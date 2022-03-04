@extends('layouts.dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Barang Asset Masuk</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary mr-5 sm" href="{{url('a.table')}}">
                Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" id="asset" class="validate-form" action="{{url('asset_putin', $asset->id)}}">
                    @method('PUT')
                    @csrf
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="nama_barang"><strong>Nama Barang</strong></label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{$asset->nama_barang}}" readonly><br>

                        <label for="id"><strong>Kode Barang</strong></label>
                        <input type="number" class="form-control" id="id" name="asset_id" value="{{$asset->id}}" readonly><br>

                        <label for="itemcode"><strong>Item Code</strong></label>
                        <input type="text" class="form-control" id="itemcode" name="itemcode" value="{{$asset->itemcode}}" readonly><br>

                        <label for="stok"><strong>Stock Total</strong></label>
                        <input type="number" class="form-control" id="stok" value="{{$asset->jumlah}}" readonly><br>

                        <label for="use"><strong>Stock Digunakan</strong></label>
                        <input type="number" class="form-control" id="use" value="{{$asset->use}}" readonly><br>

                        <label for="sisa"><strong>Stock Sisa</strong></label>
                        <input type="number" class="form-control" id="sisa" value="{{$asset->sisa}}" readonly><br>

                        <label for="satuan"><strong>Satuan</strong></label>
                        <input type="text" class="form-control" id="satuan" value="{{$asset->satuan}}" readonly><br>

                        <label for="jumlah"><strong>Jumlah</strong></label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" required autocomplete="jumlah" id="jumlah" name="jumlah" autofocus><br>
                            @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        <label for="ket"><strong>Keterangan</strong></label>
                        <input type="text" id="ket" name="ket" class="form-control @error('ket') is-invalid @enderror" required autocomplete="ket"><br>
                            @error('ket')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

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
