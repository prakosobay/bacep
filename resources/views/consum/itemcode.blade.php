@extends('layouts.barang')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800 text-center">Data Barang Consumable</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-1">
            <a type="button" class="btn btn-primary mx-2 my-2 sm" href="{{ route('consumTable') }}">
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
                <form method="post" id="asset" class="validate-form" action="{{ route('consumUpdateItemcode', $consum->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nama_barang"><strong>Nama Barang</strong></label>
                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ $consum->nama_barang }}" required>
                        @error('nama_barang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="consum_id"><strong>Kode Barang</strong></label>
                        <input type="number" class="form-control" id="consum_id" name="consum_id" value="{{ $consum->id }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="itemcode"><strong>Item Code</strong></label>
                        <input type="number" class="form-control @error('itemcode') is-invalid @enderror" required
                        id="itemcode" name="itemcode" value="{{ $consum->itemcode}}" autofocus>
                        @error('itemcode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="satuan"><strong>Satuan</strong></label>
                        <select class="form-control" name="satuan" id="satuan" required>
                            <option selected value="{{ $consum->satuan }}">{{ $consum->satuan }}</option>
                            <option value="unit">Unit</option>
                            <option value="roll">Roll</option>
                            <option value="set">Set</option>
                            <option value="pasang">Pasang</option>
                            <option value="box">Box</option>
                            <option value="pack">Pack</option>
                            <option value="rim">Rim</option>
                            <option value="meter">Meter</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="lokasi"><strong>Lokasi</strong></label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ $consum->lokasi }}" required>
                        @error('lokasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
