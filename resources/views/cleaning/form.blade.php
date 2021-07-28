<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V5</title>
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
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					FORM
				</span>

				<div class="wrap-input100 validate-input bg1" data-validate="Pilih Tujuan Pekerjaan">
					<span class="label-input100">Tujuan Pekerjaan *</span>
                    <div>
                        <select class="js-select2" name="cleaning_work">
                            <option value=""></option>
                            @foreach($pilihanwork as $p)
                            <option value="{{ $p->id }}">{{ $p->work }}</option>
                            @endforeach
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Pilih Tanggal Pekerjaan">
					<span class="label-input100">Tanggal Mulai Pekerjaan *</span>
                    <input class="input100" type="date" name="validity_from" id="dateofbirth">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Pilih Tanggal Pekerjaan">
					<span class="label-input100">Tanggal Selesai Pekerjaan *</span>
					<input class="input100" type="date" name="validity_to" id="dateofbirth">
				</div>

                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Pilih Personil">
					<span class="label-input100">Nama Personil 1 *</span>
                    <div>
                        <select class="js-select2" id="pilihan1" name="cleaning_nama">
                            <option value=""></option>
                            @foreach($master_ob as $p)
                            <option value="{{ $p->ob_id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
				</div>

                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Pilih Personil">
					<span class="label-input100">Nama Personil 2 *</span>
                    <div>
                        <select class="js-select2" id="pilihan2" name="cleaning_nama">
                            <option value=""></option>
                            @foreach($master_ob as $p)
                            <option value="{{ $p->ob_id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
				</div>

                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Nomor HP Personil 1</span>
                    <input type="text" class="input100" name="cleaning_number_1" id="phone_number" value="" readonly>
				</div>

                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Nomor HP Personil 2</span>
                    <input type="text" class="input100" name="cleaning_number_2" id="phone_number2" value="" readonly>
				</div>

                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">NIK Personil 1</span>
                    <input type="text" class="input100" name="cleaning_id_1" id="id_number" value="" readonly>
				</div>

                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">NIK Personil 2</span>
                    <input type="text" class="input100" name="cleaning_id_2" id="id_number2" value="" readonly>
				</div>

				<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
					<span class="label-input100">Background and Objective (Jenis Pekerjaan) *</span>
					<textarea class="input100" name="message" placeholder="Your message here..."></textarea>
				</div>

                <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
					<span class="label-input100">Description os Scope of Work (Deskripsikan Pekerjaan) *</span>
					<textarea class="input100" name="message" placeholder="Your message here..."></textarea>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Submit
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
