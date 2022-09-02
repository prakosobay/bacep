@extends('layouts.barang')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800 text-center">Data Barang Consum</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary mr-5 sm" href="{{ route('consumTable') }}">
                Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" action="{{ route('consumStore') }}" class="validate-form">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama_barang" class="form-label"><strong>Nama Barang</strong></label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"  value="{{ old('nama_barang') }}" name="nama_barang" required autocomplete="nama_barang" id="nama_barang" placeholder="Nama Barang" autofocus>
                                @error('nama_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="itemcode" class="form-label"><strong>Item Code</strong></label>
                                <input type="text" class="form-control @error('itemcode') is-invalid @enderror"  value="{{ old('itemcode') }}" name="itemcode" required autocomplete="itemcode" id="itemcode" placeholder="Item Code">
                                @error('itemcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jumlah" class="form-label"><strong>Jumlah</strong></label>
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror"  value="{{ old('jumlah') }}" name="jumlah" required autocomplete="jumlah" id="jumlah" placeholder="Jumlah">
                                @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="note" class="form-label"><strong>Note</strong></label>
                                <input type="text" class="form-control @error('note') is-invalid @enderror"  value="{{ old('note') }}" name="note" required autocomplete="note" id="note" placeholder="Note">
                                @error('note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="lokasi" class="form-label"><strong>Lokasi</strong></label>
                                <input type="text" class="form-control @error('lokasi') is-invalid @enderror"  value="{{ old('lokasi') }}" name="lokasi" required autocomplete="lokasi" id="lokasi" placeholder="lokasi">
                                @error('lokasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="satuan" class="form-label"><strong>Satuan</strong></label>
                                <select class="form-control" name="satuan" id="satuan">
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
                        </div>
                        <div class="form-group">
                            <label for="pencatat" class="form-label"><strong>Nama Pencatat</strong></label>
                            <input type="text" class="form-control" name="pencatat" id="pencatat" value="{{Auth::user()->name}}" readonly>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
