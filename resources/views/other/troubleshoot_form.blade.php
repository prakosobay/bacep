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
			<form class="contact100-form validate-form" id="troubleshoot_form" method="POST">
                @csrf
				<span class="contact100-form-title">
					TROUBLESHOOT FORM
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
					<input class="input100" type="text" name="work" required autofocus>
				</div>

                {{-- Validity --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Pilih Tanggal Pekerjaan">
					<span class="label-input100">Date of Visit (Tanggal Mulai Pekerjaan) *</span>
                    <input class="input100" type="date" name="visit" id="visit" required>
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Pilih Tanggal Pekerjaan">
					<span class="label-input100">Date of Leave (Tanggal Selesai Pekerjaan) *</span>
					<input class="input100" type="date" name="leave" id="leave" required>
				</div>

                {{-- Entry Area --}}
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio">
							<input class="input-radio100" id="dc" type="checkbox" name="dc" value="1">
							<label class="label-radio100" for="dc">
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

                        <div class="contact100-form-radio">
							<input class="input-radio100" id="ups" type="checkbox" name="ups" value="1">
							<label class="label-radio100" for="ups">
								UPS Room
							</label>
						</div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio">
							<input class="input-radio100" id="fss" type="checkbox" name="fss" value="1">
							<label class="label-radio100" for="fss">
								FSS Room
							</label>
						</div>

                        <div class="contact100-form-radio">
							<input class="input-radio100" id="parking" type="checkbox" name="parking" value="1">
							<label class="label-radio100" for="parking">
								Parking Lot
							</label>
						</div>

                        <div class="contact100-form-radio">
							<input class="input-radio100" id="genset" type="checkbox" name="genset" value="1">
							<label class="label-radio100" for="genset">
								Generator Room
							</label>
						</div>

                        <div class="contact100-form-radio">
							<input class="input-radio100" id="trafo" type="checkbox" name="trafo" value="1">
							<label class="label-radio100" for="trafo">
								Trafo Room
							</label>
						</div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="contact100-form-radio">
							<input class="input-radio100" id="baterai" type="checkbox" name="baterai" value="1">
							<label class="label-radio100" for="baterai">
								Baterai Room
							</label>
						</div>

                        <div class="contact100-form-radio">
							<input class="input-radio100" id="panel" type="checkbox" name="panel" value="1">
							<label class="label-radio100" for="panel">
								Panel Room
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
                <div class="col-3">
                    <div class="wrap-contact100-form-radio">
                        <div class="wrap-input100 bg1">
                            <span class="label-input100">Other (Lokasi Lain) *</span>
                            <input type="text" class="input100" id="lain" name="lain" value="{{ old('lain')}}" placeholder="Lokasi lain">
                        </div>
                    </div>
                </div>

                {{-- BACKGROUND AND OBJECTIVE (LATAR BELAKANG DAN TUJUAN) *--}}
				<div class="wrap-input100 validate-input bg1 mt-3" data-validate="Belum di isi">
					<span class="label-input100">BACKGROUND AND OBJECTIVE (LATAR BELAKANG DAN TUJUAN) *</span>
                    <input class="input100" name="background" required>
				</div>

                {{-- DESCRIPTION OF SCOPE OF WORK (DESKRIPSIKAN LINGKUP PEKERJAAN)--}}
				<div class="wrap-input100 validate-input bg1" data-validate="Belum di isi">
					<span class="label-input100">DESCRIPTION OF SCOPE OF WORK (DESKRIPSIKAN LINGKUP PEKERJAAN)*</span>
                    <input class="input100" name="desc" required>
				</div>

                {{--TESTING AND VERIFICATION (PENGUJIAN DAN VERIFIKASI)--}}
				<div class="wrap-input100 validate-input bg1" data-validate="Belum di isi">
					<span class="label-input100">TESTING AND VERIFICATION (PENGUJIAN DAN VERIFIKASI)*</span>
                    <input class="input100" name="testing">
				</div>

                {{--ROLLBACK OPERATION/OTHER INFOMATION (OPERASI PEMBATALAN/INFOMASI LAIN)--}}
				<div class="wrap-input100 validate-input bg1" data-validate="Belum di isi">
					<span class="label-input100">ROLLBACK OPERATION/OTHER INFOMATION (OPERASI PEMBATALAN/INFOMASI LAIN)*</span>
                    <input class="input100" name="rollback">
				</div>

                <!-- Detail Time Activity -->
                <table class="table table-bordered mt-3" id="table_detail_time">
                    <thead class="bg1">
                        <tr>
                            <th colspan="5">Detail Time Table of All Activity</th>
                        <tr>
                            <th scope="col">Time Start</th>
                            <th scope="col">Time End</th>
                            <th scope="col">Activity Description</th>
                            <th scope="col">Detail Service Impact</th>
                            <th scope="col">Item</th>
                        </tr>
                    </thead>
                    <tbody class="bg1">
                        <tr>
                            <td><input class="bg1" type="time" name="time_start[]" required></td>
                            <td><input class="bg1" type="time" name="time_end[]" required></td>
                            <td><input class="input100" type="text" name="activity[]" required></td>
                            <td><input class="input100" type="text" name="service_impact[]" required></td>
                            <td><input class="input100" type="text" name="item[]" required></td>
                        </tr>
                    </tbody>
                </table>
                <button id="detail_time"><b>Add More Fields</b></button>

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
                        <tr>
                            <th>
                                <select class="js-select2" id="risk" name="risk[]">
                                    <option value=""></option>
                                    <option value="Bersenggolan dengan panel">Bersenggolan dengan panel</option>
                                    <option value="Bersenggolan dengan perangkat">Bersenggolan dengan perangkat</option>
                                    <option value="Korsleting">Korsleting</option>
                                    <option value="Menghirup debu">Menghirup debu</option>
                                    <option value="Pekerjaan Tertunda">Pekerjaan tertunda</option>
                                    <option value="Peralatan Rusak">Peralatan rusak</option>
                                    <option value="Sampah berserakan">Sampah berserakan</option>
                                    <option value="Sesak Nafas">Sesak nafas</option>
                                    <option value="Terjatuh dari tangga">Jatuh dari tangga</option>
                                    <option value="Terjepit">Terjepit</option>
                                    <option value="Tersengat Listrik">Tersengat listrik</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </th>
                            <th>
                                <select class="js-select2" id="poss" name="poss[]">
                                    <option value=""></option>
                                    <option value="Memar, patah tulang, terkilir">Memar, patah tulang, terkilir</option>
                                    <option value="Kebakaran">Kebakaran</option>
                                    <option value="Pernafasan terganggu">Pernafasan terganggu</option>
                                    <option value="Mengalami luka bakar, pingsan, kematian">Mengalami luka bakar, pingsan, kematian</option>
                                    <option value="Sistem kelistrikan menjadi lumpuh">Sistem kelistrikan menjadi lumpuh</option>
                                    <option value="Mengalami luka bakar">Mengalami luka bakar</option>
                              </select>
                              <div class="dropDownSelect2"></div>
                            </th>
                            <th>
                                <select class="js-select2" id="impact" name="impact[]">
                                    <option value=""></option>
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
                               </select>
                               <div class="dropDownSelect2"></div>
                            </th>
                            <th>
                                <select class="js-select2" id="mitigation" name="mitigation[]">
                                    <option value=""></option>
                                    <option value="Memastikan aliran listrik untuk lift sudah dimatikan">Memastikan aliran listrik untuk lift sudah dimatikan</option>
                                    <option value="Memastikan tidak ada kabel yang terkelupas">Memastikan tidak ada kabel yang terkelupas</option>
                                    <option value="Pastikan pekerjaan yang dilakukan sesuai prosedur">Pastikan pekerjaan yang dilakukan sesuai prosedur</option>
                                    <option value="Menggunakan Masker">Menggunakan Masker</option>
                                    <option value="Pastikan tangga berada di lantai yang rata">Pastikan tangga berada di lantai yang rata</option>
                                    <option value="Bekerja dengan hati hati">Bekerja dengan hati hati</option>
                                    <option value="Menjaga jarak dari sumber listrik">Menjaga jarak dari sumber listrik</option>
                                    <option value="Menjaga jarak dari perangkat critical">Menjaga jarak dari perangkat critical</option>
                                    <option value="Menjaga jarak dengan panel alarm">Menjaga jarak dengan panel alarm</option>
                                    <option value="Menggunakan APD">Menggunakan APD</option>
                              </select>
                              <div class="dropDownSelect2"></div>
                            </th>
                        </tr>
                    </tbody>
                </table>
                <button id="risk_button"><b>Add More Fields</b></button>

                {{-- PIC --}}
                <table class="table table-bordered bg1 mt-3">
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
                            <select class="js-select2" name="visit_nama[]" id="nama" required>
                                <option value=""></option>
                                @foreach ($personil as $p)
                                    <option value="{{$p->id}}">{{$p->visit_nama}}</option>
                                @endforeach
                            </select>
                            <div class="dropDownSelect2"></div>
                        </td>
                        <th>Company</th>
                        <td>
                            <input type="text" class="input100" name="visit_company[]" id="company" value="" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>ID Number </th>
                        <td>
                            <input type="text" class="input100" name="visit_nik[]" id="nik" value="" readonly>
                        </td>
                        <th>Department </th>
                        <td>
                            <input type="text" class="input100" name="visit_department[]" id="department" value="" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>
                            <input type="text" class="input100" name="visit_phone[]" id="phone" value="" readonly>
                        </td>
                        <th>Responsibility </th>
                        <td>
                            <input type="text" class="input100" name="visit_respon[]" id="respon" value="" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th rowspan="4">PIC 2</th>
                    </tr>

                    {{-- PIC 2 --}}
                    <tr>
                        <th>Name </th>
                        <td>
                            <select class="js-select2" name="visit_nama[]" id="nama_2">
                                <option value=""></option>
                                @foreach ($personil as $p)
                                    <option value="{{$p->id}}">{{$p->visit_nama}}</option>
                                @endforeach
                            </select>
                            <div class="dropDownSelect2"></div>
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

                    {{-- PIC 3 --}}
                    <tr>
                        <th>Name </th>
                        <td>
                            <select class="js-select2" name="visit_nama[]" id="nama_3">
                                <option value=""></option>
                                @foreach ($personil as $p)
                                    <option value="{{$p->id}}">{{$p->visit_nama}}</option>
                                @endforeach
                            </select>
                            <div class="dropDownSelect2"></div>
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

                    {{-- PIC 4 --}}
                    <tr>
                        <th>Name </th>
                        <td>
                            <select class="js-select2" name="visit_nama[]" id="nama_4">
                                <option value=""></option>
                                @foreach ($personil as $p)
                                    <option value="{{$p->id}}">{{$p->visit_nama}}</option>
                                @endforeach
                            </select>
                            <div class="dropDownSelect2"></div>
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

                    {{-- PIC 5 --}}
                    <tr>
                        <th>Name </th>
                        <td>
                            <select class="js-select2" name="visit_nama[]" id="nama_5">
                                <option value=""></option>
                                @foreach ($personil as $p)
                                    <option value="{{$p->id}}">{{$p->visit_nama}}</option>
                                @endforeach
                            </select>
                            <div class="dropDownSelect2"></div>
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
                </table>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" id="submit_form">
						<span>
							Submit
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

{{--add table--}}
<script>
    $(document).ready(function(){
        let max_row = 20;
        let row = 1;
        let detail_time = $('#detail_time');
        let row_detail_time = $('#table_detail_time');
        let detail_operation = $('#detail_operation');
        let row_detail_operation = $('#table_detail_operation');
        let risk = $('#risk_button');
        let row_risk = $('#table_risk');
        let personil = $('#button_personil');
        let row_personil = $('#table_personil');

        $(detail_time).click(function(e){
            e.preventDefault();
            if(row < max_row){
                $(row_detail_time).append('<tr><td><input class="bg1" type="time" name="time_start[]"></td><td><input class="bg1" type="time" name="time_end[]"></td><td><input class="input100" type="text" name="activity[]" ></td><td><input class="input100" type="text" name="service_impact[]" ></td><td><input class="input100" type="text" name="item[]" required></td></tr>');
                row++;
            }
        });

        $(detail_operation).click(function(e){
            e.preventDefault();
            if(row < max_row){
                $(row_detail_operation).append('<tr><td> <input class="bg1 input100" type="text" name="item[]" ></td><td> <input class="bg1 input100" type="text" name="procedure[]" ></td></tr>');
                row++;
            }
        });

        $(risk).click(function(e){
            e.preventDefault();
            if(row < max_row){
                $(row_risk).append('<tr><th><select class="js-select2" id="risk" name="risk[]">    <option value=""></option>    <option value="Bersenggolan dengan panel">Bersenggolan dengan panel</option>    <option value="Bersenggolan dengan perangkat">Bersenggolan dengan perangkat</option>    <option value="Korsleting">Korsleting</option>    <option value="Menghirup debu">Menghirup debu</option>    <option value="Pekerjaan Tertunda">Pekerjaan tertunda</option>    <option value="Peralatan Rusak">Peralatan rusak</option>    <option value="Sampah berserakan">Sampah berserakan</option>    <option value="Sesak Nafas">Sesak nafas</option>    <option value="Terjatuh dari tangga">Jatuh dari tangga</option>    <option value="Terjepit">Terjepit</option>    <option value="Tersengat Listrik">Tersengat listrik</option></select><div class="dropDownSelect2"></div></th><th><select class="js-select2" id="poss" name="poss[]">    <option value=""></option>    <option value="Memar, patah tulang, terkilir">Memar, patah tulang, terkilir</option>    <option value="Kebakaran">Kebakaran</option>    <option value="Pernafasan terganggu">Pernafasan terganggu</option>    <option value="Mengalami luka bakar, pingsan, kematian">Mengalami luka bakar, pingsan, kematian</option>    <option value="Sistem kelistrikan menjadi lumpuh">Sistem kelistrikan menjadi lumpuh</option>    <option value="Mengalami luka bakar">Mengalami luka bakar</option>  </select>  <div class="dropDownSelect2"></div></th><th><select class="js-select2" id="impact" name="impact[]">    <option value=""></option>    <option value="Low">Low</option>    <option value="Medium">Medium</option>    <option value="High">High</option>   </select>   <div class="dropDownSelect2"></div></th><th><select class="js-select2" id="mitigation" name="mitigation[]">    <option value=""></option>    <option value="Memastikan aliran listrik untuk lift sudah dimatikan">Memastikan aliran listrik untuk lift sudah dimatikan</option>    <option value="Memastikan tidak ada kabel yang terkelupas">Memastikan tidak ada kabel yang terkelupas</option>    <option value="Pastikan pekerjaan yang dilakukan sesuai prosedur">Pastikan pekerjaan yang dilakukan sesuai prosedur</option>    <option value="Menggunakan Masker">Menggunakan Masker</option>    <option value="Pastikan tangga berada di lantai yang rata">Pastikan tangga berada di lantai yang rata</option>    <option value="Bekerja dengan hati hati">Bekerja dengan hati hati</option>    <option value="Menjaga jarak dari sumber listrik">Menjaga jarak dari sumber listrik</option>    <option value="Menjaga jarak dari perangkat critical">Menjaga jarak dari perangkat critical</option>    <option value="Menjaga jarak dengan panel alarm">Menjaga jarak dengan panel alarm</option>    <option value="Menggunakan APD">Menggunakan APD</option>  </select>  <div class="dropDownSelect2"></div></th></tr>');
                row++
            }
        });

        $(personil).click(function(e){
            e.preventDefault();
            if(row < max_row){
                $(row_personil).append('<tr id="baris"><th colspan="4"><b>Personil</b></th></tr><tr><th>Name </th><td>    <select class="js-select2" name="visit_nama[]" id="nama">        <option value=""></option>        @foreach ($personil as $p)            <option value="{{$p->id}}">{{$p->visit_nama}}</option>        @endforeach    </select>    <div class="dropDownSelect2"></div></td><th>Company</th><td>    <input type="text" class="input100" name="visit_company[]" id="company" value="" readonly></td></tr><tr><th>ID Number </th><td>    <input type="text" class="input100" name="visit_nik[]" id="nik" value="" readonly></td><th>Department </th><td>    <input type="text" class="input100" name="visit_department[]" id="department" value="" readonly></td></tr><tr><th>Phone Number</th><td>    <input type="text" class="input100" name="visit_phone[]" id="phone" value="" readonly></td><th>Responsibility </th><td>    <input type="text" class="input100" name="visit_respon[]" id="respon" value="" readonly></td></tr>');
                row++;
            }
        });

        $(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		});

        $('#nama').change(function(){
            let id = $(this).val();
            $.ajax({
                url: "{{url("/other/maintenance/visitor")}}"+'/'+id,
                dataType:"json",
                type: "get",
                success: function(response){
                    const {visitor} = response;
                    // console.log(visitor)
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
                    // console.log(visitor)
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
                    // console.log(visitor)
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
                    // console.log(visitor)
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
                    // console.log(visitor)
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

        $("#submit_form").click(function(e){
        e.preventDefault();
        var datastring = $("#troubleshoot_form").serialize();
            $.ajax({
                type:'POST',
                url:"{{ route('troubleshootStore') }}",
                data: datastring,
                error: function (request, errors) {
                    console.log(errors)
                    alert("ADA YANG BELOM KE ISI MBAA " + errors);
                },
                success:function(data){
                    console.log(data);
                    if(data.status == 'SUCCESS'){
                        Swal.fire({
                            title: "Success!",
                            text: 'Data Saved',
                            type: "success",
                        }).then(function(){
                            location.href = "{{ url("logall") }}";
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
    });
</script>
</body>
</html>
