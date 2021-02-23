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

    <div>
    <table class='table table-bordered'>
        <tr><td><b>No. </b>{{$survey->survey_id}}</td></tr>
        <tr><td><b>Time of Request : </b>{{$survey->created_at}}</td></tr>
        <tr><td><b>Purpose of Work : </b>{{$survey->purpose_work}}</td></tr>
    </table>
    </div>

    @if($lasthistory->status == 'reviewed')
    <p>
        <img src="{{ public_path('gambar/approved2.jpg') }}" style="width: 50px; height: 50px">
    </p>
    @elseif($lasthistory->status == 'checked')
    <p>
        <img src="{{ public_path('gambar/approved2.jpg') }}" style="width: 50px; height: 50px">
    </p>
    @elseif($lasthistory->status == 'secured')
    <p>
        <img src="{{ public_path('gambar/approved2.jpg') }}" style="width: 50px; height: 50px">
    </p>
    @elseif($lasthistory->status == 'boss')
        <img src="{{ public_path('gambar/approved2.jpg') }}" style="width: 50px; height: 50px">
    @endif
</body>
</html>
