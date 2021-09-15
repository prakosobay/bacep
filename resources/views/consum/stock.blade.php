@extends('layouts.app')
@section('title', 'Semua Post')
@section('content')
<div class="wrapper">
<h1 style="text-align: center;">Semua Barang Consum</h1>
<table style="width:100%">
    <thead>
    <tr>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Satuan</th>
        <th>Notes</th>
        <th>Lokasi</th>
        <th>Edit</th>
        <th>Hapus</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($consum as $c)
    <tr>
        <td style="width: 200px" >{{ $c->nama_barang}}</td>
        <td style="width: 500px" >{{ $c->jumlah }}</td>
        <td style="width: 500px" >{{ $c->satuan }}</td>
        <td style="width: 500px" >{{ $c->notes }}</td>
        <td style="width: 500px" >{{ $c->lokasi }}</td>
        <td style="width: 100px"><button class="btn-green">Edit</button></td>
        <td style="width: 100px"><button class="btn-red">Hapus</button></td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection
