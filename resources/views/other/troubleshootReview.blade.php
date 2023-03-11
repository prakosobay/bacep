<!DOCTYPE html>
<html lang="en">
<head>
	<title>Form Troubleshoot</title>
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
			<form id="maintenance_form" class="contact100-form validate-form" method="POST" action="{{ route('tApprove', $form->id) }}">
                @csrf
				<span class="contact100-form-title">
					FORM TROUBLESHOOT
				</span>

                {{-- Purpose of Work --}}
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Purpose of Work (Tujuan Pekerjaan) *</span>
                    <input class="input100" type="text" id="work" value="{{ $form->work }}" readonly>
				</div>

                {{-- Date of Visit --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate ="Pilih Tanggal Pekerjaan">
					<span class="label-input100">Date of Visit (Tanggal Mulai Pekerjaan) *</span>
                    <input class="input100" type="date" name="visit" id="visit" value="{{ $form->visit }}" readonly>
				</div>

                {{-- Date of Leave --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate ="Pilih Tanggal Pekerjaan">
					<span class="label-input100">Date of Leave (Tanggal Selesai Pekerjaan) *</span>
                    <input class="input100" type="date" name="leave" id="leave" value="{{ $form->leave }}" readonly>
				</div>

                {{-- Entry Area --}}
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        @if($form->entry->dc == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="dc" value="Server Room" readonly>
                                </label>
                            </div>
                        @else
                        @endif

                        @if($form->entry->mmr1 == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="mmr1" value="MMR 1" readonly>
                                </label>
                            </div>
                        @else
                        @endif

                        @if($form->entry->mmr2 == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="mmr2" value="MMR 2" readonly>
                                </label>
                            </div>
                        @else
                        @endif

                        @if($form->entry->ups == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="ups" value="UPS Room" readonly>
                                </label>
                            </div>
                        @else
                        @endif
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        @if($form->entry->fss == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="fss" value="FSS Room" readonly>
                                </label>
                            </div>
                        @else
                        @endif

                        @if($form->entry->cctv == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="cctv" value="CCTV Room" readonly>
                                </label>
                            </div>
                        @else
                        @endif

                        @if($form->entry->trafo == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="trafo" value="Trafo Room" readonly>
                                </label>
                            </div>
                        @else
                        @endif

                        @if($form->entry->baterai == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="baterai" value="Baterai Room" readonly>
                                </label>
                            </div>
                        @else
                        @endif
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        @if($form->entry->panel == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="panel" value="Panel Room" readonly>
                                </label>
                            </div>
                        @else
                        @endif

                        @if($form->entry->generator == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="generator" value="Generator Room" readonly>
                                </label>
                            </div>
                        @else
                        @endif

                        @if($form->entry->yard == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="yard" value="Yard" readonly>
                                </label>
                            </div>
                        @else
                        @endif

                        @if($form->entry->parking == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="parking" value="Parking" readonly>
                                </label>
                            </div>
                        @else
                        @endif
                    </div>
                </div>
                <div class="col-3">
                    @if($form->entry->lain != null)
                        <div class="wrap-contact100-form-radio">
                            <div class="wrap-input100 bg1">
                                <span class="label-input100">Other (Lokasi Lain) *</span>
                                <input type="text" class="input100" id="lain" value="{{ $form->entry->lain }}" placeholder="Lokasi lain" readonly>
                            </div>
                        </div>
                    @else
                    @endif
                </div>

                {{-- Isian --}}
                <div class="wrap-input100 bg1 rs1-alert-validate">
					<span class="label-input100">Background and Objective (Latar Belakang dan Tujuan) *</span>
					<input type="text" class="input100" name="background" id="background" value="{{ $form->background }}" readonly>
				</div>
                <div class="wrap-input100 bg1 rs1-alert-validate">
					<span class="label-input100">Description of Scope of Work (Deskripsikan Lingkup Pekerjaan) *</span>
					<input type="text" class="input100" name="describ" id="describ" value="{{ $form->desc }}" readonly>
				</div>
                <div class="wrap-input100 bg1">
					<span class="label-input100">Testing and Verification (Pengujian dan Verifikasi)</span>
					<input type="text" class="input100" name="testing" id="testing" value="{{ $form->testing }}" readonly>
				</div>
                <div class="wrap-input100 bg1">
					<span class="label-input100">Rollback Operation/Other Infomation (Operasi Pembatalan/Infomasi Lain)</span>
					<input type="text" class="input100" name="rollback" id="rollback" value="{{ $form->rollback }}" readonly>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $form->details as $k )
                            <tr>
                                <th><input class="bg1" type="time" name="time_start[]" value="{{ $k->time_start }}" readonly></th>
                                <th><input class="bg1" type="time" name="time_end[]" value="{{ $k->time_end }}" readonly></th>
                                <th><input type="text" class="input100" name="activity[]" id="activity_desciption" value="{{ $k->activity }}" readonly></th>
                            </tr>
                        @endforeach
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
                        @foreach ( $form->details as $k )
                            <tr>
                                <th><input type="text" class="input100" name="item[]" id="item" value="{{ $k->item }}" readonly></th>
                                <th><input type="text" class="input100" name="procedure[]" id="working_procedure" value="{{ $k->activity }}" readonly></th>
                                <th><input type="text" name="id_detail[]" value="{{ $k->id}}" hidden class="bg1" readonly></th>
                            </tr>
                        @endforeach
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
                        @foreach ( $form->risks as $risk )
                            <tr>
                                <th><input type="text" class="input100" name="risk[]" id="risk_description" value="{{ $risk->risk }}" readonly></th>
                                <th><input type="text" class="input100" name="poss[]" id="possibility" value="{{ $risk->poss }}" readonly></th>
                                <th><input type="text" class="input100" name="impact[]" id="impact" value="{{ $risk->impact }}" readonly></th>
                                <th><input type="text" class="input100" name="mitigation[]" id="mitigation_plan" value="{{ $risk->mitigation }}" readonly></th>
                                <th><input type="text" name="id_risk[]" value="{{ $risk->id}}" hidden class="bg1"></th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Visitor --}}
                <table class="table table-bordered bg1">
                    <thead>
                        <th>Name</th>
                        <th>Number Id</th>
                        <th>Number Phone</th>
                        <th>Company</th>
                        <th>Department</th>
                        <th>Responsibility</th>
                    </thead>
                    <tbody>
                        @foreach ( $form->personils as $personil )
                            <tr>
                                <td>{{ $personil->nama }}</td>
                                <td>{{ $personil->numberId }}</td>
                                <td>{{ $personil->phone }}</td>
                                <td>{{ $personil->company }}</td>
                                <td>{{ $personil->department }}</td>
                                <td>{{ $personil->respon }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="table table-hover" id="approval_table">
                    <tr >
                        <th >Requested By :</th>
                        <th >Reviewed By :</th>
                        <th >Checked By :</th>
                        <th >Acknowledge By :</th>
                    </tr>
                    <tr>
                        @switch($lastupdate->status)
                            @case('requested')
                                <td class="text-center">
                                    {{ $log[0]->createdBy->name }}</br>
                                    {{ $form->created_at }}
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
                                    {{ $log[0]->createdBy->name }}</br>
                                    {{ $form->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[1]->createdBy->name }}</br>
                                    {{ $log[1]->created_at }}
                                </td>
                                <td class="text-center">

                                </td>
                                <td class="text-center">

                                </td>
                                @break

                            @case('checked')
                                <td class="text-center">
                                    {{ $log[0]->createdBy->name }}</br>
                                    {{ $form->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[1]->createdBy->name }}</br>
                                    {{ $log[1]->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[2]->createdBy->name }}</br>
                                    {{ $log[2]->created_at }}
                                </td>
                                <td class="text-center">

                                </td>
                                @break

                            @case('acknowledge')
                                <td class="text-center">
                                    {{ $log[0]->createdBy->name }}</br>
                                    {{ $form->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[1]->createdBy->name }}</br>
                                    {{ $log[1]->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[2]->createdBy->name }}</br>
                                    {{ $log[2]->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[3]->createdBy->name }}</br>
                                    {{ $log[3]->created_at }}
                                </td>
                                @break
                        @endswitch
                    </tr>
                </table>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            <button class="btn btn-lg btn-success my-1 mx-1" id="maintenance_form" type="submit">
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
			<form id="maintenance_form" class="contact100-form validate-form" method="POST" action="{{ route('tApprove', $form->id) }}">
                @csrf
				<span class="contact100-form-title">
					FORM TROUBLESHOOT
				</span>

                {{-- Purpose of Work --}}
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Purpose of Work (Tujuan Pekerjaan) *</span>
                    <input class="input100" type="text" id="work" value="{{ $form->work }}" readonly>
				</div>

                {{-- Date of Visit --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate ="Pilih Tanggal Pekerjaan">
					<span class="label-input100">Date of Visit (Tanggal Mulai Pekerjaan) *</span>
                    <input class="input100" type="date" name="visit" id="visit" value="{{ $form->visit }}" required>
				</div>

                {{-- Date of Leave --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate ="Pilih Tanggal Pekerjaan">
					<span class="label-input100">Date of Leave (Tanggal Selesai Pekerjaan) *</span>
                    <input class="input100" type="date" name="leave" id="leave" value="{{ $form->leave }}" required>
				</div>

                {{-- Entry Area --}}
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        @if($form->entry->dc == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="dc" value="Server Room" readonly>
                                </label>
                            </div>
                        @else
                        @endif

                        @if($form->entry->mmr1 == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="mmr1" value="MMR 1" readonly>
                                </label>
                            </div>
                        @else
                        @endif

                        @if($form->entry->mmr2 == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="mmr2" value="MMR 2" readonly>
                                </label>
                            </div>
                        @else
                        @endif

                        @if($form->entry->ups == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="ups" value="UPS Room" readonly>
                                </label>
                            </div>
                        @else
                        @endif
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        @if($form->entry->fss == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="fss" value="FSS Room" readonly>
                                </label>
                            </div>
                        @else
                        @endif

                        @if($form->entry->cctv == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="cctv" value="CCTV Room" readonly>
                                </label>
                            </div>
                        @else
                        @endif

                        @if($form->entry->trafo == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="trafo" value="Trafo Room" readonly>
                                </label>
                            </div>
                        @else
                        @endif

                        @if($form->entry->baterai == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="baterai" value="Baterai Room" readonly>
                                </label>
                            </div>
                        @else
                        @endif
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        @if($form->entry->panel == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="panel" value="Panel Room" readonly>
                                </label>
                            </div>
                        @else
                        @endif

                        @if($form->entry->generator == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="generator" value="Generator Room" readonly>
                                </label>
                            </div>
                        @else
                        @endif

                        @if($form->entry->yard == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="yard" value="Yard" readonly>
                                </label>
                            </div>
                        @else
                        @endif

                        @if($form->entry->parking == 1)
                            <div class="contact100-form-radio">
                                <label class="label-radio100">
                                    <input class="input100" id="parking" value="Parking" readonly>
                                </label>
                            </div>
                        @else
                        @endif
                    </div>
                </div>
                <div class="col-3">
                    @if($form->entry->lain != null)
                        <div class="wrap-contact100-form-radio">
                            <div class="wrap-input100 bg1">
                                <span class="label-input100">Other (Lokasi Lain) *</span>
                                <input type="text" class="input100" id="lain" value="{{ $form->entry->lain }}" placeholder="Lokasi lain" readonly>
                            </div>
                        </div>
                    @else
                    @endif
                </div>

                {{-- Isian --}}
                <div class="wrap-input100 bg1 rs1-alert-validate">
					<span class="label-input100">Background and Objective (Latar Belakang dan Tujuan) *</span>
					<input type="text" class="input100" name="background" id="background" value="{{ $form->background }}">
				</div>
                <div class="wrap-input100 bg1 rs1-alert-validate">
					<span class="label-input100">Description of Scope of Work (Deskripsikan Lingkup Pekerjaan) *</span>
					<input type="text" class="input100" name="describ" id="describ" value="{{ $form->desc }}">
				</div>
                <div class="wrap-input100 bg1">
					<span class="label-input100">Testing and Verification (Pengujian dan Verifikasi)</span>
					<input type="text" class="input100" name="testing" id="testing" value="{{ $form->testing }}">
				</div>
                <div class="wrap-input100 bg1">
					<span class="label-input100">Rollback Operation/Other Infomation (Operasi Pembatalan/Infomasi Lain)</span>
					<input type="text" class="input100" name="rollback" id="rollback" value="{{ $form->rollback }}">
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $form->details as $k )
                            <tr>
                                <th><input class="bg1" type="time" name="time_start[]" value="{{ $k->time_start }}"></th>
                                <th><input class="bg1" type="time" name="time_end[]" value="{{ $k->time_end }}"></th>
                                <th><input type="text" class="input100" name="activity[]" id="activity_desciption" value="{{ $k->activity }}"></th>
                            </tr>
                        @endforeach
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
                        @foreach ( $form->details as $k )
                            <tr>
                                <th><input type="text" class="input100" name="item[]" id="item" value="{{ $k->item }}"></th>
                                <th><input type="text" class="input100" name="procedure[]" id="working_procedure" value="{{ $k->activity }}"></th>
                                <th><input type="text" name="id_detail[]" value="{{ $k->id}}" hidden class="bg1"></th>
                            </tr>
                        @endforeach
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
                        @foreach ( $form->risks as $risk )
                            <tr>
                                <th><input type="text" class="input100" name="risk[]" id="risk_description" value="{{ $risk->risk }}" readonly></th>
                                <th><input type="text" class="input100" name="poss[]" id="possibility" value="{{ $risk->poss }}" readonly></th>
                                <th><input type="text" class="input100" name="impact[]" id="impact" value="{{ $risk->impact }}" readonly></th>
                                <th><input type="text" class="input100" name="mitigation[]" id="mitigation_plan" value="{{ $risk->mitigation }}" readonly></th>
                                <th><input type="text" name="id_risk[]" value="{{ $risk->id}}" hidden class="bg1"></th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Visitor --}}
                <table class="table table-bordered bg1">
                    <thead>
                        <th>Name</th>
                        <th>Number Id</th>
                        <th>Number Phone</th>
                        <th>Company</th>
                        <th>Department</th>
                        <th>Responsibility</th>
                    </thead>
                    <tbody>
                        @foreach ( $form->personils as $personil )
                            <tr>
                                <td>{{ $personil->nama }}</td>
                                <td>{{ $personil->numberId }}</td>
                                <td>{{ $personil->phone }}</td>
                                <td>{{ $personil->company }}</td>
                                <td>{{ $personil->department }}</td>
                                <td>{{ $personil->respon }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="table table-hover" id="approval_table">
                    <tr >
                        <th >Requested By :</th>
                        <th >Reviewed By :</th>
                        <th >Checked By :</th>
                        <th >Acknowledge By :</th>
                    </tr>
                    <tr>
                        @switch($lastupdate->status)
                            @case('requested')
                                <td class="text-center">
                                    {{ $log[0]->createdBy->name }}</br>
                                    {{ $form->created_at }}
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
                                    {{ $log[0]->createdBy->name }}</br>
                                    {{ $form->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[1]->createdBy->name }}</br>
                                    {{ $log[1]->created_at }}
                                </td>
                                <td class="text-center">

                                </td>
                                <td class="text-center">

                                </td>
                                @break

                            @case('checked')
                                <td class="text-center">
                                    {{ $log[0]->createdBy->name }}</br>
                                    {{ $form->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[1]->createdBy->name }}</br>
                                    {{ $log[1]->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[2]->createdBy->name }}</br>
                                    {{ $log[2]->created_at }}
                                </td>
                                <td class="text-center">

                                </td>
                                @break

                            @case('acknowledge')
                                <td class="text-center">
                                    {{ $log[0]->createdBy->name }}</br>
                                    {{ $form->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[1]->createdBy->name }}</br>
                                    {{ $log[1]->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[2]->createdBy->name }}</br>
                                    {{ $log[2]->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $log[3]->createdBy->name }}</br>
                                    {{ $log[3]->created_at }}
                                </td>
                                @break
                        @endswitch
                    </tr>
                </table>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 text-center">
                            <button type="button" class="btn btn-lg btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $form->id }}">
                                Reject
                            </button>
                        </div>
                        <div class="col-6 text-center">
                            <button class="btn btn-lg btn-success my-1 mx-1" id="maintenance_form" type="submit">
                                Approve
                            </button>
                        </div>
                    </div>
                </div>
			</form>

            {{-- Modal Reject --}}
            <div class="modal fade" id="exampleModal{{ $form->id }}" tabindex="-1" data-id="{{ $form->id }}" aria-labelledby="exampleModalLabel{{ $form->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel{{ $form->id }}">Notes</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('tReject', $form->id )}}" method="post">
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

	</script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/main.js')}}"></script>

</body>
</html>
