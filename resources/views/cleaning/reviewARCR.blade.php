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

    {{-- Boostsrap 5.1 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!--===============================================================================================-->
</head>
<body>

    @if($auth == 'security')
	<div class="container-contact100">
		<div class="wrap-contact100">
			<form id="form_cleaning" class="contact100-form validate-form" action="{{ route('cleaningApprove', $cleaning->cleaning_id) }}" method="POST">
                @csrf
				<span class="contact100-form-title">
					FORM CLEANING
				</span>

                {{-- Purpose of Work --}}
				<div class="wrap-input100 validate-input bg1" data-validate="Pilih Tujuan Pekerjaan">
					<span class="label-input100">Purpose of Work (Tujuan Pekerjaan) *</span>
                    <div>
                        <input type="text" class="input100" name="cleaning_work" value="{{ $cleaning->cleaning_work}}" required readonly>
                    </div>
				</div>

                {{-- Entry Area --}}
                <div class="wrap-contact100-form-radio">
                    <span class="label-input100">Authorized Entry Area (Area yang Dimasuki)</span>
                    <div class="contact100-form-radio">
                        <label class="label-radio100">
                            <input class="input100" id="loc1" name="loc1" value="{{ $cleaning->loc1 }}" readonly>
                        </label>
                    </div>

                    <div class="contact100-form-radio">
                        <label class="label-radio100">
                            <input class="input100" id="loc2" name="loc2" value="{{ $cleaning->loc2 }}" readonly>
                        </label>
                    </div>

                    <div class="contact100-form-radio">
                        <label class="label-radio100">
                            <input class="input100" id="loc3" name="loc3" value="{{ $cleaning->loc3 }}" readonly>
                        </label>
                    </div>

                    <div class="contact100-form-radio">
                        <label class="label-radio100">
                            <input class="input100" id="loc4" name="loc4" value="{{ $cleaning->loc4 }}" readonly>
                        </label>
                    </div>

                    <div class="contact100-form-radio">
                        <label class="label-radio100">
                            <input class="input100" id="loc5" name="loc5" value="{{ $cleaning->loc5 }}" readonly>
                        </label>
                    </div>

                    <div class="contact100-form-radio">
                        <label class="label-radio100">
                            <input class="input100" id="loc6" name="loc6" value="{{ $cleaning->loc6 }}" readonly>
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
                            <th><input type="time" name="time_start" value="{{ $cleaning->cleaning_time_start }}" readonly></th>
                            <th><input type="time" name="time_end" value="{{ $cleaning->cleaning_time_end }}" readonly></th>
                            <th><input type="text" class="input100" name="activity" value="{{ $cleaning->activity }}" readonly></th>
                            <th><input type="text" class="input100" name="detail_service" value="{{ $cleaning->detail_service }}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="time_start2" value="{{ $cleaning->cleaning_time_start2 }}" readonly></th>
                            <th><input type="time" name="time_end2" value="{{ $cleaning->cleaning_time_end2 }}" readonly></th>
                            <th><input type="text" class="input100" name="activity2" value="{{ $cleaning->activity2 }}" readonly></th>
                            <th><input type="text" class="input100" name="detail_service2" value="{{ $cleaning->detail_service2 }}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="time_start3" value="{{ $cleaning->cleaning_time_start3 }}" readonly></th>
                            <th><input type="time" name="time_end3" value="{{ $cleaning->cleaning_time_end3 }}" readonly></th>
                            <th><input type="text" class="input100" name="activity3" value="{{ $cleaning->activity3 }}" readonly></th>
                            <th><input type="text" class="input100" name="detail_service3" value="{{ $cleaning->detail_service3 }}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="time_start4" value="{{ $cleaning->cleaning_time_start4 }}" readonly></th>
                            <th><input type="time" name="time_end4" value="{{ $cleaning->cleaning_time_end4 }}" readonly></th>
                            <th><input type="text" class="input100" name="activity4" value="{{ $cleaning->activity4 }}" readonly></th>
                            <th><input type="text" class="input100" name="detail_service4" value="{{ $cleaning->detail_service4 }}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="time_start5" value="{{ $cleaning->cleaning_time_start5 }}" readonly></th>
                            <th><input type="time" name="time_end5" value="{{ $cleaning->cleaning_time_end5 }}" readonly></th>
                            <th><input type="text" class="input100" name="activity5" value="{{ $cleaning->activity5 }}" readonly></th>
                            <th><input type="text" class="input100" name="detail_service5" value="{{ $cleaning->detail_service5 }}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="time_start6" value="{{ $cleaning->cleaning_time_start6 }}" readonly></th>
                            <th><input type="time" name="time_end6" value="{{ $cleaning->cleaning_time_end6 }}" readonly></th>
                            <th><input type="text" class="input100" name="activity6" value="{{ $cleaning->activity6 }}" readonly></th>
                            <th><input type="text" class="input100" name="detail_service6" value="{{ $cleaning->detail_service6 }}" readonly></th>
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
                            <th><input type="text" class="input100" name="item" value="{{ $cleaning->item }}" readonly></th>
                            <th ><input type="text" class="input100" name="cleaning_procedure" value="{{ $cleaning->cleaning_procedure }}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item2" value="{{ $cleaning->item2 }}" readonly></th>
                            <th ><input type="text" class="input100" name="cleaning_procedure2" value="{{ $cleaning->cleaning_procedure2 }}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item3" value="{{ $cleaning->item3 }}" readonly></th>
                            <th ><input type="text" class="input100" name="cleaning_procedure3" value="{{ $cleaning->cleaning_procedure3 }}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item4" value="{{ $cleaning->item4 }}" readonly></th>
                            <th ><input type="text" class="input100" name="cleaning_procedure4" value="{{ $cleaning->cleaning_procedure4 }}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item5" value="{{ $cleaning->item5 }}" readonly></th>
                            <th ><input type="text" class="input100" name="cleaning_procedure5" value="{{ $cleaning->cleaning_procedure5 }}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item6" value="{{ $cleaning->item6 }}" readonly></th>
                            <th ><input type="text" class="input100" name="cleaning_procedure6" value="{{ $cleaning->cleaning_procedure6 }}" readonly></th>
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
                            <th><input type="text" class="input100" name="cleaning_risk" value="{{ $cleaning->cleaning_risk }}" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_possibility" value="{{ $cleaning->cleaning_possibility }}" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_impact" value="{{ $cleaning->cleaning_impact }}" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_mitigation" value="{{ $cleaning->cleaning_mitigation }}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="cleaning_risk2" value="{{ $cleaning->cleaning_risk2 }}" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_possibility2" value="{{ $cleaning->cleaning_possibility2 }}" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_impact2" value="{{ $cleaning->cleaning_impact2 }}" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_mitigation2" value="{{ $cleaning->cleaning_mitigation2 }}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="cleaning_risk3" value="{{ $cleaning->cleaning_risk3 }}" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_possibility3" value="{{ $cleaning->cleaning_possibility3 }}" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_impact3" value="{{ $cleaning->cleaning_impact3 }}" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_mitigation3" value="{{ $cleaning->cleaning_mitigation3 }}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="cleaning_risk4" value="{{ $cleaning->cleaning_risk4 }}" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_possibility4" value="{{ $cleaning->cleaning_possibility4 }}" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_impact4" value="{{ $cleaning->cleaning_impact4 }}" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_mitigation4" value="{{ $cleaning->cleaning_mitigation4 }}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="cleaning_risk5" value="{{ $cleaning->cleaning_risk5 }}" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_possibility5" value="{{ $cleaning->cleaning_possibility5 }}" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_impact5" value="{{ $cleaning->cleaning_impact5 }}" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_mitigation5" value="{{ $cleaning->cleaning_mitigation5 }}" readonly></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="cleaning_risk6" value="{{ $cleaning->cleaning_risk6 }}" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_possibility6" value="{{ $cleaning->cleaning_possibility6 }}" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_impact6" value="{{ $cleaning->cleaning_impact6 }}" readonly></th>
                            <th><input type="text" class="input100" name="cleaning_mitigation6" value="{{ $cleaning->cleaning_mitigation6 }}" readonly></th>
                        </tr>
                    </tbody>
                </table>

                {{-- Isian --}}
                <div class="wrap-input100 bg0 rs1-alert-validate">
					<span class="label-input100">Background and Objective (Latar Belakang dan Tujuan) *</span>
					<input type="text" class="input100" name="background" value="{{ $cleaning->cleaning_background }}" readonly>
				</div>
                <div class="wrap-input100 bg0 rs1-alert-validate">
					<span class="label-input100">Description of Scope of Work (Deskripsikan Lingkup Pekerjaan) *</span>
					<input type="text" class="input100" name="describ" value="{{ $cleaning->cleaning_describ }}" readonly>
				</div>
                <div class="wrap-input100 bg0 rs1-alert-validate">
					<span class="label-input100">Testing and Verification (Pengujian dan Verifikasi)</span>
					<input type="text" class="input100" name="testing" value="{{ $cleaning->cleaning_testing }}" readonly>
				</div>
                <div class="wrap-input100 bg0 rs1-alert-validate">
					<span class="label-input100">Rollback Operation/Other Infomation (Operasi Pembatalan/Infomasi Lain)</span>
					<input type="text" class="input100" name="rollback" value="{{ $cleaning->cleaning_rollback }}" readonly>
				</div>

                {{-- Validity --}}
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Pilih Tanggal Pekerjaan">
					<span class="label-input100">Validity (Tanggal Mulai Pekerjaan) *</span>
                    <input class="input100" type="date" name="validity_from" value="{{ $cleaning->validity_from }}" readonly>
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Pilih Tanggal Pekerjaan">
					<span class="label-input100">Validity (Tanggal Selesai Pekerjaan) *</span>
					<input class="input100" type="date" name="validity_to" value="{{ $cleaning->validity_to }}" readonly>
				</div>

                {{-- Pilih Personil --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Person In Charge 1(Nama Personil 1) *</span>
                    <div>
                        <select class="js-select2" id="pilihan1" name="cleaning_name">
                            <option value="{{ $name1->ob_id }}">{{ $cleaning->cleaning_name }}</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
				</div>
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Person In Charge 2(Nama Personil 2) *</span>
                    <div>
                        <select class="js-select2" id="pilihan2" name="cleaning_name2">
                            <option value="{{ $name2->ob_id }}">{{ $cleaning->cleaning_name2 }}</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
				</div>

                {{-- Phone Number --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Number Phone (Nomor HP Personil 1)</span>
                    <input type="text" class="input100" name="cleaning_number" value="{{ $cleaning->cleaning_number }}" readonly>
				</div>
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Number Phone (Nomor HP Personil 2)</span>
                    <input type="text" class="input100" name="cleaning_number2" value="{{ $cleaning->cleaning_number2 }}" readonly>
				</div>

                {{-- NIK  --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">ID Number (NIK Personil 1)</span>
                    <input type="text" class="input100" name="cleaning_nik" id="id_number" value="{{ $cleaning->cleaning_nik }}" readonly>
				</div>
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">ID Number (NIK Personil 2)</span>
                    <input type="text" class="input100" name="cleaning_nik_2" id="id_number2" value="{{ $cleaning->cleaning_nik_2 }}" readonly>
				</div>

                <table class="table table-hover" id="approval_table">
                    <tr >
                        <th >Requested By :</th>
                        <th >Reviewed By :</th>
                        <th >Checked By :</th>
                        <th >Acknowledge By :</th>
                    </tr>
                    <tr>
                        @switch($lasthistoryC->status)
                            @case('requested')
                                <td class="text-center">
                                    {{ $log[0]->name }}</br>
                                    {{ $cleaning->created_at }}
                                </td>
                                <td class="text-center">

                                </td>
                                <td class="text-center">

                                </td>
                                <td class="text-center">

                                </td>
                                @break

                            @case('reviewed')
                                <td class="text-center">
                                    {{ $log[0]->name }}</br>
                                    {{ $cleaning->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[1]->name }}</br>
                                    {{ $log[1]->created_at }}
                                </td>
                                <td class="text-center">

                                </td>
                                <td class="text-center">

                                </td>
                                @break

                            @case('checked')
                                <td class="text-center">
                                    {{ $log[0]->name }}</br>
                                    {{ $cleaning->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[1]->name }}</br>
                                    {{ $log[1]->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[2]->name }}</br>
                                    {{ $log[2]->created_at }}
                                </td>
                                <td class="text-center">

                                </td>
                                @break

                            @case('acknowledge')
                                <td class="text-center">
                                    {{ $log[0]->name }}</br>
                                    {{ $cleaning->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[1]->name }}</br>
                                    {{ $log[1]->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[2]->name }}</br>
                                    {{ $log[2]->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[3]->name }}</br>
                                    {{ $log[3]->created_at }}
                                </td>
                                @break
                        @endswitch
                    </tr>
                </table>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 text-center">
                            <a class="btn btn-lg btn-danger my-1 mx-1" href="{{ route('cleaningReject', $cleaning->cleaning_id) }}" type="submit" id="reject_button">
                                Reject
                            </a>
                        </div>
                        <div class="col-6 text-center">
                            <button class="btn btn-lg btn-success my-1 mx-1" id="approve_button" type="submit">
                                Approve
                            </button>
                        </div>
                    </div>
                </div>
			</form>
		</div>
	</div>
    @else
    <div class="container-contact100">
		<div class="wrap-contact100">
			<form id="form_cleaning" class="contact100-form validate-form" action="{{ route('cleaningApprove', $cleaning->cleaning_id) }}" method="POST">
                @csrf
				<span class="contact100-form-title">
					FORM CLEANING
				</span>

                {{-- Purpose of Work --}}
				<div class="wrap-input100 validate-input bg1" data-validate="Pilih Tujuan Pekerjaan">
					<span class="label-input100">Purpose of Work (Tujuan Pekerjaan) *</span>
                    <div>
                        <input type="text" class="input100" name="cleaning_work" value="{{ $cleaning->cleaning_work}}" required readonly>
                    </div>
				</div>

                {{-- Entry Area --}}
                <div class="wrap-contact100-form-radio">
                    <span class="label-input100">Authorized Entry Area (Area yang Dimasuki)</span>
                    <div class="contact100-form-radio">
                        <label class="label-radio100">
                            <input class="input100" id="loc1" name="loc1" value="{{ $cleaning->loc1 }}" readonly>
                        </label>
                    </div>

                    <div class="contact100-form-radio">
                        <label class="label-radio100">
                            <input class="input100" id="loc2" name="loc2" value="{{ $cleaning->loc2 }}" readonly>
                        </label>
                    </div>

                    <div class="contact100-form-radio">
                        <label class="label-radio100">
                            <input class="input100" id="loc3" name="loc3" value="{{ $cleaning->loc3 }}" readonly>
                        </label>
                    </div>

                    <div class="contact100-form-radio">
                        <label class="label-radio100">
                            <input class="input100" id="loc4" name="loc4" value="{{ $cleaning->loc4 }}" readonly>
                        </label>
                    </div>

                    <div class="contact100-form-radio">
                        <label class="label-radio100">
                            <input class="input100" id="loc5" name="loc5" value="{{ $cleaning->loc5 }}" readonly>
                        </label>
                    </div>

                    <div class="contact100-form-radio">
                        <label class="label-radio100">
                            <input class="input100" id="loc6" name="loc6" value="{{ $cleaning->loc6 }}" readonly>
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
                            <th><input type="time" name="time_start" value="{{ $cleaning->cleaning_time_start }}" required></th>
                            <th><input type="time" name="time_end" value="{{ $cleaning->cleaning_time_end }}" required></th>
                            <th><input type="text" class="input100" name="activity" value="{{ $cleaning->activity }}" required></th>
                            <th><input type="text" class="input100" name="detail_service" value="{{ $cleaning->detail_service }}" required></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="time_start2" value="{{ $cleaning->cleaning_time_start2 }}" ></th>
                            <th><input type="time" name="time_end2" value="{{ $cleaning->cleaning_time_end2 }}" ></th>
                            <th><input type="text" class="input100" name="activity2" value="{{ $cleaning->activity2 }}" ></th>
                            <th><input type="text" class="input100" name="detail_service2" value="{{ $cleaning->detail_service2 }}" ></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="time_start3" value="{{ $cleaning->cleaning_time_start3 }}" ></th>
                            <th><input type="time" name="time_end3" value="{{ $cleaning->cleaning_time_end3 }}" ></th>
                            <th><input type="text" class="input100" name="activity3" value="{{ $cleaning->activity3 }}" ></th>
                            <th><input type="text" class="input100" name="detail_service3" value="{{ $cleaning->detail_service3 }}" ></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="time_start4" value="{{ $cleaning->cleaning_time_start4 }}" ></th>
                            <th><input type="time" name="time_end4" value="{{ $cleaning->cleaning_time_end4 }}" ></th>
                            <th><input type="text" class="input100" name="activity4" value="{{ $cleaning->activity4 }}" ></th>
                            <th><input type="text" class="input100" name="detail_service4" value="{{ $cleaning->detail_service4 }}" ></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="time_start5" value="{{ $cleaning->cleaning_time_start5 }}" ></th>
                            <th><input type="time" name="time_end5" value="{{ $cleaning->cleaning_time_end5 }}" ></th>
                            <th><input type="text" class="input100" name="activity5" value="{{ $cleaning->activity5 }}" ></th>
                            <th><input type="text" class="input100" name="detail_service5" value="{{ $cleaning->detail_service5 }}" ></th>
                        </tr>
                        <tr>
                            <th><input type="time" name="time_start6" value="{{ $cleaning->cleaning_time_start6 }}" ></th>
                            <th><input type="time" name="time_end6" value="{{ $cleaning->cleaning_time_end6 }}" ></th>
                            <th><input type="text" class="input100" name="activity6" value="{{ $cleaning->activity6 }}" ></th>
                            <th><input type="text" class="input100" name="detail_service6" value="{{ $cleaning->detail_service6 }}" ></th>
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
                            <th><input type="text" class="input100" name="item" value="{{ $cleaning->item }}" required></th>
                            <th ><input type="text" class="input100" name="cleaning_procedure" value="{{ $cleaning->cleaning_procedure }}" required></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item2" value="{{ $cleaning->item2 }}"></th>
                            <th ><input type="text" class="input100" name="cleaning_procedure2" value="{{ $cleaning->cleaning_procedure2 }}"></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item3" value="{{ $cleaning->item3 }}"></th>
                            <th ><input type="text" class="input100" name="cleaning_procedure3" value="{{ $cleaning->cleaning_procedure3 }}"></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item4" value="{{ $cleaning->item4 }}"></th>
                            <th ><input type="text" class="input100" name="cleaning_procedure4" value="{{ $cleaning->cleaning_procedure4 }}"></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item5" value="{{ $cleaning->item5 }}"></th>
                            <th ><input type="text" class="input100" name="cleaning_procedure5" value="{{ $cleaning->cleaning_procedure5 }}"></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item6" value="{{ $cleaning->item6 }}"></th>
                            <th ><input type="text" class="input100" name="cleaning_procedure6" value="{{ $cleaning->cleaning_procedure6 }}"></th>
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
                            <th><input type="text" class="input100" name="cleaning_risk" value="{{ $cleaning->cleaning_risk }}" required></th>
                            <th><input type="text" class="input100" name="cleaning_possibility" value="{{ $cleaning->cleaning_possibility }}" required></th>
                            <th><input type="text" class="input100" name="cleaning_impact" value="{{ $cleaning->cleaning_impact }}" required></th>
                            <th><input type="text" class="input100" name="cleaning_mitigation" value="{{ $cleaning->cleaning_mitigation }}" required></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="cleaning_risk2" value="{{ $cleaning->cleaning_risk2 }}"></th>
                            <th><input type="text" class="input100" name="cleaning_possibility2" value="{{ $cleaning->cleaning_possibility2 }}"></th>
                            <th><input type="text" class="input100" name="cleaning_impact2" value="{{ $cleaning->cleaning_impact2 }}"></th>
                            <th><input type="text" class="input100" name="cleaning_mitigation2" value="{{ $cleaning->cleaning_mitigation2 }}"></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="cleaning_risk3" value="{{ $cleaning->cleaning_risk3 }}"></th>
                            <th><input type="text" class="input100" name="cleaning_possibility3" value="{{ $cleaning->cleaning_possibility3 }}"></th>
                            <th><input type="text" class="input100" name="cleaning_impact3" value="{{ $cleaning->cleaning_impact3 }}"></th>
                            <th><input type="text" class="input100" name="cleaning_mitigation3" value="{{ $cleaning->cleaning_mitigation3 }}"></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="cleaning_risk4" value="{{ $cleaning->cleaning_risk4 }}"></th>
                            <th><input type="text" class="input100" name="cleaning_possibility4" value="{{ $cleaning->cleaning_possibility4 }}"></th>
                            <th><input type="text" class="input100" name="cleaning_impact4" value="{{ $cleaning->cleaning_impact4 }}"></th>
                            <th><input type="text" class="input100" name="cleaning_mitigation4" value="{{ $cleaning->cleaning_mitigation4 }}"></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="cleaning_risk5" value="{{ $cleaning->cleaning_risk5 }}"></th>
                            <th><input type="text" class="input100" name="cleaning_possibility5" value="{{ $cleaning->cleaning_possibility5 }}"></th>
                            <th><input type="text" class="input100" name="cleaning_impact5" value="{{ $cleaning->cleaning_impact5 }}"></th>
                            <th><input type="text" class="input100" name="cleaning_mitigation5" value="{{ $cleaning->cleaning_mitigation5 }}"></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="cleaning_risk6" value="{{ $cleaning->cleaning_risk6 }}"></th>
                            <th><input type="text" class="input100" name="cleaning_possibility6" value="{{ $cleaning->cleaning_possibility6 }}"></th>
                            <th><input type="text" class="input100" name="cleaning_impact6" value="{{ $cleaning->cleaning_impact6 }}"></th>
                            <th><input type="text" class="input100" name="cleaning_mitigation6" value="{{ $cleaning->cleaning_mitigation6 }}"></th>
                        </tr>
                    </tbody>
                </table>

                {{-- Isian --}}
                <div class="wrap-input100 bg0 rs1-alert-validate">
					<span class="label-input100">Background and Objective (Latar Belakang dan Tujuan) *</span>
					<input type="text" class="input100" name="background" value="{{ $cleaning->cleaning_background }}" required>
				</div>
                <div class="wrap-input100 bg0 rs1-alert-validate">
					<span class="label-input100">Description of Scope of Work (Deskripsikan Lingkup Pekerjaan) *</span>
					<input type="text" class="input100" name="describ" value="{{ $cleaning->cleaning_describ }}" required>
				</div>
                <div class="wrap-input100 bg0 rs1-alert-validate">
					<span class="label-input100">Testing and Verification (Pengujian dan Verifikasi)</span>
					<input type="text" class="input100" name="testing" value="{{ $cleaning->cleaning_testing }}">
				</div>
                <div class="wrap-input100 bg0 rs1-alert-validate">
					<span class="label-input100">Rollback Operation/Other Infomation (Operasi Pembatalan/Infomasi Lain)</span>
					<input type="text" class="input100" name="rollback" value="{{ $cleaning->cleaning_rollback }}">
				</div>

                {{-- Validity --}}
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Pilih Tanggal Pekerjaan">
					<span class="label-input100">Validity (Tanggal Mulai Pekerjaan) *</span>
                    <input class="input100" type="date" name="validity_from" value="{{ $cleaning->validity_from }}" required>
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Pilih Tanggal Pekerjaan">
					<span class="label-input100">Validity (Tanggal Selesai Pekerjaan) *</span>
					<input class="input100" type="date" name="validity_to" value="{{ $cleaning->validity_to }}" required>
				</div>

                {{-- Pilih Personil --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Pilih Personil">
					<span class="label-input100">Person In Charge 1(Nama Personil 1) *</span>
                    <div>
                        <select class="js-select2" id="pilihan1" name="cleaning_name">
                            <option value="{{ $name1->ob_id }}">{{ $cleaning->cleaning_name }}</option>
                            @foreach($master_ob as $p)
                            <option value="{{ $p->ob_id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
				</div>
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Pilih Personil">
					<span class="label-input100">Person In Charge 2(Nama Personil 2) *</span>
                    <div>
                        <select class="js-select2" id="pilihan2" name="cleaning_name2">
                            <option value="{{ $name2->ob_id }}">{{ $cleaning->cleaning_name2 }}</option>
                            @foreach($master_ob as $p)
                            <option value="{{ $p->ob_id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
				</div>

                {{-- Phone Number --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Number Phone (Nomor HP Personil 1)</span>
                    <input type="text" class="input100" name="cleaning_number" id="phone_number" value="{{ $cleaning->cleaning_number }}" readonly>
				</div>
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Number Phone (Nomor HP Personil 2)</span>
                    <input type="text" class="input100" name="cleaning_number2" id="phone_number2" value="{{ $cleaning->cleaning_number2 }}" readonly>
				</div>

                {{-- NIK  --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">ID Number (NIK Personil 1)</span>
                    <input type="text" class="input100" name="cleaning_nik" id="id_number" value="{{ $cleaning->cleaning_nik }}" readonly>
				</div>
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">ID Number (NIK Personil 2)</span>
                    <input type="text" class="input100" name="cleaning_nik_2" id="id_number2" value="{{ $cleaning->cleaning_nik_2 }}" readonly>
				</div>

                <table class="table table-hover" id="approval_table">
                    <tr >
                        <th >Requested By :</th>
                        <th >Reviewed By :</th>
                        <th >Checked By :</th>
                        <th >Acknowledge By :</th>
                    </tr>
                    <tr>
                        @switch($lasthistoryC->status)
                            @case('requested')
                                <td class="text-center">
                                    {{ $log[0]->name }}</br>
                                    {{ $cleaning->created_at }}
                                </td>
                                <td class="text-center">

                                </td>
                                <td class="text-center">

                                </td>
                                <td class="text-center">

                                </td>
                                @break

                            @case('reviewed')
                                <td class="text-center">
                                    {{ $log[0]->name }}</br>
                                    {{ $cleaning->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[1]->name }}</br>
                                    {{ $log[1]->created_at }}
                                </td>
                                <td class="text-center">

                                </td>
                                <td class="text-center">

                                </td>
                                @break

                            @case('checked')
                                <td class="text-center">
                                    {{ $log[0]->name }}</br>
                                    {{ $cleaning->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[1]->name }}</br>
                                    {{ $log[1]->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[2]->name }}</br>
                                    {{ $log[2]->created_at }}
                                </td>
                                <td class="text-center">

                                </td>
                                @break

                            @case('acknowledge')
                                <td class="text-center">
                                    {{ $log[0]->name }}</br>
                                    {{ $cleaning->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[1]->name }}</br>
                                    {{ $log[1]->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[2]->name }}</br>
                                    {{ $log[2]->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[3]->name }}</br>
                                    {{ $log[3]->created_at }}
                                </td>
                                @break
                        @endswitch
                    </tr>
                </table>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 text-center">
                            <button type="button" class="btn btn-lg btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Reject
                            </button>
                        </div>
                        <div class="col-6 text-center">
                            <button class="btn btn-lg btn-success my-1 mx-1" id="approve_button" type="submit">
                                Approve
                            </button>
                        </div>
                    </div>
                </div>
			</form>

            {{-- Modal Reject --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Notes</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('cleaningReject', $cleaning->cleaning_id )}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="note" class="form-label">Note :</label>
                                    <input type="text" class="form-control" name="note" id="note" value="{{ old('note') }}" placeholder="Alasan di reject" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		</div>
	</div>
    @endif

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

	</script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/main.js')}}"></script>

</body>
</html>
