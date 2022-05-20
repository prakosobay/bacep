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
			<form id="maintenance_form" class="contact100-form validate-form">
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
                        <span class="label-input100">Authorized Entry Area</span>
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
                        <span class="label-input100">Authorized Entry Area</span>
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
                        <span class="label-input100">Authorized Entry Area</span>
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
                        <span class="label-input100">Authorized Entry Area</span>
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


                {{-- Isian --}}
                <div class="wrap-input100 validate-input bg1" data-validate="Isi Latar Belakang">
					<span class="label-input100">Background and Objective (Latar Belakang dan Tujuan) *</span>
                    <textarea type="text" class="input100" name="background" id="background" placeholder="Background and Objective" value="{{old('background')}}"></textarea>
				</div>
                <div class="wrap-input100 validate-input bg1" data-validate="Isi Latar Belakang">
					<span class="label-input100">Description of Scope of Work (Deskripsi Pekerjaan) *</span>
                    <textarea type="text" class="input100" name="describ" id="describ" placeholder="Description of Scope of Work" value="{{old('describ')}}"></textarea>
				</div>
                <div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Testing and Verification (Pengujian dan Verifikasi)</span>
					<input type="text" class="input100" name="testing" id="testing" value="{{old('testing')}}" placeholder="Testing & Verification">
				</div>
                <div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Rollback Operation/Other Infomation (Operasi Pembatalan/Infomasi Lain)</span>
					<input type="text" class="input100" name="rollback" id="rollback" value="{{old('rollback')}}" placeholder="Rollback Operation">
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
                            <th><input type="time" class="input100" name="time_start[]"></th>
                            <th><input type="time" class="input100" name="time_end[]"></th>
                            <th><input type="text" class="input100" name="activity[]" id="activity_desc1" value="{{ old('activity[]')}}"></th>
                            <th><input type="text" class="input100" name="detail_service[]" id="detail_service1" value="{{ old('detail_service[]')}}"></th>
                        </tr>
                    </tbody>
                </table>

                <!-- Risk and Service Area Impact -->
                <table class="table table-bordered bg1">
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
                            <th>
                                <select class="wrap-input100 validate-input bg0 js-select2" name="risk[]" id="risk">
                                    <option value="">ampas</option>
                                    <option value="">ampa2s</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </th>
                            <th><input type="text" class="input100" name="possibility[]" id="possibility" value="" readonly></th>
                            <th><input type="text" class="input100" name="impact[]" id="impact" value="" readonly></th>
                            <th><input type="text" class="input100" name="mitigation[]" id="mitigation_plan" value="" readonly></th>
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

    //     $('#pilihan1').change(function(){
    //         let id = $(this).val();
    //         $.ajax({
    //             url: "{{url("/detail")}}"+'/'+id,
    //             dataType:"json",
    //             type: "get",
    //             success: function(response){
    //                 const {data} = response;
    //                 console.log(data)
    //             $('#phone_number').val(data.phone_number);
    //             $('#id_number').val(data.id_number);
    //             }
    //         });
    //     });

    //     $('#pilihan2').change(function(){
    //         let id = $(this).val();
    //         $.ajax({
    //             url: "{{url("/detail")}}"+'/'+id,
    //             dataType:"json",
    //             type: "get",
    //             success: function(response){
    //                 const {data} = response;
    //                 console.log(data)
    //             $('#phone_number2').val(data.phone_number);
    //             $('#id_number2').val(data.id_number);
    //             }
    //         });
    //     });

    //     $('#working').change(function(){
    //         let id = $(this).val();
    //         $.ajax({
    //             url: "{{url("/cleaning")}}"+'/'+id,
    //             dataType:"json",
    //             type: "get",
    //             success: function(response){
    //                 const {permit} = response;
    //                 console.log(permit)
    //             $('#activity_desciption_1').val(permit.activity_desciption_1);
    //             $('#activity_desciption_2').val(permit.activity_desciption_2);
    //             $('#activity_desciption_3').val(permit.activity_desciption_3);
    //             $('#activity_desciption_4').val(permit.activity_desciption_4);
    //             $('#activity_desciption_5').val(permit.activity_desciption_5);
    //             $('#activity_desciption_6').val(permit.activity_desciption_6);
    //             $('#detail_service_1').val(permit.detail_service_1);
    //             $('#detail_service_2').val(permit.detail_service_2);
    //             $('#detail_service_3').val(permit.detail_service_3);
    //             $('#detail_service_4').val(permit.detail_service_4);
    //             $('#detail_service_5').val(permit.detail_service_5);
    //             $('#detail_service_6').val(permit.detail_service_6);
    //             $('#item_1').val(permit.item_1);
    //             $('#item_2').val(permit.item_2);
    //             $('#item_3').val(permit.item_3);
    //             $('#item_4').val(permit.item_4);
    //             $('#item_5').val(permit.item_5);
    //             $('#item_6').val(permit.item_6);
    //             $('#working_procedure_1').val(permit.working_procedure_1);
    //             $('#working_procedure_2').val(permit.working_procedure_2);
    //             $('#working_procedure_3').val(permit.working_procedure_3);
    //             $('#working_procedure_4').val(permit.working_procedure_4);
    //             $('#working_procedure_5').val(permit.working_procedure_5);
    //             $('#working_procedure_6').val(permit.working_procedure_6);
    //             $('#risk_description_1').val(permit.risk_description_1);
    //             $('#risk_description_2').val(permit.risk_description_2);
    //             $('#risk_description_3').val(permit.risk_description_3);
    //             $('#risk_description_4').val(permit.risk_description_4);
    //             $('#risk_description_5').val(permit.risk_description_5);
    //             $('#risk_description_6').val(permit.risk_description_6);
    //             $('#possibility_1').val(permit.possibility_1);
    //             $('#possibility_2').val(permit.possibility_2);
    //             $('#possibility_3').val(permit.possibility_3);
    //             $('#possibility_4').val(permit.possibility_4);
    //             $('#possibility_5').val(permit.possibility_5);
    //             $('#possibility_6').val(permit.possibility_6);
    //             $('#impact_1').val(permit.impact_1);
    //             $('#impact_2').val(permit.impact_2);
    //             $('#impact_3').val(permit.impact_3);
    //             $('#impact_4').val(permit.impact_4);
    //             $('#impact_5').val(permit.impact_5);
    //             $('#impact_6').val(permit.impact_6);
    //             $('#mitigation_plan_1').val(permit.mitigation_plan_1);
    //             $('#mitigation_plan_2').val(permit.mitigation_plan_2);
    //             $('#mitigation_plan_3').val(permit.mitigation_plan_3);
    //             $('#mitigation_plan_4').val(permit.mitigation_plan_4);
    //             $('#mitigation_plan_5').val(permit.mitigation_plan_5);
    //             $('#mitigation_plan_6').val(permit.mitigation_plan_6);
    //             $('#background').val(permit.background);
    //             $('#describ').val(permit.describ);
    //             $('#testing').val(permit.testing);
    //             $('#rollback').val(permit.rollback);
    //             $('#loc1').val(permit.loc1);
    //             $('#loc2').val(permit.loc2);
    //             $('#loc3').val(permit.loc3);
    //             $('#loc4').val(permit.loc4);
    //             $('#loc5').val(permit.loc5);
    //             $('#loc6').val(permit.loc6);
    //             }
    //         });
    //     });

    //     $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('input[name="_token"]').val()
    //     }
    // });

    // $(".contact100-form-btn").click(function(e){
    //     e.preventDefault();
    //     var datastring = $("#form_cleaning").serialize();
    //     $.ajax({
    //         type:'POST',
    //         url:"{{url('route_submit_cleaning')}}",
    //         data: datastring,
    //         error: function (request, error) {
    //             console.log(error)
    //             alert(" Can't do because: " + error);
    //         },
    //         success:function(data){
    //             console.log(data);
    //             if(data.status == 'SUCCESS'){
    //                 Swal.fire({
    //                     title: "Success!",
    //                     text: 'Data Saved',
    //                     type: "success",
    //                 }).then(function(){
    //                     location.href = "{{url("/home")}}";
    //                 });
    //             }else if(data.status == 'FAILED'){
    //                 Swal.fire({
    //                     title: "Failed!",
    //                     text: 'Saving Data Failed',
    //                 }).then(function(){
    //                     location.reload();
    //                 });
    //             }
    //         }
    //     });
    // });

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
