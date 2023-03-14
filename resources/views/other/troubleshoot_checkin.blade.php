<!DOCTYPE html>
<html lang="en">
<head>
	<title>
        Checkin Form Troubleshoot
    </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
    {{-- <link href="{{asset('css/new_approve.css')}}" rel="stylesheet"> --}}
</head>
<!--===============================================================================================-->

<body>
	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" id="troubleshoot_form" method="POST" action="{{ route('troubleshootCheckinUpdate', $getVisitor->id)}}">
                @method('PUT')
                @csrf
				<span class="contact100-form-title">
					Checkin Visitor
				</span>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('gagal'))
                    <div class="alert alert-danger text-center">
                        {{ session('gagal') }}
                    </div>
                @endif

                {{-- Purpose of Work (Tujuan Pekerjaan)--}}
				<div class="wrap-input100 validate-input bg1" data-validate="Pilih Tujuan Pekerjaan">
					<span class="label-input100">Purpose of Work (Tujuan Pekerjaan) *</span>
					<input class="input100" type="text" value="{{ $getVisitor->troubleshootBmId->work }}" readonly>
				</div>

                {{-- Validity --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Pilih Tanggal Pekerjaan">
					<span class="label-input100">Date of Visit (Tanggal Mulai Pekerjaan) *</span>
                    <input class="input100" type="date" value="{{ $getVisitor->troubleshootBmId->visit }}" readonly>
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Pilih Tanggal Pekerjaan">
					<span class="label-input100">Date of Leave (Tanggal Selesai Pekerjaan) *</span>
					<input class="input100" type="date" value="{{ $getVisitor->troubleshootBmId->leave }}" readonly>
				</div>

                {{-- Visitor --}}
                <table class="table table-bordered bg1">
                    <tr>
                        <th colspan="4"><b>Visitor</b></th>
                    </tr>
                    <tr>
                        <th>Name </th>
                        <td>
                            <input type="text" class="input100" name="name" value="{{ $getVisitor->nama }}" required>
                        </td>
                        <th>Company</th>
                        <td>
                            <input type="text" class="input100" name="company" value="{{ $getVisitor->company }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>ID Number </th>
                        <td>
                            <input type="text" class="input100" name="number" value="{{ $getVisitor->numberId }}" required>
                        </td>
                        <th>Department </th>
                        <td>
                            <input type="text" class="input100" name="department" value="{{ $getVisitor->department }}" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>
                            <input type="text" class="input100" name="phone" value="{{ $getVisitor->phone }}" placeholder="+62 8xxx" required>
                        </td>
                        <th>Responsibility </th>
                        <td>
                            <input type="text" class="input100" name="respon" value="{{ $getVisitor->respon }}" required>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <span>Take A Selfie</span>
                            <div class="container" id="my_camera"></div><br>
                            <input type="button" value="Take Snapshot" class="btn btn-sm btn-primary" onclick="take_snapshot()" required>
                        </th>
                        <th colspan="2" class="py-5">
                            <div class="container" id="results"></div><br>
                            <input class="@error('photo_checkin') is-invalid @enderror" type="hidden" name="photo_checkin" id="image" required>
                            @error('photo_checkin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span><br>
                            @enderror
                            <input type="time" class="@error('checkin') is-invalid @enderror" name="checkin" id="checkin" value="" readonly required>
                            @error('checkin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </th>
                    </tr>
                </table>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" id="submit_form">
						<span>
							Checkin
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
<!--===============================================================================================-->
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/select2/select2.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Webcam --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

{{--add table--}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

    Webcam.set({
        width: 400,
        height: 300,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach( '#my_camera' );
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $("#image").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
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
</body>
</html>
