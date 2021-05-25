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
            margin-top: 1.7cm;
            margin-left: 0.5cm;
            margin-right: 0.5cm;
            margin-bottom: 1cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0.5cm;
            right: 0.5cm;
            height: 3cm;
            text-align: center;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0.1cm;
            height: 1cm;
            left: 0.5cm;
            right: 0.5cm;
            text-align: center;
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
            /* border-collapse: collapse; */
            font-size: 10pt;
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
        }

        .table-grey {
            text-align: center;
            background-color: grey;
        }

        .table-center {
            text-align: center;
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

        .page_break+.page_break {
            page-break-before: always;
        }
    </style>

</head>
<body>
    <header>
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
    </header>

    <footer>
        <table class="table table-bordered">
            <tr>
                <td class="col_footer">Kode Dok: FRM-BTS-DCDV-2019-04</td>
                <td class="col_footer">Revisi : 01</td>
                <td class="col_footer"><font color="red">Kategori : Dokumen Terbatas</font></td>
                <td class="col_footer">Hal : 1/1</td>
            </tr>
        </table>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <div style="page-break-after: always;">
            <table cellpadding="3" class="table table-hover">
                <tr >
                    <td width="150px">Date of Request</td>
                    <td >: {{$cleaning->created_at}}</td>
                </tr>
                <tr >
                    <td width="150px">Access Request Number: </td>
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
                    <td >: Bulding Management</td>
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
                    <td >Name</td>
                    <td >ID Number</td>
                    <td >Phone Number</td>
                    <td >Company</td>
                    <td >Department</td>
                </tr>
                <tr >
                    <td >1. {{$cleaning->cleaning_name_1}}</td>
                    <td class="table-center">{{$cleaning->cleaning_id_1}}</td>
                    <td class="table-center">{{$cleaning->cleaning_number_1}}</td>
                    <td class="table-center">PT BIJAC</td>
                    <td class="table-center">Building Management</td>
                </tr>
                <tr >
                    <td >2. {{$cleaning->cleaning_name_2}}</td>
                    <td class="table-center">{{$cleaning->cleaning_id_2}}</td>
                    <td class="table-center">{{$cleaning->cleaning_number_2}}</td>
                    <td class="table-center">PT BIJAC</td>
                    <td class="table-center">Building Management</td>
                </tr>
                <tr >
                    <td >3. </td>
                    <td ></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr >
                    <td >4. </td>
                    <td ></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr >
                    <td >5. </td>
                    <td ></td>
                    <td></td>
                    <td></td>
                    <td></td>
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
                        @if($cleaning->staging == '1')
                        <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 25px; height: 15px;">   Others : Staging Room
                        @else
                        <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   Others :
                        @endif
                    </td>
                    <td ><img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 25px; height: 15px;">   Parking Lot</td>
                    <td class="table-center">{{$cleaning->validity_from}}</td>
                    <td class="table-center">{{$cleaning->validity_to}}</td>
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
                        @case('final')
                            <td > </td>
                            @break

                        @case('reviewed')
                            <td > </td>
                            @break

                        @case('checked')
                            <td > </td>
                            @break

                        @case('secured')
                            <td ><p>Badai Sino Jendrang</p><p>Tanggal</p></td>
                            <td ><p>Anugrah Sandy Yudhastiya</p><p>Tanggal</p></td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}"  alt="" style="width: 100px; height: 60px;" ><p>Agus</p><p>Tanggal</p></td>
                            @break

                        @case('created')
                            <td ><p>Badai Sino Jendrang</p><p>Tanggal</p></td>
                            <td class="col_approval"><img src="{{ public_path("gambar/approved.png") }}"  alt="" style="width: 100px; height: 60px;" ><p>Anugrah Sandy Yudhastiya</p><p>Tanggal</p></td>
                            <td class="col_approval"><img src="{{ public_path("gambar/Checked.png") }}"  alt="" style="width: 100px; height: 60px;" ><p>Agus</p><p>Tanggal</p></td>
                            @break
                    @endswitch
                </tr>
                {{-- <tr >
                    <td>Badai Sino Jendrang</td>
                    <td>Anugrah Sandy Yudhastiya</td>
                    <td>Agus</td>
                </tr>
                <tr >
                    <td>tanggal</td>
                    <td>tanggal</td>
                    <td>tanggal</td>
                </tr> --}}

                <tr>
                    <td class="col_approval"><b>Requestor</b></td>
                    <td class="col_approval"><b>Head of Data Center Operation</b></td>
                    <td class="col_approval"><b>Security</b></td>
                </tr>
            </table>
            <p >** On public holiday signatory will be handled by appointed Data Center Operation Shift Engineer on duty</p>
            <p>(Pada hari libur Nasional tanda tangan akan diwakilkan kepetugas operasional yang ditunjuk)</p>
        </div>
        <div style="page-break-after:always;">
            <table cellpadding="3" class="table table-visitor">
                <tr>
                    <th>Background Objective</th>
                </tr>
            </table>
        </div>
    </main>
</body>
</html>
