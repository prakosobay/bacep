@extends('layouts.dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Tambah Barang Asset Baru</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">


        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" action="{{url('asset_new')}}" class="validate-form">
                    @csrf
                    <div class="form-group">
                        <label for="nama_barang"><strong>Nama Barang</strong></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama_barang" required autocomplete="nama" id="nama_barang" placeholder="Nama Barang" autofocus>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="jumlah"><strong>Jumlah</strong></label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" required autocomplete="jumlah" id="jumlah" placeholder="Jumlah">
                        @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="note"><strong>Note</strong></label>
                        <input type="text" class="form-control @error('note') is-invalid @enderror" name="note" required autocomplete="note" id="note" placeholder="Note">
                        @error('note')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="lokasi"><strong>Lokasi</strong></label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" required autocomplete="lokasi" id="lokasi" placeholder="Lokasi">
                        @error('lokasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="satuan"><strong>Satuan</strong></label>
                        <select class="form-control" name="satuan" id="satuan">
                            <option>Unit</option>
                            <option>Roll</option>
                            <option>Set</option>
                            <option>Pasang</option>
                            <option>Box</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pencatat"><strong>Nama Pencatat</strong></label>
                        <input type="text" class="form-control" name="pencatat" id="pencatat" value="{{Auth::user()->name}}" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
