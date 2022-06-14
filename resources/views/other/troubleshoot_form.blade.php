<!DOCTYPE html>
<html lang="en">
<head>
	<title>
        Troubleshooting BM
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
    <link href="{{asset('css/new_approve.css')}}" rel="stylesheet">
<!--===============================================================================================-->
    <link href="{{asset('css/new_approve.css')}}" rel="stylesheet">
</head>
<!--===============================================================================================-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<body>
    <body id="body-pd">
        <div class="semua">
          <nav class="navbar navbar-expand-lg navbar-dark py-0 my-0 navbar-bg">
              <div class="container">
                  <a class="navbar-brand" href="#">
                      <img src="{{asset('gambar/approval/logo_approve.png')}}" alt="" style="width: 170px; height:70px" class="img-fluid">
                  </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                          <li class="nav-item mx-5">
                              <a class="nav-link" aria-current="page" href="{{url('/home')}}">Home</a>
                          </li>
                          <li class="nav-item mx-5">
                              <a class="nav-link" href="#about">Approval</a>
                          </li>
                          <li class="nav-item mx-5">
                              <a class="nav-link" href="#">Full Approval</a>
                          </li>
                          <li class="nav-item mx-5">
                              <a class="nav-link" href="#">Inventory</a>
                          </li>
                          <li class="nav-item mx-5">
                              <a class="nav-link" href="#">Log Permit</a>
                          </li>
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                          <li class="nav-item mx-3">
                              <a href="#"><img src="{{asset('gambar/home/bell.svg')}}" alt=""></a>
                          </li>
                          <li class="nav-item mx-3">
                              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                  <img src="{{asset('gambar/home/box-arrow-right.svg')}}" alt="">
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>
    <body>

	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					Troubleshooting BM
				</span>
                {{-- Purpose of Work (Tujuan Pekerjaan)--}}
				<div class="wrap-input100 validate-input bg1" >
					<span class="label-input100">Purpose of Work (Tujuan Pekerjaan) *</span>
					<input class="input100" type="text" name="name">
				</div>
                {{-- Entry Area --}}
                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Authorized Entry Area (Area yang Dimasuki)</span>
                    <div class="contact100-form-radio">
                        <label class="label-radio100">
                            <input class="label-input100" id="loc1" name="loc1" value="UPS ROOM" readonly>
                        </label>
                    </div>

                    <div class="contact100-form-radio">
                        <label class="label-radio100">
                            <input class="label-input100" id="loc2" name="loc2" value="BATTERY ROOM" readonly>
                        </label>
                    </div>

                    <div class="contact100-form-radio">
                        <label class="label-radio100">
                            <input class="label-input100" id="loc3" name="loc3" value="GENERATOR ROOM" readonly>
                        </label>
                    </div>

                    <div class="contact100-form-radio">
                        <label class="label-radio100">
                            <input class="label-input100" id="loc4" name="loc4" value="SERVER ROOM">
                        </label>
                    </div>

                    <div class="contact100-form-radio">
                        <label class="label-radio100">
                            <input class="label-input100" id="loc5" name="loc5" value="MMR 1" readonly>
                        </label>
                    </div>

                    <div class="contact100-form-radio">
                        <label class="label-radio100" > 
                            <input class="label-input100" id="loc6" name="loc6" value="MMR 2" readonly>
                        </label>
                    </div>
                </div>
                
                 <!-- Detail Time Activity -->
                 <table class="table table-bordered" id="mytab1">
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
                            <th>
                                <input class="input100" type="text" name="name">
                            <th>
                               <input class="input100" type="text" name="name" >
                            </th>
                        </tr>
                        <tr>
                            <th><input type="time" name="cleaning_time_start"></th>
                            <th><input type="time" name="cleaning_time_end"></th>
                            <th>
                                <input class="input100" type="text" name="name" >
                            <th>
                               <input class="input100" type="text" name="name" >
                            </th>
                        </tr>
                        <tr>
                            <th><input type="time" name="cleaning_time_start"></th>
                            <th><input type="time" name="cleaning_time_end"></th>
                            <th>
                                <input class="input100" type="text" name="name" >
                            <th>
                               <input class="input100" type="text" name="name" >
                            </th>
                        </tr>
                    </tbody>
                </table>

                <!-- Detail Operation and Execution -->
            
                <table class="table table-bordered" id="input_fields_wrap">
                    <thead>
                        <tr>
                            <th colspan="2">Detail Operation and Execution</th>
                        <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Working Procedure</th>
                        </tr>
                    </thead>
                  
                        <tr id="input_fields_wrap">
                            <td> <input  type="text" name="name" ></td>
                            <td> <input  type="text" name="name" ></td>
                        </tr>     
                   
                    
                </table>
                <button class="add_field_button">Add More Fields</button>
            

           
                <!-- Risk and Service Area Impact -->
                <table class="table table-bordered" id="input_fields_wrap1">
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
                        <tr id="input_fields_wrap1">
                            <th>
                                <select class="form-control">
                                <option>Risk Description</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                              </select>
                            </th>
                            <th>
                                <select class="form-control">
                                <option>Possibility</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                              </select>
                            </th>
                            <th>
                                <select class="form-control">
                                    <option>Impact</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                               </select>
                            </th>
                            <th>
                                <select class="form-control">
                                    <option>Impact</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                              </select>
                            </th>
                        </tr>
                        <tr>
                    </tbody>
                    
                </table>
                <button class="add_field_button2">Add Risk and Service</button>

                {{-- BACKGROUND AND OBJECTIVE (LATAR BELAKANG DAN TUJUAN) *--}}
				<div class="wrap-input100 validate-input bg1" data-validate="Belum di isi">
					<span class="label-input100">BACKGROUND AND OBJECTIVE (LATAR BELAKANG DAN TUJUAN) *</span>
                    <textarea class="input100" id="exampleFormControlTextarea1" rows="3"></textarea>
				</div>

                {{-- DESCRIPTION OF SCOPE OF WORK (DESKRIPSIKAN LINGKUP PEKERJAAN)--}}
				<div class="wrap-input100 validate-input bg1" data-validate="Belum di isi">
					<span class="label-input100">DESCRIPTION OF SCOPE OF WORK (DESKRIPSIKAN LINGKUP PEKERJAAN)*</span>
                    <textarea class="input100" id="exampleFormControlTextarea1" rows="3"></textarea>
				</div>

                {{--TESTING AND VERIFICATION (PENGUJIAN DAN VERIFIKASI)--}}
				<div class="wrap-input100 validate-input bg1" data-validate="Belum di isi">
					<span class="label-input100">TESTING AND VERIFICATION (PENGUJIAN DAN VERIFIKASI)*</span>
                    <textarea class="input100" id="exampleFormControlTextarea1" rows="3"></textarea>
				</div>
                
                {{--ROLLBACK OPERATION/OTHER INFOMATION (OPERASI PEMBATALAN/INFOMASI LAIN)--}}
				<div class="wrap-input100 validate-input bg1" data-validate="Belum di isi">
					<span class="label-input100">ROLLBACK OPERATION/OTHER INFOMATION (OPERASI PEMBATALAN/INFOMASI LAIN)*</span>
                    <textarea class="input100" id="exampleFormControlTextarea1" rows="3"></textarea>
				</div>

                {{-- Validity --}}
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Pilih Tanggal Pekerjaan">
					<span class="label-input100">Validity (Tanggal Mulai Pekerjaan) *</span>
                    <input class="input100" type="date" name="validity_from" id="dateofbirth">
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Pilih Tanggal Pekerjaan">
					<span class="label-input100">Validity (Tanggal Selesai Pekerjaan) *</span>
					<input class="input100" type="date" name="validity_to" id="dateofbirth">
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
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
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->

