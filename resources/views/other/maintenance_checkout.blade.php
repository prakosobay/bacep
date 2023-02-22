<!DOCTYPE html>
<html lang="en">
<head>
	<title>Checkout Visitor</title>
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
<!--===============================================================================================-->
</head>
<body>

	<div class="container-contact100">
		<div class="wrap-contact100">
			<form id="maintenance_form" class="contact100-form validate-form" method="POST" action="{{ route('maintenanceCheckoutUpdate', $getVisitor->id)}}">
                @method('PUT')
                @csrf
				<span class="contact100-form-title">
					Checkout Visitor
				</span>

                @if (session('gagal'))
                    <div class="alert alert-warning my-2 mx-2">
                        {{ session('gagal') }}
                    </div>
                @endif

                {{-- Purpose of Work --}}
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Purpose of Work (Tujuan Pekerjaan) *</span>
                    <div>
					    <input type="text" class="input100" value="{{ $getVisitor->other->work }}" readonly>
                    </div>
				</div>

                {{-- Visit --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Date of Visit (Tanggal Mulai Pekerjaan)</span>
                    <input class="input100" type="date" value="{{ $getVisitor->other->visit }}" readonly>
				</div>

                {{-- Leave --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Date of Leave (Tanggal Selesai Pekerjaan)</span>
                    <input class="input100" type="date" value="{{ $getVisitor->other->leave }}" readonly>
				</div>

                {{-- Visitor --}}
                <table class="table table-bordered bg1">
                    <tr>
                        <th colspan="2"><b>Visitor</b></th>
                        <th colspan="2"><b>Checkin</b></th>
                    </tr>
                    <tr>
                        <th>Name </th>
                        <td>
                            <input type="text" class="input100" name="name" value="{{ $getVisitor->name }}" readonly>
                        </td>
                        <td colspan="2" rowspan="6">
                            {{-- <img src="{{ url('storage/bm/maintenance/checkin/'.$getVisitor->photo_checkin)}}" alt=""> --}}
                        </td>
                    </tr>
                    <tr>
                        <th>Company</th>
                        <td>
                            <input type="text" class="input100" name="company" value="{{ $getVisitor->company }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>ID Number </th>
                        <td>
                            <input type="text" class="input100" name="number" value="{{ $getVisitor->number }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Department </th>
                        <td>
                            <input type="text" class="input100" name="department" value="{{ $getVisitor->department }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>
                            <input type="text" class="input100" name="phone" value="{{ $getVisitor->phone }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Responsibility </th>
                        <td>
                            <input type="text" class="input100" name="respon" value="{{ $getVisitor->respon }}" readonly>
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
                            <input class="@error('photo_checkout') is-invalid @enderror" type="hidden" name="photo_checkout" id="image" required>
                            @error('photo_checkout')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span><br>
                            @enderror
                            <input type="time" class="@error('checkout') is-invalid @enderror" name="checkout" id="checkout" value="" readonly required>
                            @error('checkout')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </th>
                    </tr>
                </table>


				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn">
						<span>
							Checkout
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

	<script>

		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		});

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
                $("#checkout").val(waktu);
            }

    </script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/main.js')}}"></script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
