@extends('layouts.barang')
@section('judul_halaman', 'Gambar Barang')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Gambar Barang</th>
                                    <th>Ket</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gambar as $g)
                                <tr>
                                    <td>{{ $g->id}}</td>
                                    <td>{{ $g->nama_barang}}</td>
                                    <td>gambar </td>
                                    <td>{{ $g->ket}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
