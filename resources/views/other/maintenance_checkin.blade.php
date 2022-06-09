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
			<form id="maintenance_form" class="contact100-form validate-form" method="POST">
                @csrf
				<span class="contact100-form-title">
					FORM MAINTENANCE
				</span>

                {{-- Purpose of Work --}}
				<div class="wrap-input100 validate-input bg1" data-validate="Pilih Tujuan Pekerjaan">
					<span class="label-input100">Purpose of Work (Tujuan Pekerjaan) *</span>
                    <div>
                        <input class="input100" type="text" name="work" id="work" value="{{$form->work}}" readonly>
                    </div>
				</div>

                {{-- Date of Visit --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate ="Pilih Tanggal Pekerjaan">
					<span class="label-input100">Date of Visit (Tanggal Mulai Pekerjaan) *</span>
                    <input class="input100" type="date" name="visit" id="visit" value="{{$form->visit}}">
				</div>

                {{-- Date of Leave --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate ="Pilih Tanggal Pekerjaan">
					<span class="label-input100">Date of Leave (Tanggal Selesai Pekerjaan) *</span>
                    <input class="input100" type="date" name="leave" id="leave" value="{{$form->leave}}">
				</div>

                {{-- Entry Area --}}
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc1" name="loc1" value="{{$form->loc1}}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc2" name="loc2" value="{{$form->loc2}}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc3" name="loc3" value="{{$form->loc3}}" readonly>
                            </label>
                        </div>
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc4" name="loc4" value="{{$form->loc4}}" readonly>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc5" name="loc5" value="{{$form->loc5}}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc6" name="loc6" value="{{$form->loc6}}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc7" name="loc7" value="{{$form->loc7}}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc8" name="loc8" value="{{$form->loc8}}" readonly>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc9" name="loc9" value="{{$form->loc9}}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc10" name="loc10" value="{{$form->loc10}}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc11" name="loc11" value="{{$form->loc11}}" readonly>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc12" name="loc12" value="{{$form->loc12}}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc13" name="loc13" value="{{$form->loc13}}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc14" name="loc14" value="{{$form->loc14}}" readonly>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Isian --}}
                <div class="wrap-input100 bg1 rs1-alert-validate">
					<span class="label-input100">Background and Objective (Latar Belakang dan Tujuan) *</span>
					<input type="text" class="input100" name="background" id="background" value="{{$form->background}}" readonly>
				</div>
                <div class="wrap-input100 bg1 rs1-alert-validate">
					<span class="label-input100">Description of Scope of Work (Deskripsikan Lingkup Pekerjaan) *</span>
					<input type="text" class="input100" name="describ" id="describ" value="{{$form->desc}}" readonly>
				</div>
                <div class="wrap-input100 bg1">
					<span class="label-input100">Testing and Verification (Pengujian dan Verifikasi)</span>
					<input type="text" class="input100" name="testing" id="testing" value="{{$form->testing}}" readonly>
				</div>
                <div class="wrap-input100 bg1">
					<span class="label-input100">Rollback Operation/Other Infomation (Operasi Pembatalan/Infomasi Lain)</span>
					<input type="text" class="input100" name="rollback" id="rollback" value="{{$form->rollback}}" readonly>
				</div>

                <!-- Detail Time Activity -->
                <table class="table table-bordered bg1">
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
                            <th><input class="bg1" type="time" name="time_start_1" value="{{$form->time_start_1}}"></th>
                            <th><input class="bg1" type="time" name="time_end_1" value="{{$form->time_end_1}}"></th>
                            <th><input type="text" class="input100" name="activity_1" id="activity_desciption_1" value="{{$form->activity_1}}" readonly></th>
                            <th><input type="text" class="input100" name="detail_1" id="detail_service_1" value="{{$form->detail_1}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input class="bg1" type="time" name="time_start_2"  value="{{$form->time_start_2}}></th>
                            <th><input class="bg1" type="time" name="time_end_2" value="{{$form->time_end_2}}"></th>
                            <th><input type="text" class="input100" name="activity_2" id="activity_desciption_2" value="{{$form->activity_2}}" readonly></th>
                            <th><input type="text" class="input100" name="detail_2" id="detail_service_2" value="{{$form->detail_2}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input class="bg1" type="time" name="time_start_3"  value="{{$form->time_start_3}}></th>
                            <th><input class="bg1" type="time" name="time_end_3" value="{{$form->time_end_3}}"></th>
                            <th><input type="text" class="input100" name="activity_3" id="activity_desciption_3" value="{{$form->activity_3}}" readonly></th>
                            <th><input type="text" class="input100" name="detail_3" id="detail_service_3" value="{{$form->detail_3}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input class="bg1" type="time" name="time_start_4"  value="{{$form->time_start_4}}></th>
                            <th><input class="bg1" type="time" name="time_end_4" value="{{$form->time_end_4}}"></th>
                            <th><input type="text" class="input100" name="activity_4" id="activity_desciption_4" value="{{$form->activity_4}}" readonly></th>
                            <th><input type="text" class="input100" name="detail_4" id="detail_service_4" value="{{$form->detail_4}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input class="bg1" type="time" name="time_start_5"  value="{{$form->time_start_5}}></th>
                            <th><input class="bg1" type="time" name="time_end_5" value="{{$form->time_end_5}}"></th>
                            <th><input type="text" class="input100" name="activity_5" id="activity_desciption_5" value="{{$form->activity_5}}" readonly></th>
                            <th><input type="text" class="input100" name="detail_5" id="detail_service_5" value="{{$form->detail_5}}" readonly></th>
                        </tr>
                    </tbody>
                </table>

                {{-- Detail Operation and Execution --}}
                <table class="table table-bordered bg1">
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
                            <th><input type="text" class="input100" name="item_1" id="item_1" value="{{$form->item_1}}" readonly></th>
                            <th ><input type="text" class="input100" name="procedure_1" id="working_procedure_1" value="{{$form->procedure_1}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item_2" id="item_2" value="{{$form->item_2}}" readonly></th>
                            <th ><input type="text" class="input100" name="procedure_2" id="working_procedure_2" value="{{$form->procedure_2}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item_3" id="item_3" value="{{$form->item_3}}" readonly></th>
                            <th ><input type="text" class="input100" name="procedure_3" id="working_procedure_3" value="{{$form->procedure_3}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item_4" id="item_4" value="{{$form->item_4}}" readonly></th>
                            <th ><input type="text" class="input100" name="procedure_4" id="working_procedure_4" value="{{$form->procedure_4}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item_5" id="item_5" value="{{$form->item_5}}" readonly></th>
                            <th ><input type="text" class="input100" name="procedure_5" id="working_procedure_5" value="{{$form->procedure_5}}" readonly></th>
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
                            <th><input type="text" class="input100" name="risk_1" id="risk_description_1" value="{{$form->risk_1}}" readonly></th>
                            <th><input type="text" class="input100" name="poss_1" id="possibility_1" value="{{$form->poss_1}}" readonly></th>
                            <th><input type="text" class="input100" name="impact_1" id="impact_1" value="{{$form->impact_1}}" readonly></th>
                            <th><input type="text" class="input100" name="mitigation_1" id="mitigation_plan_1" value="{{$form->mitigation_1}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="risk_2" id="risk_description_2" value="{{$form->risk_2}}" readonly></th>
                            <th><input type="text" class="input100" name="poss_2" id="possibility_2" value="{{$form->risk_2}}" readonly></th>
                            <th><input type="text" class="input100" name="impact_2" id="impact_2" value="{{$form->impact_2}}" readonly></th>
                            <th><input type="text" class="input100" name="mitigation_2" id="mitigation_plan_2" value="{{$form->mitigation_2}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="risk_3" id="risk_description_3" value="{{$form->risk_3}}" readonly></th>
                            <th><input type="text" class="input100" name="poss_3" id="possibility_3" value="{{$form->risk_3}}" readonly></th>
                            <th><input type="text" class="input100" name="impact_3" id="impact_3" value="{{$form->impact_3}}" readonly></th>
                            <th><input type="text" class="input100" name="mitigation_3" id="mitigation_plan_3" value="{{$form->mitigation_3}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="risk_4" id="risk_description_4" value="{{$form->risk_4}}" readonly></th>
                            <th><input type="text" class="input100" name="poss_4" id="possibility_4" value="{{$form->risk_4}}" readonly></th>
                            <th><input type="text" class="input100" name="impact_4" id="impact_4" value="{{$form->impact_4}}" readonly></th>
                            <th><input type="text" class="input100" name="mitigation_4" id="mitigation_plan_4" value="{{$form->mitigation_4}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="risk_5" id="risk_description_5" value="{{$form->risk_5}}" readonly></th>
                            <th><input type="text" class="input100" name="poss_5" id="possibility_5" value="{{$form->risk_5}}" readonly></th>
                            <th><input type="text" class="input100" name="impact_5" id="impact_5" value="{{$form->impact_5}}" readonly></th>
                            <th><input type="text" class="input100" name="mitigation_5" id="mitigation_plan_5" value="{{$form->mitigation_4}}" readonly></th>
                        </tr>
                    </tbody>
                </table>

                {{-- PIC --}}
                <div class="wrap-input100 validate-input bg1">
                    @foreach ($pic as $v)
                        {{-- Data PIC --}}
                        <div id="pic">
                            <table class="table table-bordered bg1">
                                <tr>
                                    <th colspan="5"><b>PIC</b></th>
                                </tr>
                                <tr>
                                    <th>Name </th>
                                    <td>
                                        <select class="js-select2" name="visit_nama[]" id="nama">
                                            <option value="{{$v['name']}}" selected>{{$v['name']}}</option>
                                            @foreach ($personil as $p)
                                                <option value="{{$p->id}}">{{$p->visit_nama}}</option>
                                            @endforeach
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </td>
                                    <th>Company</th>
                                    <td>
                                        <input type="text" class="input100" name="visit_company[]" id="company" value="{{$v['company']}}" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>ID Number </th>
                                    <td>
                                        <input type="text" class="input100" name="visit_nik[]" id="nik" value="{{$v['number']}}" readonly>
                                    </td>
                                    <th>Department </th>
                                    <td>
                                        <input type="text" class="input100" name="visit_department[]" id="department" value="{{$v['department']}}" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>
                                        <input type="text" class="input100" name="visit_phone[]" id="phone" value="{{$v['phone']}}" readonly>
                                    </td>
                                    <th>Responsibility </th>
                                    <td>
                                        <input type="text" class="input100" name="visit_respon[]" id="respon" value="{{$v['respon']}}" readonly>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    @endforeach
                </div>

                {{-- Take Selfie --}}
                <div class="wrap-input100 bg1 rs1-alert-validate">

                    {{-- 1 --}}
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <span class="label-input100">Take a selfie PIC</span>
                            </div>
                            <div class="col-6">
                                <span class="label-input100"><b>Your captured image will appear here...</b></span>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div id="my_camera"></div>
                            </div>
                            <div class="col-6">
                                <div id="results"></div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <input type=button class="btn btn-primary btn-sm" value="Take Snapshot" onclick="take_snapshot()" required>
                        </div>
                        <div class="row justify-content-center">
                            <input class="@error('photo_checkin') is-invalid
                            @enderror" required autocomplete="photo_checkin" type="hidden" name="photo_checkin[]" id="image">
                            @error('photo_checkin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row justify-content-center my-2">
                            <input type="time" class="@error('checkin')@enderror" name="checkin[]" id="checkin" value="" required autocomplete="checkin" readonly>
                            @error('checkin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- 2 --}}
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <span class="label-input100">Take a selfie PIC</span>
                            </div>
                            <div class="col-6">
                                <span class="label-input100"><b>Your captured image will appear here...</b></span>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div id="my_camera2"></div>
                            </div>
                            <div class="col-6">
                                <div id="results2"></div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <input type=button class="btn btn-primary btn-sm" value="Take Snapshot" onclick="take_snapshot2()" required>
                        </div>
                        <div class="row justify-content-center">
                            <input class="@error('photo_checkin') is-invalid
                            @enderror" required autocomplete="photo_checkin" type="hidden" name="photo_checkin[]" id="image2">
                            @error('photo_checkin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row justify-content-center my-2">
                            <input type="time" class="@error('checkin')@enderror" name="checkin[]" id="checkin2" value="" required autocomplete="checkin" readonly>
                            @error('checkin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn">
						<span>
							Checkin
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

    $(document).ready(function(){


		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		});

        $('#pic').each(function(){
            $('#nama').change(function(){
                let id = $(this).val();
                $.ajax({
                    url: "{{url("/other/maintenance/visitor")}}"+'/'+id,
                    dataType:"json",
                    type: "get",
                    success: function(response){
                        const {visitor} = response;
                        console.log(visitor)
                    $('#company').val(visitor.visit_company);
                    $('#department').val(visitor.visit_department);
                    $('#phone').val(visitor.visit_phone);
                    $('#nik').val(visitor.visit_nik);
                    $('#respon').val(visitor.visit_respon);
                    }
                });
            })
        });

        // var nama = document.getElementById('nama')[];

        // $('#nama')[].change(function(){
        //     let id = $(this).val();
        //     // var data = [];
        //     $.ajax({
        //         url: "{{url("/other/maintenance/visitor")}}"+'/'+id,
        //         dataType:"json",
        //         type: "get",
        //         success: function(response){
        //             // data[] = response;
        //             const {visitor} = response;
        //             console.log(visitor);
        //             // var data_visitor = [];
        //             // data_visitor[] = visitor;
        //             // console.log(data_visitor['id']);
        //         $('#company')[].val(visitor.visit_company);
        //         $('#department')[].val(visitor.visit_department);
        //         $('#phone')[].val(visitor.visit_phone);
        //         $('#nik')[].val(visitor.visit_nik);
        //         $('#respon')[].val(visitor.visit_respon);
        //         }
        //     });
        // });

        $('#nama_2').change(function(){
            let id = $(this).val();
            $.ajax({
                url: "{{url("/other/maintenance/visitor")}}"+'/'+id,
                dataType:"json",
                type: "get",
                success: function(response){
                    const {visitor} = response;
                    console.log(visitor)
                $('#company_2').val(visitor.visit_company);
                $('#department_2').val(visitor.visit_department);
                $('#phone_2').val(visitor.visit_phone);
                $('#nik_2').val(visitor.visit_nik);
                $('#respon_2').val(visitor.visit_respon);
                }
            });
        });

        $('#nama_3').change(function(){
            let id = $(this).val();
            $.ajax({
                url: "{{url("/other/maintenance/visitor")}}"+'/'+id,
                dataType:"json",
                type: "get",
                success: function(response){
                    const {visitor} = response;
                    console.log(visitor)
                $('#company_3').val(visitor.visit_company);
                $('#department_3').val(visitor.visit_department);
                $('#phone_3').val(visitor.visit_phone);
                $('#nik_3').val(visitor.visit_nik);
                $('#respon_3').val(visitor.visit_respon);
                }
            });
        });

        $('#nama_4').change(function(){
            let id = $(this).val();
            $.ajax({
                url: "{{url("/other/maintenance/visitor")}}"+'/'+id,
                dataType:"json",
                type: "get",
                success: function(response){
                    const {visitor} = response;
                    console.log(visitor)
                $('#company_4').val(visitor.visit_company);
                $('#department_4').val(visitor.visit_department);
                $('#phone_4').val(visitor.visit_phone);
                $('#nik_4').val(visitor.visit_nik);
                $('#respon_4').val(visitor.visit_respon);
                }
            });
        });

        $('#nama_5').change(function(){
            let id = $(this).val();
            $.ajax({
                url: "{{url("/other/maintenance/visitor")}}"+'/'+id,
                dataType:"json",
                type: "get",
                success: function(response){
                    const {visitor} = response;
                    console.log(visitor)
                $('#company_5').val(visitor.visit_company);
                $('#department_5').val(visitor.visit_department);
                $('#phone_5').val(visitor.visit_phone);
                $('#nik_5').val(visitor.visit_nik);
                $('#respon_5').val(visitor.visit_respon);
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
        var datastring = $("#maintenance_form").serialize();
            $.ajax({
                type:'POST',
                url:"{{url('other/maintenance/form/checkin')}}",
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
                            location.href = "{{url("/logall")}}";
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
            $("#checkin").val(waktu);
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

            $("#checkin2").val(waktu);
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
