<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <title>Other PDF</title>
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css2/pdf.css') }}"> --}}
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

        /** Define the header rules **/
        /* header {
            position: fixed;
            top: 0cm;
            left: 0.5cm;
            right: 0.5cm;
            height: 3cm;
            text-align: center;
        } */

        /** Define the footer rules **/
        /* footer {
            position: fixed;
            bottom: 0.1cm;
            height: 1cm;
            left: 0.5cm;
            right: 0.5cm;
            text-align: center;
        } */

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
            /* border: 1px solid black; */
            /* border-collapse: collapse; */
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
                    <td >: {{Carbon\Carbon::parse($other->created_at)->format('d-m-Y H:i')}}</td>
                </tr>
                <tr >
                    <td width="150px">Change Request Number: </td>
                    <td >: {{$other->other_id}}</td>
                </tr>
                <tr >
                    <td width="150px">Purpose of Work</td>
                    <td >: {{$other->other_work}}</td>
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
                    <td class="table-white">1. {{$other->pic1}}</td>
                    <td class="table-center">{{$other->id_1}}</td>
                    <td class="table-center">{{$other->phone_1}}</td>
                    <td class="table-center">{{$other->company_1}}</td>
                    <td class="table-center">{{$other->department_1}}</td>
                </tr>
                <tr >
                    <td class="table-white">2. {{$other->pic2}}</td>
                    <td class="table-center">{{$other->id_2}}</td>
                    <td class="table-center">{{$other->phone_2}}</td>
                    <td class="table-center">{{$other->company_2}}</td>
                    <td class="table-center">{{$other->department_2}}</td>
                </tr>
                <tr >
                    <td class="table-white">3. {{$other->pic3}}</td>
                    <td class="table-center">{{$other->id_3}}</td>
                    <td class="table-center">{{$other->phone_3}}</td>
                    <td class="table-center">{{$other->company_3}}</td>
                    <td class="table-center">{{$other->department_3}}</td>
                </tr>
                <tr >
                    <td class="table-white">4. {{$other->pic4}}</td>
                    <td class="table-center">{{$other->id_4}}</td>
                    <td class="table-center">{{$other->phone_4}}</td>
                    <td class="table-center">{{$other->company_4}}</td>
                    <td class="table-center">{{$other->department_4}}</td>
                </tr>
                <tr >
                    <td class="table-white">5. {{$other->pic5}}</td>
                    <td class="table-center">{{$other->id_5}}</td>
                    <td class="table-center">{{$other->phone_5}}</td>
                    <td class="table-center">{{$other->company_5}}</td>
                    <td class="table-center">{{$other->department_5}}</td>
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
                        @if(($other->loc1 == 'Server Room') || ($other->loc2 == 'Server Room') || ($other->loc3 == 'Server Room') || ($other->loc4 == 'Server Room') || ($other->loc5 == 'Server Room') || ($other->loc6 == 'Server Room'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Server Room
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   Server Room
                        @endif
                    </td>
                    <td >
                        @if(($other->loc1 === 'Generator Room') || ($other->loc2 === 'Generator Room') || ($other->loc3 === 'Generator Room') || ($other->loc4 === 'Generator Room') || ($other->loc5 == 'Generator Room') || ($other->loc6 == 'Generator Room'))
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
                        @if(($other->loc1 == 'MMR 1') || ($other->loc2 == 'MMR 1') || ($other->loc3 == 'MMR 1') || ($other->loc4 == 'MMR 1') || ($other->loc5 == 'MMR 1') || ($other->loc6 == 'MMR 1'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   MMR 1
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   MMR 1
                        @endif
                    </td>
                    <td >
                        @if(($other->loc1 == 'Panel Room') || ($other->loc2 == 'Panel Room') || ($other->loc3 == 'Panel Room') || ($other->loc4 == 'Panel Room') || ($other->loc5 == 'Panel Room') || ($other->loc6 == 'Panel Room'))
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
                        @if(($other->loc1 == 'MMR 2') || ($other->loc2 == 'MMR 2') || ($other->loc3 == 'MMR 2') || ($other->loc4 == 'MMR 2') || ($other->loc5 == 'MMR 2') || ($other->loc6 == 'MMR 2'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   MMR 2
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   MMR 2
                        @endif
                    </td>
                    <td >
                        @if(($other->loc1 == 'Baterai Room') || ($other->loc2 == 'Baterai Room') || ($other->loc3 == 'Baterai Room') || ($other->loc4 == 'Baterai Room') || ($other->loc5 == 'Baterai Room') || ($other->loc6 == 'Baterai Room'))
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
                        @if(($other->loc1 == 'UPS Room') || ($other->loc2 == 'UPS Room') || ($other->loc3 == 'UPS Room') || ($other->loc4 == 'UPS Room') || ($other->loc5 == 'UPS Room') || ($other->loc6 == 'UPS Room'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   UPS Room
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   UPS Room
                        @endif
                    </td>
                    <td >
                        @if(($other->loc1 == 'FSS') || ($other->loc2 == 'FSS') || ($other->loc3 == 'FSS') || ($other->loc4 == 'FSS') || ($other->loc5 == 'FSS') || ($other->loc6 == 'FSS'))
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
                        @if(($other->loc1 == 'Trafo Room') || ($other->loc2 == 'Trafo Room') || ($other->loc3 == 'Trafo Room') || ($other->loc4 == 'Trafo Room') || ($other->loc5 == 'Trafo Room') || ($other->loc6 == 'Trafo Room'))
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
                        @if($other->loc4 == 'CCTV Room')
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Others : CCTV Room
                        @elseif(($other->loc1 == 'Pintu Luar PLN') || ($other->loc2 == 'Pintu Luar PLN') || ($other->loc3 == 'Pintu Luar PLN') || ($other->loc4 == 'Pintu Luar PLN') || ($other->loc5 == 'Pintu Luar PLN') || ($other->loc6 == 'Pintu Luar PLN'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Others : Pintu Luar PLN
                        @elseif(($other->loc1 == 'Koridor Lt. 1') || ($other->loc2 == 'Koridor Lt. 1') || ($other->loc3 == 'Koridor Lt. 1') || ($other->loc4 == 'Koridor Lt. 1') || ($other->loc5 == 'Koridor Lt. 1') || ($other->loc6 == 'Koridor Lt. 1'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Others : Koridor Lt. 1
                        @elseif(($other->loc5 == 'Koridor') && ($other->loc6 == 'CCTV Room'))
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Others : Koridor Lt. 1 & CCTV Room
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   Others :
                        @endif
                    </td>
                    <td ><img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   Parking Lot</td>

                    <td class="table-white">{{Carbon\Carbon::parse($other->validity_from)->format('d-m-Y')}}</td>
                    <td class="table-white">{{Carbon\Carbon::parse($other->validity_to)->format('d-m-Y')}}</td>
                </tr>
            </table>

            <table cellpadding="5" class="table-approval">
                <tr >
                    <th class="col_approval">**Prepared by</th>
                    <th class="col_approval">**Approved by</th>
                    <th>     </th>
                </tr>
                <tr >
                    @switch($lasthistoryC->status)
                        @case('requested')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    : Badai Sino Jendrang</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($other->created_at)->format('d-m-Y H:i')}}</p>
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
                            <p class="cr">Tanggal : {{Carbon\Carbon::parse($other->created_at)->format('d-m-Y H:i')}}</p>
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
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($other->created_at)->format('d-m-Y H:i')}}</p>
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
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($other->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    :</p>
                                <p class="cr">Tanggal :</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{$otherHistory[3]->name}}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($otherHistory[3]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            @break

                        @case('final')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    : Badai Sino Jendrang</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($other->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{$otherHistory[4]->name}}</p>
                                <p class="cr">Tanggal :{{ Carbon\Carbon::parse($otherHistory[4]->created_at)->format('d-m-Y H:i') }}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{$otherHistory[3]->name}}</p>
                                <p class="cr">Tanggal :{{ Carbon\Carbon::parse($otherHistory[3]->created_at)->format('d-m-Y H:i') }}</p>
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
                    <td class="table-center">{{$other->other_work}}</td>
                    <td class="table-center">{{$other->desc}}</td>
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
                    <td height="10px" class="table-center">{{Carbon\Carbon::parse($other->val_from)->format('d-m-Y')}}</td>
                    <td height="10px" class="table-center">{{$other->time_1}}</td>
                    <td height="10px" class="table-center">{{$other->other_time_end}}</td>
                    <td height="10px" class="table-center">{{$other->activity}}</td>
                    <td height="10px" class="table-center">{{$other->detail_service}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{Carbon\Carbon::parse($other->val_from)->format('d-m-Y')}}</td>
                    <td height="10px" class="table-center">{{$other->time_1}}</td>
                    <td height="10px" class="table-center">{{$other->other_time_end2}}</td>
                    <td height="10px" class="table-center">{{$other->activity2}}</td>
                    <td height="10px" class="table-center">{{$other->detail_service2}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{Carbon\Carbon::parse($other->val_from)->format('d-m-Y')}}</td>
                    <td height="10px" class="table-center">{{$other->time_1}}</td>
                    <td height="10px" class="table-center">{{$other->other_time_end3}}</td>
                    <td height="10px" class="table-center">{{$other->activity3}}</td>
                    <td height="10px" class="table-center">{{$other->detail_service3}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{Carbon\Carbon::parse($other->val_from)->format('d-m-Y')}}</td>
                    <td height="10px" class="table-center">{{$other->time_1}}</td>
                    <td height="10px" class="table-center">{{$other->other_time_end4}}</td>
                    <td height="10px" class="table-center">{{$other->activity4}}</td>
                    <td height="10px" class="table-center">{{$other->detail_service4}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{Carbon\Carbon::parse($other->val_from)->format('d-m-Y')}}</td>
                    <td height="10px" class="table-center">{{$other->time_1}}</td>
                    <td height="10px" class="table-center">{{$other->other_time_end5}}</td>
                    <td height="10px" class="table-center">{{$other->activity5}}</td>
                    <td height="10px" class="table-center">{{$other->detail_service5}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{Carbon\Carbon::parse($other->val_from)->format('d-m-Y')}}</td>
                    <td height="10px" class="table-center">{{$other->time_1}}</td>
                    <td height="10px" class="table-center">{{$other->other_time_end6}}</td>
                    <td height="10px" class="table-center">{{$other->activity6}}</td>
                    <td height="10px" class="table-center">{{$other->detail_service6}}</td>
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
                    <td height="10px" class="table-center">{{$other->other_time_start}}</td>
                    <td height="10px" class="table-center">{{$other->other_time_end}}</td>
                    <td height="10px" class="table-center">{{$other->item}}</td>
                    <td height="10px" class="table-center">{{$other->other_procedure}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$other->other_time_start2}}</td>
                    <td height="10px" class="table-center">{{$other->other_time_end2}}</td>
                    <td height="10px" class="table-center">{{$other->item2}}</td>
                    <td height="10px" class="table-center">{{$other->other_procedure2}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$other->other_time_start3}}</td>
                    <td height="10px" class="table-center">{{$other->other_time_end3}}</td>
                    <td height="10px" class="table-center">{{$other->item3}}</td>
                    <td height="10px" class="table-center">{{$other->other_procedure3}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$other->other_time_start4}}</td>
                    <td height="10px" class="table-center">{{$other->other_time_end4}}</td>
                    <td height="10px" class="table-center">{{$other->item4}}</td>
                    <td height="10px" class="table-center">{{$other->other_procedure4}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$other->other_time_start5}}</td>
                    <td height="10px" class="table-center">{{$other->other_time_end5}}</td>
                    <td height="10px" class="table-center">{{$other->item5}}</td>
                    <td height="10px" class="table-center">{{$other->other_procedure5}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$other->other_time_start6}}</td>
                    <td height="10px" class="table-center">{{$other->other_time_end6}}</td>
                    <td height="10px" class="table-center">{{$other->item6}}</td>
                    <td height="10px" class="table-center">{{$other->other_procedure6}}</td>
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
                    <td class="table-center">{{$other->other_risk}}</td>
                    <td class="table-center">{{$other->other_possibility}}</td>
                    <td class="table-center">{{$other->other_impact}}</td>
                    <td class="table-center">{{$other->other_mitigation}}</td>
                </tr>
                <tr >
                    <td class="table-white">2.</td>
                    <td class="table-center">{{$other->other_risk2}}</td>
                    <td class="table-center">{{$other->other_possibility2}}</td>
                    <td class="table-center">{{$other->other_impact2}}</td>
                    <td class="table-center">{{$other->other_mitigation2}}</td>
                </tr>
                <tr >
                    <td class="table-white">3.</td>
                    <td class="table-center">{{$other->other_risk3}}</td>
                    <td class="table-center">{{$other->other_possibility3}}</td>
                    <td class="table-center">{{$other->other_impact3}}</td>
                    <td class="table-center">{{$other->other_mitigation3}}</td>
                </tr>
                <tr >
                    <td class="table-white">4.</td>
                    <td class="table-center">{{$other->other_risk4}}</td>
                    <td class="table-center">{{$other->other_possibility4}}</td>
                    <td class="table-center">{{$other->other_impact4}}</td>
                    <td class="table-center">{{$other->other_mitigation4}}</td>
                </tr>
                <tr >
                    <td class="table-white">5.</td>
                    <td class="table-center">{{$other->other_risk5}}</td>
                    <td class="table-center">{{$other->other_possibility5}}</td>
                    <td class="table-center">{{$other->other_impact5}}</td>
                    <td class="table-center">{{$other->other_mitigation5}}</td>
                </tr>
                <tr >
                    <td class="table-white">6.</td>
                    <td class="table-center">{{$other->other_risk6}}</td>
                    <td class="table-center">{{$other->other_possibility6}}</td>
                    <td class="table-center">{{$other->other_impact6}}</td>
                    <td class="table-center">{{$other->other_mitigation6}}</td>
                </tr>
            </table>

            <table cellpadding="2" class="table table-background">
                <tr >
                    <td  width="50%" class="table-grey"><b>Testing and Verification</b></td>
                    <td width="50%" class="table-grey"><b>Rollback Operation</b></td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$other->testing}}</td>
                    <td height="10px" class="table-center">{{$other->rollback}}</td>
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
                    <td class="table-center">{{$other->pic1}}</td>
                    <td class="table-center">{{$other->company_1}}</td>
                    <td class="table-center">{{$other->respon_1}}</td>
                    <td class="table-center">{{$other->phone_1}}</td>
                </tr>
                <tr >
                    <td class="table-white">2. </td>
                    <td class="table-center">{{$other->pic2}}</td>
                    <td class="table-center">{{$other->company_2}}</td>
                    <td class="table-center">{{$other->respon_2}}</td>
                    <td class="table-center">{{$other->phone_2}}</td>
                </tr>
                <tr >
                    <td class="table-white">3. </td>
                    <td class="table-center">{{$other->pic_3}}</td>
                    <td class="table-center">{{$other->company_3}}</td>
                    <td class="table-center">{{$other->respon_3}}</td>
                    <td class="table-center">{{$other->phone__3}}</td>
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
                    @switch($lasthistoryC->status)
                        @case('requested')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    : Badai Sino Jendrang</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($other->created_at)->format('d-m-Y H:i')}}</p>
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
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($other->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    :{{$otherHistory[1]->name}}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($otherHistory[1]->created_at)->format('d-m-Y H:i')}}</p>
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
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($other->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    :{{$otherHistory[1]->name}}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($otherHistory[1]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    :{{$otherHistory[2]->name}}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($otherHistory[2]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    : </p>
                                <p class="cr">Tanggal :</p>
                            </td>
                            @break

                        @case('acknowledge')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    : Badai Sino Jendrang</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($other->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    :{{$otherHistory[1]->name}}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($otherHistory[1]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    :{{$otherHistory[2]->name}}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($otherHistory[2]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    : </p>
                                <p class="cr">Tanggal :</p>
                            </td>
                            @break

                        @case('final')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    : Badai Sino Jendrang</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($other->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    :{{$otherHistory[1]->name}}</p>
                                <p class="cr">Tanggal :{{ Carbon\Carbon::parse($otherHistory[1]->created_at)->format('d-m-Y H:i') }}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    :{{$otherHistory[2]->name}}</p>
                                <p class="cr">Tanggal :{{ Carbon\Carbon::parse($otherHistory[2]->created_at)->format('d-m-Y H:i') }}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 80px; height: 30px;">
                                <p class="cr">Nama    :{{$otherHistory[4]->name}}</p>
                                <p class="cr">Tanggal :{{ Carbon\Carbon::parse($otherHistory[4]->created_at)->format('d-m-Y H:i') }}</p>
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
    </main>
</body>
</html>
