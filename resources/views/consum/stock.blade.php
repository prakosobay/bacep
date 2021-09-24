@extends('layouts.barang')
@section('title', 'Semua Post')
@section('content')
<div class="wrapper">
<h1 style="text-align: center;">Semua Barang Consum</h1>


{{-- <table style="width:100%">
    <thead>
    <tr>
        <th>Kode barang</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Satuan</th>
        <th>Kondisi</th>
        <th>Notes</th>
        <th>Lokasi</th>
        <th>Tambah</th>
        <th>Kurang</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($consum as $c)
    <tr>
        <td style="width: 200px" >{{ $c->consum_id}}</td>
        <td style="width: 600px" >{{ $c->nama_barang}}</td>
        <td style="width: 300px" >{{ $c->jumlah }}</td>
        <td style="width: 500px" >{{ $c->satuan }}</td>
        <td style="width: 500px" >kondisi brg</td>
        <td style="width: 500px" >{{ $c->notes }}</td>
        <td style="width: 500px" >{{ $c->lokasi }}</td>
        <td style="width: 300px"><button class="btn-green">Tambah</button></td>
        <td style="width: 300px"><button class="btn-red">Kurang</button></td>
    </tr>
    @endforeach
    </tbody>
</table> --}}


                {{-- <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="file" required>
                    </div>
                </form> --}}


{{-- </div> --}}
@endsection
