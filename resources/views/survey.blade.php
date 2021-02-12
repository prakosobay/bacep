    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ACCESS REQUEST FORM</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/ar.css') }}">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->

        <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    </head>

    <body>
        <div class="container">
            <!--container-->

            <form id="form_survey" class="form-group">
                {{ csrf_field() }}
                <!--form-->

                <div id="form">
                    <!--form-->
                    <h1 class="text-white">Access Request Form</h1>
                    <h2 class="text-white">Nomor: ARF/001/DCDV/XI/2019</h2>

                    <h3 class="text-white">Fill In First</h3>

                    <div id="input">
                        <!--input-->
                        <div id="input4">
                            <!--input4-->

                            <label><p style="color:white">Tanggal</p></label>
                            <select id="input-group4" style="background: black;" name="date">
                                {{ $tanggal= 0 }}
                                    @for ($tanggal = 0; $tanggal < 32; $tanggal++)
                                        <option value="{{ $tanggal }}">{{ $tanggal }}</option>
                                    @endfor
                            </select>
                            <label><p style="color:white">Bulan</p></label>
                            <select id="input-group2" style="background: black;" name="months">
                                {{ $month= 0 }}
                                    @for ($month = 0; $month < 13; $month++)
                                        <option value="{{ $month }}">{{ $month }}</option>
                                    @endfor
                            </select>

                            <label><p style="color:white">Tahun</p></label>
                            <select id="input-group3" style="background: black;" name="year">
                                <option value="Year">Year</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                            </select>

                            <input type="text" id="input-group" placeholder="Purpose of Work (Pekerjaan yang dilakukan)" name="purpose_work">
                            <input type="text" id="input-group" placeholder="Visitor Name (Nama Pengunjung)" name="visitor_name">
                            <input type="text" id="input-group" placeholder="Visitor Company (Nama Perusahaan)" name="visitor_company">
                            <input type="text" id="input-group" placeholder="Visitor ID Number (Nomor Identitas)" name="visitor_id">
                            <input type="text" id="input-group" placeholder="Visitor Department (Departemen Pengunjung)" name="visitor_department">
                            <input type="number" id="input-group" placeholder="Visitor Phone Number (Nomor Handphone)" name="visitor_phone">
                            <input type="text" id="input-group" placeholder="Validity From DD/MM/YY" name="validity">

                            <label><p style="color:white">Waktu Masuk</p></label>
                            <select id="input-group3" style="background: black;" name="time_in">
                                {{ $waktu_in= 0 }}
                                    @for ($waktu_in = 0; $waktu_in < 25; $waktu_in++)
                                        <option value="{{ $waktu_in }}">{{ $waktu_in }}</option>
                                    @endfor
                            </select>
                            <label><p style="color:white">Waktu Keluar</p></label>
                            <select id="input-group3" style="background: black;" name="time_out">
                                {{ $waktu_out= 0 }}
                                    @for ($waktu_out = 0; $waktu_out < 25; $waktu_out++)
                                        <option value="{{ $waktu_out }}">{{ $waktu_out }}</option>
                                    @endfor
                            </select>
                        </div>

                        <!--input-->

                        <select id="input-group" style="background: black;" name="lokasi">
                            <option value="">Authorized Entry Area</option>
                            <option value="Server Room">Server Room</option>
                            <option value="MMR 1">MMR 1</option>
                            <option value="MMR 2">MMR 2</option>
                            <option value="UPS Room">UPS Room</option>
                            <option value="Generator Room">Generator Room</option>
                            <option value="Panel Room">Panel Room</option>
                            <option value="Battery Room">Battery Room</option>
                            <option value="FSS Room">FSS Room</option>
                            <option value="Trafo Room">Trafo Room</option>
                            <option value="Office 3rd FL">Office 3rd FL</option>
                            <option value="Office 2nd FL">Office 2nd FL</option>
                            <option value="Parking Lot">Parking Lot</option>
                            <option value="Yard">Yard</option>
                            <option value="Other Lantai 1">Other Lantai 1</option>
                </select>
                        <select id="input-group" style="background: black;" name="akses">
                            <option value="">Access Type</option>
                            <option value="General Access">General Access</option>
                            <option value="Limited Access">Limited Access</option>
                            <option value="Escorted Access">Escorted Access</option>
                </select>
                    </div>
                    <!--input4-->

                    <button type="button" class="btn btn-warning text-white btn-submit">Submit Form</button>
                    <button type="reset" class="btn btn-primary">Clear Form</button>

                </div>
                <!--form-->


            </form>
            <!--form-->

        </div>
        <!--container-->
    </body>

    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });

        $(".btn-submit").click(function(e){

            e.preventDefault();

            var datastring = $("#form_survey").serialize();
            console.log(datastring);
            $.ajax({
                type:'POST',
                url:"{{url('submit_data_survey')}}",
                data: datastring,
                error: function (request, error) {
					console.log(arguments);
					alert(" Can't do because: " + error);
                },
				success:function(data){
					console.log(data);
                    if(data.status == 'SUCCESS'){
                        Swal.fire({
							title: "Success!",
							text: 'Data Saved',
                            type: "success",
						}, function(IsConfirm){
                            if (isConfirm){
							location.href = "{{url("/home")}}";
                            }
						});

                    }else if(data.status == 'FAILED'){

						Swal.fire({
							title: "Failed!",
							text: 'Saving Data Failed',
						}, function(){
						});
                    }
                }
            });
        });
    </script>
    </html>
