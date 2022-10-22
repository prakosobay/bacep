@extends('layouts.permit')
@section('content')
<div class="container my-5">
    <div class="card">
        <h1 class="text-center my-3 h1Permit">CHECKIN VISITOR</h1>
        <form action="{{ route('internalCheckinUpdate', Crypt::encrypt($getVisitor->id))}}" method="POST" class="validate-form">
            @method('put')
            @csrf
            <div class="container form-container">

                <div class="container-fluid">
                    @if (session('gagal'))
                        <div class="alert alert-warning mx-2 my-2">
                            {{ session('gagal') }}
                        </div>
                    @endif
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Visitor --}}
                <div class="mb-3">
                    <table class="table table-bordered table-hover" id="table_visitor">
                        <thead>
                            <tr>
                                <th colspan="4">Visitor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td><input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $getVisitor->name }}" required></td>
                                <th>Phone Number</th>
                                <td><input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $getVisitor->phone }}" required></td>
                            </tr>
                            <tr>
                                <th>Number ID</th>
                                <td><input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ $getVisitor->nik }}" required></td>
                                <th>Company</th>
                                <th><input type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ $getVisitor->company }}" readonly></th>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td><input type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ $getVisitor->department }}" required></td>
                                <th>Responsibility</th>
                                <td><input type="text" class="form-control @error('respon') is-invalid @enderror" name="respon" value="{{ $getVisitor->respon }}"></td>
                            </tr>
                            <tr>
                                <th>Card Number :</th>
                                <td>
                                    <select name="card" id="card" class="form-select" required>
                                            <option value=""></option>
                                        @foreach($getCards as $card)
                                            <option value="{{ $card->id }}">{{ $card->number }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <span>Take A Selfie {{ $getVisitor->name }}</span>
                                    <div class="container" id="my_camera"></div>
                                    <input type="button" value="Take Snapshot" class="btn btn-sm btn-primary" onclick="take_snapshot()" required>
                                </th>
                                <th colspan="2" class="py-5">
                                    <div class="container" id="results"></div><br>
                                    <input class="@error('photo_checkin') is-invalid @enderror" required autocomplete="photo_checkin" type="hidden" name="photo_checkin" id="image">
                                    <input type="time" class="@error('checkin') is-invalid @enderror" name="checkin" id="checkin" value="" required autocomplete="checkin" readonly>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-lg btn-success mx-2">Checkin</button>
            </div>
        </form>
    </div>
</div>
@stack('script')

{{-- Webcam --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

    Webcam.set({
        width: 450,
        height: 400,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach( '#my_camera' );
        function take_snapshot() {
            Webcam.snap( function(data_uri) {
                $("#image").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="'+data_uri+'" width="400px"/>';
            });
            var tanggal = new Date();
            var jam = tanggal.getHours();
            var menit = tanggal.getMinutes();
            var detik = tanggal.getSeconds();
            jam = jam < 10 ? '0' +jam : jam;
            menit = menit < 10 ? '0'+menit : menit;
            detik = detik < 10 ? '0'+detik : detik;
            var waktu = jam + ':' + menit + ':' + detik;
            $("#checkin").val(waktu);
        }
</script>
@endsection
