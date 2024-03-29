<!DOCTYPE html>
<html lang="en">
<head>
	<title>Checkout Cleaning</title>
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
    @include('sweetalert::alert')

	<div class="container-contact100">
		<div class="wrap-contact100">
			<form id="form_cleaning" class="contact100-form validate-form" enctype="multipart/form-data" method="POST" action="{{ url('cleaning/checkout', $getForm->cleaning_id)}}">
                @csrf
                @method('PUT')

				<span class="contact100-form-title">
					Checkout Cleaner Team
				</span>

                @if (session('status'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- Purpose of Work --}}
                <div class="wrap-input100 bg0 rs1-alert-validate">
					<span class="label-input100">Purpose of Work *</span>
					<input type="text" class="input100" name="cleaning_work" id="purpose" value="{{$getForm->cleaning_work}}" readonly>
				</div>

                {{-- Validity --}}
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Pilih Tanggal Pekerjaan">
					<span class="label-input100">Validity (Tanggal Mulai Pekerjaan) *</span>
                    <input class="input100" type="date" name="validity_from" id="dateofbirth" value="{{$getForm->validity_from}}" readonly>
				</div>
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Pilih Tanggal Pekerjaan">
					<span class="label-input100">Validity (Tanggal Selesai Pekerjaan) *</span>
					<input class="input100" type="date" name="validity_to" id="dateofbirth" value="{{$getForm->validity_to}}" readonly>
				</div>

                {{-- Pilih Personil --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Pilih Personil">
					<span class="label-input100">Person In Charge 1(Nama Personil 1) *</span>
                    <div>
                        <input type="text" class="input100" name="cleaning_name" id="purpose" value="{{$getForm->cleaning_name}}" readonly>
                    </div>
				</div>
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Pilih Personil">
					<span class="label-input100">Person In Charge 2(Nama Personil 2) *</span>
                    <div>
                        <input type="text" class="input100" name="cleaning_name2" id="purpose" value="{{$getForm->cleaning_name2}}" readonly>
                    </div>
				</div>

                {{-- Phone Number --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Number Phone (Nomor HP Personil 1)</span>
                    <input type="text" class="input100" name="cleaning_number" id="phone_number" value="{{$getForm->cleaning_number}}" readonly>
				</div>
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Number Phone (Nomor HP Personil 2)</span>
                    <input type="text" class="input100" name="cleaning_number2" id="phone_number2" value="{{$getForm->cleaning_number2}}" readonly>
				</div>

                {{-- NIK  --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">ID Number (NIK Personil 1)</span>
                    <input type="text" class="input100" name="cleaning_nik" id="id_number" value="{{$getForm->cleaning_nik}}" readonly>
				</div>
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">ID Number (NIK Personil 2)</span>
                    <input type="text" class="input100" name="cleaning_nik_2" id="id_number2" value="{{$getForm->cleaning_nik_2}}" readonly>
				</div>

                {{-- selfie & checkin 1--}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                    <div class="row justify-content-center">
                        <span class="label-input100">Checkin Personil 1</span><br>
                        <img src="{{ url('storage/bm/cleaning/checkin/'.$getFull->photo_checkin_personil) }}" alt="">
                    </div>
				</div>

                {{-- selfie & checkin 2 --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                    <div class="row justify-content-center">
                        <span class="label-input100">Checkin Personil 2</span><br>
                        <img src="{{ url('storage/bm/cleaning/checkin/'.$getFull->photo_checkin_personil2) }}" alt="">
                    </div>
				</div>

                {{-- selfie & checkout 1--}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Take a selfie (Personil 1)</span>
                    <div class="row justify-content-center">
                        <div id="my_camera"></div>
                    </div>
                    <div class="row justify-content-center">
                        <input type=button class="btn btn-primary btn-sm" value="Take Snapshot" onclick="take_snapshot()" required>
                    </div>
                    <div class="row justify-content-center">
                        <input class="@error('photo_personil') is-invalid
                        @enderror" required autocomplete="photo_personil" type="hidden" name="photo_personil" id="image">
                        @error('photo_personil')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row justify-content-center my-2">
                        <input type="time" class="@error('checkout_personil')@enderror" name="checkout_personil" id="checkout_personil" value="" required autocomplete="checkout_personil" readonly>
                        @error('checkout_personil')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
				</div>
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                    <span class="label-input100"><b>Your captured image will appear here...</b></span>
                    <div class="row justify-content-center">
                        <div id="results"></div>
                    </div>
                </div>

                {{-- selfie & checkout 2 --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Take a selfie (Personil 2)</span>
                    <div class="row justify-content-center">
                        <div id="my_camera2"></div>
                    </div>
                    <div class="row justify-content-center">
                        <input type=button class="btn btn-primary btn-sm" value="Take Snapshot" onclick="take_snapshot2()" required>
                    </div>
                    <div class="row justify-content-center" >
                        <div class="row justify-content-center">
                            <input class="@error('photo_personil2') is-invalid
                            @enderror" required autocomplete="photo_personil2" type="hidden" name="photo_personil2" id="image2">
                            @error('photo_personil2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center my-2">
                        <input type="time" class="@error('checkout_personil2')@enderror" name="checkout_personil2" id="checkout_personil2" value="" required autocomplete="checkout_personil2" readonly>
                        @error('checkout_personil2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
				</div>
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                    <span class="label-input100"><b>Your captured image will appear here...</b></span>
                    <div class="row justify-content-center">
                        <div id="results2"></div>
                    </div>
                </div>



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
	<script type="text/javascript">
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})

        $('#pilihan1').change(function(){
            let id = $(this).val();
            $.ajax({
                url: "{{url("/detail")}}"+'/'+id,
                dataType:"json",
                type: "get",
                success: function(response){
                    const {data} = response;
                    console.log(data)
                $('#phone_number').val(data.phone_number);
                $('#id_number').val(data.id_number);
                }
            });
        });

        $('#pilihan2').change(function(){
            let id = $(this).val();
            $.ajax({
                url: "{{url("/detail")}}"+'/'+id,
                dataType:"json",
                type: "get",
                success: function(response){
                    const {data} = response;
                    console.log(data)
                $('#phone_number2').val(data.phone_number);
                $('#id_number2').val(data.id_number);
                }
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });

        Webcam.set({
            width: 490,
            height: 390,
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
            $("#checkout_personil").val(waktu);
        }

        Webcam.attach( '#my_camera2' );
        function take_snapshot2() {
            Webcam.snap( function(data_uri) {
                $("#image2").val(data_uri);
                document.getElementById('results2').innerHTML = '<img src="'+data_uri+'"/>';
            });
            var tanggal = new Date();
            var jam = tanggal.getHours();
            var menit = tanggal.getMinutes();
            var detik = tanggal.getSeconds();
            jam = jam < 10 ? '0' +jam : jam;
            menit = menit < 10 ? '0'+menit : menit;
            detik = detik < 10 ? '0'+detik : detik;
            var waktu = jam + ':' + menit + ':' + detik;

            $("#checkout_personil2").val(waktu);
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
