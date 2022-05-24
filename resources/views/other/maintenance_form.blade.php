<!DOCTYPE html>
<html lang="en">
<head>
	<title>Form Maintenance</title>
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
			<form id="maintenance_form" class="contact100-form validate-form" method="POST" action="{{ url('other/maintenance/create')}}">
                @csrf
				<span class="contact100-form-title">
					FORM MAINTENANCE
				</span>

                {{-- Purpose of Work --}}
				<div class="wrap-input100 validate-input bg1" data-validate="Isi Tujuan Pekerjaan">
					<span class="label-input100">Purpose of Work (Tujuan Pekerjaan) *</span>
                    <input type="text" class="input100" id="purpose_work" name="work" value="{{ old('work')}}" placeholder="Purpose of Work" autofocus>
				</div>

                {{-- Date of Visit --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate ="Pilih Tanggal Pekerjaan">
					<span class="label-input100">Date of Visit (Tanggal Mulai Pekerjaan) *</span>
                    <input class="input100" type="date" name="visit" id="visit">
				</div>

                {{-- Date of Leave --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate ="Pilih Tanggal Pekerjaan">
					<span class="label-input100">Date of Leave (Tanggal Selesai Pekerjaan) *</span>
                    <input class="input100" type="date" name="leave" id="leave">
				</div>

                {{-- Entry Area --}}
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio m-t-15">
                            <input class="input-radio100" id="server" type="checkbox" name="server" value="1">
                            <label class="label-radio100" for="server">
                                Server Room
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <input class="input-radio100" id="mmr1" type="checkbox" name="mmr1" value="1">
                            <label class="label-radio100" for="mmr1">
                                MMR 1
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <input class="input-radio100" id="mmr2" type="checkbox" name="mmr2" value="1">
                            <label class="label-radio100" for="mmr2">
                                MMR 2
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio m-t-15">
                            <input class="input-radio100" id="ups" type="checkbox" name="ups" value="1">
                            <label class="label-radio100" for="ups">
                                UPS Room
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <input class="input-radio100" id="fss" type="checkbox" name="fss" value="1">
                            <label class="label-radio100" for="fss">
                                FSS Room
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <input class="input-radio100" id="cctv" type="checkbox" name="cctv" value="1">
                            <label class="label-radio100" for="cctv">
                                CCTV Room
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio m-t-15">
                            <input class="input-radio100" id="genset" type="checkbox" name="genset" value="1">
                            <label class="label-radio100" for="genset">
                                Generator Room
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <input class="input-radio100" id="panel" type="checkbox" name="panel" value="1">
                            <label class="label-radio100" for="panel">
                                Panel Room
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <input class="input-radio100" id="batt" type="checkbox" name="batt" value="1">
                            <label class="label-radio100" for="batt">
                                Battery Room
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio m-t-15">
                            <input class="input-radio100" id="trafo" type="checkbox" name="trafo" value="1">
                            <label class="label-radio100" for="trafo">
                                Trafo Room
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <input class="input-radio100" id="parking" type="checkbox" name="parking" value="1">
                            <label class="label-radio100" for="parking">
                                Parking Lot
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <input class="input-radio100" id="yard" type="checkbox" name="yard" value="1">
                            <label class="label-radio100" for="yard">
                                Yard
                            </label>
                        </div>
                    </div>
                </div>
                <div class="wrap-input100 bg1">
					<span class="label-input100">Other (Lokasi Lain) *</span>
                    <input type="text" class="input100" id="other" name="other" value="{{ old('other')}}" placeholder="Lokasi lain">
				</div>

                {{-- Isian --}}
                <div class="wrap-input100 validate-input bg1" data-validate="Isi Latar Belakang">
					<span class="label-input100">Background and Objective (Latar Belakang dan Tujuan) *</span>
                    <textarea type="text" class="input100" name="background" id="background" placeholder="Background and Objective" value="{{old('background')}}"></textarea>
				</div>
                <div class="wrap-input100 validate-input bg1" data-validate="Isi Latar Belakang">
					<span class="label-input100">Description of Scope of Work (Deskripsi Pekerjaan) *</span>
                    <textarea type="text" class="input100" name="describ" id="describ" placeholder="Description of Scope of Work" value="{{old('describ')}}"></textarea>
				</div>
                <div class="wrap-input100 bg1">
					<span class="label-input100">Testing and Verification (Pengujian dan Verifikasi)</span>
					<input type="text" class="input100" name="testing" id="testing" value="{{old('testing')}}" placeholder="Testing & Verification">
				</div>
                <div class="wrap-input100 bg1">
					<span class="label-input100">Rollback Operation/Other Infomation (Operasi Pembatalan/Infomasi Lain)</span>
					<input type="text" class="input100" name="rollback" id="rollback" value="{{old('rollback')}}" placeholder="Rollback Operation">
				</div>

                <!-- Detail Time Activity -->
                {{-- <table class="table table-bordered bg1">
                    <thead>
                        <tr>
                            <th colspan="4">Detail Time Table of All Activity</th>
                        <tr>
                            <th scope="col">Time Start</th>
                            <th scope="col">Time End</th>
                            <th scope="col">Activity Description</th>
                            <th scope="col">Detail Service Impact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><input type="time" class="input100 validate-input" name="time_start[]"></th>
                            <th><input type="time" class="input100 validate-input" name="time_end[]"></th>
                            <th><input type="text" class="input100 validate-input" name="activity[]" value="{{ old('activity[]')}}"></th>
                            <th><input type="text" class="input100 validate-input" name="detail_service[]" value="{{ old('detail_service[]')}}"></th>
                        </tr>
                        <tr>
                            <th><input type="time" class="input100" name="time_start[]"></th>
                            <th><input type="time" class="input100" name="time_end[]"></th>
                            <th><input type="text" class="input100" name="activity[]" value="{{ old('activity[]')}}"></th>
                            <th><input type="text" class="input100" name="detail_service[]" value="{{ old('detail_service[]')}}"></th>
                        </tr>
                        <tr>
                            <th><input type="time" class="input100" name="time_start[]"></th>
                            <th><input type="time" class="input100" name="time_end[]"></th>
                            <th><input type="text" class="input100" name="activity[]" value="{{ old('activity[]')}}"></th>
                            <th><input type="text" class="input100" name="detail_service[]" value="{{ old('detail_service[]')}}"></th>
                        </tr>
                        <tr>
                            <th><input type="time" class="input100" name="time_start[]"></th>
                            <th><input type="time" class="input100" name="time_end[]"></th>
                            <th><input type="text" class="input100" name="activity[]" value="{{ old('activity[]')}}"></th>
                            <th><input type="text" class="input100" name="detail_service[]" value="{{ old('detail_service[]')}}"></th>
                        </tr>
                    </tbody>
                </table> --}}

                {{-- Detail Operation and Execution --}}
                {{-- <table class="table table-bordered bg1">
                    <thead>
                        <tr>
                            <th colspan="2">Detail Operation and Execution</th>
                        <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Working Procedure</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><input type="text" class="input100 validate-input" name="item[]" id="item" value="{{ old('item[]')}}"></th>
                            <th ><input type="text" class="input100 validate-input" name="procedure[]" value="{{ old('procedure[]')}}"></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item[]" id="item" value="{{ old('item[]')}}"></th>
                            <th ><input type="text" class="input100" name="procedure[]" value="{{ old('procedure[]')}}"></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item[]" id="item" value="{{ old('item[]')}}"></th>
                            <th ><input type="text" class="input100" name="procedure[]" value="{{ old('procedure[]')}}"></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item[]" id="item" value="{{ old('item[]')}}"></th>
                            <th ><input type="text" class="input100" name="procedure[]" value="{{ old('procedure[]')}}"></th>
                        </tr>
                    </tbody>
                </table> --}}

                <!-- Risk and Service Area Impact -->
                {{-- <table class="table table-bordered bg1 lebar-table">
                    <tr>
                        <th colspan="4">Risk and Service Area Impact</th>
                    </tr>
                    <tr>
                        <th scope="col">Risk Description</th>
                        <td>
                            <select class="wrap-input100 validate-input bg0 js-select2" name="risk[]" id="risk">
                                <option value=""></option>
                                @foreach($getRisk as $p)
                                <option value="{{ $p->id }}">{{ $p->risk }}</option>
                                @endforeach
                            </select>
                            <div class="dropDownSelect2"></div>
                        </td>
                        <th scope="col">Impact</th>
                        <td>
                            <input type="text" class="input100" name="impact[]" id="impact" value="" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Possibility</th>
                        <td>
                            <input type="text" class="input100" name="possibility[]" id="poss" value="" readonly>
                        </td>
                        <th scope="col">Mitigation Plan</th>
                        <td>
                            <input type="text" class="input100" name="mitigation[]" id="mitigation" value="" readonly>
                        </td>
                    </tr>

                    <tr>
                        <th scope="col">Risk Description</th>
                        <td>
                            <select class="wrap-input100 validate-input bg0 js-select2" name="risk[]" id="risk2">
                                <option value=""></option>
                                @foreach($getRisk as $p)
                                <option value="{{ $p->id }}">{{ $p->risk }}</option>
                                @endforeach
                            </select>
                            <div class="dropDownSelect2"></div>
                        </td>
                        <th scope="col">Impact</th>
                        <td>
                            <input type="text" class="input100" name="impact[]" id="impact2" value="" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Possibility</th>
                        <td>
                            <input type="text" class="input100" name="possibility[]" id="poss2" value="" readonly>
                        </td>
                        <th scope="col">Mitigation Plan</th>
                        <td>
                            <input type="text" class="input100" name="mitigation[]" id="mitigation2" value="" readonly>
                        </td>
                    </tr>

                    <tr>
                        <th scope="col">Risk Description</th>
                        <td>
                            <select class="wrap-input100 validate-input bg0 js-select2" name="risk[]" id="risk3">
                                <option value=""></option>
                                @foreach($getRisk as $p)
                                <option value="{{ $p->id }}">{{ $p->risk }}</option>
                                @endforeach
                            </select>
                            <div class="dropDownSelect2"></div>
                        </td>
                        <th scope="col">Impact</th>
                        <td>
                            <input type="text" class="input100" name="impact[]" id="impact3" value="" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Possibility</th>
                        <td>
                            <input type="text" class="input100" name="possibility[]" id="poss3" value="" readonly>
                        </td>
                        <th scope="col">Mitigation Plan</th>
                        <td>
                            <input type="text" class="input100" name="mitigation[]" id="mitigation3" value="" readonly>
                        </td>
                    </tr>

                    <tr>
                        <th scope="col">Risk Description</th>
                        <td>
                            <select class="wrap-input100 validate-input bg0 js-select2" name="risk[]" id="risk4">
                                <option value=""></option>
                                @foreach($getRisk as $p)
                                <option value="{{ $p->id }}">{{ $p->risk }}</option>
                                @endforeach
                            </select>
                            <div class="dropDownSelect2"></div>
                        </td>
                        <th scope="col">Impact</th>
                        <td>
                            <input type="text" class="input100" name="impact[]" id="impact4" value="" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Possibility</th>
                        <td>
                            <input type="text" class="input100" name="possibility[]" id="poss4" value="" readonly>
                        </td>
                        <th scope="col">Mitigation Plan</th>
                        <td>
                            <input type="text" class="input100" name="mitigation[]" id="mitigation4" value="" readonly>
                        </td>
                    </tr>
                </table> --}}

				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn">
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script type="text/javascript">
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})

        $('#risk').change(function(){
            let id = $(this).val();
            $.ajax({
                url: "{{url("other/maintenance/risk")}}"+'/'+id,
                dataType:"json",
                type: "get",
                success: function(response){
                    const {risk} = response;
                    console.log(risk)
                    $('#impact').val(risk.impact);
                    $('#mitigation').val(risk.mitigation);
                    $('#poss').val(risk.poss);
                }
            });
        });

        $('#risk2').change(function(){
            let id = $(this).val();
            $.ajax({
                url: "{{url("other/maintenance/risk")}}"+'/'+id,
                dataType:"json",
                type: "get",
                success: function(response){
                    const {risk} = response;
                    console.log(risk)
                    $('#impact2').val(risk.impact);
                    $('#mitigation2').val(risk.mitigation);
                    $('#poss2').val(risk.poss);
                }
            });
        });

        $('#risk3').change(function(){
            let id = $(this).val();
            $.ajax({
                url: "{{url("other/maintenance/risk")}}"+'/'+id,
                dataType:"json",
                type: "get",
                success: function(response){
                    const {risk} = response;
                    console.log(risk)
                    $('#impact3').val(risk.impact);
                    $('#mitigation3').val(risk.mitigation);
                    $('#poss3').val(risk.poss);
                }
            });
        });

        $('#risk4').change(function(){
            let id = $(this).val();
            $.ajax({
                url: "{{url("other/maintenance/risk")}}"+'/'+id,
                dataType:"json",
                type: "get",
                success: function(response){
                    const {risk} = response;
                    console.log(risk)
                    $('#impact4').val(risk.impact);
                    $('#mitigation4').val(risk.mitigation);
                    $('#poss4').val(risk.poss);
                }
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
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
