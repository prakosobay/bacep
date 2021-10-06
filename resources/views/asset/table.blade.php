@extends('layouts.dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center">Data Barang Asset</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#asset">
                IMPORT CSV
            </button>

            <a href="{{url('/a.new')}}" type="button" class="btn btn-primary mr-5" >
                <strong>Tambahkan Barang Asset Baru</strong>
            </a>

            <!-- Import Excel -->
            <div class="modal fade" id="asset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ url('/asset')}}" enctype="multipart/form-data">
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

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Kondisi</th>
                            <th>Note</th>
                            <th>Lokasi Penyimpanan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asset as $c)
                            <tr>
                                <td>{{$c->id}}</td>
                                <td>{{$c->nama_barang}}</td>
                                <td>{{$c->jumlah}}</td>
                                <td>{{$c->satuan}}</td>
                                <td>{{$c->kondisi}}</td>
                                <td>{{$c->note}}</td>
                                <td>{{$c->lokasi}}</td>
                                <td>
                                    <a type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#masuk" data-id="{{$c->id}}" id="in">Masuk</a>
                                    <a type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#keluar" data-id="{{$c->id}}" id="out">Keluar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Masuk -->
    <div class="modal fade" id="masuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ url('/update.masuk', $c->id)}}" id="#in">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Barang Masuk</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Pencatat</label>
                            <input type="text" name="pencatat" id="pencatat" value="{{Auth::user()->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" aria-describedby="jumlah">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input width="100%" type="text" name="ket" id="ket" aria-describedby="ket">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Keluar --}}
    <div class="modal fade" id="keluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ url('/update.keluar', $c->id)}}">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Barang Keluar</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Pencatat</label>
                            <input type="text" name="pencatat" id="pencatat" value="{{Auth::user()->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" aria-describedby="jumlah">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input width="100%" type="text" name="ket" id="ket" aria-describedby="ket">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
@endsection
