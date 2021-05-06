<!DOCTYPE html>
<html>
<head>
    <title>Cleaning Data Center</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <style type="text/css">
        /* table tr td,
        table tr th{
            border: 1px solid black;
            font-size: 10pt;
            border-collapse: collapse;

        } */
        table.satu{
            border-width: 700px;
            border-spacing: 0px;
            padding: 3px;
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
        }

        .page_break + .page_break{
            page-break-before: always;
        }

        @page {
            margin-top: 0.4cm;
            margin-bottom: 0.4cm;
        }
    </style>
</head>
<body>

<div style="page-break-after: always;">
        <h5 class="center">ACCESS REQUEST FORM</h5>
        <h5 text-align="center">Nomor : ARF/001/DCDV/XI/2019</h5>

    <table class="satu" cellspacing="0" cellpadding="2" width="700px">
        <tr >
            <td width="100px"><b>Time of Request</b></td>
            <td >: {{$cleaning->created_at}}</td>
        </tr>
        <tr >
            <td width="100px"><b>No. </b></td>
            <td >: {{$cleaning->cleaning_id}}</td>
        </tr>
        <tr >
            <td width="100px"><b>Purpose of Work</b></td>
            <td >: {{$cleaning->cleaning_work}}</td>
        </tr>
    </table>

    <table cellspacing="0" cellpadding="2"  width="700px">
        <tr >
            <td  colspan="4"><b>Bali Tower Requestor </b></td>
        </tr>
        <tr >
            <td width="100px"><b>Name</b></td>
            <td width="300px">: Badai Sino Jendrang</td>
            <td width="100px"><b>Phone Number</b></td>
            <td >: 0822-1028-2228</td>
        </tr>
        <tr >
            <td width="100px"><b>Department</b></td>
            <td colspan="3">: Building Management</td>
    </table>

    <table cellspacing="0" cellpadding="2"  width="700px">
        <tr >
            <td  colspan="4"><b>Visitor</b></td>
        </tr>
        <tr >
            <td width="100px"><b>Name</b></td>
            <td width="300px">: {{$cleaning->cleaning_name_1}} & {{$cleaning->cleaning_name_2}}</td>
            <td width="100px"><b>ID</b></td>
            <td >: {{$cleaning->cleaning_id_1}} & {{$cleaning->cleaning_id_2}}</td>
        </tr>
        <tr >
            <td width="100px"><b>Company</b></td>
            <td >: PT Bijac</td>
            <td ><b>Phone Number</b></td>
            <td >: {{$cleaning->cleaning_number_1}} & {{$cleaning->cleaning_number_2}}</td>
        </tr>
        <tr >
            <td width="100px"><b>Department</b></td>
            <td colspan="4">: Cleaner</td>
        </tr>
    </table>

    <table cellspacing="0" cellpadding="2"  width="700px">
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

    <table style="width:100%">
        <tr>
            @switch($lasthistoryC->status)
                @case('created')
                    <td width="200px" height="40px"> </td>
                    @break

                {{-- @case('checked')
                    <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                    @break --}}

                @case('secured')
                        <td width="200px" height="40px"></td>
                        <td width="200px" class="nmr"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                        <td width="200px" height="40px"></td>
                        @break

                @case('final')
                    <td width="200px" height="40px"></td>
                    <td width="200px" class="nmr"><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                    <td width="200px" class="nmr"><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                    @break
            @endswitch
        </tr>

        <tr height="7px">
            @if($lasthistoryC->status == 'created')
            <td width="200px" class="nmr"><strong>Badai Sino Jendrang</strong></td>
            <td width="200px" class="nmr"><strong></strong></td>
            <td width="200px" class="nmr"><strong></strong></td>

            @elseif($lasthistoryC->status == 'reviewed')
            <td width="200px" class="nmr"><strong>Badai Sino Jendrang</strong></td>
            <td width="200px" class="nmr"><strong></strong></td>
            <td width="200px" class="nmr"><strong></strong></td>

            @elseif($lasthistoryC->status == 'checked')
            <td width="200px" class="nmr"><strong>Badai Sino Jendrang</strong></td>
            <td width="200px" class="nmr"><strong></strong></td>
            <td width="200px" class="nmr"><strong></strong></td>

            @elseif($lasthistoryC->status == 'secured')
            <td width="200px" class="nmr"><strong>Badai Sino Jendrang</strong></td>
            <td width="200px" class="nmr"><strong>{{ $cleaningHistory[2]->name }}</strong></td>
            <td width="200px" class="nmr"><strong></strong></td>

            @elseif($lasthistoryC->status == 'final')
            <td width="200px" class="nmr"><strong>Badai Sino Jendrang</strong></td>
            <td width="200px" class="nmr"><strong>{{ $cleaningHistory[2]->name }}</strong></td>
            <td width="200px" class="nmr"><strong>{{ $cleaningHistory[3]->name }}</strong></td>
            @endif
        </tr>

        <tr>
            <td width="200px" class="nmr">Requestor</td>
            <td width="200px" class="nmr">Security</td>
            <td width="200px" class="nmr">Head of Data Center Operation</td>
        </tr>
    </table>

        <h5 class="nmr">On public holiday signatory will be handled by appointed Data Center Operation Shift Engineer on duty</h5>
        <h5 class="nmr">**(Pada hari libur Nasional tanda tangan akan diwakilkan kepetugas operasional yang ditunjuk)</h5>

    </div>
    <div style="page-break-after: always;">
        <h5 class="center">CHANGE REQUEST FORM</h5>
        <h5 class="nmr">Nomor : CRF/001/DCDV/XI/2019</h5>

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
            <table class='table table-bordered' width="600px">
                <thead>
                    <tr >
                        <th width="50px" class="nmr">Date</th>
                        <th width="70px" class="nmr">Time</th>
                        <th width="190px" class="nmr">Activity Description</th>
                        <th width="190px" class="nmr">Detail Service Impact</th>
                    </tr>
                </thead>
                <tbody>
                    <tr >
                        <td class="nmr">{{$cleaning->validity_from}}</td>
                        <td class="nmr">{{$cleaning->cleaning_time_1}}</td>
                        <td class="nmr">{{$cleaning->cleaning_procedure_1}}</td>
                        <td class="nmr">{{$cleaning->cleaning_risk_1}}</td>
                    </tr>
                    <tr >
                        <td class="nmr">{{$cleaning->validity_from}}</td>
                        <td class="nmr">{{$cleaning->cleaning_time_2}}</td>
                        <td class="nmr">{{$cleaning->cleaning_procedure_2}}</td>
                        <td class="nmr">{{$cleaning->cleaning_risk_2}}</td>
                    </tr>
                    <tr >
                        <td class="nmr">{{$cleaning->validity_from}}</td>
                        <td class="nmr">{{$cleaning->cleaning_time_3}}</td>
                        <td class="nmr">{{$cleaning->cleaning_procedure_3}}</td>
                        <td class="nmr">{{$cleaning->cleaning_risk_3}}</td>
                    </tr>
                    <tr >
                        <td class="nmr">{{$cleaning->validity_from}}</td>
                        <td class="nmr">{{$cleaning->cleaning_time_4}}</td>
                        <td class="nmr">{{$cleaning->cleaning_procedure_4}}</td>
                        <td class="nmr">{{$cleaning->cleaning_risk_4}}</td>
                    </tr>
                    <tr >
                        <td class="nmr">{{$cleaning->validity_from}}</td>
                        <td class="nmr">{{$cleaning->cleaning_time_5}}</td>
                        <td class="nmr">{{$cleaning->cleaning_procedure_5}}</td>
                        <td class="nmr">{{$cleaning->cleaning_risk_5}}</td>
                    </tr>
                </tbody>
            </table>
        </p>
        <p class="tujuh">
            4. Detail Operation and Execution
            <table class='table table-bordered' width="600px">
                <thead>
                    <tr>
                        <th width="70px" class="nmr">Time</th>
                        <th width="230px" class="nmr">Item</th>
                        <th width="200px" class="nmr">Working Procedure</th>
                    </tr>
                </thead>
                <tbody>
                    <tr >
                        <td class="nmr">{{$cleaning->cleaning_time_1}}</td>
                        <td class="nmr">{{$cleaning->cleaning_item_1}}</td>
                        <td class="nmr">{{$cleaning->cleaning_procedure_1}}</td>
                    </tr>
                    <tr >
                        <td class="nmr">{{$cleaning->cleaning_time_2}}</td>
                        <td class="nmr">{{$cleaning->cleaning_item_2}}</td>
                        <td class="nmr">{{$cleaning->cleaning_procedure_2}}</td>
                    </tr>
                    <tr >
                        <td class="nmr">{{$cleaning->cleaning_time_3}}</td>
                        <td class="nmr">{{$cleaning->cleaning_item_3}}</td>
                        <td class="nmr">{{$cleaning->cleaning_procedure_3}}</td>
                    </tr>
                    <tr >
                        <td class="nmr">{{$cleaning->cleaning_time_4}}</td>
                        <td class="nmr">{{$cleaning->cleaning_item_4}}</td>
                        <td class="nmr">{{$cleaning->cleaning_procedure_4}}</td>
                    </tr>
                    <tr >
                        <td class="nmr">{{$cleaning->cleaning_time_5}}</td>
                        <td class="nmr">{{$cleaning->cleaning_item_5}}</td>
                        <td class="nmr">{{$cleaning->cleaning_procedure_5}}</td>
                    </tr>
                </tbody>
            </table>
        </p>
        <p class="tujuh">
            5. Risk and Service Area Impact
            <table class='table table-bordered' width="600px">
                <thead>
                    <tr>
                        <th width="120px" class="nmr">Risk Description</th>
                        <th width="220px" class="nmr">Possibility</th>
                        <th width="80px" class="nmr">Impact</th>
                        <th width="180px" class="nmr">Mitigation Plan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr >
                        <td class="nmr">{{$cleaning->cleaning_risk_1}}</td>
                        <td class="nmr">{{$cleaning->cleaning_possibility_1}}</td>
                        <td class="nmr">{{$cleaning->cleaning_impact_1}}</td>
                        <td class="nmr">{{$cleaning->cleaning_mitigation_1}}</td>
                    </tr>
                    <tr >
                        <td class="nmr">{{$cleaning->cleaning_risk_2}}</td>
                        <td class="nmr">{{$cleaning->cleaning_possibility_2}}</td>
                        <td class="nmr">{{$cleaning->cleaning_impact_2}}</td>
                        <td class="nmr">{{$cleaning->cleaning_mitigation_2}}</td>
                    </tr>
                    <tr >
                        <td class="nmr">{{$cleaning->cleaning_risk_3}}</td>
                        <td class="nmr">{{$cleaning->cleaning_possibility_3}}</td>
                        <td class="nmr">{{$cleaning->cleaning_impact_3}}</td>
                        <td class="nmr">{{$cleaning->cleaning_mitigation_3}}</td>
                    </tr>
                    <tr >
                        <td class="nmr">{{$cleaning->cleaning_risk_4}}</td>
                        <td class="nmr">{{$cleaning->cleaning_possibility_4}}</td>
                        <td class="nmr">{{$cleaning->cleaning_impact_4}}</td>
                        <td class="nmr">{{$cleaning->cleaning_mitigation_4}}</td>
                    </tr>
                    <tr >
                        <td class="nmr">{{$cleaning->cleaning_risk_5}}</td>
                        <td class="nmr">{{$cleaning->cleaning_possibility_5}}</td>
                        <td class="nmr">{{$cleaning->cleaning_impact_5}}</td>
                        <td class="nmr">{{$cleaning->cleaning_mitigation_5}}</td>
                    </tr>
                    <tr >
                        <td class="nmr">{{$cleaning->cleaning_risk_6}}</td>
                        <td class="nmr">{{$cleaning->cleaning_possibility_6}}</td>
                        <td class="nmr">{{$cleaning->cleaning_impact_6}}</td>
                        <td class="nmr">{{$cleaning->cleaning_mitigation_6}}</td>
                    </tr>
                </tbody>
            </table>
        </p>
    </div>

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
            <table class='table table-bordered' width="600px">
                <thead>
                    <tr>
                        <th width="150px" class="nmr">Name</th>
                        <th width="150px" class="nmr">Company</th>
                        <th width="150px" class="nmr">Responsibility</th>
                        <th width="150px" class="nmr">Mobile Number</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="nmr">{{$cleaning->cleaning_name_1}}</th>
                        <th class="nmr">{{$cleaning->cleaning_pt_1}}</th>
                        <th class="nmr">Cleaner</th>
                        <th class="nmr">{{$cleaning->cleaning_number_1}}</th>
                    </tr>
                    <tr>
                        <th class="nmr">{{$cleaning->cleaning_name_2}}</th>
                        <th class="nmr">{{$cleaning->cleaning_pt_2}}</th>
                        <th class="nmr">Cleaner</th>
                        <th class="nmr">{{$cleaning->cleaning_number_2}}</th>
                    </tr>
                    <tr>
                        <th class="nmr">{{$cleaning->cleaning_name_3}}</th>
                        <th class="nmr">{{$cleaning->cleaning_pt_3}}</th>
                        <th class="nmr"> </th>
                        <th class="nmr">{{$cleaning->cleaning_number_3}}</th>
                    </tr>
                    <tr>
                        <th class="nmr">{{$cleaning->cleaning_name_4}}</th>
                        <th class="nmr">{{$cleaning->cleaning_pt_4}}</th>
                        <th class="nmr"> </th>
                        <th class="nmr">{{$cleaning->cleaning_number_4}}</th>
                    </tr>
                </tbody>
            </table>
        </p>
        <div class="marginbottom">
        <p class="tujuh">
            9. Supporting Documents
        </p>
        </div>

        <div >
            <table class='table table-bordered' width="600px">
                <tr>
                    <td width="70px"><b>Prepared by:</b></td>
                    <td width="200px">Badai Sino Jendrang</td>
                    <td >  </td>
                    <td width="50px"><b>Date</b></td>
                    <td>{{$cleaning->created_at}}</td>
                </tr>
                @if($lasthistoryC->status == 'reviewed')
                <tr>
                    <td><b>Reviewed by:</b></td>
                    <td width="200px">{{$cleaningHistory[0]->name}}</td>
                    <td ><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 40px;"></td></td>
                    <td width="50px"><b>Date</b></td>
                    <td>{{$cleaningHistory[0]->created_at}}</td>
                </tr>
                <tr>
                    <td><b>Checked by:</b></td>
                    <td width="200px"></td>
                    <td >  </td>
                    <td ><b>Date</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>Approved by:</b></td>
                    <td width="200px"></td>
                    <td >  </td>
                    <td ><b>Date</b></td>
                    <td></td>
                </tr>
                @endif
                @if($lasthistoryC->status == 'checked')
                <tr>
                    <td><b>Reviewed by:</b></td>
                    <td width="200px">{{$cleaningHistory[0]->name}}</td>
                    <td ><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                    <td width="50px"><b>Date</b></td>
                    <td>{{$cleaningHistory[0]->created_at}}</td>
                </tr>
                <tr>
                    <td><b>Checked by:</b></td>
                    <td width="200px">{{$cleaningHistory[1]->name}}</td>
                    <td ><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                    <td ><b>Date</b></td>
                    <td>{{$cleaningHistory[1]->created_at}}</td>
                </tr>
                <tr>
                    <td><b>Approved by:</b></td>
                    <td width="200px"></td>
                    <td >  </td>
                    <td ><b>Date</b></td>
                    <td></td>
                </tr>
                @endif
                @if($lasthistoryC->status == 'secured')
                <tr>
                    <td><b>Reviewed by:</b></td>
                    <td width="200px">{{$cleaningHistory[0]->name}}</td>
                    <td ><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                    <td width="50px"><b>Date</b></td>
                    <td>{{$cleaningHistory[0]->created_at}}</td>
                </tr>
                <tr>
                    <td><b>Checked by:</b></td>
                    <td width="200px">{{$cleaningHistory[1]->name}}</td>
                    <td ><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                    <td ><b>Date</b></td>
                    <td>{{$cleaningHistory[1]->created_at}}</td>
                </tr>
                <tr>
                    <td><b>Approved by:</b></td>
                    <td width="200px"></td>
                    <td >  </td>
                    <td ><b>Date</b></td>
                    <td></td>
                </tr>
                @endif
                @if($lasthistoryC->status == 'final')
                <tr>
                    <td><b>Reviewed by:</b></td>
                    <td width="200px">{{$cleaningHistory[0]->name}}</td>
                    <td ><img src="{{ public_path("gambar/Reviewed.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                    <td width="50px"><b>Date</b></td>
                    <td>{{$cleaningHistory[0]->created_at}}</td>
                </tr>
                <tr>
                    <td><b>Checked by:</b></td>
                    <td width="200px">{{$cleaningHistory[1]->name}}</td>
                    <td ><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                    <td ><b>Date</b></td>
                    <td>{{$cleaningHistory[1]->created_at}}</td>
                </tr>
                <tr>
                    <td><b>Approved by:</b></td>
                    <td width="200px">{{$cleaningHistory[3]->name}}</td>
                    <td ><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                    <td width="50px"><b>Date</b></td>
                    <td>{{$cleaningHistory[3]->created_at}}</td>
                </tr>
                @endif
            </table>
        </div>
</body>
</html>
