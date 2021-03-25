<!DOCTYPE html>
<html>
<head>
    <title>Survey Data Center</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <style type="text/css">
        table tr td,
        table tr th{
            font-size: 7pt;
        }

        .nmr{
            font-size:8pt;
            text-align: center;
        }

        .center{
            text-align: center;
            text-size: 9pt;
        }

        @page {
            margin-top: 0.5cm;
            margin-bottom: 0.5cm;
        }

    </style>

        <h5 class="center">ACCESS REQUEST FORM</h5>
        <h5 class="nmr">Nomor : ARF/001/DCDV/XI/2019</h5>

    <table class='table table-bordered' width="600px" height="30px">
        <tr height="10px">
            <td width="100px">Time of Request</td>
            <td width="500px">: {{$survey->created_at}}</td>
        </tr>
        <tr height="10px">
            <td width="100px">No. </td>
            <td width="500px">:</td>
        </tr>
        <tr height="10px">
            <td width="100px">Purpose of Work</td>
            <td width="500px">: {{$survey->purpose_work}}</td>
        </tr>
    </table>

    <table class='table table-bordered' width="600px" height="30px">
        <tr height="10px">
            <td colspan="2"><b>Bali Tower Requestor </b></td>
        </tr>
        <tr height="10px">
            <td width="100px">Name</td>
            <td width="200px">: {{$surveyHistory[0]->name}}</td>
            <td width="100px">Phone Number</td>
            <td width="200px">: </td>
        </tr>
        <tr height="10px">
            <td>Department</td>
            <td colspan="2">: </td>
    </table>

    <table class='table table-bordered' width="600px" height="40px">
        <tr height="10px">
            <td colspan="2"><b>VISITOR</b></td>
        </tr>
        <tr height="10px">
            <td width="100px">Name</td>
            <td width="200px">: {{$survey->visitor_name}}</td>
            <td width="100px">ID</td>
            <td width="200px">: {{$survey->visitor_id}}</td>
        </tr>
        <tr height="10px">
            <td width="100px">Company</td>
            <td width="200px">: {{$survey->visitor_company}}</td>
            <td width="100px">Phone Number</td>
            <td width="200px">: {{$survey->visitor_phone}}</td>
        </tr>
        <tr height="10px">
            <td>Department</td>
            <td colspan="2">: {{$survey->visitor_department}}</td>
        </tr>
    </table>

    <table class='table table-bordered' width="600px" height="175px">
        <tr height="10px">
            <td width="150px" colspan="2"><b>Authorized Entry Area :</b></td>
            <td width="150px"><b>Access Type : </b></td>
        </tr>
        <tr height="10px">
            <td width="150px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 8px;">   Server Room</td>
            <td width="150px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 8px;">   Generator Room</td>
            <td>General Access</td>
            <td><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 8px;"></td>
        </tr>
        <tr height="10px">
            <td width="150px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 8px;">   MMR 1</td>
            <td width="150px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 8px;">   Panel Room</td>
            <td>Limited Access</td>
            <td><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 8px;"></td>
        </tr>
        <tr height="10px">
            <td width="150px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 8px;">   MMR 2</td>
            <td width="150px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 8px;">   Battery Room</td>
            <td>Escorted Access</td>
            <td><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 8px;"></td>
        </tr>
        <tr height="10px">
            <td width="150px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 8px;">   UPS Room</td>
            <td width="150px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 8px;">   FSS Room</td>
            <td>  </td>
            <td>  </td>
        </tr>
        <tr height="10px">
            <td width="150px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 8px;">   Office 2nd FL</td>
            <td width="150px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 8px;">   Office 3rd FL</td>
            <td width="150px"><b>Validity :</td>
            </tr>
            <tr height="10px">
                <td width="150px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 8px;">   Yard</td>
                <td width="150px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 8px;">   Trafo Room</td>
                <td><b>From</td>
                <td> : </td>
            </tr>
            <tr height="10px">
                <td width="150px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 8px;">   Others :</td>
                <td width="150px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 8px;">   Parking Lot</td>
                <td><b>To</td>
            <td> : </td>
        </tr>
    </table>

    <table class='table table-bordered' width="600px" height="80px">
        <thead>
            <tr height="10px">
                <th>Requestor By</th>
                <th>Security</th>
                <th>Approved By</th>
            </tr>
        </thead>

        <tbody>
                <tr height="80px">
                    @switch($lasthistory->status)
                        @case('reviewed')
                            <td height="40px"> </td>
                            @break

                        {{-- @case('checked')
                            <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                            @break --}}

                        @case('secured')
                                <td height="40px"></td>
                                <td><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                                <td height="40px"></td>
                                @break

                        @case('final')
                            <td height="40px"></td>
                            <td><img src="{{ public_path("gambar/Checked.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                            <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 80px; height: 40px;"></td>
                            @break
                    @endswitch
                </tr>

                @if($lasthistory->status != 'checked')
                <tr>
                        @foreach($surveyHistory as $p)
                        <td><strong>{{ $p->name }}</strong></td>
                        @endforeach
                </tr>
                @endif

            </tbody>
        </table>

            <h5 class="nmr">On public holiday signatory will be handled by appointed Data Center Operation Shift Engineer on duty</h5>
            <h5 class="nmr">**(Pada hari libur Nasional tanda tangan akan diwakilkan kepetugas operasional yang ditunjuk)</h5>

    </body>
    </html>

    {{-- <tr>
        @if($lasthistory->status == 'created')
        <td><b>{{$surveyHsitory->name}}</b></td>
        @endif
    </tr> --}}
