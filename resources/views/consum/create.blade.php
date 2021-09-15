@extends('layouts.barang')

@section('title', 'Tambah Barang')
@section('content')
<div class="wrapper">
    <h1>Tambah Barang Baru</h1>

    @if (session('success'))
    <div class="alert-success">
    <p>{{ session('success') }}</p>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
    @endif

    <form method="POST" action="{{ url('barang') }}">
        @csrf
        <input name="nama_barang" type="text" placeholder="barang...">
        <input name="jumlah" type="number" placeholder="jumlah...">
        <input name="satuan" type="text" placeholder="satuan...">
        <input name="notes" type="text" placeholder="notes...">
        <input name="lokasi" type="text" placeholder="lokasi...">
        <button class="btn-blue">Submit</button>
    </form>
</div>
@endsection