{{--add table--}}
<script>
	$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $("#input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
	
	
   $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
	
		     //text box increment
            $(wrapper).append('<tr id="input_fields_wrap"><td> <input  type="text" name="name" ></td><td> <input  type="text" name="name" ></td></tr>'); //add input box
            x++; 
	  }
    });
   
    // $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
       
	// 	e.preventDefault(); 
	// 	$(this).parent('div').remove(); 
	// 	x--;
    // })
});
</script>

<script>
	$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $("#input_fields_wrap1"); //Fields wrapper
    var add_button1      = $(".add_field_button2"); //Add button ID
   
    var x = 1; //initlal text box count
	
	
   $(add_button1).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
	
		     //text box increment
            $(wrapper).append('<tr><th><select class="form-control"><option>Risk Description</option><option>1</option><option>2</option><option>3</option></select></th><th><select class="form-control"><option>Possibility</option><option>1</option><option>2</option><option>3</option></select></th><th><select class="form-control"><option>Impact</option><option>1</option><option>2</option><option>3</option></select></th><th><select class="form-control"><option>Impact</option><option>1</option></select></th></tr><tr>');
            x++; 
	  }
    });
   
    // $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
       
	// 	e.preventDefault(); 
	// 	$(this).parent('div').remove(); 
	// 	x--;
    // })
    });
    </script>

</body>
</html>