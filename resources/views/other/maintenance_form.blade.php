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
				<div class="wrap-input100 validate-input bg1" data-validate="Pilih Tujuan Pekerjaan">
					<span class="label-input100">Purpose of Work (Tujuan Pekerjaan) *</span>
                    <div>
                        <select class="js-select2" id="working" name="work">
                            <option value=""></option>
                            @foreach($pilihanwork as $p)
                            <option value="{{ $p->id }}">{{ $p->work }}</option>
                            @endforeach
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
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
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc1" name="loc1" value="" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc2" name="loc2" value="" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc3" name="loc3" value="" readonly>
                            </label>
                        </div>
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc4" name="loc4" value="" readonly>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc5" name="loc5" value="" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc6" name="loc6" value="" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc7" name="loc7" value="" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc8" name="loc8" value="" readonly>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc9" name="loc9" value="" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc10" name="loc10" value="" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc11" name="loc11" value="" readonly>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc12" name="loc12" value="" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc13" name="loc13" value="" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc14" name="loc14" value="" readonly>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="wrap-input100 bg1">
					<span class="label-input100">Other (Lokasi Lain) *</span>
                    <input type="text" class="input100" id="lain" name="lain" value="{{ old('lain')}}" placeholder="Lokasi lain">
				</div>

                {{-- Isian --}}
                <div class="wrap-input100 bg1 rs1-alert-validate">
					<span class="label-input100">Background and Objective (Latar Belakang dan Tujuan) *</span>
					<input type="text" class="input100" name="background" id="background" value="" readonly>
				</div>
                <div class="wrap-input100 bg1 rs1-alert-validate">
					<span class="label-input100">Description of Scope of Work (Deskripsikan Lingkup Pekerjaan) *</span>
					<input type="text" class="input100" name="describ" id="describ" value="" readonly>
				</div>
                <div class="wrap-input100 bg1">
					<span class="label-input100">Testing and Verification (Pengujian dan Verifikasi)</span>
					<input type="text" class="input100" name="cleaning_testing" id="testing" value="" readonly>
				</div>
                <div class="wrap-input100 bg1">
					<span class="label-input100">Rollback Operation/Other Infomation (Operasi Pembatalan/Infomasi Lain)</span>
					<input type="text" class="input100" name="cleaning_rollback" id="rollback" value="" readonly>
				</div>

                <!-- Detail Time Activity -->
                <table class="table table-bordered">
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
                            <th><input type="time" name="cleaning_time_start"></th>
                            <th><input type="time" name="cleaning_time_end"></th>
                            <th><input type="text" class="input100" name="activity_1" id="activity_desciption_1" value="" readonly></th>
                            <th><input type="text" class="input100" name="detail_1" id="detail_service_1" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="cleaning_time_start2"></th>
                            <th><input type="time" name="cleaning_time_end2"></th>
                            <th><input type="text" class="input100" name="activity_2" id="activity_desciption_2" value="" readonly></th>
                            <th><input type="text" class="input100" name="detail_2" id="detail_service_2" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="cleaning_time_start3"></th>
                            <th><input type="time" name="cleaning_time_end3"></th>
                            <th><input type="text" class="input100" name="activity_3" id="activity_desciption_3" value="" readonly></th>
                            <th><input type="text" class="input100" name="detail_3" id="detail_service_3" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="cleaning_time_start4"></th>
                            <th><input type="time" name="cleaning_time_end4"></th>
                            <th><input type="text" class="input100" name="activity_4" id="activity_desciption_4" value="" readonly></th>
                            <th><input type="text" class="input100" name="detail_4" id="detail_service_4" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="cleaning_time_start5"></th>
                            <th><input type="time" name="cleaning_time_end5"></th>
                            <th><input type="text" class="input100" name="activity_5" id="activity_desciption_5" value="" readonly></th>
                            <th><input type="text" class="input100" name="detail_5" id="detail_service_5" value="" readonly></th>
                        </tr>
                    </tbody>
                </table>

                {{-- Detail Operation and Execution --}}
                <table class="table table-bordered">
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
                            <th><input type="text" class="input100" name="item_1" id="item_1" value="" readonly></th>
                            <th ><input type="text" class="input100" name="procedure_1" id="working_procedure_1" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item_2" id="item_2" value="" readonly></th>
                            <th ><input type="text" class="input100" name="procedure_2" id="working_procedure_2" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item_3" id="item_3" value="" readonly></th>
                            <th ><input type="text" class="input100" name="procedure_3" id="working_procedure_3" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item_4" id="item_4" value="" readonly></th>
                            <th ><input type="text" class="input100" name="procedure_4" id="working_procedure_4" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item_5" id="item_5" value="" readonly></th>
                            <th ><input type="text" class="input100" name="procedure_5" id="working_procedure_5" value="" readonly></th>
                        </tr>
                    </tbody>
                </table>

                <!-- Risk and Service Area Impact -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="4">Risk and Service Area Impact</th>
                        <tr>
                            <th scope="col">Risk Description</th>
                            <th scope="col">Possibility</th>
                            <th scope="col">Impact</th>
                            <th scope="col">Mitigation Plan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><input type="text" class="input100" name="risk_1" id="risk_description_1" value="" readonly></th>
                            <th><input type="text" class="input100" name="poss_1" id="possibility_1" value="" readonly></th>
                            <th><input type="text" class="input100" name="impact_1" id="impact_1" value="" readonly></th>
                            <th><input type="text" class="input100" name="mitigation_1" id="mitigation_plan_1" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="risk_2" id="risk_description_2" value="" readonly></th>
                            <th><input type="text" class="input100" name="poss_2" id="possibility_2" value="" readonly></th>
                            <th><input type="text" class="input100" name="impact_2" id="impact_2" value="" readonly></th>
                            <th><input type="text" class="input100" name="mitigation_2" id="mitigation_plan_2" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="risk_3" id="risk_description_3" value="" readonly></th>
                            <th><input type="text" class="input100" name="poss_3" id="possibility_3" value="" readonly></th>
                            <th><input type="text" class="input100" name="impact_3" id="impact_3" value="" readonly></th>
                            <th><input type="text" class="input100" name="mitigation_3" id="mitigation_plan_3" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="risk_4" id="risk_description_4" value="" readonly></th>
                            <th><input type="text" class="input100" name="poss_4" id="possibility_4" value="" readonly></th>
                            <th><input type="text" class="input100" name="impact_4" id="impact_4" value="" readonly></th>
                            <th><input type="text" class="input100" name="mitigation_4" id="mitigation_plan_4" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="risk_5" id="risk_description_5" value="" readonly></th>
                            <th><input type="text" class="input100" name="poss_5" id="possibility_5" value="" readonly></th>
                            <th><input type="text" class="input100" name="impact_5" id="impact_5" value="" readonly></th>
                            <th><input type="text" class="input100" name="mitigation_5" id="mitigation_plan_5" value="" readonly></th>
                        </tr>
                    </tbody>
                </table>

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

        $('#working').change(function(){
            let id = $(this).val();
            $.ajax({
                url: "{{url("/other/maintenance/rutin")}}"+'/'+id,
                dataType:"json",
                type: "get",
                success: function(response){
                    const {permit} = response;
                    console.log(permit)
                    $('#activity_desciption_1').val(permit.activity_1);
                $('#activity_desciption_2').val(permit.activity_2);
                $('#activity_desciption_3').val(permit.activity_3);
                $('#activity_desciption_4').val(permit.activity_4);
                $('#activity_desciption_5').val(permit.activity_5);
                $('#detail_service_1').val(permit.detail_1);
                $('#detail_service_2').val(permit.detail_2);
                $('#detail_service_3').val(permit.detail_3);
                $('#detail_service_4').val(permit.detail_4);
                $('#detail_service_5').val(permit.detail_5);
                $('#item_1').val(permit.item_1);
                $('#item_2').val(permit.item_2);
                $('#item_3').val(permit.item_3);
                $('#item_4').val(permit.item_4);
                $('#item_5').val(permit.item_5);
                $('#item_6').val(permit.item_6);
                $('#working_procedure_1').val(permit.procedure_1);
                $('#working_procedure_2').val(permit.procedure_2);
                $('#working_procedure_3').val(permit.procedure_3);
                $('#working_procedure_4').val(permit.procedure_4);
                $('#working_procedure_5').val(permit.procedure_5);
                $('#working_procedure_6').val(permit.procedure_6);
                $('#risk_description_1').val(permit.risk_1);
                $('#risk_description_2').val(permit.risk_2);
                $('#risk_description_3').val(permit.risk_3);
                $('#risk_description_4').val(permit.risk_4);
                $('#risk_description_5').val(permit.risk_5);
                $('#risk_description_6').val(permit.risk_6);
                $('#possibility_1').val(permit.poss_1);
                $('#possibility_2').val(permit.poss_2);
                $('#possibility_3').val(permit.poss_3);
                $('#possibility_4').val(permit.poss_4);
                $('#possibility_5').val(permit.poss_5);
                $('#possibility_6').val(permit.poss_6);
                $('#impact_1').val(permit.impact_1);
                $('#impact_2').val(permit.impact_2);
                $('#impact_3').val(permit.impact_3);
                $('#impact_4').val(permit.impact_4);
                $('#impact_5').val(permit.impact_5);
                $('#impact_6').val(permit.impact_6);
                $('#mitigation_plan_1').val(permit.mitigation_1);
                $('#mitigation_plan_2').val(permit.mitigation_2);
                $('#mitigation_plan_3').val(permit.mitigation_3);
                $('#mitigation_plan_4').val(permit.mitigation_4);
                $('#mitigation_plan_5').val(permit.mitigation_5);
                $('#mitigation_plan_6').val(permit.mitigation_6);
                $('#describ').val(permit.desc);
                $('#background').val(permit.desc);
                $('#testing').val(permit.testing);
                $('#rollback').val(permit.rollback);
                $('#loc1').val(permit.loc1);
                $('#loc2').val(permit.loc2);
                $('#loc3').val(permit.loc3);
                $('#loc4').val(permit.loc4);
                $('#loc5').val(permit.loc5);
                $('#loc6').val(permit.loc6);
                $('#loc7').val(permit.loc7);
                $('#loc8').val(permit.loc8);
                $('#loc9').val(permit.loc9);
                $('#loc10').val(permit.loc10);
                $('#loc11').val(permit.loc11);
                $('#loc12').val(permit.loc12);
                $('#loc13').val(permit.loc13);
                $('#loc14').val(permit.loc14);
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
