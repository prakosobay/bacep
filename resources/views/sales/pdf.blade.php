<!DOCTYPE html>
<html lang="en">
<head>
    <title>Colocation PDF</title>
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
            font-size: 11pt;
            width: 100%;
            margin-top: 10px;
        }

        .table-visitor {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 11pt;
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
            font-size: 11pt;
            width: 100%;
            margin-top: 10px;
        }

        .table-approval {
            border: 1px solid black;
            border-collapse:collapse;
            width: 100%;
            font-size: 11pt;
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

        .tengah-text{
            text-align: center;
        }

        .table-loan{
            text-align: left;
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
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

            {{-- Header  --}}
            <table class="table table-bordered">
                <tr >
                    <td class="col_header" rowspan="2" ><img src="{{ public_path("gambar/bts_logo.jpg") }}" class="img-fluid" alt="logo_bts"></td>
                    <td class="col_header"><font size="10pt"><b>FORM</b></font></td>
                    <td class="col_header"><b>Kode Dokumen : FRM-BTS-DCDV-2021-04</b></td>
                </tr>
                <tr>
                    <td class="col_header"><font size="10pt"><b>Access Request</b></font></td>
                    <td class="col_header"><b>Tanggal Berlaku : 21 Desember 2020</b></td>
                </tr>
            </table>

            {{-- Purpose of work --}}
            <table cellpadding="3" class="table table-hover">
                <tr >
                    <td width="150px">Date of Request</td>
                    <td >: {{Carbon\Carbon::parse($getForm->created_at)->format('d-m-Y H:i')}}</td>
                </tr>
                @if($nomorAR)
                    <tr >
                        <td width="150px">Access Request Number: </td>
                        <td >: AR/IS/{{ $nomorAR->number }}/{{ $nomorAR->month }}/{{ $nomorAR->year}} </td>
                    </tr>
                @else
                    <tr >
                        <td width="150px">Access Request Number: </td>
                        <td >: {{ $getForm->id }} AR/IS/</td>
                    </tr>
                @endif
                <tr >
                    <td width="150px">Purpose of Work</td>
                    <td >: {{$getForm->work}}</td>
                </tr>
            </table>

            {{-- Requestor --}}
            <table cellpadding="3" class="table table-hover">
                <tr >
                    <td class="table-grey" colspan="2"><b>Bali Tower Requestor</b></td>
                </tr>
                <tr >
                    <td width="150px">Name</td>
                    <td >: {{ $getForm->requestor->name }}</td>
                </tr>
                <tr >
                    <td width="150px">Department</td>
                    <td >: {{ $getForm->requestor->department }}</td>
                </tr>
                <tr >
                    <td width="150px">Phone Number</td>
                    <td >: {{ $getForm->requestor->phone }}</td>
                </tr>
            </table>

            {{-- Visitor --}}
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
                @foreach ($getForm->visitors as $visitor)
                <tr >
                    <td class="table-white">{{$visitor->name}}</td>
                    <td class="table-center">{{$visitor->nik}}</td>
                    <td class="table-center">{{$visitor->phone}}</td>
                    <td class="table-center">{{$visitor->company}}</td>
                    <td class="table-center">{{$visitor->department}}</td>
                </tr>
                @endforeach
            </table>

            {{-- Entry Area --}}
            <table cellpadding="5" class="table table-borderless">
                <tr>
                    <td class="table-grey" colspan="2"><b>Authorized Entry Area</b></td>
                    <td class="table-grey" colspan="2"><b>Access Type</b></td>
                </tr>
                <tr>
                    <td>
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Server Room
                    </td>
                    <td >
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Generator Room
                    </td>
                    <td><img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;"></td>
                    <td>General Access</td>
                </tr>
                <tr>
                    <td >
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   MMR 1
                    </td>
                    <td >
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Panel Room
                    </td>
                    <td><img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;"></td>
                    <td>Limited Access</td>
                </tr>
                <tr>
                    <td >
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   MMR 2
                    </td>
                    <td >
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Battery Room
                    </td>
                    <td><img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;"></td>
                    <td>Escorted Access</td>
                </tr>
                <tr>
                    <td >
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   UPS Room
                    </td>
                    <td >
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   FSS Room
                    </td>
                    <td colspan="2">  </td>
                </tr>
                <tr>
                    <td >
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Office 2nd FL
                    </td>
                    <td >
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Office 3rd FL
                    </td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td >
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Trafo Room
                    </td>
                    <td >
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Yard
                    </td>
                    <td class="table-grey" colspan="2"><b>Validity</b></td>
                </tr>
                <tr>
                    <td >
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Others : CCTV Room
                    </td>
                    <td >
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Parking Lot
                    </td>

                    <td class="table-white">{{Carbon\Carbon::parse($getForm->visit)->format('d-m-Y')}}</td>
                    <td class="table-white">{{Carbon\Carbon::parse($getForm->leave)->format('d-m-Y')}}</td>
                </tr>
            </table>

            {{-- Approval AR --}}
            <table cellpadding="5" class="table-approval">
                <tr >
                    <th class="col_approval">**Prepared by</th>
                    <th class="col_approval">**Approved by</th>
                    <th>     </th>
                </tr>
                <tr >
                    @switch($getLastHistory->status)
                        @case('requested')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    : {{ $getHistory[0]->createdby }}</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($getHistory[0]->created_at)->format('d-m-Y H:i')}}</p>
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
                            <p class="cr">Nama    : {{ $getHistory[0]->createdby }}</p>
                            <p class="cr">Tanggal : {{Carbon\Carbon::parse($getHistory[0]->created_at)->format('d-m-Y H:i')}}</p>
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
                                <p class="cr">Nama    : {{ $getHistory[0]->createdby }}</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($getHistory[0]->created_at)->format('d-m-Y H:i')}}</p>
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
                                <p class="cr">Nama    : {{ $getHistory[0]->createdby }}</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($getHistory[0]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval">
                                <p class="cr">Nama    :</p>
                                <p class="cr">Tanggal :</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{ $getHistory[2]->createdby }}</p>
                                <p class="cr">Tanggal :{{Carbon\Carbon::parse($getHistory[2]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            @break

                        @case('final')
                            <td class="col_approval"><img src="{{ public_path("gambar/Requested.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    : {{ $getHistory[0]->createdby }}</p>
                                <p class="cr">Tanggal : {{Carbon\Carbon::parse($getHistory[0]->created_at)->format('d-m-Y H:i')}}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{ $getHistory[3]->createdby }}</p>
                                <p class="cr">Tanggal :{{ Carbon\Carbon::parse($getHistory[3]->created_at)->format('d-m-Y H:i') }}</p>
                            </td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;">
                                <p class="cr">Nama    :{{ $getHistory[2]->createdby }}</p>
                                <p class="cr">Tanggal :{{ Carbon\Carbon::parse($getHistory[2]->created_at)->format('d-m-Y H:i') }}</p>
                            </td>
                            @break
                    @endswitch
                </tr>

                <tr>
                    <td class="col_approval"><b>Requestor</b></td>
                    <td class="col_approval"><b>Data Center Operation Section Head</b></td>
                    <td class="col_approval"><b>Security</b></td>
                </tr>
            </table>

            <p >** On public holiday signatory will be handled by appointed Data Center Operation Shift Engineer on duty</p>
            <p>(Pada hari libur Nasional tanda tangan akan diwakilkan kepetugas operasional yang ditunjuk)</p>

            {{-- Footer --}}
            <table class="table table-bordered">
                <tr>
                    <td class="col_footer">Kode Dok: FRM-BTS-DCDV-2021-04</td>
                    <td class="col_footer">Revisi : 01</td>
                    <td class="col_footer"><font color="red">Kategori : Dokumen Terbatas</font></td>
                    <td class="col_footer">Hal : 1/1</td>
                </tr>
            </table>
        </div>

            {{-- Header CR --}}
            {{-- <table class="table table-bordered">
                <tr >
                    <td class="col_header" rowspan="2" ><img src="{{ public_path("gambar/bts_logo.jpg") }}" class="img-fluid" alt="logo_bts"></td>
                </tr>
            </table>


            <h2 class="tengah-text"><b>ACCESS CARD LOAN FORM</b></h2>
            <h4 class="tengah-text">Nomor : DC/FORM/19/2019/Rev.0.0</h4>

            <table class="table-loan">
                <tr>
                    <td colspan="4"><b>Customer/Tenant Detail</b></td>
                </tr>
                <tr>
                    <td><b>Company</b></td>
                    <td colspan="3"><b>:  PT Bali Towerindo Sentra, Tbk </b></td>
                </tr>
                <tr>
                    <td><b>PIC Name</b></td>
                    <td colspan="3"><b>: {{ $getForm->req_name }}</b></td>
                </tr>
                <tr>
                    <td><b>Phone</b></td>
                    <td colspan="3"><b>: {{ $getForm->req_phone }}</b></td>
                </tr>
                <tr>
                    <td colspan="4"><b>Card & Room Detail</b></td>
                </tr>
                <tr>
                    <td><b>Room</b></td>
                    <td><b>:</b></td>
                    <td><b>Rack No</b></td>
                    <td><b>: </b></td>
                </tr>
            </table> --}}

    </main>
</body>
</html>
