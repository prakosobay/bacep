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
        <h4>ACCESS REQUEST FORM</h4>
        <h4>Nomor : ARF/001/DCDV/XI/2019</h4>
    </center>

    <table class='table table-bordered'>
        <tr><td><b>Time of Request : </b>{{$survey->created_at}}</td></tr>
        <tr><td><b>No. </b>{{$survey->survey_id}}</td></tr>
        <tr><td><b>Purpose of Work : </b>{{$survey->purpose_work}}</td></tr>
        <tr><td><b>Visitor Name : </b>{{$survey->visitor_name}}</td></tr>
    </table>

        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>Review</th>
                    <th>Check</th>
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
