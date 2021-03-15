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
            font-size: 9pt;
        }

        .nmr{
            font-size:9pt;
        }
    </style>

    <center>
        <h5>ACCESS REQUEST FORM</h5>
        <h5 class="nmr">Nomor : ARF/001/DCDV/XI/2019</h5>
    </center>

    <table class='table table-bordered' width="600px">
        <tr>
            <td width="100px">Time of Request</td>
            <td width="500px">: {{$survey->created_at}}</td>
        </tr>
        <tr>
            <td width="100px">Purpose of Work</td>
            <td width="500px">: {{$survey->purpose_work}}</td>
        </tr>
    </table>

    <table class='table table-bordered' width="600px">
        <tr>
            <td colspan="2"><b>Bali Tower Requestor </b></td>
        </tr>
        <tr>
            <td width="100px">Name</td>
            <td width="200px">: </td>
            <td width="100px">Phone Number</td>
            <td width="200px">: </td>
        </tr>
        <tr>
            <td>Department</td>
            <td colspan="2">: </td>
    </table>

    <table class='table table-bordered' width="600px">
        <tr>
            <td colspan="2"><b>VISITOR</b></td>
        </tr>
        <tr>
            <td width="100px">Name</td>
            <td width="200px">: {{$survey->visitor_name}}</td>
            <td width="100px">ID</td>
            <td width="200px">: {{$survey->visitor_id}}</td>
        </tr>
        <tr>
            <td width="100px">Company</td>
            <td width="200px">: {{$survey->visitor_company}}</td>
            <td width="100px">Phone Number</td>
            <td width="200px">: {{$survey->visitor_phone}}</td>
        </tr>
        <tr>
            <td>Department</td>
            <td colspan="2">: {{$survey->visitor_department}}</td>
        </tr>
    </table>

    <table class='table table-bordered' width="600px">
        <tr height="10px">
            <td width="200 px" colspan="2"><b>Authorized Entry Area :</b></td>
            <td width="200px"><b>Access Type : </b></td>
        </tr>
        <tr height="10px">
            <td width="200px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 10;"><label>  Server Room</label></td>
            <td width="200px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 10;"><label>  Generator Room</label></td>
            <td width="200px"><label>General Access  </label><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 10;"></td>
        </tr>
        <tr height="10px">
            <td width="200px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 10;"><label>  MMR 1</label></td>
            <td width="200px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 10;"><label>  Panel Room</label></td>
            <td width="200px"><label>Limited Access  </label><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 10;"></td>
        </tr>
        <tr height="10px">
            <td width="200px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 10;"><label>  MMR 2</label></td>
            <td width="200px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 10;"><label>  Battery Room</label></td>
            <td width="200px"><label>Escorted Access  </label><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 10;"></td>
        </tr>
        <tr height="10px">
            <td width="200px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 10;"><label>  UPS Room</label></td>
            <td width="200px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 10;"><label>  FSS Room</label></td>
            <td width="200px"><b>Validity :</td>
        </tr>
        <tr height="10px">
            <td width="200px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 10;"><label>  Office 2nd FL</label></td>
            <td width="200px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 10;"><label>  Office 3rd FL</label></td>
            <td width="200px"><b>From :</td>
        </tr>
        <tr height="10px">
            <td width="200px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 10;"><label>  Yard</label></td>
            <td width="200px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 10;"><label>  Trafo Room</label></td>
            <td width="200px"><b>To :</td>
        </tr>
        <tr height="10px">
            <td width="200px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 10;"><label>  Others :</label></td>
            <td width="200px"><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 20px; height: 10;"><label>  Parking Lot</label></td>
        </tr>
    </table>

    <table class='table table-bordered' width="600px">
        <thead>
            <tr>
                <th>Requestor By</th>
                <th>Approved By</th>
                <th>Security</th>
            </tr>
        </thead>

        <tbody>
                <tr>
                    @switch($lasthistory->status)
                        @case('reviewed')
                            <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                            @break

                        {{-- @case('checked')
                            <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                            @break --}}

                        @case('final')
                            <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                            <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                            <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                            <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                            @break

                        @case('secured')
                            <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                            <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                            <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                            @break

                    @endswitch
                </tr>

                {{-- <tr>
                    @if($lasthistory->status == 'created')
                    <td><b>{{$surveyHsitory->name}}</b></td>
                    @endif
                </tr> --}}
                {{-- @if($lasthistory->status == 'created')
                <tr>
                    @foreach($surveyHistory as $p)
                    <td><strong>{{ $p->name }}</strong></td>
                    @endforeach
                </tr>
                @endif --}}
            </tbody>
        </table>
    </body>
</html>
