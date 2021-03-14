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
    </style>
    <center>
        <h5>ACCESS REQUEST FORM</h5>
        <h5>Nomor : ARF/001/DCDV/XI/2019</h5>
    </center>

    <table class='table table-bordered'>
        <tr><td>Time of Request : {{$survey->created_at}}</td></tr>
        <tr><td>Purpose of Work : {{$survey->purpose_work}}</td></tr>
    </table>

    <table class='table table-bordered'>
        <tr>
            <td colspan="2"><b>Requestor Bali Tower</b></td>
        </tr>
        <tr>
            <td>Name :</td>
            <td>Phone Number : </td>
        </tr>
        <tr>
            <td colspan="2">Department :</td>
    </table>

    <table class='table table-bordered'>
        <tr>
            <td colspan="2"><b>Visitor</b></td>
        </tr>
        <tr>
            <td>Name : {{$survey->visitor_name}}</td>
            <td>ID : {{$survey->visitor_id}}</td>
        </tr>
        <tr>
            <td>Company : {{$survey->visitor_company}}</td>
            <td>Phone Number : {{$survey->visitor_phone}}</td>
        </tr>
        <tr>
            <td colspan="2">Department : {{$survey->visitor_department}}</td>
        </tr>
    </table>

        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>Requestor By</th>
                    <th>Checked By</th>
                    <th>Security</th>
                    <th>Dept.Head</th>
                </tr>
            </thead>

            <tbody>
                    <tr>
                        @switch($lasthistory->status)
                            @case('reviewed')
                                <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                                @break

                            @case('checked')
                                <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                                <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                                @break

                            @case('secured')
                                <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                                <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                                <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                                @break

                            @case('final')
                                <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                                <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                                <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                                <td><img src="{{ public_path("gambar/approved.png") }}" alt="" style="width: 100px; height: 50px;"></td>
                                @break
                            @endswitch
                    </tr>

                    @if($lasthistory->status != 'created')
                    <tr>
                        @foreach($surveyHistory as $p)
                        <td><strong>{{ $p->name }}</strong></td>
                        @endforeach
                    </tr>
                    @endif

                </tbody>
            </table>
        </body>
        </html>
