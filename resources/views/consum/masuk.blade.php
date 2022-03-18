@extends('layouts.dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center">Data Barang Consumable</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Barang Masuk</h6>
            <a href="{{url('/export.c.m')}}" type="button" class="btn btn-success mr-5" >
                <strong>Export Excel</strong>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Item Code</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Ket</th>
                            <th>Tanggal</th>
                            <th>Pencatat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($in as $c)
                            <tr>
                                <td>{{$c->consum_id}}</td>
                                <td>{{$c->itemcode}}</td>
                                <td>{{$c->nama_barang}}</td>
                                <td>{{$c->jumlah}}</td>
                                <td>{{$c->ket}}</td>
                                <td>{{$c->tanggal}}</td>
                                <td>{{$c->pencatat}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
