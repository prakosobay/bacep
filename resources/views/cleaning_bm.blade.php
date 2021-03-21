<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCESS & CHANGE REQUEST FORM</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bm.css') }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/cleaning.js') }}" defer></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
<!--container-->
    <form  id="form_cleaning" class="form-group">
        {{ csrf_field() }}
        <!--form-->
        <div  id="form">

            <h1 class="text-white">Access Request Form</h1>
            <h2 class="text-white">Nomor: ARF/001/DCDV/XI/2019</h2>
            <h3 class="text-white">Fill In First</h3>

            <div id="input">
                <!--input-->
                <div id="input4">
                    <!--input4-->

                    <input type="text" id="input-group" placeholder="Purpose of Work (Pekerjaan yang dilakukan)">
                    <input type="text" id="input-group" placeholder="Visitor Name (Nama Pengunjung)">
                    <input type="text" id="input-group" placeholder="Visitor Company (Nama Perusahaan)">
                    <input type="number" id="input-group" placeholder="Visitor ID Number (Nomor Identitas)">
                    <input type="text" id="input-group" placeholder="Visitor Department (Departemen Pengunjung)">
                    <input type="number" id="input-group" placeholder="Visitor Phone Number (Nomor Handphone)">

                    <h6 class="text-white">Request Validity (Berlakunya Permintaan)</h6>
                    <input type="date" name="dateofbirth" id="dateofbirth">
                    <h6 class="text-white"></h6>
                    <h6 class="text-white">To (Sampai)</h6>
                    <input type="date" name="dateofbirth" id="dateofbirth">
                    <h6 class="text-white"></h6>

                    <h6 for="survey_area" class="text-white">Authorized Entry Area </h6>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                          Default radio
                        </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="server" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1"><b>Server Room</b></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="generator" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault1"><b>Generator Room</b></b></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="mmr1" id="flexRadioDefault3">
                            <label class="form-check-label" for="flexRadioDefault1"><b>MMR 1</b></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="panel" id="flexRadioDefault4">
                            <label class="form-check-label" for="flexRadioDefault1"><b>Panel Room</b></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="mmr2" id="flexRadioDefault5">
                            <label class="form-check-label" for="flexRadioDefault1"><b>MMR 2</b></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="battery" id="flexRadioDefault6">
                            <label class="form-check-label" for="flexRadioDefault1"><b>Battery Room</b></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="ups" id="flexRadioDefault7">
                            <label class="form-check-label" for="flexRadioDefault1"><b>UPS Room</b></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="fss" id="flexRadioDefault8">
                            <label class="form-check-label" for="flexRadioDefault1"><b>FSS Room</b></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="2nd" id="flexRadioDefault9">
                            <label class="form-check-label" for="flexRadioDefault1"><b>Office 2nd FL</b></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="3rd" id="flexRadioDefault10">
                            <label class="form-check-label" for="flexRadioDefault1"><b>Office 3rd FL</b></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="yard" id="flexRadioDefault11">
                            <label class="form-check-label" for="flexRadioDefault1"><b>Yard</b></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="trafo" id="flexRadioDefault12">
                            <label class="form-check-label" for="flexRadioDefault1"><b>Trafo Room</b></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="parking" id="flexRadioDefault13">
                            <label class="form-check-label" for="flexRadioDefault1"><b>Parking Lot</b></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="other" id="flexRadioDefault14">
                            <label class="form-check-label" for="flexRadioDefault1"><b>Others</b></label>
                        </div>
                </div>
            </div>
        </div>

        <div  id="form2">

            <h1 class="text-white">Change Request Form</h1>
            <h2 class="text-white">Nomor: ARF/001/DCDV/XI/2019</h2>

            <div id="input">
                    <!--input-->
                <div id="input4">
                        <!--input4-->
                    <h4 class="text-white">1. Background and Objective (Jenis Pekerjaan)</h4>
                        <input type="text" id="input-group" placeholder="Fill in here">
                    <h4 class="text-white">2. Description os Scope of Work (Deskripsikan Pekerjaan)</h4>
                        <input type="text" id="input-group" placeholder="Fill in here">
                    <h4 class="text-white">3. All Activity (Aktivitas)</h4>
                        <input type="text" id="input-group1" placeholder="Activity Description">
                        <input type="text" id="input-group1" placeholder="Service Impact">
                        <input type="text" id="input-group1" placeholder="Activity Description">
                        <input type="text" id="input-group1" placeholder="Service Impact">
                        <input type="text" id="input-group1" placeholder="Activity Description">
                        <input type="text" id="input-group1" placeholder="Service Impact">
                    <h4 class="text-white">4. Risk and Service Area Impact (Resiko dan Dampak Area Servis)</h4>
                        <select id="input-group4" style="background: black;">
                            <option value="">Risk Description</option>
                            <option value="">Tersengat Listrik</option>
                            <option value="">Menghirup Debu</option>
                            <option value="">Bersenggolan dengan perangkat</option>
                            <option value="">Korsleting</option>
                            <option value="">Bersenggolan dengan solenoid tabung</option>
                            <option value="">Bersenggolan dengan panel fire alarm</option>
                            <option value="">Terjatuh dari tangga</option>
                        </select>
                        <select id="input-group2" style="background: black;">
                            <option value="">Possibility</option>
                            <option value="">Mengalami luka bakar, pingsan, kematian</option>
                            <option value="">Batuk / tenggorokan sakit</option>
                            <option value="">Sistem jaringan dan kelistrikan menjadi lumpuh</option>
                            <option value="">Sistem kelistrikan menjadi terganggu, kebakaran</option>
                            <option value="">Gas Discharge, solenoid rusak</option>
                            <option value="">Alarm 1 gedung, gas discharge</option>
                            <option value="">Patah tulang</option>
                        </select>
                        <select id="input-group3" style="background: black;">
                            <option value="">Impact</option>
                            <option value="">High</option>
                            <option value="">Middle</option>
                            <option value="">Low</option>
                        </select>
                        <select id="input-group5" style="background: black;">
                            <option value="">Mitigation Plan</option>
                            <option value="">Menggunakan APD</option>
                            <option value="">Menggunakan masker</option>
                            <option value="">Bekerja dengan hati-hati</option>
                            <option value="">Menjaga jarak dari sumber listrik</option>
                            <option value="">Menjaga jarak dengan perangkat-perangkat critical tersebut</option>
                            <option value="">Pastikan tangga berdiri dengan benar</option>
                        </select>
                        <select id="input-group4" style="background: black;">
                            <option value="">Risk Description</option>
                            <option value="">Tersengat Listrik</option>
                            <option value="">Menghirup Debu</option>
                            <option value="">Bersenggolan dengan perangkat</option>
                            <option value="">Korsleting</option>
                            <option value="">Bersenggolan dengan solenoid tabung</option>
                            <option value="">Bersenggolan dengan panel fire alarm</option>
                            <option value="">Terjatuh dari tangga</option>
                        </select>
                        <select id="input-group2" style="background: black;">
                            <option value="">Possibility</option>
                            <option value="">Mengalami luka bakar, pingsan, kematian</option>
                            <option value="">Batuk / tenggorokan sakit</option>
                            <option value="">Sistem jaringan dan kelistrikan menjadi lumpuh</option>
                            <option value="">Sistem kelistrikan menjadi terganggu, kebakaran</option>
                            <option value="">Gas Discharge, solenoid rusak</option>
                            <option value="">Alarm 1 gedung, gas discharge</option>
                            <option value="">Patah tulang</option>
                        </select>
                        <select id="input-group3" style="background: black;">
                            <option value="">Impact</option>
                            <option value="">High</option>
                            <option value="">Middle</option>
                            <option value="">Low</option>
                        </select>
                        <select id="input-group5" style="background: black;">
                            <option value="">Mitigation Plan</option>
                            <option value="">Menggunakan APD</option>
                            <option value="">Menggunakan masker</option>
                            <option value="">Bekerja dengan hati-hati</option>
                            <option value="">Menjaga jarak dari sumber listrik</option>
                            <option value="">Menjaga jarak dengan perangkat-perangkat critical tersebut</option>
                            <option value="">Pastikan tangga berdiri dengan benar</option>
                        </select>
                        <select id="input-group4" style="background: black;">
                            <option value="">Risk Description</option>
                            <option value="">Tersengat Listrik</option>
                            <option value="">Menghirup Debu</option>
                            <option value="">Bersenggolan dengan perangkat</option>
                            <option value="">Korsleting</option>
                            <option value="">Bersenggolan dengan solenoid tabung</option>
                            <option value="">Bersenggolan dengan panel fire alarm</option>
                            <option value="">Terjatuh dari tangga</option>
                        </select>
                        <select id="input-group2" style="background: black;">
                            <option value="">Possibility</option>
                            <option value="">Mengalami luka bakar, pingsan, kematian</option>
                            <option value="">Batuk / tenggorokan sakit</option>
                            <option value="">Sistem jaringan dan kelistrikan menjadi lumpuh</option>
                            <option value="">Sistem kelistrikan menjadi terganggu, kebakaran</option>
                            <option value="">Gas Discharge, solenoid rusak</option>
                            <option value="">Alarm 1 gedung, gas discharge</option>
                            <option value="">Patah tulang</option>
                        </select>
                        <select id="input-group3" style="background: black;">
                            <option value="">Impact</option>
                            <option value="">High</option>
                            <option value="">Middle</option>
                            <option value="">Low</option>
                        </select>
                        <select id="input-group5" style="background: black;">
                            <option value="">Mitigation Plan</option>
                            <option value="">Menggunakan APD</option>
                            <option value="">Menggunakan masker</option>
                            <option value="">Bekerja dengan hati-hati</option>
                            <option value="">Menjaga jarak dari sumber listrik</option>
                            <option value="">Menjaga jarak dengan perangkat-perangkat critical tersebut</option>
                            <option value="">Pastikan tangga berdiri dengan benar</option>
                        </select>
                        <select id="input-group4" style="background: black;">
                            <option value="">Risk Description</option>
                            <option value="">Tersengat Listrik</option>
                            <option value="">Menghirup Debu</option>
                            <option value="">Bersenggolan dengan perangkat</option>
                            <option value="">Korsleting</option>
                            <option value="">Bersenggolan dengan solenoid tabung</option>
                            <option value="">Bersenggolan dengan panel fire alarm</option>
                            <option value="">Terjatuh dari tangga</option>
                        </select>
                        <select id="input-group2" style="background: black;">
                            <option value="">Possibility</option>
                            <option value="">Mengalami luka bakar, pingsan, kematian</option>
                            <option value="">Batuk / tenggorokan sakit</option>
                            <option value="">Sistem jaringan dan kelistrikan menjadi lumpuh</option>
                            <option value="">Sistem kelistrikan menjadi terganggu, kebakaran</option>
                            <option value="">Gas Discharge, solenoid rusak</option>
                            <option value="">Alarm 1 gedung, gas discharge</option>
                            <option value="">Patah tulang</option>
                        </select>
                        <select id="input-group3" style="background: black;">
                            <option value="">Impact</option>
                            <option value="">High</option>
                            <option value="">Middle</option>
                            <option value="">Low</option>
                        </select>
                        <select id="input-group5" style="background: black;">
                            <option value="">Mitigation Plan</option>
                            <option value="">Menggunakan APD</option>
                            <option value="">Menggunakan masker</option>
                            <option value="">Bekerja dengan hati-hati</option>
                            <option value="">Menjaga jarak dari sumber listrik</option>
                            <option value="">Menjaga jarak dengan perangkat-perangkat critical tersebut</option>
                            <option value="">Pastikan tangga berdiri dengan benar</option>
                        </select>
                        <select id="input-group4" style="background: black;">
                            <option value="">Risk Description</option>
                            <option value="">Tersengat Listrik</option>
                            <option value="">Menghirup Debu</option>
                            <option value="">Bersenggolan dengan perangkat</option>
                            <option value="">Korsleting</option>
                            <option value="">Bersenggolan dengan solenoid tabung</option>
                            <option value="">Bersenggolan dengan panel fire alarm</option>
                            <option value="">Terjatuh dari tangga</option>
                        </select>
                        <select id="input-group2" style="background: black;">
                            <option value="">Possibility</option>
                            <option value="">Mengalami luka bakar, pingsan, kematian</option>
                            <option value="">Batuk / tenggorokan sakit</option>
                            <option value="">Sistem jaringan dan kelistrikan menjadi lumpuh</option>
                            <option value="">Sistem kelistrikan menjadi terganggu, kebakaran</option>
                            <option value="">Gas Discharge, solenoid rusak</option>
                            <option value="">Alarm 1 gedung, gas discharge</option>
                            <option value="">Patah tulang</option>
                        </select>
                        <select id="input-group3" style="background: black;">
                            <option value="">Impact</option>
                            <option value="">High</option>
                            <option value="">Middle</option>
                            <option value="">Low</option>
                        </select>
                        <select id="input-group5" style="background: black;">
                            <option value="">Mitigation Plan</option>
                            <option value="">Menggunakan APD</option>
                            <option value="">Menggunakan masker</option>
                            <option value="">Bekerja dengan hati-hati</option>
                            <option value="">Menjaga jarak dari sumber listrik</option>
                            <option value="">Menjaga jarak dengan perangkat-perangkat critical tersebut</option>
                            <option value="">Pastikan tangga berdiri dengan benar</option>
                        </select>
                    <h4 class="text-white">5. Detail Execution (Kegiatan)</h4>
                        <input type="text" id="input-group1" placeholder="Item Operation (Barang yang digunakan)">
                        <input type="text" id="input-group1" placeholder="Working Procedure (Tata Kerja)">
                        <input type="text" id="input-group1" placeholder="Item Operation (Barang yang digunakan)">
                        <input type="text" id="input-group1" placeholder="Working Procedure (Tata Kerja)">
                        <input type="text" id="input-group1" placeholder="Item Operation (Barang yang digunakan)">
                        <input type="text" id="input-group1" placeholder="Working Procedure (Tata Kerja)">

                    <h4 class="text-white">6. Testing and Verification</h4>
                    <input type="text" id="input-group" placeholder="Fill in here (isi disini)">

                    <h4 class="text-white">7. Rollback Plan</h4>
                    <input type="text" id="input-group" placeholder="Fill in here (isi disini)">

                    <h4 class="text-white">8. Person in charge</h4>
                        <input type="text" id="input-group6" placeholder="Name">
                        <input type="text" id="input-group6" placeholder="Company">
                        <input type="text" id="input-group6" placeholder="Responsibility">
                        <input type="text" id="input-group6" placeholder="Name">
                        <input type="text" id="input-group6" placeholder="Company">
                        <input type="text" id="input-group6" placeholder="Responsibility">
                        <input type="text" id="input-group6" placeholder="Name">
                        <input type="text" id="input-group6" placeholder="Company">
                        <input type="text" id="input-group6" placeholder="Responsibility">
                        <input type="text" id="input-group6" placeholder="Name">
                        <input type="text" id="input-group6" placeholder="Company">
                        <input type="text" id="input-group6" placeholder="Responsibility">
                        <input type="text" id="input-group6" placeholder="Name">
                        <input type="text" id="input-group6" placeholder="Company">
                        <input type="text" id="input-group6" placeholder="Responsibility">
                </div>
            </div>


            <button type="submit" class="btn btn-warning text-white btn-submit">Submit Form</button>
            <button type="reset" class="btn btn-primary">Clear Form</button>
        </div>

    <!--container-->
    </form>
</div>

</body>
<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

    $(".btn-submit").click(function(e){

        e.preventDefault();

        var datastring = $("#form_cleaning").serialize();
        $.ajax({
            type:'POST',
            url:"{{url('submit_data_cleaning')}}",
            data: datastring,
            error: function (request, error) {
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
                        location.href = "{{url("/home")}}";
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
</script>
</html>
