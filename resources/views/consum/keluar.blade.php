@extends('layouts.barang')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center">Data Barang Consumable</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Barang Keluar</h6>
            <a href="{{url('/export.c.k')}}" type="button" class="btn btn-success mr-5" >
                <strong>Export Excel</strong>
            </a>

            <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#import_keluar">
                IMPORT CSV
            </button>

            <!-- Import Excel -->
            <div class="modal fade" id="import_keluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ url('consum/import/keluar')}}" enctype="multipart/form-data">
                        @csrf
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
                            <th>Item Code</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Ket</th>
                            <th>Tanggal</th>
                            <th>Pencatat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($out as $c)
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
