<!DOCTYPE html>
<html>
<head>
    <title>Cleaning Data Center</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <style type="text/css">
        @page {
            margin-top: 0.1cm;
            margin-bottom: 0.1cm;
        }

        body {
            margin-top: 0.3cm;
            margin-left: 0.5cm;
            margin-right: 0.5cm;
            margin-bottom: 0.3cm;
        }

        .header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 3cm;
        }

        .footer {
                position: fixed;
                bottom: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;
        }

        table, th, td {
            /* border-width: 700px; */
            border-spacing: 0px;
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 10pt;
            margin: 5px;
            padding: 7px;
		}

        /* table.satu{
            border-width: 700px;
            border-spacing: 0px;
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 10pt;
            margin: 7px;
        }

        td.a{
            padding: 7px;
            border-width: 100px;
            width: 100px;
        } */

        .tengah{
            text-align: center;
            font-size: 9pt;
        }
        .kedua{
            text-align: center;
            font-size: 10pt;

        }
        .tujuh{
            font-size:10pt;
        }

        .marginbottom{
            margin-bottom:50px;
        }

        .center{
            text-align: center;
            font-size: 15pt;
            margin-bottom: 2px;
        }

        .page_break + .page_break{
            page-break-before: always;
        }
    </style>
</head>
<body>


    <header>
        <table class="table table-bordered">
            <tr>
                <td rowspan="2"><img src="{{ public_path("gambar/logo_bts.png") }}" width="15px" height="6px"/></td>
                <td ><b>FORM</b></td>
                <td>Kode Dokumen : FRM-BTS-DCDV-2021-04
            </tr>
            <tr>
                <td></td>
                <td >Access Request</td>
                <td>Tanggal Berlaku :</td>
            </tr>
        </table>
    </header>

    <footer>
        <table class="table table-bordered">
            <tr>
                <td>Kode Dok: FRM-BTS-DCDV-2019-04</td>
                <td>Revisi : 01</td>
                <td>Kategori : Dokumen Terbatas</td>
                <td>Hal : 1/1</td>
            </tr>
        </table>
    </footer>

    <main>
    <div style="page-break-after: always;">
    <table >
        <tr >
            <td ><b>Time of Request</b></td>
            <td width="550px">: {{$cleaning->created_at}}</td>
        </tr>
        <tr >
            <td ><b>No. </b></td>
            <td >: {{$cleaning->cleaning_id}}</td>
        </tr>
        <tr >
            <td ><b>Purpose of Work</b></td>
            <td >: {{$cleaning->cleaning_work}}</td>
        </tr>
    </table>

    <table >
        <tr >
            <td  colspan="4"><b>Bali Tower Requestor </b></td>
        </tr>
        <tr >
            <td  ><b>Name</b></td>
            <td  width="250px">: Badai Sino Jendrang</td>
            <td  ><b>Phone Number</b></td>
            <td  width="250px">: 0822-1028-2228</td>
        </tr>
        <tr >
            <td  ><b>Department</b></td>
            <td colspan="3">: Building Management</td>
    </table>

    <table >
        <tr >
            <td  colspan="4"><b>Visitor</b></td>
        </tr>
        <tr >
            <td  ><b>Name</b></td>
            <td  width="250px">: {{$cleaning->cleaning_name_1}} & {{$cleaning->cleaning_name_2}}</td>
            <td  ><b>ID</b></td>
            <td  width="250px">: {{$cleaning->cleaning_id_1}} & {{$cleaning->cleaning_id_2}}</td>
        </tr>
        <tr >
            <td  ><b>Company</b></td>
            <td  width="250px">: PT Bijac</td>
            <td  ><b>Phone Number</b></td>
            <td  width="250px">: {{$cleaning->cleaning_number_1}} & {{$cleaning->cleaning_number_2}}</td>
        </tr>
        <tr >
            <td  ><b>Department</b></td>
            <td colspan="3">: Cleaner</td>
        </tr>
    </table>

    <table width="700px">
        <tr >
            <td  colspan="2"><b>Authorized Entry Area :</b></td>
            <td  colspan="2"><b>Access Type : </b></td>
        </tr>
        <tr >
            <td >
                @if($cleaning->server == '1')
                <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   Server Room</b>
                @else
                <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   Server Room</b>
                @endif
            </td>
            <td >
                @if($cleaning->generator == '1')
                <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   Generator Room</b>
                @else
                <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   Generator Room</b>
                @endif
            </td>
            <td><b>General Access</b></td>
            <td><img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 20px; height: 8px;"></td>
        </tr>
        <tr >
            <td >
                @if($cleaning->mmr1 == '1')
                <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   MMR 1</b>
                @else
                <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   MMR 1</b>
                @endif
            </td>
            <td >
                @if($cleaning->panel == '1')
                <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   Panel Room</b>
                @else
                <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   Panel Room</b>
                @endif
            </td>
            <td><b>Limited Access</b></td>
            <td><img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 20px; height: 8px;"></td>
        </tr>
        <tr >
            <td >
                @if($cleaning->mmr2 == '1')
                <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   MMR 2</b>
                @else
                <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   MMR 2</b>
                @endif
            </td>
            <td >
                @if($cleaning->battery == '1')
                <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   Battery Room</b>
                @else
                <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   Battery Room</b>
                @endif
            </td>
            <td><b>Escorted Access</b></td>
            <td><img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 20px; height: 8px;"></td>
        </tr>
        <tr >
            <td >
                @if($cleaning->ups == '1')
                <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   UPS Room</b>
                @else
                <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   UPS Room</b>
                @endif
            </td>
            <td >
                @if ($cleaning->fss == '1')
                <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   FSS Room</b>
                @else
                <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   FSS Room</b>
                @endif
            </td>
            <td colspan="2">  </td>
        </tr>
        <tr >
            <td ><img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   Office 2nd FL</b></td>
            <td ><img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   Office 3rd FL</b></td>
            <td  colspan="2"><b>Validity :</td>
            </tr>
        <tr >
            <td >
                @if ($cleaning->trafo == '1')
                <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   Trafo Room</b>
                @else
                <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   Trafo Room</b>
                @endif
            </td>
            <td ><img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   Yard</b></td>
            <td><b>From</td>
            <td> : {{$cleaning->validity_from}}</td>
        </tr>
        <tr >
            <td >
                @if($cleaning->staging == '1')
                <img src="{{ public_path("gambar/checkbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   Others : Staging Room</b>
                @else
                <img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   Others :</b>
                @endif
            </td>
            <td ><img src="{{ public_path("gambar/uncheckbox.png") }}" alt="" style="width: 20px; height: 8px;"><b>   Parking Lot</b></td>
            <td><b>To</b></td>
            <td> : {{$cleaning->validity_to}}</td>
        </tr>
    </table>

    <table width="700px">
        <tr>
            @switch($lasthistoryC->status)
                @case('created')
                    <td width="200px" height="40px"> </td>
                    @break

                @case('reviewed')
                    <td width="200px" height="40px"> </td>
                    @break

                @case('checked')
                    <td width="200px" height="40px"> </td>
                    @break

                @case('secured')
                    <td width="200px" height="40px"></td>
                    <td width="200px" ><img src="{{ public_path("gambar/Checked.png") }}"  alt="" style="width: 80px; height: 40px;" align="middle"></td>
                    <td width="200px" height="40px"></td>
                    @break

                @case('final')
                    <td width="200px" height="40px"></td>
                    <td width="200px" ><img src="{{ public_path("gambar/Checked.png") }}"  alt="" style="width: 80px; height: 40px;" align="middle"></td>
                    <td width="200px" ><img src="{{ public_path("gambar/approved.png") }}"  alt="" style="width: 80px; height: 40px;" align="middle"></td>
                    @break
            @endswitch
        </tr>

        <tr height="7px">
            @if($lasthistoryC->status == 'created')
            <td width="200px" class="kedua"><strong>Badai Sino Jendrang</strong></td>
            <td width="200px" class="kedua"><strong></strong></td>
            <td width="200px" class="kedua"><strong></strong></td>

            @elseif($lasthistoryC->status == 'reviewed')
            <td width="200px" class="kedua"><strong>Badai Sino Jendrang</strong></td>
            <td width="200px" class="kedua"><strong></strong></td>
            <td width="200px" class="kedua"><strong></strong></td>

            @elseif($lasthistoryC->status == 'checked')
            <td width="200px" class="kedua"><strong>Badai Sino Jendrang</strong></td>
            <td width="200px" class="kedua"><strong></strong></td>
            <td width="200px" class="kedua"><strong></strong></td>

            @elseif($lasthistoryC->status == 'secured')
            <td width="200px" class="kedua"><strong>Badai Sino Jendrang</strong></td>
            <td width="200px" class="kedua"><strong>{{ $cleaningHistory[2]->name }}</strong></td>
            <td width="200px" class="kedua"><strong></strong></td>

            @elseif($lasthistoryC->status == 'final')
            <td width="200px" class="kedua"><strong>Badai Sino Jendrang</strong></td>
            <td width="200px" class="kedua"><strong>{{ $cleaningHistory[2]->name }}</strong></td>
            <td width="200px" class="kedua"><strong>{{ $cleaningHistory[3]->name }}</strong></td>
            @endif
        </tr>

        <tr>
            <td width="200px" class="kedua">Requestor</td>
            <td width="200px" class="kedua">Security</td>
            <td width="200px" class="kedua">Head of Data Center Operation</td>
        </tr>
    </table>

        <h5 class="kedua">On public holiday signatory will be handled by appointed Data Center Operation Shift Engineer on duty</h5>
        <h5 class="kedua">**(Pada hari libur Nasional tanda tangan akan diwakilkan kepetugas operasional yang ditunjuk)</h5>
    </div>

    <div style="page-break-after: always;">
        <h5 class="center">CHANGE REQUEST FORM</h5>
        <p class="kedua"><b>Nomor : CRF/001/DCDV/XI/2019</b></p>

        <p class="tujuh">
            1. Background and Objectives
        </p>
        <p class="tujuh">
            {{$cleaning->cleaning_background}}
        </p>
        <p class="tujuh">
            2. Description of Scope of Work
        </p>
        <p class="tujuh">
            {{$cleaning->cleaning_describ}}
        </p>
        <p class="tujuh">
            3. Detail Time Table of All Activity
            <table width="700px">
                <thead>
                    <tr >
                        <th  class="kedua">Date</th>
                        <th  class="kedua">Time</th>
                        <th  class="kedua">Activity Description</th>
                        <th  class="kedua">Detail Service Impact</th>
                    </tr>
                </thead>
                <tbody>
                    <tr >
                        <td class="tengah">{{$cleaning->validity_from}}</td>
                        <td class="tengah">{{$cleaning->cleaning_time_1}}</td>
                        <td class="tengah">{{$cleaning->cleaning_procedure_1}}</td>
                        <td class="tengah">{{$cleaning->cleaning_risk_1}}</td>
                    </tr>
                    <tr >
                        <td class="tengah">{{$cleaning->validity_from}}</td>
                        <td class="tengah">{{$cleaning->cleaning_time_2}}</td>
                        <td class="tengah">{{$cleaning->cleaning_procedure_2}}</td>
                        <td class="tengah">{{$cleaning->cleaning_risk_2}}</td>
                    </tr>
                    <tr >
                        <td class="tengah">{{$cleaning->validity_from}}</td>
                        <td class="tengah">{{$cleaning->cleaning_time_3}}</td>
                        <td class="tengah">{{$cleaning->cleaning_procedure_3}}</td>
                        <td class="tengah">{{$cleaning->cleaning_risk_3}}</td>
                    </tr>
                    <tr >
                        <td class="tengah">{{$cleaning->validity_from}}</td>
                        <td class="tengah">{{$cleaning->cleaning_time_4}}</td>
                        <td class="tengah">{{$cleaning->cleaning_procedure_4}}</td>
                        <td class="tengah">{{$cleaning->cleaning_risk_4}}</td>
                    </tr>
                    <tr >
                        <td class="tengah">{{$cleaning->validity_from}}</td>
                        <td class="tengah">{{$cleaning->cleaning_time_5}}</td>
                        <td class="tengah">{{$cleaning->cleaning_procedure_5}}</td>
                        <td class="tengah">{{$cleaning->cleaning_risk_5}}</td>
                    </tr>
                </tbody>
            </table>
        </p>
        <p class="tujuh">
            4. Detail Operation and Execution
            <table width="700px">
                <thead>
                    <tr>
                        <th class="kedua">Time</th>
                        <th  class="kedua">Item</th>
                        <th  class="kedua">Working Procedure</th>
                    </tr>
                </thead>
                <tbody>
                    <tr >
                        <td class="tengah">{{$cleaning->cleaning_time_1}}</td>
                        <td class="tengah">{{$cleaning->cleaning_item_1}}</td>
                        <td class="tengah">{{$cleaning->cleaning_procedure_1}}</td>
                    </tr>
                    <tr >
                        <td class="tengah">{{$cleaning->cleaning_time_2}}</td>
                        <td class="tengah">{{$cleaning->cleaning_item_2}}</td>
                        <td class="tengah">{{$cleaning->cleaning_procedure_2}}</td>
                    </tr>
                    <tr >
                        <td class="tengah">{{$cleaning->cleaning_time_3}}</td>
                        <td class="tengah">{{$cleaning->cleaning_item_3}}</td>
                        <td class="tengah">{{$cleaning->cleaning_procedure_3}}</td>
                    </tr>
                    <tr >
                        <td class="tengah">{{$cleaning->cleaning_time_4}}</td>
                        <td class="tengah">{{$cleaning->cleaning_item_4}}</td>
                        <td class="tengah">{{$cleaning->cleaning_procedure_4}}</td>
                    </tr>
                    <tr >
                        <td class="tengah">{{$cleaning->cleaning_time_5}}</td>
                        <td class="tengah">{{$cleaning->cleaning_item_5}}</td>
                        <td class="tengah">{{$cleaning->cleaning_procedure_5}}</td>
                    </tr>
                </tbody>
            </table>
        </p>
        <p class="tujuh">
            5. Risk and Service Area Impact
            <table  width="700px">
                <thead>
                    <tr>
                        <th  class="kedua">Risk Description</th>
                        <th  class="kedua">Possibility</th>
                        <th  class="kedua">Impact</th>
                        <th class="kedua">Mitigation Plan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr >
                        <td class="tengah">{{$cleaning->cleaning_risk_1}}</td>
                        <td class="tengah">{{$cleaning->cleaning_possibility_1}}</td>
                        <td class="tengah">{{$cleaning->cleaning_impact_1}}</td>
                        <td class="tengah">{{$cleaning->cleaning_mitigation_1}}</td>
                    </tr>
                    <tr >
                        <td class="tengah">{{$cleaning->cleaning_risk_2}}</td>
                        <td class="tengah">{{$cleaning->cleaning_possibility_2}}</td>
                        <td class="tengah">{{$cleaning->cleaning_impact_2}}</td>
                        <td class="tengah">{{$cleaning->cleaning_mitigation_2}}</td>
                    </tr>
                    <tr >
                        <td class="tengah">{{$cleaning->cleaning_risk_3}}</td>
                        <td class="tengah">{{$cleaning->cleaning_possibility_3}}</td>
                        <td class="tengah">{{$cleaning->cleaning_impact_3}}</td>
                        <td class="tengah">{{$cleaning->cleaning_mitigation_3}}</td>
                    </tr>
                    <tr >
                        <td class="tengah">{{$cleaning->cleaning_risk_4}}</td>
                        <td class="tengah">{{$cleaning->cleaning_possibility_4}}</td>
                        <td class="tengah">{{$cleaning->cleaning_impact_4}}</td>
                        <td class="tengah">{{$cleaning->cleaning_mitigation_4}}</td>
                    </tr>
                    <tr >
                        <td class="tengah">{{$cleaning->cleaning_risk_5}}</td>
                        <td class="tengah">{{$cleaning->cleaning_possibility_5}}</td>
                        <td class="tengah">{{$cleaning->cleaning_impact_5}}</td>
                        <td class="tengah">{{$cleaning->cleaning_mitigation_5}}</td>
                    </tr>
                    <tr >
                        <td class="tengah">{{$cleaning->cleaning_risk_6}}</td>
                        <td class="tengah">{{$cleaning->cleaning_possibility_6}}</td>
                        <td class="tengah">{{$cleaning->cleaning_impact_6}}</td>
                        <td class="tengah">{{$cleaning->cleaning_mitigation_6}}</td>
                    </tr>
                </tbody>
            </table>
        </p>

        <p class="tujuh">
            6. Testing and Verification
        </p>
        <p class="tujuh">
            {{$cleaning->cleaning_testing}}
        </p>
        <p class="tujuh">
            7. Rollback Operation
        </p>
        <p class="tujuh">
            {{$cleaning->cleaning_rollback}}
        </p>
        <p class="tujuh">
            8. Person In Charge
            <table width="700px">
                <thead>
                    <tr>
                        <th  class="kedua">Name</th>
                        <th  class="kedua">Company</th>
                        <th  class="kedua">Responsibility</th>
                        <th  class="kedua">Mobile Number</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="tengah">{{$cleaning->cleaning_name_1}}</th>
                        <th class="tengah">PT Bijac</th>
                        <th class="tengah">Cleaner</th>
                        <th class="tengah">{{$cleaning->cleaning_number_1}}</th>
                    </tr>
                    <tr>
                        <th class="tengah">{{$cleaning->cleaning_name_2}}</th>
                        <th class="tengah">PT Bijac</th>
                        <th class="tengah">Cleaner</th>
                        <th class="tengah">{{$cleaning->cleaning_number_2}}</th>
                    </tr>
                    {{-- <tr>
                        <th class="tengah">{{$cleaning->cleaning_name_3}}</th>
                        <th class="tengah">{{$cleaning->cleaning_pt_3}}</th>
                        <th class="tengah"> </th>
                        <th class="tengah">{{$cleaning->cleaning_number_3}}</th>
                    </tr>
                    <tr>
                        <th class="tengah">{{$cleaning->cleaning_name_4}}</th>
                        <th class="tengah">{{$cleaning->cleaning_pt_4}}</th>
                        <th class="tengah"> </th>
                        <th class="tengah">{{$cleaning->cleaning_number_4}}</th>
                    </tr> --}}
                </tbody>
            </table>
        </p>
        <div class="marginbottom">
        <p class="tujuh">
            9. Supporting Documents
        </p>
    </div>

        <div >
            <table  width="700px">
                <tr>
                    <td ><b>Prepared by:</b></td>
                    <td >Badai Sino Jendrang</td>
                    <td >  </td>
                    <td ><b>Date</b></td>
                    <td>{{$cleaning->created_at}}</td>
                </tr>
                @if($lasthistoryC->status == 'reviewed')
                <tr>
                    <td><b>Reviewed by:</b></td>
                    <td >{{$cleaningHistory[0]->name}}</td>
                    <td ><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 40px;"></td></td>
                    <td ><b>Date</b></td>
                    <td>{{$cleaningHistory[0]->created_at}}</td>
                </tr>
                <tr>
                    <td><b>Checked by:</b></td>
                    <td ></td>
                    <td >  </td>
                    <td ><b>Date</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>Approved by:</b></td>
                    <td ></td>
                    <td >  </td>
                    <td ><b>Date</b></td>
                    <td></td>
                </tr>
                @endif
                @if($lasthistoryC->status == 'checked')
                <tr>
                    <td><b>Reviewed by:</b></td>
                    <td >{{$cleaningHistory[0]->name}}</td>
                    <td ><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                    <td width="50px"><b>Date</b></td>
                    <td>{{$cleaningHistory[0]->created_at}}</td>
                </tr>
                <tr>
                    <td><b>Checked by:</b></td>
                    <td >{{$cleaningHistory[1]->name}}</td>
                    <td ><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                    <td ><b>Date</b></td>
                    <td>{{$cleaningHistory[1]->created_at}}</td>
                </tr>
                <tr>
                    <td><b>Approved by:</b></td>
                    <td ></td>
                    <td >  </td>
                    <td ><b>Date</b></td>
                    <td></td>
                </tr>
                @endif
                @if($lasthistoryC->status == 'secured')
                <tr>
                    <td><b>Reviewed by:</b></td>
                    <td >{{$cleaningHistory[0]->name}}</td>
                    <td ><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                    <td ><b>Date</b></td>
                    <td>{{$cleaningHistory[0]->created_at}}</td>
                </tr>
                <tr>
                    <td><b>Checked by:</b></td>
                    <td >{{$cleaningHistory[1]->name}}</td>
                    <td ><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                    <td ><b>Date</b></td>
                    <td>{{$cleaningHistory[1]->created_at}}</td>
                </tr>
                <tr>
                    <td><b>Approved by:</b></td>
                    <td ></td>
                    <td >  </td>
                    <td ><b>Date</b></td>
                    <td></td>
                </tr>
                @endif
                @if($lasthistoryC->status == 'final')
                <tr>
                    <td><b>Reviewed by:</b></td>
                    <td >{{$cleaningHistory[0]->name}}</td>
                    <td ><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                    <td ><b>Date</b></td>
                    <td>{{$cleaningHistory[0]->created_at}}</td>
                </tr>
                <tr>
                    <td><b>Checked by:</b></td>
                    <td >{{$cleaningHistory[1]->name}}</td>
                    <td ><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                    <td ><b>Date</b></td>
                    <td>{{$cleaningHistory[1]->created_at}}</td>
                </tr>
                <tr>
                    <td><b>Approved by:</b></td>
                    <td >{{$cleaningHistory[3]->name}}</td>
                    <td ><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                    <td ><b>Date</b></td>
                    <td>{{$cleaningHistory[3]->created_at}}</td>
                </tr>
                @endif
            </table>
        </div>

    </main>

</body>
</html>
