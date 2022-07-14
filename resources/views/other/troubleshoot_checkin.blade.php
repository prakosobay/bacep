<!DOCTYPE html>
<html lang="en">
<head>
	<title>
        Form Troubleshoot
    </title>
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
    {{-- <link href="{{asset('css/new_approve.css')}}" rel="stylesheet"> --}}
</head>
<!--===============================================================================================-->

<body>
	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" id="troubleshoot_form" method="POST" action="{{ url('other/troubleshoot/update/checkin', $getForms->id)}}">
                @method('PUT')
                @csrf
				<span class="contact100-form-title">
					CHECKIN FORM TROUBLESHOOT
				</span>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('gagal'))
                    <div class="alert alert-warning my-2 mx-2">
                        {{ session('gagal') }}
                    </div>
                @endif

                {{-- Purpose of Work (Tujuan Pekerjaan)--}}
				<div class="wrap-input100 validate-input bg1" data-validate="Pilih Tujuan Pekerjaan">
					<span class="label-input100">Purpose of Work (Tujuan Pekerjaan) *</span>
					<input class="input100" type="text" name="work" value="{{ $getForms->work }}" readonly>
				</div>

                {{-- Validity --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Pilih Tanggal Pekerjaan">
					<span class="label-input100">Date of Visit (Tanggal Mulai Pekerjaan) *</span>
                    <input class="input100" type="date" name="visit" id="visit" value="{{$getForms->visit}}" readonly>
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Pilih Tanggal Pekerjaan">
					<span class="label-input100">Date of Leave (Tanggal Selesai Pekerjaan) *</span>
					<input class="input100" type="date" name="leave" id="leave" value="{{$getForms->leave}}" readonly>
				</div>

                {{-- Entry Area --}}
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        @if($getEntries->dc == true)
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="dc" type="radio" name="dc" value="1" checked disabled>
                                <label class="label-radio100" for="dc">
                                    Server Room
                                </label>
                            </div>
                        @else
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="dc" type="radio" name="dc" value="1" disabled>
                                <label class="label-radio100" for="dc">
                                    Server Room
                                </label>
                            </div>
                        @endif

                        @if($getEntries->mmr1 == true)
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="mmr1" type="radio" name="mmr1" value="1" checked disabled>
                                <label class="label-radio100" for="mmr1">
                                    MMR 1
                                </label>
                            </div>
                        @else
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="mmr1" type="checkbox" name="mmr1" value="1" disabled>
                                <label class="label-radio100" for="mmr1">
                                    MMR 1
                                </label>
                            </div>
                        @endif

                        @if($getEntries->mmr2 == true)
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="mmr2" type="checkbox" name="mmr2" value="1" checked disabled>
                                <label class="label-radio100" for="mmr2">
                                    MMR 2
                                </label>
                            </div>
                        @else
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="mmr2" type="checkbox" name="mmr2" value="1" disabled>
                                <label class="label-radio100" for="mmr2">
                                    MMR 2
                                </label>
                            </div>
                        @endif

                        @if ($getEntries->ups == true)
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="ups" type="checkbox" name="ups" value="1" checked disabled>
                                <label class="label-radio100" for="ups">
                                    UPS Room
                                </label>
                            </div>
                        @else
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="ups" type="checkbox" name="ups" value="1" disabled>
                                <label class="label-radio100" for="ups">
                                    UPS Room
                                </label>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        @if ($getEntries->fss == true)
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="fss" type="checkbox" name="fss" value="1" checked disabled>
                                <label class="label-radio100" for="fss">
                                    FSS Room
                                </label>
                            </div>
                        @else
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="fss" type="checkbox" name="fss" value="1" disabled>
                                <label class="label-radio100" for="fss">
                                    FSS Room
                                </label>
                            </div>
                        @endif

                        @if($getEntries->parking == true)
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="parking" type="checkbox" name="parking" value="1" checked disabled>
                                <label class="label-radio100" for="parking">
                                    Parking Lot
                                </label>
                            </div>
                        @else
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="parking" type="checkbox" name="parking" value="1" disabled>
                                <label class="label-radio100" for="parking">
                                    Parking Lot
                                </label>
                            </div>
                        @endif

                        @if($getEntries->generator == true)
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="genset" type="checkbox" name="genset" value="1" checked disabled>
                                <label class="label-radio100" for="genset">
                                    Generator Room
                                </label>
                            </div>
                        @else
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="genset" type="checkbox" name="genset" value="1" disabled>
                                <label class="label-radio100" for="genset">
                                    Generator Room
                                </label>
                            </div>
                        @endif

                        @if($getEntries->trafo == true)
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="trafo" type="checkbox" name="trafo" value="1" checked disabled>
                                <label class="label-radio100" for="trafo">
                                    Trafo Room
                                </label>
                            </div>
                        @else
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="trafo" type="checkbox" name="trafo" value="1" disabled>
                                <label class="label-radio100" for="trafo">
                                    Trafo Room
                                </label>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        @if($getEntries->baterai == true)
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="baterai" type="checkbox" name="baterai" value="1" checked disabled>
                                <label class="label-radio100" for="baterai">
                                    Baterai Room
                                </label>
                            </div>
                        @else
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="baterai" type="checkbox" name="baterai" value="1" disabled>
                                <label class="label-radio100" for="baterai">
                                    Baterai Room
                                </label>
                            </div>
                        @endif

                        @if($getEntries->panel == true)
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="panel" type="checkbox" name="panel" value="1" checked disabled>
                                <label class="label-radio100" for="panel">
                                    Panel Room
                                </label>
                            </div>
                        @else
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="panel" type="checkbox" name="panel" value="1" disabled>
                                <label class="label-radio100" for="panel">
                                    Panel Room
                                </label>
                            </div>
                        @endif

                        @if($getEntries->yard == true)
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="yard" type="checkbox" name="yard" value="1" checked disabled>
                                <label class="label-radio100" for="yard">
                                    Yard
                                </label>
                            </div>
                        @else
                            <div class="contact100-form-radio">
                                <input class="input-radio100" id="yard" type="checkbox" name="yard" value="1" disabled>
                                <label class="label-radio100" for="yard">
                                    Yard
                                </label>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="wrap-input100 bg1">
                            <span class="label-input100">Other (Lokasi Lain) *</span>
                            <input type="text" class="input100" id="lain" name="lain" value="{{ $getEntries->lain}}">
                        </div>
                    </div>
                </div>

                {{-- BACKGROUND AND OBJECTIVE (LATAR BELAKANG DAN TUJUAN) *--}}
				<div class="wrap-input100 validate-input bg1 mt-3" data-validate="Belum di isi">
					<span class="label-input100">BACKGROUND AND OBJECTIVE (LATAR BELAKANG DAN TUJUAN) *</span>
                    <input class="input100" name="background" value="{{$getForms->background}}" readonly>
				</div>

                {{-- DESCRIPTION OF SCOPE OF WORK (DESKRIPSIKAN LINGKUP PEKERJAAN)--}}
				<div class="wrap-input100 validate-input bg1" data-validate="Belum di isi">
					<span class="label-input100">DESCRIPTION OF SCOPE OF WORK (DESKRIPSIKAN LINGKUP PEKERJAAN)*</span>
                    <input class="input100" name="desc" value="{{$getForms->desc}}" readonly>
				</div>

                {{--TESTING AND VERIFICATION (PENGUJIAN DAN VERIFIKASI)--}}
				<div class="wrap-input100 validate-input bg1" data-validate="Belum di isi">
					<span class="label-input100">TESTING AND VERIFICATION (PENGUJIAN DAN VERIFIKASI)*</span>
                    <input class="input100" name="testing" value="{{$getForms->testing}}" readonly>
				</div>

                {{--ROLLBACK OPERATION/OTHER INFOMATION (OPERASI PEMBATALAN/INFOMASI LAIN)--}}
				<div class="wrap-input100 validate-input bg1" data-validate="Belum di isi">
					<span class="label-input100">ROLLBACK OPERATION/OTHER INFOMATION (OPERASI PEMBATALAN/INFOMASI LAIN)*</span>
                    <input class="input100" name="rollback" value="{{$getForms->rollback}}">
				</div>

                <!-- Detail Time Activity -->
                <table class="table table-bordered mt-3" id="table_detail_time">
                    <thead class="bg1">
                        <tr>
                            <th colspan="4">Detail Time Table of All Activity</th>
                        <tr>
                            <th scope="col">Time Start</th>
                            <th scope="col">Time End</th>
                            <th scope="col">Activity Description</th>
                            <th scope="col">Detail Service Impact</th>
                        </tr>
                    </thead>
                    <tbody class="bg1">
                        @foreach ($getDetails as $detail)
                        <tr class="">
                            <td><input class="input100" type="text" name="time_start[]" value="{{$detail->time_start}}" readonly></td>
                            <td><input class="input100" type="text" name="time_end[]" value="{{$detail->time_end}}" readonly></td>
                            <td><input class="input100" type="text" name="activity[]" value="{{$detail->activity}}" readonly></td>
                            <td><input class="input100" type="text" name="service_impact[]" value="{{$detail->service_impact}}" readonly></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Detail Operation and Execution -->
                <table class="table table-bordered mt-3" id="table_detail_operation">
                    <thead class="bg1">
                        <tr>
                            <th colspan="2">Detail Operation and Execution</th>
                        <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Working Procedure</th>
                        </tr>
                    </thead>
                    <tbody class="bg1">
                        @foreach ($getDetails as $detail )
                        <tr>
                            <td> <input class="bg1 input100" type="text" name="item[]" value="{{$detail->item}}" readonly></td>
                            <td> <input class="bg1 input100" type="text" name="procedure[]" value="{{$detail->procedure}}" readonly></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Risk and Service Area Impact -->
                <table class="table table-bordered mt-3" id="table_risk">
                    <thead class="bg1">
                        <tr>
                            <th colspan="4">Risk and Service Area Impact</th>
                        <tr>
                            <th scope="col">Risk Description</th>
                            <th scope="col">Possibility</th>
                            <th scope="col">Impact</th>
                            <th scope="col">Mitigation Plan</th>
                        </tr>
                    </thead>
                    <tbody class="bg1">
                        @foreach ($getRisks as $risk )
                        <tr>
                            <td><input type="text" class="bg1 input100" name="risk[]" value="{{$risk->risk}}" readonly></td>
                            <td><input type="text" class="bg1 input100" name="poss[]" value="{{$risk->poss}}" readonly></td>
                            <td><input type="text" class="bg1 input100" name="impact[]" value="{{$risk->impact}}" readonly></td>
                            <td><input type="text" class="bg1 input100" name="mitigation[]" value="{{$risk->mitigation}}" readonly></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Visitor --}}
                <table class="table table-bordered bg1 mt-3" width="100%">
                    <tr>
                        <th colspan="4"><b>Visitor</b></th>
                    </tr>
                    @foreach($getPersonils as $personil)
                        <tr>
                            <th>Name </th>
                            <td>
                                <input type="text" class="bg1 input100" value="{{$personil->nama}}" readonly>
                            </td>
                            <th>Company</th>
                            <td>
                                <input type="text" class="bg1 input100" value="{{$personil->company}}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>ID Number </th>
                            <td>
                                <input type="text" class="bg1 input100" value="{{$personil->numberId}}" readonly>
                            </td>
                            <th>Department </th>
                            <td>
                                <input type="text" class="bg1 input100" value="{{$personil->department}}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>
                                <input type="text" class="bg1 input100" value="{{$personil->phone}}" readonly>
                            </td>
                            <th>Responsibility </th>
                            <td>
                                <input type="text" class="bg1 input100" value="{{$personil->respon}}" readonly>
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
					<button class="contact100-form-btn" id="submit_form">
						<span>
							Checkin
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
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

    {{-- Webcam --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

{{--add table--}}
<script>
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
</body>
</html>
