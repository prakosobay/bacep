@extends('layouts.permit')
@section('content')
<div class="container my-5">
    <div class="card">
        <h1 class="text-center my-3 h1Permit">CHECKOUT VISITOR</h1>
        <form action="{{ url('internal/checkout/update', $getVisitor->id)}}" method="POST" class="validate-form">
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
                                <td><input type="text" class="form-control" value="{{ $getVisitor->name }}" readonly></td>
                                <th>Phone Number</th>
                                <td><input type="text" class="form-control" value="{{ $getVisitor->phone }}" readonly></td>
                            </tr>
                            <tr>
                                <th>Number ID</th>
                                <td><input type="text" class="form-control" value="{{ $getVisitor->numberId }}" readonly></td>
                                <th>Company</th>
                                <th><input type="text" class="form-control" value="{{ $getVisitor->company }}" readonly></th>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td><input type="text" class="form-control" value="{{ $getVisitor->department }}" readonly></td>
                                <th>Responsibility</th>
                                <td><input type="text" class="form-control" value="{{ $getVisitor->respon }}" readonly></td>
                            </tr>
                            <tr>
                                <th colspan="4" class="py-5">
                                    <div class="form-group">
                                        <label for="photo_checkin" class="form-label">Checkin Photo </label><br>
                                        <img src="{{ asset('storage/' . $getVisitor->photo_checkin) }}" alt="" width="400px">
                                    </div>
                                    <div class="form-group">
                                        <label for="checkin" class="form-label">Checkin Time :</label>
                                        <input type="time"  id="checkin" value="{{ $getVisitor->checkin }}" readonly>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <span>Take A Selfie, {{ $getVisitor->name }}</span>
                                    <div class="container" id="my_camera"></div>
                                    <input type="button" value="Take Snapshot" class="btn btn-sm btn-primary" onclick="take_snapshot()" required>
                                </th>
                                <th colspan="2" class="py-5">
                                    <div class="container" id="results"></div><br>
                                    <input class="@error('photo_checkout') is-invalid @enderror" required autocomplete="photo_checkout" type="hidden" name="photo_checkout" id="image">
                                    <input type="time" class="@error('checkout') is-invalid @enderror" name="checkout" id="checkout" value="" required autocomplete="checkout" readonly>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-lg btn-success mx-2">Checkout</button>
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
            $("#checkout").val(waktu);
        }
</script>
@endsection
