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

    {{-- Boostsrap 5.1 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!--===============================================================================================-->
</head>
<body>

	<div class="container-contact100">
		<div class="wrap-contact100">
			<form id="maintenance_form" class="contact100-form validate-form" method="POST" action="{{ route('maintenanceApproval', $other->id) }}">
                @csrf
				<span class="contact100-form-title">
					FORM MAINTENANCE
				</span>

                {{-- Purpose of Work --}}
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Purpose of Work (Tujuan Pekerjaan) *</span>
                    <input class="input100" type="text" id="work" value="{{ $other->work }}" readonly>
				</div>

                {{-- Date of Visit --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate ="Pilih Tanggal Pekerjaan">
					<span class="label-input100">Date of Visit (Tanggal Mulai Pekerjaan) *</span>
                    <input class="input100" type="date" name="visit" id="visit" value="{{ $other->visit }}" required>
				</div>

                {{-- Date of Leave --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate ="Pilih Tanggal Pekerjaan">
					<span class="label-input100">Date of Leave (Tanggal Selesai Pekerjaan) *</span>
                    <input class="input100" type="date" name="leave" id="leave" value="{{ $other->leave }}" required>
				</div>

                {{-- Entry Area --}}
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc1" name="loc1" value="{{ $other->loc1 }}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc2" name="loc2" value="{{ $other->loc2 }}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc3" name="loc3" value="{{ $other->loc3 }}" readonly>
                            </label>
                        </div>
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc4" name="loc4" value="{{ $other->loc4 }}" readonly>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc5" name="loc5" value="{{ $other->loc5 }}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc6" name="loc6" value="{{ $other->loc6 }}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc7" name="loc7" value="{{ $other->loc7 }}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc8" name="loc8" value="{{ $other->loc8 }}" readonly>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc9" name="loc9" value="{{ $other->loc9 }}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc10" name="loc10" value="{{ $other->loc10 }}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc11" name="loc11" value="{{ $other->loc11 }}" readonly>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc12" name="loc12" value="{{ $other->loc12 }}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc13" name="loc13" value="{{ $other->loc13 }}" readonly>
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <label class="label-radio100">
                                <input class="input100" id="loc14" name="loc14" value="{{ $other->loc14 }}" readonly>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Isian --}}
                <div class="wrap-input100 bg1 rs1-alert-validate">
					<span class="label-input100">Background and Objective (Latar Belakang dan Tujuan) *</span>
					<input type="text" class="input100" name="background" id="background" value="{{ $other->background }}" required>
				</div>
                <div class="wrap-input100 bg1 rs1-alert-validate">
					<span class="label-input100">Description of Scope of Work (Deskripsikan Lingkup Pekerjaan) *</span>
					<input type="text" class="input100" name="describ" id="describ" value="{{ $other->desc }}" required>
				</div>
                <div class="wrap-input100 bg1">
					<span class="label-input100">Testing and Verification (Pengujian dan Verifikasi)</span>
					<input type="text" class="input100" name="testing" id="testing" value="{{ $other->testing }}">
				</div>
                <div class="wrap-input100 bg1">
					<span class="label-input100">Rollback Operation/Other Infomation (Operasi Pembatalan/Infomasi Lain)</span>
					<input type="text" class="input100" name="rollback" id="rollback" value="{{ $other->rollback }}">
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
                            <th><input class="bg1" type="time" name="time_start_1" value="{{ $other->time_start_1 }}" required></th>
                            <th><input class="bg1" type="time" name="time_end_1" value="{{ $other->time_end_1 }}" required></th>
                            <th><input type="text" class="input100" name="activity_1" id="activity_desciption_1" value="{{ $other->activity_1 }}" required></th>
                            <th><input type="text" class="input100" name="detail_1" id="detail_service_1" value="{{ $other->detail_1 }}" required></th>
                        </tr>
                        <tr>
                            <th><input class="bg1" type="time" name="time_start_2" value="{{ $other->time_start_2 }}"></th>
                            <th><input class="bg1" type="time" name="time_end_2" value="{{ $other->time_end_2 }}"></th>
                            <th><input type="text" class="input100" name="activity_2" id="activity_desciption_2" value="{{ $other->activity_2 }}"></th>
                            <th><input type="text" class="input100" name="detail_2" id="detail_service_2" value="{{ $other->detail_2 }}"></th>
                        </tr>
                        <tr>
                            <th><input class="bg1" type="time" name="time_start_3" value="{{ $other->time_start_3 }}"></th>
                            <th><input class="bg1" type="time" name="time_end_3" value="{{ $other->time_end_3 }}"></th>
                            <th><input type="text" class="input100" name="activity_3" id="activity_desciption_3" value="{{ $other->activity_3 }}"></th>
                            <th><input type="text" class="input100" name="detail_3" id="detail_service_3" value="{{ $other->detail_3 }}"></th>
                        </tr>
                        <tr>
                            <th><input class="bg1" type="time" name="time_start_4" value="{{ $other->time_start_4 }}"></th>
                            <th><input class="bg1" type="time" name="time_end_4" value="{{ $other->time_end_4 }}"></th>
                            <th><input type="text" class="input100" name="activity_4" id="activity_desciption_4" value="{{ $other->activity_4 }}"></th>
                            <th><input type="text" class="input100" name="detail_4" id="detail_service_4" value="{{ $other->detail_4 }}"></th>
                        </tr>
                        <tr>
                            <th><input class="bg1" type="time" name="time_start_5" value="{{ $other->time_start_5 }}"></th>
                            <th><input class="bg1" type="time" name="time_end_5" value="{{ $other->time_end_5 }}"></th>
                            <th><input type="text" class="input100" name="activity_5" id="activity_desciption_5" value="{{ $other->activity_5 }}"></th>
                            <th><input type="text" class="input100" name="detail_5" id="detail_service_5" value="{{ $other->detail_5 }}"></th>
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
                            <th><input type="text" class="input100" name="item_1" id="item_1" value="{{ $other->item_1 }}" required></th>
                            <th ><input type="text" class="input100" name="procedure_1" id="working_procedure_1" value="{{ $other->procedure_1 }}" required></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item_2" id="item_2" value="{{ $other->item_2 }}"></th>
                            <th ><input type="text" class="input100" name="procedure_2" id="working_procedure_2" value="{{ $other->procedure_2 }}"></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item_3" id="item_3" value="{{ $other->item_3 }}"></th>
                            <th ><input type="text" class="input100" name="procedure_3" id="working_procedure_3" value="{{ $other->procedure_3 }}"></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item_4" id="item_4" value="{{ $other->item_4 }}"></th>
                            <th ><input type="text" class="input100" name="procedure_4" id="working_procedure_4" value="{{ $other->procedure_4 }}"></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="item_5" id="item_5" value="{{ $other->item_5 }}"></th>
                            <th ><input type="text" class="input100" name="procedure_5" id="working_procedure_5" value="{{ $other->procedure_5 }}"></th>
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
                            <th><input type="text" class="input100" name="risk_1" id="risk_description_1" value="{{ $other->risk_1 }}" required></th>
                            <th><input type="text" class="input100" name="poss_1" id="possibility_1" value="{{ $other->poss_1 }}" required></th>
                            <th><input type="text" class="input100" name="impact_1" id="impact_1" value="{{ $other->impact_1 }}" required></th>
                            <th><input type="text" class="input100" name="mitigation_1" id="mitigation_plan_1" value="{{ $other->mitigation_1 }}" required></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="risk_2" id="risk_description_2" value="{{ $other->risk_2 }}"></th>
                            <th><input type="text" class="input100" name="poss_2" id="possibility_2" value="{{ $other->poss_2 }}"></th>
                            <th><input type="text" class="input100" name="impact_2" id="impact_2" value="{{ $other->impact_2 }}"></th>
                            <th><input type="text" class="input100" name="mitigation_2" id="mitigation_plan_2" value="{{ $other->mitigation_2 }}"></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="risk_3" id="risk_description_3" value="{{ $other->risk_3 }}"></th>
                            <th><input type="text" class="input100" name="poss_3" id="possibility_3" value="{{ $other->poss_3 }}"></th>
                            <th><input type="text" class="input100" name="impact_3" id="impact_3" value="{{ $other->impact_3 }}"></th>
                            <th><input type="text" class="input100" name="mitigation_3" id="mitigation_plan_3" value="{{ $other->mitigation_3 }}"></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="risk_4" id="risk_description_4" value="{{ $other->risk_4 }}"></th>
                            <th><input type="text" class="input100" name="poss_4" id="possibility_4" value="{{ $other->poss_4 }}"></th>
                            <th><input type="text" class="input100" name="impact_4" id="impact_4" value="{{ $other->impact_4 }}"></th>
                            <th><input type="text" class="input100" name="mitigation_4" id="mitigation_plan_4" value="{{ $other->mitigation_4 }}"></th>
                        </tr>
                        <tr>
                            <th><input type="text" class="input100" name="risk_5" id="risk_description_5" value="{{ $other->risk_5 }}"></th>
                            <th><input type="text" class="input100" name="poss_5" id="possibility_5" value="{{ $other->poss_5 }}"></th>
                            <th><input type="text" class="input100" name="impact_5" id="impact_5" value="{{ $other->impact_5 }}"></th>
                            <th><input type="text" class="input100" name="mitigation_5" id="mitigation_plan_5" value="{{ $other->mitigation_5 }}"></th>
                        </tr>
                    </tbody>
                </table>

                {{-- PIC --}}
                <table class="table table-bordered bg1">
                    <tr>
                        <th colspan="5"><b>Visitor</b></th>
                    </tr>
                    <tr>
                        <th rowspan="4">PIC 1</th>
                    </tr>


                    {{-- PIC 1 --}}
                    <tr>
                        <th>Name </th>
                        <td>
                            {{-- <select class="js-select2" name="visit_nama[]" id="nama">
                                    <option value="{{ $visitors[0]['id'] }}">{{ $visitors[0]['visit_nama']}}</option>
                                @foreach ($personil as $p)
                                    <option value="{{ $p->id }}">{{ $p->visit_nama }}</option>
                                @endforeach
                            </select> --}}
                            <input type="text" class="input100" name="visit_nama[]" id="company" value="{{ $visitors[0]['visit_nama']}}" readonly>
                            {{-- <div class="dropDownSelect2"></div> --}}
                        </td>
                        <th>Company</th>
                        <td>
                            <input type="text" class="input100" name="visit_company[]" id="company" value="{{ $visitors[0]['visit_company']}}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>ID Number </th>
                        <td>
                            <input type="text" class="input100" name="visit_nik[]" id="nik" value="{{ $visitors[0]['visit_nik'] }}" readonly>
                        </td>
                        <th>Department </th>
                        <td>
                            <input type="text" class="input100" name="visit_department[]" id="department" value="{{ $visitors[0]['visit_department'] }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>
                            <input type="text" class="input100" name="visit_phone[]" id="phone" value="{{ $visitors[0]['visit_phone'] }}" readonly>
                        </td>
                        <th>Responsibility </th>
                        <td>
                            <input type="text" class="input100" name="visit_respon[]" id="respon" value="{{ $visitors[0]['visit_respon'] }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th rowspan="4">PIC 2</th>
                    </tr>

                    {{-- PIC 2 --}}
                    @if(!empty($visitors[1]))
                        <tr>
                            <th>Name </th>
                            <td>
                                {{-- <select class="js-select2" name="visit_nama[]" id="nama_2">
                                    <option value="{{ $visitors[1]['id'] }}">{{ $visitors[1]['visit_nama'] }}</option>
                                    @foreach ($personil as $p)
                                        <option value="{{$p->id}}">{{$p->visit_nama}}</option>
                                    @endforeach
                                </select>
                                <div class="dropDownSelect2"></div> --}}
                                <input type="text" class="input100" name="visit_nama[]" id="company_2" value="{{ $visitors[1]['visit_nama'] }}" readonly>
                            </td>
                            <th>Company</th>
                            <td>
                                <input type="text" class="input100" name="visit_company[]" id="company_2" value="{{ $visitors[1]['visit_company'] }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>ID Number </th>
                            <td>
                                <input type="text" class="input100" name="visit_nik[]" id="nik_2" value="{{ $visitors[1]['visit_nik'] }}" readonly>
                            </td>
                            <th>Department </th>
                            <td>
                                <input type="text" class="input100" name="visit_department[]" id="department_2" value="{{ $visitors[1]['visit_department'] }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>
                                <input type="text" class="input100" name="visit_phone[]" id="phone_2" value="{{ $visitors[1]['visit_phone'] }}" readonly>
                            </td>
                            <th>Responsibility </th>
                            <td>
                                <input type="text" class="input100" name="visit_respon[]" id="respon_2" value="{{ $visitors[1]['visit_respon'] }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th rowspan="4">PIC 3</th>
                        </tr>
                    @else
                        <tr>
                            <th>Name </th>
                            <td>
                                {{-- <select class="js-select2" name="visit_nama[]" id="nama_2">
                                    <option value=""></option>
                                    @foreach ($personil as $p)
                                        <option value="{{$p->id}}">{{$p->visit_nama}}</option>
                                    @endforeach
                                </select>
                                <div class="dropDownSelect2"></div> --}}
                                <input type="text" class="input100" name="visit_nama[]" id="nama_2" value="" readonly>
                            </td>
                            <th>Company</th>
                            <td>
                                <input type="text" class="input100" name="visit_company[]" id="company_2" value="" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>ID Number </th>
                            <td>
                                <input type="text" class="input100" name="visit_nik[]" id="nik_2" value="" readonly>
                            </td>
                            <th>Department </th>
                            <td>
                                <input type="text" class="input100" name="visit_department[]" id="department_2" value="" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>
                                <input type="text" class="input100" name="visit_phone[]" id="phone_2" value="" readonly>
                            </td>
                            <th>Responsibility </th>
                            <td>
                                <input type="text" class="input100" name="visit_respon[]" id="respon_2" value="" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th rowspan="4">PIC 3</th>
                        </tr>
                    @endif

                    {{-- PIC 3 --}}
                    @if(!empty($visitors[2]))
                        <tr>
                            <th>Name </th>
                            <td>
                                {{-- <select class="js-select2" name="visit_nama[]" id="nama_3">
                                    <option value="{{ $visitors[2]['id'] }}">{{ $visitors[2]['visit_nama'] }}</option>
                                    @foreach ($personil as $p)
                                        <option value="{{$p->id}}">{{$p->visit_nama}}</option>
                                    @endforeach
                                </select>
                                <div class="dropDownSelect2"></div> --}}
                                <input type="text" class="input100" name="visit_nama[]" id="company_3" value="{{ $visitors[2]['visit_nama'] }}" readonly>
                            </td>
                            <th>Company</th>
                            <td>
                                <input type="text" class="input100" name="visit_company[]" id="company_3" value="{{ $visitors[2]['visit_company'] }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>ID Number </th>
                            <td>
                                <input type="text" class="input100" name="visit_nik[]" id="nik_3" value="{{ $visitors[2]['visit_nik'] }}" readonly>
                            </td>
                            <th>Department </th>
                            <td>
                                <input type="text" class="input100" name="visit_department[]" id="department_3" value="{{ $visitors[2]['visit_department'] }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>
                                <input type="text" class="input100" name="visit_phone[]" id="phone_3" value="{{ $visitors[2]['visit_phone'] }}" readonly>
                            </td>
                            <th>Responsibility </th>
                            <td>
                                <input type="text" class="input100" name="visit_respon[]" id="respon_3" value="{{ $visitors[2]['visit_respon'] }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th rowspan="4">PIC 4</th>
                        </tr>
                    @else
                        <tr>
                            <th>Name </th>
                            <td>
                                {{-- <select class="js-select2" name="visit_nama[]" id="nama_3">
                                    <option value=""></option>
                                    @foreach ($personil as $p)
                                        <option value="{{$p->id}}">{{$p->visit_nama}}</option>
                                    @endforeach
                                </select>
                                <div class="dropDownSelect2"></div> --}}
                                <input type="text" class="input100" name="visit_nama[]" id="nama_3" value="" readonly>
                            </td>
                            <th>Company</th>
                            <td>
                                <input type="text" class="input100" name="visit_company[]" id="company_3" value="" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>ID Number </th>
                            <td>
                                <input type="text" class="input100" name="visit_nik[]" id="nik_3" value="" readonly>
                            </td>
                            <th>Department </th>
                            <td>
                                <input type="text" class="input100" name="visit_department[]" id="department_3" value="" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>
                                <input type="text" class="input100" name="visit_phone[]" id="phone_3" value="" readonly>
                            </td>
                            <th>Responsibility </th>
                            <td>
                                <input type="text" class="input100" name="visit_respon[]" id="respon_3" value="" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th rowspan="4">PIC 4</th>
                        </tr>
                    @endif

                    {{-- PIC 4 --}}
                    @if(!empty($visitors[3]))
                        <tr>
                            <th>Name </th>
                            <td>
                                {{-- <select class="js-select2" name="visit_nama[]" id="nama_4">
                                    <option value="{{ $visitors[3]['id'] }}">{{ $visitors[3]['visit_nama'] }}</option>
                                    @foreach ($personil as $p)
                                        <option value="{{$p->id}}">{{$p->visit_nama}}</option>
                                    @endforeach
                                </select>
                                <div class="dropDownSelect2"></div> --}}
                                <input type="text" class="input100" name="visit_nama[]" id="company_4" value="{{ $visitors[3]['visit_nama'] }}" readonly>
                            </td>
                            <th>Company</th>
                            <td>
                                <input type="text" class="input100" name="visit_company[]" id="company_4" value="{{ $visitors[3]['visit_company'] }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>ID Number </th>
                            <td>
                                <input type="text" class="input100" name="visit_nik[]" id="nik_4" value="{{ $visitors[3]['visit_nik'] }}" readonly>
                            </td>
                            <th>Department </th>
                            <td>
                                <input type="text" class="input100" name="visit_department[]" id="department_4" value="{{ $visitors[3]['visit_department'] }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>
                                <input type="text" class="input100" name="visit_phone[]" id="phone_4" value="{{ $visitors[3]['visit_phone'] }}" readonly>
                            </td>
                            <th>Responsibility </th>
                            <td>
                                <input type="text" class="input100" name="visit_respon[]" id="respon_4" value="{{ $visitors[3]['visit_respon'] }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th rowspan="4">PIC 5</th>
                        </tr>
                    @else
                        <tr>
                            <th>Name </th>
                            <td>
                                {{-- <select class="js-select2" name="visit_nama[]" id="nama_4">
                                    <option value=""></option>
                                    @foreach ($personil as $p)
                                        <option value="{{$p->id}}">{{$p->visit_nama}}</option>
                                    @endforeach
                                </select>
                                <div class="dropDownSelect2"></div> --}}
                                <input type="text" class="input100" name="visit_nama[]" id="nama_4" value="" readonly>
                            </td>
                            <th>Company</th>
                            <td>
                                <input type="text" class="input100" name="visit_company[]" id="company_4" value="" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>ID Number </th>
                            <td>
                                <input type="text" class="input100" name="visit_nik[]" id="nik_4" value="" readonly>
                            </td>
                            <th>Department </th>
                            <td>
                                <input type="text" class="input100" name="visit_department[]" id="department_4" value="" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>
                                <input type="text" class="input100" name="visit_phone[]" id="phone_4" value="" readonly>
                            </td>
                            <th>Responsibility </th>
                            <td>
                                <input type="text" class="input100" name="visit_respon[]" id="respon_4" value="" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th rowspan="4">PIC 5</th>
                        </tr>
                    @endif

                    {{-- PIC 5 --}}
                    @if(!empty($visitors[4]))
                        <tr>
                            <th>Name </th>
                            <td>
                                {{-- <select class="js-select2" name="visit_nama[]" id="nama_5">
                                    <option value="{{ $visitors[4]['id'] }}">{{ $visitors[4]['visit_nama'] }}</option>
                                    @foreach ($personil as $p)
                                        <option value="{{$p->id}}">{{$p->visit_nama}}</option>
                                    @endforeach
                                </select>
                                <div class="dropDownSelect2"></div> --}}
                                <input type="text" class="input100" name="visit_nama[]" id="company_5" value="{{ $visitors[4]['visit_nama'] }}" readonly>
                            </td>
                            <th>Company</th>
                            <td>
                                <input type="text" class="input100" name="visit_company[]" id="company_5" value="{{ $visitors[4]['visit_company'] }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>ID Number </th>
                            <td>
                                <input type="text" class="input100" name="visit_nik[]" id="nik_5" value="{{ $visitors[4]['visit_nik'] }}" readonly>
                            </td>
                            <th>Department </th>
                            <td>
                                <input type="text" class="input100" name="visit_department[]" id="department_5" value="{{ $visitors[4]['visit_department'] }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>
                                <input type="text" class="input100" name="visit_phone[]" id="phone_5" value="{{ $visitors[4]['visit_phone'] }}" readonly>
                            </td>
                            <th>Responsibility </th>
                            <td>
                                <input type="text" class="input100" name="visit_respon[]" id="respon_5" value="{{ $visitors[4]['visit_respon'] }}" readonly>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <th>Name </th>
                            <td>
                                {{-- <select class="js-select2" name="visit_nama[]" id="nama_5">
                                    <option value=""></option>
                                    @foreach ($personil as $p)
                                        <option value="{{$p->id}}">{{$p->visit_nama}}</option>
                                    @endforeach
                                </select>
                                <div class="dropDownSelect2"></div> --}}
                                <input type="text" class="input100" name="visit_nama[]" id="nama_5" value="" readonly>
                            </td>
                            <th>Company</th>
                            <td>
                                <input type="text" class="input100" name="visit_company[]" id="company_5" value="" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>ID Number </th>
                            <td>
                                <input type="text" class="input100" name="visit_nik[]" id="nik_5" value="" readonly>
                            </td>
                            <th>Department </th>
                            <td>
                                <input type="text" class="input100" name="visit_department[]" id="department_5" value="" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>
                                <input type="text" class="input100" name="visit_phone[]" id="phone_5" value="" readonly>
                            </td>
                            <th>Responsibility </th>
                            <td>
                                <input type="text" class="input100" name="visit_respon[]" id="respon_5" value="" readonly>
                            </td>
                        </tr>
                    @endif
                </table>

                {{-- Approval Table --}}
                <table class="table table-hover" id="approval_table">
                    <tr >
                        <th class="text-center">Requested By :</th>
                        <th class="text-center">Reviewed By :</th>
                        <th class="text-center">Checked By :</th>
                        <th class="text-center">Acknowledge By :</th>
                    </tr>
                    <tr>
                        @switch($getLastOther->status)
                            @case('requested')
                                <td class="text-center">
                                    {{ $getHistory[0]->created_by }}</br>
                                    {{ $other->created_at }}
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
                                    {{ $getHistory[0]->created_by }}</br>
                                    {{ $other->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $getHistory[1]->created_by }}</br>
                                    {{ $getHistory[1]->created_at }}
                                </td>
                                <td class="text-center">

                                </td>
                                <td class="text-center">

                                </td>
                                @break

                            @case('checked')
                                <td class="text-center">
                                    {{ $getHistory[0]->created_by }}</br>
                                    {{ $other->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $getHistory[1]->created_by }}</br>
                                    {{ $getHistory[1]->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $getHistory[2]->created_by }}</br>
                                    {{ $getHistory[2]->created_at }}
                                </td>
                                <td class="text-center">

                                </td>
                                @break

                            @case('acknowledge')
                                <td class="text-center">
                                    {{ $getHistory[0]->created_by }}</br>
                                    {{ $other->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $getHistory[1]->created_by }}</br>
                                    {{ $getHistory[1]->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $getHistory[2]->created_by }}</br>
                                    {{ $getHistory[2]->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $getHistory[3]->created_by }}</br>
                                    {{ $getHistory[3]->created_at }}
                                </td>
                                @break
                        @endswitch
                    </tr>
                </table>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 text-center">
                            <button type="button" class="btn btn-lg btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $other->id }}">
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
            <div class="modal fade" id="exampleModal{{ $other->id }}" tabindex="-1" data-id="{{ $other->id }}" aria-labelledby="exampleModalLabel{{ $other->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel{{ $other->id }}">Notes</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('maintenance/reject', $other->id )}}" method="post">
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
        });

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

	</script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/main.js')}}"></script>

</body>
</html>
