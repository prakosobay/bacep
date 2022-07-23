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
			<form id="maintenance_form" class="contact100-form validate-form" method="POST" action="{{ url('other/maintenance/update/checkin', $form->id)}}">
                @method('PUT')
                @csrf
				<span class="contact100-form-title">
					FORM MAINTENANCE
				</span>

                @if (session('gagal'))
                    <div class="alert alert-warning my-2 mx-2">
                        {{ session('gagal') }}
                    </div>
                @endif

                {{-- Purpose of Work --}}
				<div class="wrap-input100 validate-input bg1" data-validate="Pilih Tujuan Pekerjaan">
					<span class="label-input100">Purpose of Work (Tujuan Pekerjaan) *</span>
                    <div>
                        <input class="input100" type="text" id="work" value="{{$form->work}}" readonly>
                    </div>
				</div>

                {{-- Date of Visit --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate ="Pilih Tanggal Pekerjaan">
					<span class="label-input100">Date of Visit (Tanggal Mulai Pekerjaan) *</span>
                    <input class="input100" type="date" id="visit" value="{{$form->visit}}" readonly>
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
                                <input class="input100" id="loc1"  value="{{$form->loc1}}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc2"  value="{{$form->loc2}}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc3"  value="{{$form->loc3}}" readonly>
                            </label>
                        </div>
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc4"  value="{{$form->loc4}}" readonly>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc5"  value="{{$form->loc5}}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc6"  value="{{$form->loc6}}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc7"  value="{{$form->loc7}}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc8"  value="{{$form->loc8}}" readonly>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc9"  value="{{$form->loc9}}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc10"  value="{{$form->loc10}}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc11"  value="{{$form->loc11}}" readonly>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc12"  value="{{$form->loc12}}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc13"  value="{{$form->loc13}}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc14"  value="{{$form->loc14}}" readonly>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Isian --}}
                <div class="wrap-input100 bg1 rs1-alert-validate">
					<span class="label-input100">Background and Objective (Latar Belakang dan Tujuan) *</span>
					<input type="text" class="input100"  id="background" value="{{$form->background}}" readonly>
				</div>
                <div class="wrap-input100 bg1 rs1-alert-validate">
					<span class="label-input100">Description of Scope of Work (Deskripsikan Lingkup Pekerjaan) *</span>
					<input type="text" class="input100" id="describ" value="{{$form->desc}}" readonly>
				</div>
                <div class="wrap-input100 bg1">
					<span class="label-input100">Testing and Verification (Pengujian dan Verifikasi)</span>
					<input type="text" class="input100" id="testing" value="{{$form->testing}}" readonly>
				</div>
                <div class="wrap-input100 bg1">
					<span class="label-input100">Rollback Operation/Other Infomation (Operasi Pembatalan/Infomasi Lain)</span>
					<input type="text" class="input100" id="rollback" value="{{$form->rollback}}" readonly>
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
                            <th><input class="bg1" type="time" value="{{$form->time_start_1}}" readonly></th>
                            <th><input class="bg1" type="time" value="{{$form->time_end_1}}" readonly></th>
                            <th><input type="text" class="input100" id="activity_desciption_1" value="{{$form->activity_1}}" readonly></th>
                            <th><input type="text" class="input100" id="detail_service_1" value="{{$form->detail_1}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input class="bg1" type="time" value="{{$form->time_start_2}}" readonly></th>
                            <th><input class="bg1" type="time" value="{{$form->time_end_2}}" readonly></th>
                            <th><input type="text" class="input100" id="activity_desciption_2" value="{{$form->activity_2}}" readonly></th>
                            <th><input type="text" class="input100" id="detail_service_2" value="{{$form->detail_2}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input class="bg1" type="time" value="{{$form->time_start_3}}" readonly></th>
                            <th><input class="bg1" type="time" value="{{$form->time_end_3}}" readonly></th>
                            <th><input type="text" class="input100" id="activity_desciption_3" value="{{$form->activity_3}}" readonly></th>
                            <th><input type="text" class="input100" id="detail_service_3" value="{{$form->detail_3}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input class="bg1" type="time" value="{{$form->time_start_4}}" readonly></th>
                            <th><input class="bg1" type="time" value="{{$form->time_end_4}}" readonly></th>
                            <th><input type="text" class="input100" id="activity_desciption_4" value="{{$form->activity_4}}" readonly></th>
                            <th><input type="text" class="input100" id="detail_service_4" value="{{$form->detail_4}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input class="bg1" type="time" value="{{$form->time_start_5}}" readonly></th>
                            <th><input class="bg1" type="time" value="{{$form->time_end_5}}" readonly></th>
                            <th><input type="text" class="input100" id="activity_desciption_5" value="{{$form->activity_5}}" readonly></th>
                            <th><input type="text" class="input100" id="detail_service_5" value="{{$form->detail_5}}" readonly></th>
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
                            <th><input type="text" class="input100" id="item_1" value="{{$form->item_1}}" readonly></th>
                            <th ><input type="text" class="input100" id="working_procedure_1" value="{{$form->procedure_1}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" id="item_2" value="{{$form->item_2}}" readonly></th>
                            <th ><input type="text" class="input100" id="working_procedure_2" value="{{$form->procedure_2}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" id="item_3" value="{{$form->item_3}}" readonly></th>
                            <th ><input type="text" class="input100" id="working_procedure_3" value="{{$form->procedure_3}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" id="item_4" value="{{$form->item_4}}" readonly></th>
                            <th ><input type="text" class="input100" id="working_procedure_4" value="{{$form->procedure_4}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" id="item_5" value="{{$form->item_5}}" readonly></th>
                            <th ><input type="text" class="input100" id="working_procedure_5" value="{{$form->procedure_5}}" readonly></th>
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
                            <th><input type="text" class="input100" id="risk_description_1" value="{{$form->risk_1}}" readonly></th>
                            <th><input type="text" class="input100" id="possibility_1" value="{{$form->poss_1}}" readonly></th>
                            <th><input type="text" class="input100" id="impact_1" value="{{$form->impact_1}}" readonly></th>
                            <th><input type="text" class="input100" id="mitigation_plan_1" value="{{$form->mitigation_1}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" id="risk_description_2" value="{{$form->risk_2}}" readonly></th>
                            <th><input type="text" class="input100" id="possibility_2" value="{{$form->risk_2}}" readonly></th>
                            <th><input type="text" class="input100" id="impact_2" value="{{$form->impact_2}}" readonly></th>
                            <th><input type="text" class="input100" id="mitigation_plan_2" value="{{$form->mitigation_2}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" id="risk_description_3" value="{{$form->risk_3}}" readonly></th>
                            <th><input type="text" class="input100" id="possibility_3" value="{{$form->risk_3}}" readonly></th>
                            <th><input type="text" class="input100" id="impact_3" value="{{$form->impact_3}}" readonly></th>
                            <th><input type="text" class="input100" id="mitigation_plan_3" value="{{$form->mitigation_3}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" id="risk_description_4" value="{{$form->risk_4}}" readonly></th>
                            <th><input type="text" class="input100" id="possibility_4" value="{{$form->risk_4}}" readonly></th>
                            <th><input type="text" class="input100" id="impact_4" value="{{$form->impact_4}}" readonly></th>
                            <th><input type="text" class="input100" id="mitigation_plan_4" value="{{$form->mitigation_4}}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" id="risk_description_5" value="{{$form->risk_5}}" readonly></th>
                            <th><input type="text" class="input100" id="possibility_5" value="{{$form->risk_5}}" readonly></th>
                            <th><input type="text" class="input100" id="impact_5" value="{{$form->impact_5}}" readonly></th>
                            <th><input type="text" class="input100" id="mitigation_plan_5" value="{{$form->mitigation_4}}" readonly></th>
                        </tr>
                    </tbody>
                </table>

                {{-- Visitor --}}
                <table class="table table-bordered bg1 mt-3" width="100%">
                    <tr>
                        <th colspan="4"><b>Visitor</b></th>
                    </tr>
                    @foreach($other_personil as $person)
                        <tr>
                            <th>Name </th>
                            <td>
                                <input type="text" class="bg1 input100" value="{{$person->name}}" readonly>
                            </td>
                            <th>Company</th>
                            <td>
                                <input type="text" class="bg1 input100" value="{{$person->company}}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>ID Number </th>
                            <td>
                                <input type="text" class="bg1 input100" value="{{$person->number}}" readonly>
                            </td>
                            <th>Department </th>
                            <td>
                                <input type="text" class="bg1 input100" value="{{$person->department}}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>
                                <input type="text" class="bg1 input100" value="{{$person->phone}}" readonly>
                            </td>
                            <th>Responsibility </th>
                            <td>
                                <input type="text" class="bg1 input100" value="{{$person->respon}}" readonly>
                            </td>
                        </tr>
                    @endforeach

                        {{-- Visitor 1 --}}
                        <tr>
                            <th colspan="2">
                                <span>Take A Selfie Visitor 1</span>
                                <div id="my_camera"></div><br>
                                <input type="button" value="Take Snapshot" class="btn btn-sm btn-primary" onclick="take_snapshot()" required>
                            </th>
                            <th colspan="2" class="py-5">
                                <div id="results"></div><br>
                                <input class="@error('photo_checkin') is-invalid @enderror" required autocomplete="photo_checkin" type="hidden" name="photo_checkin[]" id="image">
                                @error('photo_checkin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span><br>
                                @enderror
                                <input type="time" class="@error('checkin') is-invalid @enderror" name="checkin[]" id="checkin" value="" required autocomplete="checkin" readonly>
                                @error('checkin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </th>
                        </tr>

                        {{-- Visitor 2 --}}
                        <tr>
                            <th colspan="2">
                                <span>Take A Selfie Visitor 2</span>
                                <div id="my_camera2"></div><br>
                                <input type="button" class="btn btn-sm btn-primary" value="Take Snapshot2" onclick="take_snapshot2()">
                            </th>
                            <th colspan="2" class="py-5">
                                <div id="results2"></div><br>
                                <input type="hidden" class="@error('photo_checkin2') is-invalid @enderror" name="photo_checkin[]" id="image2">
                                @error('photo_checkin2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span><br>
                                @enderror
                                <input type="time" class="@error('checkin2') is-invalid @enderror" name="checkin[]" id="checkin2" value="" readonly>
                                @error('checkin2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </th>
                        </tr>

                        {{-- Visitor 3 --}}
                        <tr>
                            <th colspan="2">
                                <span>Take A Selfie Visitor 3</span>
                                <div id="my_camera3"></div><br>
                                <input type="button" class="btn btn-sm btn-primary" value="Take Snapshot3" onclick="take_snapshot3()">
                            </th>
                            <th colspan="2" class="py-5">
                                <div id="results3"></div><br>
                                <input type="hidden" class="@error('photo_checkin3') is-invalid @enderror" name="photo_checkin[]" id="image3">
                                @error('photo_checkin3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span><br>
                                @enderror
                                <input type="time" class="@error('checkin3') is-invalid @enderror" name="checkin[]" id="checkin3" value="" readonly>
                                @error('checkin3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </th>
                        </tr>

                        {{-- Visitor 4 --}}
                        <tr>
                            <th colspan="2">
                                <span>Take A Selfie Visitor 4</span>
                                <div id="my_camera4"></div><br>
                                <input type="button" class="btn btn-sm btn-primary" value="Take Snapshot4" onclick="take_snapshot4()">
                            </th>
                            <th colspan="2" class="py-5">
                                <div id="results4"></div><br>
                                <input type="hidden" class="@error('photo_checkin4') is-invalid @enderror" name="photo_checkin[]" id="image4">
                                @error('photo_checkin4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span><br>
                                @enderror
                                <input type="time" class="@error('checkin4') is-invalid @enderror" name="checkin[]" id="checkin4" value="" readonly>
                                @error('checkin4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </th>
                        </tr>

                        {{-- Visitor 5 --}}
                        <tr>
                            <th colspan="2">
                                <span>Take A Selfie Visitor 5</span>
                                <div id="my_camera5"></div><br>
                                <input type="button" class="btn btn-sm btn-primary" value="Take Snapshot5" onclick="take_snapshot5()" >
                            </th>
                            <th colspan="2" class="py-5">
                                <div id="results5"></div><br>
                                <input type="hidden" class="@error('photo_checkin5') is-invalid @enderror"   name="photo_checkin[]" id="image5">
                                @error('photo_checkin5')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span><br>
                                @enderror
                                <input type="time" class="@error('checkin5') is-invalid @enderror" name="checkin[]" id="checkin5" value=""  readonly>
                                @error('checkin5')
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
            width: 450,
            height: 400,
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

        Webcam.attach( '#my_camera3' );
            function take_snapshot3() {
                Webcam.snap( function(data_uri) {
                    $("#image3").val(data_uri);
                    document.getElementById('results3').innerHTML = '<img src="'+data_uri+'"/>';
                });
                var tanggal = new Date();
                var jam = tanggal.getHours();
                var menit = tanggal.getMinutes();
                var detik = tanggal.getSeconds();
                jam = jam < 10 ? '0' +jam : jam;
                menit = menit < 10 ? '0'+menit : menit;
                detik = detik < 10 ? '0'+detik : detik;
                var waktu = jam + ':' + menit + ':' + detik;
                $("#checkin3").val(waktu);
            }

        Webcam.attach( '#my_camera4' );
            function take_snapshot4() {
                Webcam.snap( function(data_uri) {
                    $("#image4").val(data_uri);
                    document.getElementById('results4').innerHTML = '<img src="'+data_uri+'"/>';
                });
                var tanggal = new Date();
                var jam = tanggal.getHours();
                var menit = tanggal.getMinutes();
                var detik = tanggal.getSeconds();
                jam = jam < 10 ? '0' +jam : jam;
                menit = menit < 10 ? '0'+menit : menit;
                detik = detik < 10 ? '0'+detik : detik;
                var waktu = jam + ':' + menit + ':' + detik;
                $("#checkin4").val(waktu);
            }

        Webcam.attach( '#my_camera5' );
            function take_snapshot5() {
                Webcam.snap( function(data_uri) {
                    $("#image5").val(data_uri);
                    document.getElementById('results5').innerHTML = '<img src="'+data_uri+'"/>';
                });
                var tanggal = new Date();
                var jam = tanggal.getHours();
                var menit = tanggal.getMinutes();
                var detik = tanggal.getSeconds();
                jam = jam < 10 ? '0' +jam : jam;
                menit = menit < 10 ? '0'+menit : menit;
                detik = detik < 10 ? '0'+detik : detik;
                var waktu = jam + ':' + menit + ':' + detik;
                $("#checkin5").val(waktu);
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
