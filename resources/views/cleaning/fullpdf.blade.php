<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cleaning PDF</title>
    <style>
        @page {
            margin: 0.5cm 0.5cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 0.3cm;
            margin-left: 0.5cm;
            margin-right: 0.5cm;
            margin-bottom: 0.3cm;
        }

        .table-bordered,
        .col_header {
            border-spacing: 0.5px;
            border: 1px solid black;
            width: 100%;
            font-size: 9pt;
            margin: 1px;
            padding: 1px;
        }

        .table-bordered,
        .col_footer {
            border-spacing: 0.5px;
            border: 1px solid black;
            width: 100%;
            font-size: 8pt;
            text-align: center;
            margin: 1px;
            padding: 1px;
            margin-bottom: 0.1cm;
            margin-top: 10px;
        }

        .table-hover {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 10pt;
            width: 100%;
            margin-top: 10px;
        }

        .table-visitor {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 10pt;
            width: 100%;
            margin-top: 10px;
        }

        .table-detail {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 8pt;
            width: 100%;
            margin-top: 10px;
        }

        .table-borderless {
            font-size: 10pt;
            width: 100%;
            margin-top: 10px;
        }

        .table-approval {
            border: 1px solid black;
            border-collapse:collapse;
            width: 100%;
            font-size: 10pt;
            margin-top: 10px;
        }

        .table-full {
            border: 1px solid black;
            border-collapse:collapse;
            width: 100%;
            font-size: 8pt;
            margin-top: 10px;
        }

        .table-background {
            border-spacing: 0.5px;
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
            font-size: 8pt;
            margin-top: 10px;
        }

        .table-grey {
            text-align: center;
            background-color: grey;
            border: 1px solid black;
        }

        .table-white {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .table-center {
            text-align: center;
            border: 1px solid black;
            border-collapse: collapse;
        }

        .col_approval {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }

        .col-gambar {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .text_header {
            text-align: center;
            font-size: 10pt;
        }

        .text_footer {
            text-align: center;
            font-size: 8pt;
        }

        .img-fluid {
            height: 40px;
            width: 110px;
        }

        p {
            text-align: center;
            font-size: 10pt;
        }

        .cr {
            text-align: left;
            font-size: 8pt;
        }


        .page_break+.page_break {
            page-break-before: always;
        }
    </style>

</head>
<body>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <div style="page-break-after: always;">
            <table class="table table-bordered">
                <tr >
                    <td class="col_header" rowspan="2" ><img src="{{ public_path("gambar/bts_logo.jpg") }}" class="img-fluid" alt="logo_bts"></td>
                    <td class="col_header"><font size="10pt"><b>FORM</b></font></td>
                    <td class="col_header"><b>Kode Dokumen : FRM-BTS-DCDV-2021-04</b></td>
                </tr>
                <tr>
                    <td class="col_header"><font size="10pt"><b>Access Request</b></font></td>
                    <td class="col_header"><b>Tanggal Berlaku : 18 Mei 2021</b></td>
                </tr>
            </table>

            <table cellpadding="3" class="table table-hover">
                <tr >
                    <td width="150px">Date of Request</td>
                    <td >: {{Carbon\Carbon::parse($getCleaning->created_at)->format('d-m-Y H:i')}}</td>
                </tr>
                <tr >
                    <td width="150px">Change Request Number: </td>
                    <td >: {{$getCleaning->cleaning_id}}</td>
                </tr>
                <tr >
                    <td width="150px">Purpose of Work</td>
                    <td >: {{$getCleaning->cleaning_work}}</td>
                </tr>
            </table>

            <table cellpadding="3" class="table table-hover">
                <tr >
                    <td class="table-grey" colspan="2"><b>Bali Tower Requestor</b></td>
                </tr>
                <tr >
                    <td width="150px">Name</td>
                    <td >: Badai Sino Jendrang</td>
                </tr>
                <tr >
                    <td width="150px">Department</td>
                    <td >: Building Management</td>
                </tr>
                <tr >
                    <td width="150px">Phone Number</td>
                    <td >: 0822-1028-2228</td>
                </tr>
            </table>

            <table cellpadding="5" class="table table-visitor">
                <tr >
                    <td class="table-grey" colspan="5"><b>Visitor</b></td>
                </tr>
                <tr class="table-grey">
                    <td class="table-grey"><b>Name</b></td>
                    <td class="table-grey"><b>ID Number</b></td>
                    <td class="table-grey"><b>Phone Number</b></td>
                    <td class="table-grey"><b>Company</b></td>
                    <td class="table-grey"><b>Department</b></td>
                </tr>
                <tr >
                    <td class="table-white">1. {{$getCleaning->cleaning_name}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_nik}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_number}}</td>
                    <td class="table-center">PT TSL</td>
                    <td class="table-center">Building Management</td>
                </tr>
                <tr >
                    <td class="table-white">2. {{$getCleaning->cleaning_name2}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_nik_2}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_number2}}</td>
                    <td class="table-center">PT TSL</td>
                    <td class="table-center">Building Management</td>
                </tr>
                <tr >
                    <td class="table-white">3. {{$getCleaning->cleaning_name_3}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_id_3}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_number_3}}</td>
                    <td class="table-center"></td>
                    <td class="table-center"></td>
                </tr>
                <tr >
                    <td class="table-white">4. {{$getCleaning->cleaning_name_4}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_id_4}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_number_4}}</td>
                    <td class="table-center"></td>
                    <td class="table-center"></td>
                </tr>
                <tr >
                    <td class="table-white">5. </td>
                    <td class="table-center"></td>
                    <td class="table-center"></td>
                    <td class="table-center"></td>
                    <td class="table-center"></td>
                </tr>
            </table>

            {{-- Entry Area --}}
            <table cellpadding="5" class="table table-borderless">
                <tr>
                    <td class="table-grey" colspan="2"><b>Authorized Entry Area</b></td>
                    <td class="table-grey" colspan="2"><b>Access Type</b></td>
                </tr>
                <tr>
                    <td>
                        @if(($getCleaning->loc1 == 'Server Room') || ($getCleaning->loc2 == 'Server Room') || ($getCleaning->loc3 == 'Server Room') || ($getCleaning->loc4 == 'Server Room') || ($getCleaning->loc5 == 'Server Room') || ($getCleaning->loc6 == 'Server Room'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Server Room
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   Server Room
                        @endif
                    </td>
                    <td >
                        @if(($getCleaning->loc1 === 'Generator Room') || ($getCleaning->loc2 === 'Generator Room') || ($getCleaning->loc3 === 'Generator Room') || ($getCleaning->loc4 === 'Generator Room') || ($getCleaning->loc5 == 'Generator Room') || ($getCleaning->loc6 == 'Generator Room'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Generator Room
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   Generator Room
                        @endif
                    </td>
                    <td><img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;"></td>
                    <td>General Access</td>
                </tr>
                <tr>
                    <td >
                        @if(($getCleaning->loc1 == 'MMR 1') || ($getCleaning->loc2 == 'MMR 1') || ($getCleaning->loc3 == 'MMR 1') || ($getCleaning->loc4 == 'MMR 1') || ($getCleaning->loc5 == 'MMR 1') || ($getCleaning->loc6 == 'MMR 1'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   MMR 1
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   MMR 1
                        @endif
                    </td>
                    <td >
                        @if(($getCleaning->loc1 == 'Panel Room') || ($getCleaning->loc2 == 'Panel Room') || ($getCleaning->loc3 == 'Panel Room') || ($getCleaning->loc4 == 'Panel Room') || ($getCleaning->loc5 == 'Panel Room') || ($getCleaning->loc6 == 'Panel Room'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Panel Room
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   Panel Room
                        @endif
                    </td>
                    <td><img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;"></td>
                    <td>Limited Access</td>
                </tr>
                <tr>
                    <td >
                        @if(($getCleaning->loc1 == 'MMR 2') || ($getCleaning->loc2 == 'MMR 2') || ($getCleaning->loc3 == 'MMR 2') || ($getCleaning->loc4 == 'MMR 2') || ($getCleaning->loc5 == 'MMR 2') || ($getCleaning->loc6 == 'MMR 2'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   MMR 2
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   MMR 2
                        @endif
                    </td>
                    <td >
                        @if(($getCleaning->loc1 == 'Baterai Room') || ($getCleaning->loc2 == 'Baterai Room') || ($getCleaning->loc3 == 'Baterai Room') || ($getCleaning->loc4 == 'Baterai Room') || ($getCleaning->loc5 == 'Baterai Room') || ($getCleaning->loc6 == 'Baterai Room'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Battery Room
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   Battery Room
                        @endif
                    </td>
                    <td><img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;"></td>
                    <td>Escorted Access</td>
                </tr>
                <tr>
                    <td >
                        @if(($getCleaning->loc1 == 'UPS Room') || ($getCleaning->loc2 == 'UPS Room') || ($getCleaning->loc3 == 'UPS Room') || ($getCleaning->loc4 == 'UPS Room') || ($getCleaning->loc5 == 'UPS Room') || ($getCleaning->loc6 == 'UPS Room'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   UPS Room
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   UPS Room
                        @endif
                    </td>
                    <td >
                        @if(($getCleaning->loc1 == 'FSS') || ($getCleaning->loc2 == 'FSS') || ($getCleaning->loc3 == 'FSS') || ($getCleaning->loc4 == 'FSS') || ($getCleaning->loc5 == 'FSS') || ($getCleaning->loc6 == 'FSS'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   FSS Room
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   FSS Room
                        @endif
                    </td>
                    <td colspan="2">  </td>
                </tr>
                <tr>
                    <td ><img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   Office 2nd FL</td>
                    <td ><img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   Office 3rd FL</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td >
                        @if(($getCleaning->loc1 == 'Trafo Room') || ($getCleaning->loc2 == 'Trafo Room') || ($getCleaning->loc3 == 'Trafo Room') || ($getCleaning->loc4 == 'Trafo Room') || ($getCleaning->loc5 == 'Trafo Room') || ($getCleaning->loc6 == 'Trafo Room'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Trafo Room
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   Trafo Room
                        @endif
                    </td>
                    <td ><img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   Yard</td>
                    <td class="table-grey" colspan="2"><b>Validity</b></td>
                </tr>
                <tr>
                    <td >
                        @if($getCleaning->loc4 == 'CCTV Room')
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Others : CCTV Room
                        @elseif(($getCleaning->loc1 == 'Pintu Luar PLN') || ($getCleaning->loc2 == 'Pintu Luar PLN') || ($getCleaning->loc3 == 'Pintu Luar PLN') || ($getCleaning->loc4 == 'Pintu Luar PLN') || ($getCleaning->loc5 == 'Pintu Luar PLN') || ($getCleaning->loc6 == 'Pintu Luar PLN'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Others : Pintu Luar PLN
                        @elseif(($getCleaning->loc1 == 'Koridor Lt. 1') || ($getCleaning->loc2 == 'Koridor Lt. 1') || ($getCleaning->loc3 == 'Koridor Lt. 1') || ($getCleaning->loc4 == 'Koridor Lt. 1') || ($getCleaning->loc5 == 'Koridor Lt. 1') || ($getCleaning->loc6 == 'Koridor Lt. 1'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Others : Koridor Lt. 1
                        @elseif(($getCleaning->loc5 == 'Koridor') && ($getCleaning->loc6 == 'CCTV Room'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Others : Koridor Lt. 1 & CCTV Room
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   Others :
                        @endif
                    </td>
                    <td ><img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   Parking Lot</td>

                    <td class="table-white">{{Carbon\Carbon::parse($getCleaning->validity_from)->format('d-m-Y')}}</td>
                    <td class="table-white">{{Carbon\Carbon::parse($getCleaning->validity_to)->format('d-m-Y')}}</td>
                </tr>
            </table>

            <table cellpadding="5" class="table-approval">
                <tr >
                    <th class="col_approval">**Prepared by</th>
                    <th class="col_approval">**Approved by</th>
                    <th>     </th>
                </tr>
                <tr >
                    @switch($getLastLog->status)
                        @case('requested')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    : Badai Sino Jendrang</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($getCleaning->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    :</p>
                                <p class="cr">Tanggal :</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    :</p>
                                <p class="cr">Tanggal :</p>
                            </td>
                            @break

                        @case('reviewed')
                        <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 40px;">
                            <p class="cr">Nama    : Badai Sino Jendrang</p>
                            <p class="cr">Tanggal : {{Carbon\Carbon::parse($getCleaning->created_at)->format('d-m-Y H:i')}}</p>
                        </td>
                        <td class="col_approval">
                            <p class="cr">Nama    :</p>
                            <p class="cr">Tanggal :</p>
                        </td>
                        <td class="col_approval">
                            <p class="cr">Nama    :</p>
                            <p class="cr">Tanggal :</p>
                        </td>
                        @break

                        @case('checked')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    : Badai Sino Jendrang</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($getCleaning->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    :</p>
                                <p class="cr">Tanggal :</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    :</p>
                                <p class="cr">Tanggal :</p>
                            </td>
                        @break

                        @case('acknowledge')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    : Badai Sino Jendrang</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($getCleaning->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    :</p>
                                <p class="cr">Tanggal :</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{$getLog[3]->name}}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($getLog[3]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            @break

                        @case('final')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    : Badai Sino Jendrang</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($getCleaning->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{$getLog[4]->name}}</p>
                                <p class="cr">Tanggal :{{ Carbon\Carbon::parse($getLog[4]->created_at)->format('d-m-Y H:i') }}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{$getLog[3]->name}}</p>
                                <p class="cr">Tanggal :{{ Carbon\Carbon::parse($getLog[3]->created_at)->format('d-m-Y H:i') }}</p>
                            </td>
                            @break
                    @endswitch
                </tr>

                <tr>
                    <td class="col_approval"><b>Requestor</b></td>
                    <td class="col_approval"><b>Head of Data Center Operation</b></td>
                    <td class="col_approval"><b>Security</b></td>
                </tr>
            </table>

            <p >** On public holiday signatory will be handled by appointed Data Center Operation Shift Engineer on duty</p>
            <p>(Pada hari libur Nasional tanda tangan akan diwakilkan kepetugas operasional yang ditunjuk)</p>

            <table class="table table-bordered">
                <tr>
                    <td class="col_footer">Kode Dok: FRM-BTS-DCDV-2021-04</td>
                    <td class="col_footer">Revisi : 01</td>
                    <td class="col_footer"><font color="red">Kategori : Dokumen Terbatas</font></td>
                    <td class="col_footer">Hal : 1/1</td>
                </tr>
            </table>

        </div>
        <div style="page-break-after:always;">
            <table class="table table-bordered">
                <tr >
                    <td class="col_header" rowspan="2" ><img src="{{ public_path("gambar/bts_logo.jpg") }}" class="img-fluid" alt="logo_bts"></td>
                    <td class="col_header"><font size="10pt"><b>FORM</b></font></td>
                    <td class="col_header"><b>Kode Dokumen : FRM-BTS-DCDV-2021-03</b></td>
                </tr>
                <tr>
                    <td class="col_header"><font size="10pt"><b>Change Request</b></font></td>
                    <td class="col_header"><b>Tanggal Berlaku : 18 Mei 2021</b></td>
                </tr>
            </table>

            <p class="cr">Change Request Number : </p>

            <table cellpadding="2" class="table table-background">
                <tr >
                    <td width="50%" class="table-grey"><b>Background and Objectives</b></td>
                    <td width="50%" class="table-grey"><b>Description of Scope of Work</b></td>
                </tr>
                <tr >
                    <td class="table-center">{{$getCleaning->cleaning_background}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_describ}}</td>
                </tr>
            </table>

            <table cellpadding="2" class="table table-detail">
                <tr >
                    <td class="table-grey" colspan="5"><b>Detail Time Table of All Activity</b></td>
                </tr>
                <tr class="table-grey">
                    <td class="table-grey"><b>Day</b></td>
                    <td class="table-grey"><b>Time Start</b></td>
                    <td class="table-grey"><b>Time End</b></td>
                    <td class="table-grey"><b>Activity Description</b></td>
                    <td class="table-grey"><b>Detail Service Impact</b></td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{Carbon\Carbon::parse($getCleaning->validity_from)->format('d-m-Y')}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_start}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_end}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->activity}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->detail_service}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{Carbon\Carbon::parse($getCleaning->validity_from)->format('d-m-Y')}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_start2}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_end2}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->activity2}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->detail_service2}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{Carbon\Carbon::parse($getCleaning->validity_from)->format('d-m-Y')}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_start3}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_end3}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->activity3}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->detail_service3}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{Carbon\Carbon::parse($getCleaning->validity_from)->format('d-m-Y')}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_start4}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_end4}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->activity4}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->detail_service4}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{Carbon\Carbon::parse($getCleaning->validity_from)->format('d-m-Y')}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_start5}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_end5}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->activity5}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->detail_service5}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{Carbon\Carbon::parse($getCleaning->validity_from)->format('d-m-Y')}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_start6}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_end6}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->activity6}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->detail_service6}}</td>
                </tr>
            </table>

            <table cellpadding="2" class="table table-detail">
                <tr >
                    <td class="table-grey" colspan="4"><b>Detail Operation and Execution</b></td>
                </tr>
                <tr class="table-grey">
                    <td class="table-grey"><b>Time Start</b></td>
                    <td class="table-grey"><b>Time End</b></td>
                    <td class="table-grey"><b>Item</b></td>
                    <td class="table-grey"><b>Working Procedure</b></td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_start}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_end}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->item}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_procedure}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_start2}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_end2}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->item2}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_procedure2}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_start3}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_end3}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->item3}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_procedure3}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_start4}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_end4}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->item4}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_procedure4}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_start5}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_end5}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->item5}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_procedure5}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_start6}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_time_end6}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->item6}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_procedure6}}</td>
                </tr>
            </table>

            <table cellpadding="2" class="table table-detail">
                <tr >
                    <td class="table-grey" colspan="5"><b>Risk and Service Area Impact</b></td>
                </tr>
                <tr class="table-grey">
                    <td class="table-grey"><b>No.</b></td>
                    <td class="table-grey"><b>Risk Description</b></td>
                    <td class="table-grey"><b>Possibillity</b></td>
                    <td class="table-grey"><b>Impact</b></td>
                    <td class="table-grey"><b>Mitigation Plan</b></td>
                </tr>
                <tr >
                    <td class="table-white">1.</td>
                    <td class="table-center">{{$getCleaning->cleaning_risk}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_possibility}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_impact}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_mitigation}}</td>
                </tr>
                <tr >
                    <td class="table-white">2.</td>
                    <td class="table-center">{{$getCleaning->cleaning_risk2}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_possibility2}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_impact2}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_mitigation2}}</td>
                </tr>
                <tr >
                    <td class="table-white">3.</td>
                    <td class="table-center">{{$getCleaning->cleaning_risk3}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_possibility3}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_impact3}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_mitigation3}}</td>
                </tr>
                <tr >
                    <td class="table-white">4.</td>
                    <td class="table-center">{{$getCleaning->cleaning_risk4}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_possibility4}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_impact4}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_mitigation4}}</td>
                </tr>
                <tr >
                    <td class="table-white">5.</td>
                    <td class="table-center">{{$getCleaning->cleaning_risk5}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_possibility5}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_impact5}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_mitigation5}}</td>
                </tr>
                <tr >
                    <td class="table-white">6.</td>
                    <td class="table-center">{{$getCleaning->cleaning_risk6}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_possibility6}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_impact6}}</td>
                    <td class="table-center">{{$getCleaning->cleaning_mitigation6}}</td>
                </tr>
            </table>

            <table cellpadding="2" class="table table-background">
                <tr >
                    <td  width="50%" class="table-grey"><b>Testing and Verification</b></td>
                    <td width="50%" class="table-grey"><b>Rollback Operation</b></td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_testing}}</td>
                    <td height="10px" class="table-center">{{$getCleaning->cleaning_rollback}}</td>
                </tr>
            </table>

            <table cellpadding="2" class="table table-detail">
                <tr >
                    <td class="table-grey" colspan="5"><b>Person in Charge</b></td>
                </tr>
                <tr class="table-grey">
                    <td class="table-grey"><b>No.</b></td>
                    <td class="table-grey"><b>Name</b></td>
                    <td class="table-grey"><b>Company</b></td>
                    <td class="table-grey"><b>Responsibility</b></td>
                    <td class="table-grey"><b>Mobile Phone</b></td>
                </tr>
                <tr >
                    <td class="table-white">1.</td>
                    <td class="table-center">{{$getCleaning->cleaning_name}}</td>
                    <td class="table-center">PT TSL</td>
                    <td class="table-center">Cleaner</td>
                    <td class="table-center">{{$getCleaning->cleaning_number}}</td>
                </tr>
                <tr >
                    <td class="table-white">2. </td>
                    <td class="table-center">{{$getCleaning->cleaning_name2}}</td>
                    <td class="table-center">PT TSL</td>
                    <td class="table-center">Cleaner</td>
                    <td class="table-center">{{$getCleaning->cleaning_number2}}</td>
                </tr>
                <tr >
                    <td class="table-white">3. </td>
                    <td class="table-center">{{$getCleaning->cleaning_name_3}}</td>
                    <td class="table-center"></td>
                    <td class="table-center"></td>
                    <td class="table-center">{{$getCleaning->cleaning_number_3}}</td>
                </tr>
            </table>

            <table cellpadding="2" class="table table-background">
                <tr >
                    <td height="10px" class="table-grey"><b>Supporting Documents</b></td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">  </td>
                </tr>
            </table>

            <table cellpadding="2" class="table-full">
                <tr >
                    <th class="col_approval">Prepared by,</th>
                    <th class="col_approval">Reviewed by,</th>
                    <th class="col_approval">Checked by,</th>
                    <th class="col_approval">Approved by,</th>
                </tr>
                <tr >
                    @switch($getLastLog->status)
                        @case('requested')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    : Badai Sino Jendrang</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($getCleaning->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    :</p>
                                <p class="cr">Tanggal :</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    :</p>
                                <p class="cr">Tanggal :</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    :</p>
                                <p class="cr">Tanggal :</p>
                            </td>
                            @break

                        @case('reviewed')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama: Badai Sino Jendrang</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($getCleaning->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    :{{$getLog[1]->name}}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($getLog[1]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    : </p>
                                <p class="cr">Tanggal :</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    : </p>
                                <p class="cr">Tanggal :</p>
                            </td>
                            @break

                        @case('checked')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    : Badai Sino Jendrang</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($getCleaning->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    :{{$getLog[1]->name}}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($getLog[1]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    :{{$getLog[2]->name}}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($getLog[2]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    : </p>
                                <p class="cr">Tanggal :</p>
                            </td>
                            @break

                        @case('acknowledge')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    : Badai Sino Jendrang</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($getCleaning->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    :{{$getLog[1]->name}}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($getLog[1]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    :{{$getLog[2]->name}}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($getLog[2]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    : </p>
                                <p class="cr">Tanggal :</p>
                            </td>
                            @break

                        @case('final')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    : Badai Sino Jendrang</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($getCleaning->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    :{{$getLog[1]->name}}</p>
                                <p class="cr">Tanggal :{{ Carbon\Carbon::parse($getLog[1]->created_at)->format('d-m-Y H:i') }}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    :{{$getLog[2]->name}}</p>
                                <p class="cr">Tanggal :{{ Carbon\Carbon::parse($getLog[2]->created_at)->format('d-m-Y H:i') }}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    :{{$getLog[4]->name}}</p>
                                <p class="cr">Tanggal :{{ Carbon\Carbon::parse($getLog[4]->created_at)->format('d-m-Y H:i') }}</p>
                            </td>
                            @break
                    @endswitch
                </tr>

                <tr>
                    <td class="col_approval">Requestor</td>
                    <td class="col_approval">Data Center Operation</td>
                    <td class="col_approval">Data Center Operation</td>
                    <td class="col_approval">Head of Data Center Operation</td>
                </tr>
            </table>

            <table class="table table-bordered">
                <tr>
                    <td class="col_footer">Kode Dok: FRM-BTS-DCDV-2021-03</td>
                    <td class="col_footer">Revisi : 01</td>
                    <td class="col_footer"><font color="red">Kategori : Dokumen Terbatas</font></td>
                    <td class="col_footer">Hal : 1/1</td>
                </tr>
            </table>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Visitor</th>
                    <th>Waktu Checkin</th>
                    <th>Waktu Checkout</th>
                    <th>Foto Checkin</th>
                    <th>Foto Checkout</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$getCleaning->cleaning_name}}</td>
                    <td>{{$getFull->checkin_personil}}</td>
                    <td>{{$getFull->checkout_personil}}</td>
                    <td><img src="{{ public_path("/storage/".$getFull->photo_checkin_personil)}}" style="width: 80px; height: 60px"></td>
                    <td><img src="{{ public_path("/storage/".$getFull->photo_checkout_personil)}}" style="width: 80px; height: 60px"></td>
                </tr>
                <tr>
                    <td>{{$getCleaning->cleaning_name2}}</td>
                    <td>{{$getFull->checkin_personil2}}</td>
                    <td>{{$getFull->checkout_personil2}}</td>
                    <td><img src="{{ public_path("/storage/".$getFull->photo_checkin_personil2)}}" style="width: 80px; height: 60px"></td>
                    <td><img src="{{ public_path("/storage/".$getFull->photo_checkout_personil2)}}" style="width: 80px; height: 60px"></td>
                </tr>
            </tbody>
        </table>
    </main>
</body>
</html>
