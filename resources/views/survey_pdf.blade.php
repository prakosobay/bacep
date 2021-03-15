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

    <table class='table table-bordered'>
        <tr>
            <td>Time of Request</td>
            <td>:</td>
            <td>{{$survey->created_at}}</td>
        </tr>
        <tr>
            <td>Purpose of Work</td>
            <td>:</td>
            <td>{{$survey->purpose_work}}</td>
        </tr>
    </table>

    <table class='table table-bordered'>
        <tr>
            <td colspan="2"><b>Bali Tower Requestor </b></td>
        </tr>
        <tr>
            <td>Name</td>
            <td>:</td>
            <td></td>
            <td>Phone Number</td>
            <td>:</td>
            <td></td>
        </tr>
        <tr>
            <td>Department</td>
            <td colspan="2"> : </td>
    </table>

    <table class='table table-bordered'>
        <tr>
            <td colspan="2"><b>VISITOR</b></td>
        </tr>
        <tr>
            <td>Name</td>
            <td>:</td>
            <td>{{$survey->visitor_name}}</td>
            <td>ID</td>
            <td>:</td>
            <td>{{$survey->visitor_id}}</td>
        </tr>
        <tr>
            <td>Company</td>
            <td>:</td>
            <td>{{$survey->visitor_company}}</td>
            <td>Phone Number</td>
            <td>:</td>
            <td>{{$survey->visitor_phone}}</td>
        </tr>
        <tr>
            <td>Department</td>
            <td>:</td>
            <td>{{$survey->visitor_department}}</td>
        </tr>
    </table>

    <table class='table table-bordered'>
        <tr>
            <td colspan="2"><b>Authorized Entry Area :</b></td>
            <td><b>Access Type : </b></td>
        </tr>
        <tr>
            <td><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 15px; height: 5px;"><p>Server Room</p></td>
            <td><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 15px; height: 5px;"><p>Generator Room</p></td>
            <td><p>General Access  </p><img src="{{ public_path("gambar/kotak.png") }}" alt="" style="width: 15px; height: 5px;"></td>
        </tr>
        {{-- <tr>
            <td><input type='checkbox' name='lokasi3' value='mmr1' >MMR 1</td>
            <td><input type='checkbox' name='lokasi4' value='panel'>Panel Room</td>
            <td><input type='checkbox' name='akses2' value='limited'>Limited Access</td>
        </tr>
        <td>
            <td><input type='checkbox' name='lokasi5' value='mmr2' >MMR 1</td>
            <td><input type='checkbox' name='lokasi6' value='battery'>Battery Room</td>
            <td><input type='checkbox' name='akses3' value='escorted'>Escorted Access</td>
        </tr>
        <tr>
            <td><input type='checkbox' name='lokasi7' value='ups' >UPS Room</td>
            <td><input type='checkbox' name='lokasi8' value='battery'>Battery Room</td>
            <td><b>Validity</b></td>
        </tr>
        <tr>
            <td><input type='checkbox' name='lokasi9' value='office_2nd' >Office 2nd FL</td>
            <td><input type='checkbox' name='lokasi10' value='office_3rd'>Office 3rd FL</td>
            <td><b>From :</b></td>
        </tr>
        <tr>
            <td><input type='checkbox' name='lokasi11' value='yard' checked='checked'>Yard</td>
            <td><input type='checkbox' name='lokasi12' value='trafo_room'>Trafo Room</td>
            <td><b>To :</b></td>
        </tr>
        <tr>
            <td><input type='checkbox' name='lokasi13' value='others' checked='checked'>Others :</td>
            <td><input type='checkbox' name='lokasi14' value='parking_lot'>Parking Lot</td>
        </tr> --}}
    </table>

        <table class='table table-bordered'>
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
