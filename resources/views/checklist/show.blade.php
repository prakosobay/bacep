@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Detail Checklist Genset</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary mr-5 sm" href="{{url('checklist.table')}}">
                Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm">
                    <label class="text-center"><strong>Generator 1</strong></label>
                    <div class="form-group row">
                        <label for="tanggal1" class="col-sm-2 col-form-label"><strong>Tanggal :</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tanggal1" value="{{Carbon\Carbon::parse($show->date1)->format('d-m-Y')}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="time1" class="col-sm-2 col-form-label"><strong>Waktu :</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="time1" value="{{Carbon\Carbon::parse($show->time1)->format('d-m-Y')}}" readonly>
                        </div>
                    </div>

                    <label for="tighten" class="col-sm-10 col-form-label"><strong>1. Tighten Battery Connection :</strong></label>
                    <div class="form-group row">
                        @if($show->input1 == '0')
                        <input type="text" class="form-control col-sm-3 ml-3" id="tighten" value="NOT OK" readonly>
                        @elseif($show->input1 == '1')
                        <input type="text" class="form-control col-sm-3 ml-3" id="tighten" value="OK" readonly>
                        @endif
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="tighten" value="{{$show->remark1}}" readonly>
                        </div>
                    </div>

                    <label for="tighten" class="col-sm-10 col-form-label"><strong>2. Measurement Battery Voltage (Open Circuit) :</strong></label>
                    <div class="form-group row">
                        @if($show->input2 == '0')
                        <input type="text" class="form-control col-sm-3 ml-3" id="tighten" value="NOT OK" readonly>
                        @elseif($show->input2 == '1')
                        <input type="text" class="form-control col-sm-3 ml-3" id="tighten" value="OK" readonly>
                        @endif
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="tighten" value="{{$show->remark2}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <label class="text-center"><strong>Generator 2</strong></label>
                    {{-- <div class="table-responsive">
                        <div class="form-group">

                            <label for="stok"><strong>Stock Saat Ini</strong></label>
                            <input type="number" class="form-control" id="stok" value="" readonly>

                            <label for="jumlah"><strong>Jumlah</strong></label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" required autocomplete="jumlah" id="jumlah" name="jumlah" autofocus>

                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
