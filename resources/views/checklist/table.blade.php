@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Data Checklist Genset</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary mr-5 sm" href="{{url('table_user')}}">
                Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="2" >No. </th>
                            <th colspan="2" >Generator 1</th>
                            <th colspan="2" >Generator 2</th>
                            <th rowspan="2">Penginput</th>
                            <th rowspan="2">Action</th>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        {{$num = 1}}
                        @foreach ($table as $c)
                            <tr>
                                <td>{{$num++}}</td>
                                <td>{{$c->date1}}</td>
                                <td>{{$c->time1}}</td>
                                <td>{{$c->date2}}</td>
                                <td>{{$c->time2}}</td>
                                <td>{{$c->penginput}}</td>
                                <td>
                                    <a href="{{url('c.show', $c->id)}}" type="button" class="btn btn-success btn-md mr-3" id="in">Detail</a>
                                    <a href="{{url('c.pdf', $c->id)}}" type="button" class="btn btn-danger btn-md" id="out">PDF</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
@endsection
