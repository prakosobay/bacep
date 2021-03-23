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
        <!--form-->
        <center>
            <h1 class="text-white">Access Request Form</h1>
            <h2 class="text-white">Nomor: ARF/001/DCDV/XI/2019</h2>
        </center>

            <div id="input">
                <!--input-->
                <div id="input4">
                    <!--input4-->

                    {{-- <input type="text" id="input-group" placeholder="Purpose of Work (Pekerjaan yang dilakukan)" name="cleaning_work"> --}}
                    <select id="input-group20" style="background: black;" name="cleaning_work">
                        <option value="">Purpose of Work</option>
                        <option value="Pembersihan Lantai Dasar Ruang Facility Data Center (Trafo-Battery-PUTR-Genset-Pintu Luar PLN">
                            Pembersihan Lantai Dasar Ruang Facility Data Center (Trafo-Battery-PUTR-Genset-Pintu Luar PLN
                        </option>
                        <option value="Pembersihan Ruang Data Center (Pembersihan Plafon Atas, Besi Support, Rack & Raised Floor)">
                            Pembersihan Ruang Data Center (Pembersihan Plafon Atas, Besi Support, Rack & Raised Floor)
                        </option>
                        <option value=" Pembersihan Under Raised Floor Data Center">
                            Pembersihan Under Raised Floor Data Center
                        </option>
                        <option value="Pembersihan Lantai Dasar Data Center (Ruang Server)">
                            Pembersihan Lantai Dasar Data Center (Ruang Server)
                        </option>
                        <option value="Pembersihan Under Raised Floor Koridor Lantai 1, (MMR 1, MMR 2, Ruang UPS, Fire Suppression System & Server Wallmount)">
                            Pembersihan Under Raised Floor Koridor Lantai 1, (MMR 1, MMR 2, Ruang UPS, Fire Suppression System & Server Wallmount)
                        </option>
                        <option value="Pembersihan lantai 1 (MMR 1 - MMR 2  - UPS - Server Wallmount - Fire Suppression System)">
                            Pembersihan lantai 1 (MMR 1 - MMR 2  - UPS - Server Wallmount - Fire Suppression System)
                        </option>
                    </select>

                    <h6 class="text-white">Request Validity (Berlakunya Permintaan)</h6>
                    <input type="date" name="validity_from" id="dateofbirth">
                    <h6 class="text-white"></h6>
                    <h6 class="text-white">To (Sampai)</h6>
                    <input type="date" name="validity_to" id="dateofbirth">
                    <h6 class="text-white"></h6>

                    <h6 for="survey_area" class="text-white">Authorized Entry Area </h6>
                    <div>
                        <label class="radiobutton_container">
                        <input id="1" name="server" type="radio">
                        <span class="radiobutton_mark"></span>
                        Server Room
                        </label>
                    </div>
                    <div >
                        <label class="radiobutton_container">
                        <input id="1" name="generator" type="radio">
                        <span class="radiobutton_mark"></span>
                        Generator Room
                        </label>
                    </div>
                    <div>
                        <label class="radiobutton_container">
                        <input id="1" name="ups" type="radio">
                        <span class="radiobutton_mark"></span>
                        UPS Room
                        </label>
                    </div>
                    <div >
                        <label class="radiobutton_container">
                        <input id="1" name="panel" type="radio">
                        <span class="radiobutton_mark"></span>
                        Panel Room
                        </label>
                    </div>
                    <div >
                        <label class="radiobutton_container">
                        <input id="1" name="fss" type="radio">
                        <span class="radiobutton_mark"></span>
                        FSS Room
                        </label>
                    </div>
                    <div >
                        <label class="radiobutton_container">
                        <input id="1" name="staging" type="radio">
                        <span class="radiobutton_mark"></span>
                        Staging Room
                        </label>
                    </div>
                    <div >
                        <label class="radiobutton_container">
                        <input id="1" name="battery" type="radio">
                        <span class="radiobutton_mark"></span>
                        Battery Room
                        </label>
                    </div>
                    <div >
                        <label class="radiobutton_container">
                        <input id="1" name="trafo" type="radio">
                        <span class="radiobutton_mark"></span>
                        Trafo Room
                        </label>
                    </div>
                    <div >
                        <label class="radiobutton_container">
                        <input id="1" name="mmr1" type="radio">
                        <span class="radiobutton_mark"></span>
                        MMR 1
                        </label>
                    </div>
                    <div >
                        <label class="radiobutton_container">
                        <input id="1" name="mmr2" type="radio">
                        <span class="radiobutton_mark"></span>
                        MMR 2
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div  id="form2">

            <center>
            <h1 class="text-white">Change Request Form</h1>
            <h2 class="text-white">Nomor: ARF/001/DCDV/XI/2019</h2>
            </center>

            <div id="input">
                    <!--input-->
                <div id="input4">
                        <!--input4-->
                    <h4 class="text-white">1. Background and Objective (Jenis Pekerjaan)</h4>
                        <input type="text" id="input-group" placeholder="Fill in here" name="cleaning_background">
                    <h4 class="text-white">2. Description os Scope of Work (Deskripsikan Pekerjaan)</h4>
                        <input type="text" id="input-group" placeholder="Fill in here" name="cleaning_describ">
                    <h4 class="text-white">3. All Activity (Aktivitas)</h4>
                        <input type="time" id="input-group7" placeholder="Time" name="cleaning_time_1">
                        <input type="text" id="input-group1" placeholder="Activity Description" name="cleaning_activity_1">
                        <input type="text" id="input-group1" placeholder="Service Impact" name="cleaning_service_1">
                        <input type="time" id="input-group7" placeholder="Time" name="cleaning_time_2">
                        <input type="text" id="input-group1" placeholder="Activity Description" name="cleaning_activity_2">
                        <input type="text" id="input-group1" placeholder="Service Impact" name="cleaning_service_2">
                        <input type="time" id="input-group7" placeholder="Time" name="cleaning_time_3">
                        <input type="text" id="input-group1" placeholder="Activity Description" name="cleaning_activity_3">
                        <input type="text" id="input-group1" placeholder="Service Impact" name="cleaning_service_3">
                        <input type="time" id="input-group7" placeholder="Time" name="cleaning_time_4">
                        <input type="text" id="input-group1" placeholder="Activity Description" name="cleaning_activity_4">
                        <input type="text" id="input-group1" placeholder="Service Impact" name="cleaning_service_4">

                    <h4 class="text-white">4. Risk and Service Area Impact (Resiko dan Dampak Area Servis)</h4>
                        <select id="input-group11" style="background: black;" name="cleaning_risk_1">
                            <option value="">Risk Description</option>
                            <option value="Tersengat Listrik">Tersengat Listrik</option>
                            <option value="Menghirup Debu">Menghirup Debu</option>
                            <option value="Bersenggolan dengan perangkat">Bersenggolan dengan perangkat</option>
                            <option value="Korsleting">Korsleting</option>
                            <option value="Bersenggolan dengan solenoid tabung">Bersenggolan dengan solenoid tabung</option>
                            <option value="Bersenggolan dengan panel fire alarm">Bersenggolan dengan panel fire alarm</option>
                            <option value="Terjatuh dari tangga">Terjatuh dari tangga</option>
                        </select>
                        <select id="input-group12" style="background: black;" name="cleaning_possibility_1">
                            <option value="">Possibility</option>
                            <option value="Mengalami luka bakar, pingsan, kematian">Mengalami luka bakar, pingsan, kematian</option>
                            <option value="Batuk / tenggorokan sakit">Batuk / tenggorokan sakit</option>
                            <option value="Sistem jaringan dan kelistrikan menjadi lumpuh">Sistem jaringan dan kelistrikan menjadi lumpuh</option>
                            <option value="Sistem kelistrikan menjadi terganggu, kebakaran">Sistem kelistrikan menjadi terganggu, kebakaran</option>
                            <option value="Gas Discharge, solenoid rusak">Gas Discharge, solenoid rusak</option>
                            <option value="Alarm 1 gedung, gas discharge">Alarm 1 gedung, gas discharge</option>
                            <option value="Patah tulang">Patah tulang</option>
                        </select>
                        <select id="input-group3" style="background: black;" name="cleaning_impact_1">
                            <option value="">Impact</option>
                            <option value="High">High</option>
                            <option value="Middle">Middle</option>
                            <option value="Low">Low</option>
                        </select>
                        <select id="input-group5" style="background: black;" name="cleaning_mitigation_1">
                            <option value="">Mitigation Plan</option>
                            <option value="Menggunakan APD">Menggunakan APD</option>
                            <option value="Menggunakan masker">Menggunakan masker</option>
                            <option value="Bekerja dengan hati-hati">Bekerja dengan hati-hati</option>
                            <option value="Menjaga jarak dari sumber listrik">Menjaga jarak dari sumber listrik</option>
                            <option value="Menjaga jarak dengan perangkat-perangkat critical tersebut">Menjaga jarak dengan perangkat-perangkat critical tersebut</option>
                            <option value="Pastikan tangga berdiri dengan benar">Pastikan tangga berdiri dengan benar</option>
                        </select>

                        <select id="input-group11" style="background: black;" name="cleaning_risk_2">
                            <option value="">Risk Description</option>
                            <option value="Tersengat Listrik">Tersengat Listrik</option>
                            <option value="Menghirup Debu">Menghirup Debu</option>
                            <option value="Bersenggolan dengan perangkat">Bersenggolan dengan perangkat</option>
                            <option value="Korsleting">Korsleting</option>
                            <option value="Bersenggolan dengan solenoid tabung">Bersenggolan dengan solenoid tabung</option>
                            <option value="Bersenggolan dengan panel fire alarm">Bersenggolan dengan panel fire alarm</option>
                            <option value="Terjatuh dari tangga">Terjatuh dari tangga</option>
                        </select>
                        <select id="input-group12" style="background: black;" name="cleaning_possibility_2">
                            <option value="">Possibility</option>
                            <option value="Mengalami luka bakar, pingsan, kematian">Mengalami luka bakar, pingsan, kematian</option>
                            <option value="Batuk / tenggorokan sakit">Batuk / tenggorokan sakit</option>
                            <option value="Sistem jaringan dan kelistrikan menjadi lumpuh">Sistem jaringan dan kelistrikan menjadi lumpuh</option>
                            <option value="Sistem kelistrikan menjadi terganggu, kebakaran">Sistem kelistrikan menjadi terganggu, kebakaran</option>
                            <option value="Gas Discharge, solenoid rusak">Gas Discharge, solenoid rusak</option>
                            <option value="Alarm 1 gedung, gas discharge">Alarm 1 gedung, gas discharge</option>
                            <option value="Patah tulang">Patah tulang</option>
                        </select>
                        <select id="input-group3" style="background: black;" name="cleaning_impact_2">
                            <option value="">Impact</option>
                            <option value="High">High</option>
                            <option value="Middle">Middle</option>
                            <option value="Low">Low</option>
                        </select>
                        <select id="input-group5" style="background: black;" name="cleaning_mitigation_2">
                            <option value="">Mitigation Plan</option>
                            <option value="Menggunakan APD">Menggunakan APD</option>
                            <option value="Menggunakan masker">Menggunakan masker</option>
                            <option value="Bekerja dengan hati-hati">Bekerja dengan hati-hati</option>
                            <option value="Menjaga jarak dari sumber listrik">Menjaga jarak dari sumber listrik</option>
                            <option value="Menjaga jarak dengan perangkat-perangkat critical tersebut">Menjaga jarak dengan perangkat-perangkat critical tersebut</option>
                            <option value="Pastikan tangga berdiri dengan benar">Pastikan tangga berdiri dengan benar</option>
                        </select>

                        <select id="input-group11" style="background: black;" name="cleaning_risk_3">
                            <option value="">Risk Description</option>
                            <option value="Tersengat Listrik">Tersengat Listrik</option>
                            <option value="Menghirup Debu">Menghirup Debu</option>
                            <option value="Bersenggolan dengan perangkat">Bersenggolan dengan perangkat</option>
                            <option value="Korsleting">Korsleting</option>
                            <option value="Bersenggolan dengan solenoid tabung">Bersenggolan dengan solenoid tabung</option>
                            <option value="Bersenggolan dengan panel fire alarm">Bersenggolan dengan panel fire alarm</option>
                            <option value="Terjatuh dari tangga">Terjatuh dari tangga</option>
                        </select>
                        <select id="input-group12" style="background: black;" name="cleaning_possibility_3">
                            <option value="">Possibility</option>
                            <option value="Mengalami luka bakar, pingsan, kematian">Mengalami luka bakar, pingsan, kematian</option>
                            <option value="Batuk / tenggorokan sakit">Batuk / tenggorokan sakit</option>
                            <option value="Sistem jaringan dan kelistrikan menjadi lumpuh">Sistem jaringan dan kelistrikan menjadi lumpuh</option>
                            <option value="Sistem kelistrikan menjadi terganggu, kebakaran">Sistem kelistrikan menjadi terganggu, kebakaran</option>
                            <option value="Gas Discharge, solenoid rusak">Gas Discharge, solenoid rusak</option>
                            <option value="Alarm 1 gedung, gas discharge">Alarm 1 gedung, gas discharge</option>
                            <option value="Patah tulang">Patah tulang</option>
                        </select>
                        <select id="input-group3" style="background: black;" name="cleaning_impact_3">
                            <option value="">Impact</option>
                            <option value="High">High</option>
                            <option value="Middle">Middle</option>
                            <option value="Low">Low</option>
                        </select>
                        <select id="input-group5" style="background: black;" name="cleaning_mitigation_3">
                            <option value="">Mitigation Plan</option>
                            <option value="Menggunakan APD">Menggunakan APD</option>
                            <option value="Menggunakan masker">Menggunakan masker</option>
                            <option value="Bekerja dengan hati-hati">Bekerja dengan hati-hati</option>
                            <option value="Menjaga jarak dari sumber listrik">Menjaga jarak dari sumber listrik</option>
                            <option value="Menjaga jarak dengan perangkat-perangkat critical tersebut">Menjaga jarak dengan perangkat-perangkat critical tersebut</option>
                            <option value="Pastikan tangga berdiri dengan benar">Pastikan tangga berdiri dengan benar</option>
                        </select>

                        <select id="input-group11" style="background: black;" name="cleaning_risk_4">
                            <option value="">Risk Description</option>
                            <option value="Tersengat Listrik">Tersengat Listrik</option>
                            <option value="Menghirup Debu">Menghirup Debu</option>
                            <option value="Bersenggolan dengan perangkat">Bersenggolan dengan perangkat</option>
                            <option value="Korsleting">Korsleting</option>
                            <option value="Bersenggolan dengan solenoid tabung">Bersenggolan dengan solenoid tabung</option>
                            <option value="Bersenggolan dengan panel fire alarm">Bersenggolan dengan panel fire alarm</option>
                            <option value="Terjatuh dari tangga">Terjatuh dari tangga</option>
                        </select>
                        <select id="input-group12" style="background: black;" name="cleaning_possibility_4">
                            <option value="">Possibility</option>
                            <option value="Mengalami luka bakar, pingsan, kematian">Mengalami luka bakar, pingsan, kematian</option>
                            <option value="Batuk / tenggorokan sakit">Batuk / tenggorokan sakit</option>
                            <option value="Sistem jaringan dan kelistrikan menjadi lumpuh">Sistem jaringan dan kelistrikan menjadi lumpuh</option>
                            <option value="Sistem kelistrikan menjadi terganggu, kebakaran">Sistem kelistrikan menjadi terganggu, kebakaran</option>
                            <option value="Gas Discharge, solenoid rusak">Gas Discharge, solenoid rusak</option>
                            <option value="Alarm 1 gedung, gas discharge">Alarm 1 gedung, gas discharge</option>
                            <option value="Patah tulang">Patah tulang</option>
                        </select>
                        <select id="input-group3" style="background: black;" name="cleaning_impact_4">
                            <option value="">Impact</option>
                            <option value="High">High</option>
                            <option value="Middle">Middle</option>
                            <option value="Low">Low</option>
                        </select>
                        <select id="input-group5" style="background: black;" name="cleaning_mitigation_4">
                            <option value="">Mitigation Plan</option>
                            <option value="Menggunakan APD">Menggunakan APD</option>
                            <option value="Menggunakan masker">Menggunakan masker</option>
                            <option value="Bekerja dengan hati-hati">Bekerja dengan hati-hati</option>
                            <option value="Menjaga jarak dari sumber listrik">Menjaga jarak dari sumber listrik</option>
                            <option value="Menjaga jarak dengan perangkat-perangkat critical tersebut">Menjaga jarak dengan perangkat-perangkat critical tersebut</option>
                            <option value="Pastikan tangga berdiri dengan benar">Pastikan tangga berdiri dengan benar</option>
                        </select>

                        <select id="input-group11" style="background: black;" name="cleaning_risk_5">
                            <option value="">Risk Description</option>
                            <option value="Tersengat Listrik">Tersengat Listrik</option>
                            <option value="Menghirup Debu">Menghirup Debu</option>
                            <option value="Bersenggolan dengan perangkat">Bersenggolan dengan perangkat</option>
                            <option value="Korsleting">Korsleting</option>
                            <option value="Bersenggolan dengan solenoid tabung">Bersenggolan dengan solenoid tabung</option>
                            <option value="Bersenggolan dengan panel fire alarm">Bersenggolan dengan panel fire alarm</option>
                            <option value="Terjatuh dari tangga">Terjatuh dari tangga</option>
                        </select>
                        <select id="input-group12" style="background: black;" name="cleaning_possibility_5">
                            <option value="">Possibility</option>
                            <option value="Mengalami luka bakar, pingsan, kematian">Mengalami luka bakar, pingsan, kematian</option>
                            <option value="Batuk / tenggorokan sakit">Batuk / tenggorokan sakit</option>
                            <option value="Sistem jaringan dan kelistrikan menjadi lumpuh">Sistem jaringan dan kelistrikan menjadi lumpuh</option>
                            <option value="Sistem kelistrikan menjadi terganggu, kebakaran">Sistem kelistrikan menjadi terganggu, kebakaran</option>
                            <option value="Gas Discharge, solenoid rusak">Gas Discharge, solenoid rusak</option>
                            <option value="Alarm 1 gedung, gas discharge">Alarm 1 gedung, gas discharge</option>
                            <option value="Patah tulang">Patah tulang</option>
                        </select>
                        <select id="input-group3" style="background: black;" name="cleaning_impact_5">
                            <option value="">Impact</option>
                            <option value="High">High</option>
                            <option value="Middle">Middle</option>
                            <option value="Low">Low</option>
                        </select>
                        <select id="input-group5" style="background: black;" name="cleaning_mitigation_5">
                            <option value="">Mitigation Plan</option>
                            <option value="Menggunakan APD">Menggunakan APD</option>
                            <option value="Menggunakan masker">Menggunakan masker</option>
                            <option value="Bekerja dengan hati-hati">Bekerja dengan hati-hati</option>
                            <option value="Menjaga jarak dari sumber listrik">Menjaga jarak dari sumber listrik</option>
                            <option value="Menjaga jarak dengan perangkat-perangkat critical tersebut<">Menjaga jarak dengan perangkat-perangkat critical tersebut</option>
                            <option value="Pastikan tangga berdiri dengan benar">Pastikan tangga berdiri dengan benar</option>
                        </select>

                        <select id="input-group11" style="background: black;" name="cleaning_risk_6">
                            <option value="">Risk Description</option>
                            <option value="Tersengat Listrik">Tersengat Listrik</option>
                            <option value="Menghirup Debu">Menghirup Debu</option>
                            <option value="Bersenggolan dengan perangkat">Bersenggolan dengan perangkat</option>
                            <option value="Korsleting">Korsleting</option>
                            <option value="Bersenggolan dengan solenoid tabung">Bersenggolan dengan solenoid tabung</option>
                            <option value="Bersenggolan dengan panel fire alarm">Bersenggolan dengan panel fire alarm</option>
                            <option value="Terjatuh dari tangga">Terjatuh dari tangga</option>
                        </select>
                        <select id="input-group12" style="background: black;" name="cleaning_possibility_6">
                            <option value="">Possibility</option>
                            <option value="Mengalami luka bakar, pingsan, kematian">Mengalami luka bakar, pingsan, kematian</option>
                            <option value="Batuk / tenggorokan sakit">Batuk / tenggorokan sakit</option>
                            <option value="Sistem jaringan dan kelistrikan menjadi lumpuh">Sistem jaringan dan kelistrikan menjadi lumpuh</option>
                            <option value="Sistem kelistrikan menjadi terganggu, kebakaran">Sistem kelistrikan menjadi terganggu, kebakaran</option>
                            <option value="Gas Discharge, solenoid rusak">Gas Discharge, solenoid rusak</option>
                            <option value="Alarm 1 gedung, gas discharge">Alarm 1 gedung, gas discharge</option>
                            <option value="Patah tulang">Patah tulang</option>
                        </select>
                        <select id="input-group3" style="background: black;" name="cleaning_impact_6">
                            <option value="">Impact</option>
                            <option value="High">High</option>
                            <option value="Middle">Middle</option>
                            <option value="Low">Low</option>
                        </select>
                        <select id="input-group5" style="background: black;" name="cleaning_mitigation_6">
                            <option value="">Mitigation Plan</option>
                            <option value="Menggunakan APD">Menggunakan APD</option>
                            <option value="Menggunakan masker">Menggunakan masker</option>
                            <option value="Bekerja dengan hati-hati">Bekerja dengan hati-hati</option>
                            <option value="Menjaga jarak dari sumber listrik">Menjaga jarak dari sumber listrik</option>
                            <option value="Menjaga jarak dengan perangkat-perangkat critical tersebut<">Menjaga jarak dengan perangkat-perangkat critical tersebut</option>
                            <option value="Pastikan tangga berdiri dengan benar">Pastikan tangga berdiri dengan benar</option>
                        </select>

                    <h4 class="text-white">5. Detail Execution (Kegiatan)</h4>
                        <select id="input-group1" style="background: black;" name="cleaning_item_1">
                            <option value="">Item Operation (Barang yang Digunakan)</option>
                            <option value="Vacum-Majun-Kanebo-Kop">
                                Vacum  -  Majun - Kanebo - Kop
                            </option>
                            <option value="Pel-Kanebo-Majun-Sapu-Rack Ball-Dusk Pan-Ember-Tangga">
                                Pel - Kanebo - Majun - Sapu - Rack Ball - Dusk Pan - Ember - Tangga
                            </option>
                            <option value="Vacum-Kanebo-Kain Majun-Kop-Senter-Kabel Roll ">
                                Vacum -  Kanebo - Kain Majun - Kop - Senter - Kabel Roll
                            </option>
                            <option value="Vacum-Pel-Majun-Tangga-Kanebo">
                                Vacum  - Pel - Majun - Tangga - Kanebo
                            </option>
                            <option value="Pel-Kanebo-Majun-Sapu-Stick Ball-Dusk Pan-Ember-Tangga">
                                Pel - Kanebo - Majun - Sapu - Stick Ball - Dusk Pan - Ember - Tangga
                            </option>
                        </select>
                        <select id="input-group1" style="background: black;" name="cleaning_procedure_1">
                            <option value="">Working Procedure (Tata Kerja)</option>
                            <option value="Pembersihan Ruang Genset">
                                Pembersihan Ruang Genset
                            </option>
                            <option value="Pembersihan Ruang Panel">
                                Pembersihan Ruang Panel
                            </option>
                            <option value="Pembersihan Ruang Baterai">
                                Pembersihan Ruang Baterai
                            </option>
                            <option value="Pembersihan Ruang Trafo">
                                Pembersihan Ruang Trafo
                            </option>
                            <option value="Pembersihan Bagian Luar Gardu PLN">
                                Pembersihan Bagian Luar Gardu PLN
                            </option>
                            <option value="Pembersihan Ruang MMR1">
                                Pembersihan Ruang MMR1
                            </option>
                            <option value="Pembersihan Ruang UPS">
                                Pembersihan Ruang UPS
                            </option>
                            <option value="Pembersihan Ruang Fire Suppression System">
                                Pembersihan Ruang Fire Suppression System
                            </option>
                            <option value="Pembersihan Ruang Server Wallmount">
                                Pembersihan Ruang Server Wallmount
                            </option>
                            <option value="Pembersihan Platfon Atas, Besi Support, Rack & Raised Floor Ruang Data Center">
                                Pembersihan Platfon Atas, Besi Support, Rack & Raised Floor Ruang Data Center
                            </option>
                            <option value="Under Raised Floor Koridor Lantai 1">
                                Under Raised Floor Koridor Lantai 1
                            </option>
                            <option value="Under Raised Floor Ruang MMR 1">
                                Under Raised Floor Ruang MMR 1
                            </option>
                            <option value="Under Raised Floor Ruang Server Wallmount">
                                Under Raised Floor Ruang Server Wallmount
                            </option>
                            <option value="Under Raised Floor Ruang UPS">
                                Under Raised Floor Ruang UPS
                            </option>
                            <option value="Under Raised Floor Ruang Fire Suppression">
                                Under Raised Floor Ruang Fire Suppression
                            </option>
                            <option value="Under Raised Floor Ruang MMR 2">
                                Under Raised Floor Ruang MMR 2
                            </option>
                            <option value="Pembersihan Under Raised Floor Data Center">
                                Pembersihan Under Raised Floor Data Center
                            </option>
                        </select>

                        <select id="input-group1" style="background: black;" name="cleaning_item_2">
                            <option value="">Item Operation (Barang yang Digunakan)</option>
                            <option value="Vacum-Majun-Kanebo-Kop">
                                Vacum  -  Majun - Kanebo - Kop
                            </option>
                            <option value="Pel-Kanebo-Majun-Sapu-Rack Ball-Dusk Pan-Ember-Tangga">
                                Pel - Kanebo - Majun - Sapu - Rack Ball - Dusk Pan - Ember - Tangga
                            </option>
                            <option value="Vacum-Kanebo-Kain Majun-Kop-Senter-Kabel Roll ">
                                Vacum -  Kanebo - Kain Majun - Kop - Senter - Kabel Roll
                            </option>
                            <option value="Vacum-Pel-Majun-Tangga-Kanebo">
                                Vacum  - Pel - Majun - Tangga - Kanebo
                            </option>
                            <option value="Pel-Kanebo-Majun-Sapu-Stick Ball-Dusk Pan-Ember-Tangga">
                                Pel - Kanebo - Majun - Sapu - Stick Ball - Dusk Pan - Ember - Tangga
                            </option>
                        </select>
                        <select id="input-group1" style="background: black;" name="cleaning_procedure_2">
                            <option value="">Working Procedure (Tata Kerja)</option>
                            <option value="Pembersihan Ruang Genset">
                                Pembersihan Ruang Genset
                            </option>
                            <option value="Pembersihan Ruang Panel">
                                Pembersihan Ruang Panel
                            </option>
                            <option value="Pembersihan Ruang Baterai">
                                Pembersihan Ruang Baterai
                            </option>
                            <option value="Pembersihan Ruang Trafo">
                                Pembersihan Ruang Trafo
                            </option>
                            <option value="Pembersihan Bagian Luar Gardu PLN">
                                Pembersihan Bagian Luar Gardu PLN
                            </option>
                            <option value="Pembersihan Ruang MMR1">
                                Pembersihan Ruang MMR1
                            </option>
                            <option value="Pembersihan Ruang UPS">
                                Pembersihan Ruang UPS
                            </option>
                            <option value="Pembersihan Ruang Fire Suppression System">
                                Pembersihan Ruang Fire Suppression System
                            </option>
                            <option value="Pembersihan Ruang Server Wallmount">
                                Pembersihan Ruang Server Wallmount
                            </option>
                            <option value="Pembersihan Platfon Atas, Besi Support, Rack & Raised Floor Ruang Data Center">
                                Pembersihan Platfon Atas, Besi Support, Rack & Raised Floor Ruang Data Center
                            </option>
                            <option value="Under Raised Floor Koridor Lantai 1">
                                Under Raised Floor Koridor Lantai 1
                            </option>
                            <option value="Under Raised Floor Ruang MMR 1">
                                Under Raised Floor Ruang MMR 1
                            </option>
                            <option value="Under Raised Floor Ruang Server Wallmount">
                                Under Raised Floor Ruang Server Wallmount
                            </option>
                            <option value="Under Raised Floor Ruang UPS">
                                Under Raised Floor Ruang UPS
                            </option>
                            <option value="Under Raised Floor Ruang Fire Suppression">
                                Under Raised Floor Ruang Fire Suppression
                            </option>
                            <option value="Under Raised Floor Ruang MMR 2">
                                Under Raised Floor Ruang MMR 2
                            </option>
                            <option value="Pembersihan Under Raised Floor Data Center">
                                Pembersihan Under Raised Floor Data Center
                            </option>
                        </select>

                        <select id="input-group1" style="background: black;" name="cleaning_item_3">
                            <option value="">Item Operation (Barang yang Digunakan)</option>
                            <option value="Vacum-Majun-Kanebo-Kop">
                                Vacum  -  Majun - Kanebo - Kop
                            </option>
                            <option value="Pel-Kanebo-Majun-Sapu-Rack Ball-Dusk Pan-Ember-Tangga">
                                Pel - Kanebo - Majun - Sapu - Rack Ball - Dusk Pan - Ember - Tangga
                            </option>
                            <option value="Vacum-Kanebo-Kain Majun-Kop-Senter-Kabel Roll ">
                                Vacum -  Kanebo - Kain Majun - Kop - Senter - Kabel Roll
                            </option>
                            <option value="Vacum-Pel-Majun-Tangga-Kanebo">
                                Vacum  - Pel - Majun - Tangga - Kanebo
                            </option>
                            <option value="Pel-Kanebo-Majun-Sapu-Stick Ball-Dusk Pan-Ember-Tangga">
                                Pel - Kanebo - Majun - Sapu - Stick Ball - Dusk Pan - Ember - Tangga
                            </option>
                        </select>
                        <select id="input-group1" style="background: black;" name="cleaning_procedure_3">
                            <option value="">Working Procedure (Tata Kerja)</option>
                            <option value="Pembersihan Ruang Genset">
                                Pembersihan Ruang Genset
                            </option>
                            <option value="Pembersihan Ruang Panel">
                                Pembersihan Ruang Panel
                            </option>
                            <option value="Pembersihan Ruang Baterai">
                                Pembersihan Ruang Baterai
                            </option>
                            <option value="Pembersihan Ruang Trafo">
                                Pembersihan Ruang Trafo
                            </option>
                            <option value="Pembersihan Bagian Luar Gardu PLN">
                                Pembersihan Bagian Luar Gardu PLN
                            </option>
                            <option value="Pembersihan Ruang MMR1">
                                Pembersihan Ruang MMR1
                            </option>
                            <option value="Pembersihan Ruang UPS">
                                Pembersihan Ruang UPS
                            </option>
                            <option value="Pembersihan Ruang Fire Suppression System">
                                Pembersihan Ruang Fire Suppression System
                            </option>
                            <option value="Pembersihan Ruang Server Wallmount">
                                Pembersihan Ruang Server Wallmount
                            </option>
                            <option value="Pembersihan Platfon Atas, Besi Support, Rack & Raised Floor Ruang Data Center">
                                Pembersihan Platfon Atas, Besi Support, Rack & Raised Floor Ruang Data Center
                            </option>
                            <option value="Under Raised Floor Koridor Lantai 1">
                                Under Raised Floor Koridor Lantai 1
                            </option>
                            <option value="Under Raised Floor Ruang MMR 1">
                                Under Raised Floor Ruang MMR 1
                            </option>
                            <option value="Under Raised Floor Ruang Server Wallmount">
                                Under Raised Floor Ruang Server Wallmount
                            </option>
                            <option value="Under Raised Floor Ruang UPS">
                                Under Raised Floor Ruang UPS
                            </option>
                            <option value="Under Raised Floor Ruang Fire Suppression">
                                Under Raised Floor Ruang Fire Suppression
                            </option>
                            <option value="Under Raised Floor Ruang MMR 2">
                                Under Raised Floor Ruang MMR 2
                            </option>
                            <option value="Pembersihan Under Raised Floor Data Center">
                                Pembersihan Under Raised Floor Data Center
                            </option>
                        </select>

                        <select id="input-group1" style="background: black;" name="cleaning_item_4">
                            <option value="">Item Operation (Barang yang Digunakan)</option>
                            <option value="Vacum-Majun-Kanebo-Kop">
                                Vacum  -  Majun - Kanebo - Kop
                            </option>
                            <option value="Pel-Kanebo-Majun-Sapu-Rack Ball-Dusk Pan-Ember-Tangga">
                                Pel - Kanebo - Majun - Sapu - Rack Ball - Dusk Pan - Ember - Tangga
                            </option>
                            <option value="Vacum-Kanebo-Kain Majun-Kop-Senter-Kabel Roll ">
                                Vacum -  Kanebo - Kain Majun - Kop - Senter - Kabel Roll
                            </option>
                            <option value="Vacum-Pel-Majun-Tangga-Kanebo">
                                Vacum  - Pel - Majun - Tangga - Kanebo
                            </option>
                            <option value="Pel-Kanebo-Majun-Sapu-Stick Ball-Dusk Pan-Ember-Tangga">
                                Pel - Kanebo - Majun - Sapu - Stick Ball - Dusk Pan - Ember - Tangga
                            </option>
                        </select>
                        <select id="input-group1" style="background: black;" name="cleaning_procedure_4">
                            <option value="">Working Procedure (Tata Kerja)</option>
                            <option value="Pembersihan Ruang Genset">
                                Pembersihan Ruang Genset
                            </option>
                            <option value="Pembersihan Ruang Panel">
                                Pembersihan Ruang Panel
                            </option>
                            <option value="Pembersihan Ruang Baterai">
                                Pembersihan Ruang Baterai
                            </option>
                            <option value="Pembersihan Ruang Trafo">
                                Pembersihan Ruang Trafo
                            </option>
                            <option value="Pembersihan Bagian Luar Gardu PLN">
                                Pembersihan Bagian Luar Gardu PLN
                            </option>
                            <option value="Pembersihan Ruang MMR1">
                                Pembersihan Ruang MMR1
                            </option>
                            <option value="Pembersihan Ruang UPS">
                                Pembersihan Ruang UPS
                            </option>
                            <option value="Pembersihan Ruang Fire Suppression System">
                                Pembersihan Ruang Fire Suppression System
                            </option>
                            <option value="Pembersihan Ruang Server Wallmount">
                                Pembersihan Ruang Server Wallmount
                            </option>
                            <option value="Pembersihan Platfon Atas, Besi Support, Rack & Raised Floor Ruang Data Center">
                                Pembersihan Platfon Atas, Besi Support, Rack & Raised Floor Ruang Data Center
                            </option>
                            <option value="Under Raised Floor Koridor Lantai 1">
                                Under Raised Floor Koridor Lantai 1
                            </option>
                            <option value="Under Raised Floor Ruang MMR 1">
                                Under Raised Floor Ruang MMR 1
                            </option>
                            <option value="Under Raised Floor Ruang Server Wallmount">
                                Under Raised Floor Ruang Server Wallmount
                            </option>
                            <option value="Under Raised Floor Ruang UPS">
                                Under Raised Floor Ruang UPS
                            </option>
                            <option value="Under Raised Floor Ruang Fire Suppression">
                                Under Raised Floor Ruang Fire Suppression
                            </option>
                            <option value="Under Raised Floor Ruang MMR 2">
                                Under Raised Floor Ruang MMR 2
                            </option>
                            <option value="Pembersihan Under Raised Floor Data Center">
                                Pembersihan Under Raised Floor Data Center
                            </option>
                        </select>

                        <select id="input-group1" style="background: black;" name="cleaning_item_5">
                            <option value="">Item Operation (Barang yang Digunakan)</option>
                            <option value="Vacum-Majun-Kanebo-Kop">
                                Vacum  -  Majun - Kanebo - Kop
                            </option>
                            <option value="Pel-Kanebo-Majun-Sapu-Rack Ball-Dusk Pan-Ember-Tangga">
                                Pel - Kanebo - Majun - Sapu - Rack Ball - Dusk Pan - Ember - Tangga
                            </option>
                            <option value="Vacum-Kanebo-Kain Majun-Kop-Senter-Kabel Roll ">
                                Vacum -  Kanebo - Kain Majun - Kop - Senter - Kabel Roll
                            </option>
                            <option value="Vacum-Pel-Majun-Tangga-Kanebo">
                                Vacum  - Pel - Majun - Tangga - Kanebo
                            </option>
                            <option value="Pel-Kanebo-Majun-Sapu-Stick Ball-Dusk Pan-Ember-Tangga">
                                Pel - Kanebo - Majun - Sapu - Stick Ball - Dusk Pan - Ember - Tangga
                            </option>
                        </select>
                        <select id="input-group1" style="background: black;" name="cleaning_procedure_5">
                            <option value="">Working Procedure (Tata Kerja)</option>
                            <option value="Pembersihan Ruang Genset">
                                Pembersihan Ruang Genset
                            </option>
                            <option value="Pembersihan Ruang Panel">
                                Pembersihan Ruang Panel
                            </option>
                            <option value="Pembersihan Ruang Baterai">
                                Pembersihan Ruang Baterai
                            </option>
                            <option value="Pembersihan Ruang Trafo">
                                Pembersihan Ruang Trafo
                            </option>
                            <option value="Pembersihan Bagian Luar Gardu PLN">
                                Pembersihan Bagian Luar Gardu PLN
                            </option>
                            <option value="Pembersihan Ruang MMR1">
                                Pembersihan Ruang MMR1
                            </option>
                            <option value="Pembersihan Ruang UPS">
                                Pembersihan Ruang UPS
                            </option>
                            <option value="Pembersihan Ruang Fire Suppression System">
                                Pembersihan Ruang Fire Suppression System
                            </option>
                            <option value="Pembersihan Ruang Server Wallmount">
                                Pembersihan Ruang Server Wallmount
                            </option>
                            <option value="Pembersihan Platfon Atas, Besi Support, Rack & Raised Floor Ruang Data Center">
                                Pembersihan Platfon Atas, Besi Support, Rack & Raised Floor Ruang Data Center
                            </option>
                            <option value="Under Raised Floor Koridor Lantai 1">
                                Under Raised Floor Koridor Lantai 1
                            </option>
                            <option value="Under Raised Floor Ruang MMR 1">
                                Under Raised Floor Ruang MMR 1
                            </option>
                            <option value="Under Raised Floor Ruang Server Wallmount">
                                Under Raised Floor Ruang Server Wallmount
                            </option>
                            <option value="Under Raised Floor Ruang UPS">
                                Under Raised Floor Ruang UPS
                            </option>
                            <option value="Under Raised Floor Ruang Fire Suppression">
                                Under Raised Floor Ruang Fire Suppression
                            </option>
                            <option value="Under Raised Floor Ruang MMR 2">
                                Under Raised Floor Ruang MMR 2
                            </option>
                            <option value="Pembersihan Under Raised Floor Data Center">
                                Pembersihan Under Raised Floor Data Center
                            </option>
                        </select>

                        <select id="input-group1" style="background: black;" name="cleaning_item_6">
                            <option value="">Item Operation (Barang yang Digunakan)</option>
                            <option value="Vacum-Majun-Kanebo-Kop">
                                Vacum  -  Majun - Kanebo - Kop
                            </option>
                            <option value="Pel-Kanebo-Majun-Sapu-Rack Ball-Dusk Pan-Ember-Tangga">
                                Pel - Kanebo - Majun - Sapu - Rack Ball - Dusk Pan - Ember - Tangga
                            </option>
                            <option value="Vacum-Kanebo-Kain Majun-Kop-Senter-Kabel Roll ">
                                Vacum -  Kanebo - Kain Majun - Kop - Senter - Kabel Roll
                            </option>
                            <option value="Vacum-Pel-Majun-Tangga-Kanebo">
                                Vacum  - Pel - Majun - Tangga - Kanebo
                            </option>
                            <option value="Pel-Kanebo-Majun-Sapu-Stick Ball-Dusk Pan-Ember-Tangga">
                                Pel - Kanebo - Majun - Sapu - Stick Ball - Dusk Pan - Ember - Tangga
                            </option>
                        </select>
                        <select id="input-group1" style="background: black;" name="cleaning_procedure_6">
                            <option value="">Working Procedure (Tata Kerja)</option>
                            <option value="Pembersihan Ruang Genset">
                                Pembersihan Ruang Genset
                            </option>
                            <option value="Pembersihan Ruang Panel">
                                Pembersihan Ruang Panel
                            </option>
                            <option value="Pembersihan Ruang Baterai">
                                Pembersihan Ruang Baterai
                            </option>
                            <option value="Pembersihan Ruang Trafo">
                                Pembersihan Ruang Trafo
                            </option>
                            <option value="Pembersihan Bagian Luar Gardu PLN">
                                Pembersihan Bagian Luar Gardu PLN
                            </option>
                            <option value="Pembersihan Ruang MMR1">
                                Pembersihan Ruang MMR1
                            </option>
                            <option value="Pembersihan Ruang UPS">
                                Pembersihan Ruang UPS
                            </option>
                            <option value="Pembersihan Ruang Fire Suppression System">
                                Pembersihan Ruang Fire Suppression System
                            </option>
                            <option value="Pembersihan Ruang Server Wallmount">
                                Pembersihan Ruang Server Wallmount
                            </option>
                            <option value="Pembersihan Platfon Atas, Besi Support, Rack & Raised Floor Ruang Data Center">
                                Pembersihan Platfon Atas, Besi Support, Rack & Raised Floor Ruang Data Center
                            </option>
                            <option value="Under Raised Floor Koridor Lantai 1">
                                Under Raised Floor Koridor Lantai 1
                            </option>
                            <option value="Under Raised Floor Ruang MMR 1">
                                Under Raised Floor Ruang MMR 1
                            </option>
                            <option value="Under Raised Floor Ruang Server Wallmount">
                                Under Raised Floor Ruang Server Wallmount
                            </option>
                            <option value="Under Raised Floor Ruang UPS">
                                Under Raised Floor Ruang UPS
                            </option>
                            <option value="Under Raised Floor Ruang Fire Suppression">
                                Under Raised Floor Ruang Fire Suppression
                            </option>
                            <option value="Under Raised Floor Ruang MMR 2">
                                Under Raised Floor Ruang MMR 2
                            </option>
                            <option value="Pembersihan Under Raised Floor Data Center">
                                Pembersihan Under Raised Floor Data Center
                            </option>
                        </select>

                    <h4 class="text-white">6. Testing and Verification</h4>
                    <input type="text" id="input-group" placeholder="Fill in here (isi disini)" name="cleaning_testing">

                    <h4 class="text-white">7. Rollback Plan</h4>
                    <input type="text" id="input-group" placeholder="Fill in here (isi disini)" name="cleaning_rollback">

                    <h4 class="text-white">8. Person in charge</h4>
                        <select id="input-group11" style="background: black;" name="cleaning_name_1">
                            <option value="">Name</option>
                            <option value="Alfani Sulaeman">Alfani Sulaeman</option>
                            <option value="Andi Sugandi">Andi Sugandi</option>
                            <option value="Jejen Jenudin">Jejen Jenudin</option>
                            <option value="Riko Adi Pratama">Riko Adi Pratama</option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_pt_1">
                            <option value="">Company</option>
                            <option value="PT Bijac">PT Bijac</option>
                            <option value="PT Enlulu">PT Enlulu</option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_respon_1">
                            <option value="">Responsibility</option>
                            <option value="Cleaner">Cleaner</option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_number_1">
                            <option value="">Mobile Number</option>
                            <option value="0895-3339-40730">0895-3339-40730</option>
                            <option value="0815-6461-7472">0815-6461-7472</option>
                            <option value="0896-3051-3484">0896-3051-3484</option>
                            <option value="0853-6864-8317">0853-6864-8317</option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_id_1">
                            <option value="">ID Number</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_name_2">
                            <option value="">Name</option>
                            <option value="Alfani Sulaeman">Alfani Sulaeman</option>
                            <option value="Andi Sugandi">Andi Sugandi</option>
                            <option value="Jejen Jenudin">Jejen Jenudin</option>
                            <option value="Riko Adi Pratama">Riko Adi Pratama</option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_pt_2">
                            <option value="">Company</option>
                            <option value="PT Bijac">PT Bijac</option>
                            <option value="PT Enlulu">PT Enlulu</option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_respon_2">
                            <option value="">Responsibility</option>
                            <option value="Cleaner">Cleaner</option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_number_2">
                            <option value="">Mobile Number</option>
                            <option value="0895-3339-40730">0895-3339-40730</option>
                            <option value="0815-6461-7472">0815-6461-7472</option>
                            <option value="0896-3051-3484">0896-3051-3484</option>
                            <option value="0853-6864-8317">0853-6864-8317</option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_id_2">
                            <option value="">ID Number</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_name_3">
                            <option value="">Name</option>
                            <option value="Alfani Sulaeman">Alfani Sulaeman</option>
                            <option value="Andi Sugandi">Andi Sugandi</option>
                            <option value="Jejen Jenudin">Jejen Jenudin</option>
                            <option value="Riko Adi Pratama">Riko Adi Pratama</option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_pt_3">
                            <option value="">Company</option>
                            <option value="PT Bijac">PT Bijac</option>
                            <option value="PT Enlulu">PT Enlulu</option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_respon_3">
                            <option value="">Responsibility</option>
                            <option value="Cleaner">Cleaner</option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_number_3">
                            <option value="">Mobile Number</option>
                            <option value="0895-3339-40730">0895-3339-40730</option>
                            <option value="0815-6461-7472">0815-6461-7472</option>
                            <option value="0896-3051-3484">0896-3051-3484</option>
                            <option value="0853-6864-8317">0853-6864-8317</option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_id_3">
                            <option value="">ID Number</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_name_4">
                            <option value="">Name</option>
                            <option value="Alfani Sulaeman">Alfani Sulaeman</option>
                            <option value="Andi Sugandi">Andi Sugandi</option>
                            <option value="Jejen Jenudin">Jejen Jenudin</option>
                            <option value="Riko Adi Pratama">Riko Adi Pratama</option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_pt_4">
                            <option value="">Company</option>
                            <option value="PT Bijac">PT Bijac</option>
                            <option value="PT Enlulu">PT Enlulu</option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_respon_4">
                            <option value="">Responsibility</option>
                            <option value="Cleaner">Cleaner</option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_number_4">
                            <option value="">Mobile Number</option>
                            <option value="0895-3339-40730">0895-3339-40730</option>
                            <option value="0815-6461-7472">0815-6461-7472</option>
                            <option value="0896-3051-3484">0896-3051-3484</option>
                            <option value="0853-6864-8317">0853-6864-8317</option>
                        </select>
                        <select id="input-group11" style="background: black;" name="cleaning_id_4">
                            <option value="">ID Number</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>

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
