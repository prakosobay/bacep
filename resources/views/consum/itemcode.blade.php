@extends('layouts.barang')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800 text-center">Data Barang Consumable</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-1">
            <a type="button" class="btn btn-primary mx-2 my-2 sm" href="{{url('consum/table/show')}}">
                Kembali
            </a>

            @if (session('Gagal'))
                <div class="alert alert-danger mt-1">
                    {{ session('Gagal') }}
                </div>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" id="asset" class="validate-form" action="{{url('consum/update/itemcode', $consum->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nama_barang"><strong>Nama Barang</strong></label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{$consum->nama_barang}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="id"><strong>Kode Barang</strong></label>
                        <input type="number" class="form-control" id="id" name="asset_id" value="{{$consum->id}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="itemcode"><strong>Item Code</strong></label>
                        <input type="number" class="form-control @error('itemcode') is-invalid @enderror" required autocomplete="itemcode"
                        id="itemcode" name="itemcode" value="{{ $consum->itemcode}}" autofocus>
                        @error('itemcode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="satuan"><strong>Satuan</strong></label>
                        <input type="text" class="form-control" id="satuan" value="{{$consum->satuan}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="jumlah"><strong>Jumlah</strong></label>
                        <input type="number" class="form-control"
                        id="jumlah" name="jumlah" value="{{ $consum->jumlah}}" readonly>
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
