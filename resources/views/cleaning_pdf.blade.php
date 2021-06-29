<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <title>Cleaning PDF</title>
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
    {{-- <header>
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
    </header> --}}

    {{-- <footer>
        <table class="table table-bordered">
            <tr>
                <td class="col_footer">Kode Dok: FRM-BTS-DCDV-2019-04</td>
                <td class="col_footer">Revisi : 01</td>
                <td class="col_footer"><font color="red">Kategori : Dokumen Terbatas</font></td>
                <td class="col_footer">Hal : 1/1</td>
            </tr>
        </table>
    </footer> --}}

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

                    <td >: {{Carbon\Carbon::parse($cleaning->created_at)->format('d-m-Y H:i')}}</td>
                </tr>
                <tr >
                    <td width="150px">Change Request Number: </td>
                    <td >: {{$cleaning->cleaning_id}}</td>
                </tr>
                <tr >
                    <td width="150px">Purpose of Work</td>
                    <td >: {{$cleaning->cleaning_work}}</td>
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
                    <td class="table-white">1. {{$cleaning->cleaning_name_1}}</td>
                    <td class="table-center">{{$cleaning->cleaning_id_1}}</td>
                    <td class="table-center">{{$cleaning->cleaning_number_1}}</td>
                    <td class="table-center">PT BIJAC</td>
                    <td class="table-center">Building Management</td>
                </tr>
                <tr >
                    <td class="table-white">2. {{$cleaning->cleaning_name_2}}</td>
                    <td class="table-center">{{$cleaning->cleaning_id_2}}</td>
                    <td class="table-center">{{$cleaning->cleaning_number_2}}</td>
                    <td class="table-center">PT BIJAC</td>
                    <td class="table-center">Building Management</td>
                </tr>
                <tr >
                    <td class="table-white">3. {{$cleaning->cleaning_name_3}}</td>
                    <td class="table-center">{{$cleaning->cleaning_id_3}}</td>
                    <td class="table-center">{{$cleaning->cleaning_number_3}}</td>
                    <td class="table-center"></td>
                    <td class="table-center"></td>
                </tr>
                <tr >
                    <td class="table-white">4. {{$cleaning->cleaning_name_4}}</td>
                    <td class="table-center">{{$cleaning->cleaning_id_4}}</td>
                    <td class="table-center">{{$cleaning->cleaning_number_4}}</td>
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

            <table cellpadding="5" class="table table-borderless">
                <tr>
                    <td class="table-grey" colspan="2"><b>Authorized Entry Area</b></td>
                    <td class="table-grey" colspan="2"><b>Access Type</b></td>
                </tr>
                <tr>
                    <td>
                        @if($cleaning->server == '1')
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Server Room
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   Server Room
                        @endif
                    </td>
                    <td >
                        @if($cleaning->generator == '1')
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
                        @if($cleaning->mmr1 == '1')
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   MMR 1
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   MMR 1
                        @endif
                    </td>
                    <td >
                        @if($cleaning->panel == '1')
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
                        @if($cleaning->mmr2 == '1')
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   MMR 2
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   MMR 2
                        @endif
                    </td>
                    <td >
                        @if($cleaning->battery == '1')
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
                        @if($cleaning->ups == '1')
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   UPS Room
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   UPS Room
                        @endif
                    </td>
                    <td >
                        @if ($cleaning->fss == '1')
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
                        @if ($cleaning->trafo == '1')
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
                        @if($cleaning->staging == '1' && $cleaning->koridor == '0')
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Others : Staging Room
                        @elseif($cleaning->pln == '1')
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Others : Pintu Luar PLN
                        @elseif($cleaning->koridor == '1' && $cleaning->staging == '0')
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Others : Koridor Lt. 1
                        @elseif($cleaning->koridor == '1' && $cleaning->staging == '1')
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Others : Koridor Lt. 1 & Staging Room
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   Others :
                        @endif
                    </td>
                    <td ><img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   Parking Lot</td>

                    <td class="table-white">{{Carbon\Carbon::parse($cleaning->validity_from)->format('d-m-Y')}}</td>
                    <td class="table-white">{{Carbon\Carbon::parse($cleaning->validity_to)->format('d-m-Y')}}</td>
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
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($cleaning->created_at)->format('d-m-Y H:i')}}</p>
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
                            <p class="cr">Tanggal : {{Carbon\Carbon::parse($cleaning->created_at)->format('d-m-Y H:i')}}</p>
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
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($cleaning->created_at)->format('d-m-Y H:i')}}</p>
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
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($cleaning->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    :</p>
                                <p class="cr">Tanggal :</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{$cleaningHistory[3]->name}}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($cleaningHistory[3]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            @break

                        @case('final')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    : Badai Sino Jendrang</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($cleaning->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{$cleaningHistory[4]->name}}</p>
                                <p class="cr">Tanggal :{{ Carbon\Carbon::parse($cleaningHistory[4]->created_at)->format('d-m-Y H:i') }}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{$cleaningHistory[3]->name}}</p>
                                <p class="cr">Tanggal :{{ Carbon\Carbon::parse($cleaningHistory[3]->created_at)->format('d-m-Y H:i') }}</p>
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
                    <td class="table-center">{{$cleaning->cleaning_background}}</td>
                    <td class="table-center">{{$cleaning->cleaning_describ}}</td>
                </tr>
            </table>

            <table cellpadding="2" class="table table-detail">
                <tr >
                    <td class="table-grey" colspan="4"><b>Detail Time Table of All Activity</b></td>
                </tr>
                <tr class="table-grey">
                    <td class="table-grey"><b>Day</b></td>
                    <td class="table-grey"><b>Time</b></td>
                    <td class="table-grey"><b>Activity Description</b></td>
                    <td class="table-grey"><b>Detail Service Impact</b></td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{Carbon\Carbon::parse($cleaning->validity_from)->format('d-m-Y')}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_time_1}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_procedure_1}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_risk_1}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{Carbon\Carbon::parse($cleaning->validity_from)->format('d-m-Y')}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_time_2}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_procedure_2}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_risk_2}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{Carbon\Carbon::parse($cleaning->validity_from)->format('d-m-Y')}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_time_3}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_procedure_3}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_risk_3}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{Carbon\Carbon::parse($cleaning->validity_from)->format('d-m-Y')}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_time_4}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_procedure_4}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_risk_4}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{Carbon\Carbon::parse($cleaning->validity_from)->format('d-m-Y')}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_time_5}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_procedure_5}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_risk_5}}</td>
                </tr>
            </table>

            <table cellpadding="2" class="table table-detail">
                <tr >
                    <td class="table-grey" colspan="3"><b>Detail Operation and Execution</b></td>
                </tr>
                <tr class="table-grey">
                    <td class="table-grey"><b>Time</b></td>
                    <td class="table-grey"><b>Item</b></td>
                    <td class="table-grey"><b>Working Procedure</b></td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$cleaning->cleaning_time_1}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_item_1}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_procedure_1}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$cleaning->cleaning_time_2}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_item_2}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_procedure_2}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$cleaning->cleaning_time_3}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_item_3}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_procedure_3}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$cleaning->cleaning_time_4}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_item_4}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_procedure_4}}</td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$cleaning->cleaning_time_5}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_item_5}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_procedure_5}}</td>
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
                    <td class="table-center">{{$cleaning->cleaning_risk_1}}</td>
                    <td class="table-center">{{$cleaning->cleaning_possibility_1}}</td>
                    <td class="table-center">{{$cleaning->cleaning_impact_1}}</td>
                    <td class="table-center">{{$cleaning->cleaning_mitigation_1}}</td>
                </tr>
                <tr >
                    <td class="table-white">2.</td>
                    <td class="table-center">{{$cleaning->cleaning_risk_2}}</td>
                    <td class="table-center">{{$cleaning->cleaning_possibility_2}}</td>
                    <td class="table-center">{{$cleaning->cleaning_impact_2}}</td>
                    <td class="table-center">{{$cleaning->cleaning_mitigation_2}}</td>
                </tr>
                <tr >
                    <td class="table-white">3.</td>
                    <td class="table-center">{{$cleaning->cleaning_risk_3}}</td>
                    <td class="table-center">{{$cleaning->cleaning_possibility_3}}</td>
                    <td class="table-center">{{$cleaning->cleaning_impact_3}}</td>
                    <td class="table-center">{{$cleaning->cleaning_mitigation_3}}</td>
                </tr>
                <tr >
                    <td class="table-white">4.</td>
                    <td class="table-center">{{$cleaning->cleaning_risk_4}}</td>
                    <td class="table-center">{{$cleaning->cleaning_possibility_4}}</td>
                    <td class="table-center">{{$cleaning->cleaning_impact_4}}</td>
                    <td class="table-center">{{$cleaning->cleaning_mitigation_4}}</td>
                </tr>
                <tr >
                    <td class="table-white">5.</td>
                    <td class="table-center">{{$cleaning->cleaning_risk_5}}</td>
                    <td class="table-center">{{$cleaning->cleaning_possibility_5}}</td>
                    <td class="table-center">{{$cleaning->cleaning_impact_5}}</td>
                    <td class="table-center">{{$cleaning->cleaning_mitigation_5}}</td>
                </tr>
            </table>

            <table cellpadding="2" class="table table-background">
                <tr >
                    <td  width="50%" class="table-grey"><b>Testing and Verification</b></td>
                    <td width="50%" class="table-grey"><b>Rollback Operation</b></td>
                </tr>
                <tr >
                    <td height="10px" class="table-center">{{$cleaning->cleaning_testing}}</td>
                    <td height="10px" class="table-center">{{$cleaning->cleaning_rollback}}</td>
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
                    <td class="table-center">{{$cleaning->cleaning_name_1}}</td>
                    <td class="table-center">PT BIJAC</td>
                    <td class="table-center">Cleaner</td>
                    <td class="table-center">{{$cleaning->cleaning_number_1}}</td>
                </tr>
                <tr >
                    <td class="table-white">2. </td>
                    <td class="table-center">{{$cleaning->cleaning_name_2}}</td>
                    <td class="table-center">PT BIJAC</td>
                    <td class="table-center">Cleaner</td>
                    <td class="table-center">{{$cleaning->cleaning_number_2}}</td>
                </tr>
                <tr >
                    <td class="table-white">3. </td>
                    <td class="table-center"></td>
                    <td class="table-center"></td>
                    <td class="table-center"></td>
                    <td class="table-center"></td>
                </tr>
                <tr >
                    <td class="table-white">4. </td>
                    <td class="table-center"></td>
                    <td class="table-center"></td>
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
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    : Badai Sino Jendrang</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($cleaning->created_at)->format('d-m-Y H:i')}}</p>
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
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr"></p>Nama    : Badai Sino Jendrang
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($cleaning->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{$cleaningHistory[1]->name}}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($cleaningHistory[1]->created_at)->format('d-m-Y H:i')}}</p>
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
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    : Badai Sino Jendrang</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($cleaning->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{$cleaningHistory[1]->name}}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($cleaningHistory[1]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{$cleaningHistory[2]->name}}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($cleaningHistory[2]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    : </p>
                                <p class="cr">Tanggal :</p>
                            </td>
                            @break

                        @case('acknowledge')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    : Badai Sino Jendrang</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($cleaning->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{$cleaningHistory[1]->name}}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($cleaningHistory[1]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{$cleaningHistory[2]->name}}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($cleaningHistory[2]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    : </p>
                                <p class="cr">Tanggal :</p>
                            </td>
                            @break

                        @case('final')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    : Badai Sino Jendrang</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($cleaning->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{$cleaningHistory[1]->name}}</p>
                                <p class="cr">Tanggal :{{ Carbon\Carbon::parse($cleaningHistory[1]->created_at)->format('d-m-Y H:i') }}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{$cleaningHistory[2]->name}}</p>
                                <p class="cr">Tanggal :{{ Carbon\Carbon::parse($cleaningHistory[2]->created_at)->format('d-m-Y H:i') }}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{$cleaningHistory[4]->name}}</p>
                                <p class="cr">Tanggal :{{ Carbon\Carbon::parse($cleaningHistory[4]->created_at)->format('d-m-Y H:i') }}</p>
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
