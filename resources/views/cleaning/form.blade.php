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
			<form id="form_cleaning" class="contact100-form validate-form">
                {{ csrf_field() }}
				<span class="contact100-form-title">
					FORM
				</span>

                {{-- Purpose of Work --}}
				<div class="wrap-input100 validate-input bg1" data-validate="Pilih Tujuan Pekerjaan">
					<span class="label-input100">Tujuan Pekerjaan *</span>
                    <div>
                        <select class="js-select2" id="working" name="cleaning_work">
                            <option value=""></option>
                            @foreach($pilihanwork as $p)
                            <option value="{{ $p->id }}">{{ $p->work }}</option>
                            @endforeach
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
				</div>

                {{-- Entry Area --}}
                <div class="wrap-contact100-form-radio">
                    <span class="label-input100">Authorized Entry Area</span>
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
                            <th><input type="text" class="input100" name="activity" id="activity_desciption_1" value="" readonly></th>
                            <th><input type="text" class="input100" name="detail_service" id="detail_service_1" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="cleaning_time_start2"></th>
                            <th><input type="time" name="cleaning_time_end2"></th>
                            <th><input type="text" class="input100" name="activity2" id="activity_desciption_2" value="" readonly></th>
                            <th><input type="text" class="input100" name="detail_service2" id="detail_service_2" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="cleaning_time_start3"></th>
                            <th><input type="time" name="cleaning_time_end3"></th>
                            <th><input type="text" class="input100" name="activity3" id="activity_desciption_3" value="" readonly></th>
                            <th><input type="text" class="input100" name="detail_service3" id="detail_service_3" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="cleaning_time_start4"></th>
                            <th><input type="time" name="cleaning_time_end4"></th>
                            <th><input type="text" class="input100" name="activity4" id="activity_desciption_4" value="" readonly></th>
                            <th><input type="text" class="input100" name="detail_service4" id="detail_service_4" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="cleaning_time_start5"></th>
                            <th><input type="time" name="cleaning_time_end5"></th>
                            <th><input type="text" class="input100" name="activity5" id="activity_desciption_5" value="" readonly></th>
                            <th><input type="text" class="input100" name="detail_service5" id="detail_service_5" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="cleaning_time_start6"></th>
                            <th><input type="time" name="cleaning_time_end6"></th>
                            <th><input type="text" class="input100" name="activity6" id="activity_desciption_6" value="" readonly></th>
                            <th><input type="text" class="input100" name="detail_service6" id="detail_service_6" value="" readonly></th>
                        </tr>
                    </tbody>
                </table>

                <!-- Detail Operation and Execution -->
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
                            <th><input type="text" class="input100" name="item" id="item_1" value="" readonly></th>
                            <th ><input type="text" class="input100" name="cleaning_procedure" id="working_procedure_1" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item2" id="item_2" value="" readonly></th>
                            <th ><input type="text" class="input100" name="cleaning_procedure2" id="working_procedure_2" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item3" id="item_3" value="" readonly></th>
                            <th ><input type="text" class="input100" name="cleaning_procedure3" id="working_procedure_3" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item4" id="item_4" value="" readonly></th>
                            <th ><input type="text" class="input100" name="cleaning_procedure4" id="working_procedure_4" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item5" id="item_5" value="" readonly></th>
                            <th ><input type="text" class="input100" name="cleaning_procedure5" id="working_procedure_5" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item6" id="item_6" value="" readonly></th>
                            <th ><input type="text" class="input100" name="cleaning_procedure6" id="working_procedure_6" value="" readonly></th>
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
                            <th><input type="text" class="input100" name="cleaning_risk" id="risk_description_1" value="" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_possibility" id="possibility_1" value="" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_impact" id="impact_1" value="" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_mitigation" id="mitigation_plan_1" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="cleaning_risk2" id="risk_description_2" value="" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_possibility2" id="possibility_2" value="" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_impact2" id="impact_2" value="" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_mitigation2" id="mitigation_plan_2" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="cleaning_risk3" id="risk_description_3" value="" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_possibility3" id="possibility_3" value="" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_impact3" id="impact_3" value="" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_mitigation3" id="mitigation_plan_3" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="cleaning_risk4" id="risk_description_4" value="" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_possibility4" id="possibility_4" value="" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_impact4" id="impact_4" value="" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_mitigation4" id="mitigation_plan_4" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="cleaning_risk5" id="risk_description_5" value="" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_possibility5" id="possibility_5" value="" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_impact5" id="impact_5" value="" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_mitigation5" id="mitigation_plan_5" value="" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="cleaning_risk6" id="risk_description_6" value="" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_possibility6" id="possibility_6" value="" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_impact6" id="impact_6" value="" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_mitigation6" id="mitigation_plan_6" value="" readonly></th>
                        </tr>
                    </tbody>
                </table>

                {{-- Isian --}}
                <div class="wrap-input100 bg0 rs1-alert-validate">
					<span class="label-input100">Background and Objective (Jenis Pekerjaan) *</span>
					<input type="text" class="input100" name="cleaning_background" id="background" value="" readonly>
				</div>
                <div class="wrap-input100 bg0 rs1-alert-validate">
					<span class="label-input100">Description of Scope of Work (Deskripsikan Pekerjaan) *</span>
					<input type="text" class="input100" name="cleaning_describ" id="describ" value="" readonly>
				</div>
                <div class="wrap-input100 bg0 rs1-alert-validate">
					<span class="label-input100">Testing and Verification *</span>
					<input type="text" class="input100" name="cleaning_testing" id="testing" value="" readonly>
				</div>
                <div class="wrap-input100 bg0 rs1-alert-validate">
					<span class="label-input100">Rollback Operation *</span>
					<input type="text" class="input100" name="cleaning_rollback" id="rollback" value="" readonly>
				</div>

                {{-- Validity --}}
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Pilih Tanggal Pekerjaan">
					<span class="label-input100">Tanggal Mulai Pekerjaan *</span>
                    <input class="input100" type="date" name="validity_from" id="dateofbirth">
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Pilih Tanggal Pekerjaan">
					<span class="label-input100">Tanggal Selesai Pekerjaan *</span>
					<input class="input100" type="date" name="validity_to" id="dateofbirth">
				</div>

                {{-- Pilih Personil --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Pilih Personil">
					<span class="label-input100">Nama Personil 1 *</span>
                    <div>
                        <select class="js-select2" id="pilihan1" name="cleaning_name">
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
                        <select class="js-select2" id="pilihan2" name="cleaning_name2">
                            <option value=""></option>
                            @foreach($master_ob as $p)
                            <option value="{{ $p->ob_id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
				</div>

                {{-- Phone Number --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Nomor HP Personil 1</span>
                    <input type="text" class="input100" name="cleaning_number" id="phone_number" value="" readonly>
				</div>
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Nomor HP Personil 2</span>
                    <input type="text" class="input100" name="cleaning_number2" id="phone_number2" value="" readonly>
				</div>

                {{-- NIK  --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">NIK Personil 1</span>
                    <input type="text" class="input100" name="cleaning_nik" id="id_number" value="" readonly>
				</div>
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">NIK Personil 2</span>
                    <input type="text" class="input100" name="cleaning_nik_2" id="id_number2" value="" readonly>
				</div>

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

        $('#working').change(function(){
            let id = $(this).val();
            $.ajax({
                url: "{{url("/cleaning")}}"+'/'+id,
                dataType:"json",
                type: "get",
                success: function(response){
                    const {permit} = response;
                    console.log(permit)
                $('#activity_desciption_1').val(permit.activity_desciption_1);
                $('#activity_desciption_2').val(permit.activity_desciption_2);
                $('#activity_desciption_3').val(permit.activity_desciption_3);
                $('#activity_desciption_4').val(permit.activity_desciption_4);
                $('#activity_desciption_5').val(permit.activity_desciption_5);
                $('#activity_desciption_6').val(permit.activity_desciption_6);
                $('#detail_service_1').val(permit.detail_service_1);
                $('#detail_service_2').val(permit.detail_service_2);
                $('#detail_service_3').val(permit.detail_service_3);
                $('#detail_service_4').val(permit.detail_service_4);
                $('#detail_service_5').val(permit.detail_service_5);
                $('#detail_service_6').val(permit.detail_service_6);
                $('#item_1').val(permit.item_1);
                $('#item_2').val(permit.item_2);
                $('#item_3').val(permit.item_3);
                $('#item_4').val(permit.item_4);
                $('#item_5').val(permit.item_5);
                $('#item_6').val(permit.item_6);
                $('#working_procedure_1').val(permit.working_procedure_1);
                $('#working_procedure_2').val(permit.working_procedure_2);
                $('#working_procedure_3').val(permit.working_procedure_3);
                $('#working_procedure_4').val(permit.working_procedure_4);
                $('#working_procedure_5').val(permit.working_procedure_5);
                $('#working_procedure_6').val(permit.working_procedure_6);
                $('#risk_description_1').val(permit.risk_description_1);
                $('#risk_description_2').val(permit.risk_description_2);
                $('#risk_description_3').val(permit.risk_description_3);
                $('#risk_description_4').val(permit.risk_description_4);
                $('#risk_description_5').val(permit.risk_description_5);
                $('#risk_description_6').val(permit.risk_description_6);
                $('#possibility_1').val(permit.possibility_1);
                $('#possibility_2').val(permit.possibility_2);
                $('#possibility_3').val(permit.possibility_3);
                $('#possibility_4').val(permit.possibility_4);
                $('#possibility_5').val(permit.possibility_5);
                $('#possibility_6').val(permit.possibility_6);
                $('#impact_1').val(permit.impact_1);
                $('#impact_2').val(permit.impact_2);
                $('#impact_3').val(permit.impact_3);
                $('#impact_4').val(permit.impact_4);
                $('#impact_5').val(permit.impact_5);
                $('#impact_6').val(permit.impact_6);
                $('#mitigation_plan_1').val(permit.mitigation_plan_1);
                $('#mitigation_plan_2').val(permit.mitigation_plan_2);
                $('#mitigation_plan_3').val(permit.mitigation_plan_3);
                $('#mitigation_plan_4').val(permit.mitigation_plan_4);
                $('#mitigation_plan_5').val(permit.mitigation_plan_5);
                $('#mitigation_plan_6').val(permit.mitigation_plan_6);
                $('#background').val(permit.background);
                $('#describ').val(permit.describ);
                $('#testing').val(permit.testing);
                $('#rollback').val(permit.rollback);
                $('#loc1').val(permit.loc1);
                $('#loc2').val(permit.loc2);
                $('#loc3').val(permit.loc3);
                $('#loc4').val(permit.loc4);
                $('#loc5').val(permit.loc5);
                $('#loc6').val(permit.loc6);
                }
            });
        });

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

    $(".contact100-form-btn").click(function(e){
        e.preventDefault();
        var datastring = $("#form_cleaning").serialize();
        $.ajax({
            type:'POST',
            url:"{{url('submit_data_cleaning')}}",
            data: datastring,
            error: function (request, error) {
                console.log(error)
                alert(" Can't do because: " + error);
            },
            success:function(data){
                console.log(data);
                if(data.status == 'SUCCESS'){
                    Swal.fire({
                        title: "Success!",
                        text: 'Data Saved',
                        type: "success",
                    }).then(function(){
                        location.href = "{{url("/home")}}";
                    });
                }else if(data.status == 'FAILED'){
                    Swal.fire({
                        title: "Failed!",
                        text: 'Saving Data Failed',
                    }).then(function(){
                        location.reload();
                    });
                }
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
