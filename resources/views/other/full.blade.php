@extends('full_approval')

@section('judul_halaman', 'Table Other Full Approval')


@section('konten')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                    <h2 class="card-title">Table Full Approval Cleaning</h2>
                </div> --}}
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Permit</th>
                                <th>Date of Request</th>
                                <th>Visitor Name</th>
                                <th>Purpose Work</th>
                                <th>Validity</th>
                                <th>Status</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{$num = 1}}
                            @foreach($otherFull as $p)
                                <tr>
                                    <td>{{ $p->other_id }}</td>
                                    <td>{{Carbon\Carbon::parse($p->other_date)->format('d-m-Y H:i')}}</td>
                                    <td>- {{ $p->other_name }}<br>
                                        - {{ $p->other_name2}}</td>
                                    <td>{{ $p->other_work }}</td>
                                    <td>{{Carbon\Carbon::parse($p->val_from)->format('d-m-Y')}}</td>
                                    <td>{{ $p->status }}</td>
                                    <td><a href="{{ $p->link }}">PDF</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
