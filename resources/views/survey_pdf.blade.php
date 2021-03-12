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
        <h5>Nomor : ARF/001/DCDV/XI/2019 </h5>
    </center>

    <table class="table table-bordered" cellspacing="1">
        <tr><td>Time of Request : {{$survey->created_at}}</td></tr>
        <tr><td>Purpose of Work : {{$survey->purpose_work}}</td></tr>
    </table>

    <table class="table table-bordered" cellspacing="1">
        <label>Bali Tower Requestor</label>
        <tr>
            <td>Name : {{$surveyHistory->name}}</td>
            {{-- <td>Phone Number : {{$surveyHistory as $p}}</td> --}}
        </tr>
        <tr>
            <td>Department : {{$surveyHistory->name}}</td>
        </tr>
    </table>

    <table cellspacing="1" class="table table-bordered">
        <tr>
            <td>Name : {{$survey->visitor_name}}</td>
            <td>ID Number : {{$survey->visitor_id}}</td>
        </tr>
        <tr>
            <td>Company : {{$survey->visitor_company}}</td>
            <td>Phone Number : {{$survey->visitor_phone}}</td>
        </tr>
        <tr><td>Department : {{$survey->visitor_department}}</td></tr>
    </table>

    <table cellspacing="1" class="table table-bordered">
        <tr>
            <td>
    </table>

    <table cellspacing="1" class="table table-bordered">
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
                    <td>{{ $p->name }}</td>
                    @endforeach
                </tr>
                @endif

            </tbody>
        </table>
    </body>
    </html>
