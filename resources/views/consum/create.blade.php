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

    <form method="POST" action="{{ url('barang') }}" enctype="multipart/form-data">
        @csrf
        <input name="nama_barang" type="text" placeholder="barang...">
        <input name="jumlah" type="number" placeholder="jumlah...">
        <select name="satuan">
            <option value="Unit">Unit</option>
            <option value="Pasang">Pasang</option>
            <option value="Pcs">Pcs</option>
            <option value="Pack">Pack</option>
         </select>
        <input name="notes" type="text" placeholder="notes...">
        <input name="file" type="file" >
        <select name="lokasi">
            <option value="Gudang">Gudang</option>
            <option value="Office">Office</option>
         </select >
        <button class="btn-blue">Submit</button>
    </form>
</div>
@endsection
