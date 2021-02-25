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
        <tr><td><b>Visitor Name : </b>{{$survey->visitor_name}}</td></tr>
    </table>
    </div>

    {{-- <div>
    <table class='table table-bordered'>
        <tr><td><b>Status        : </b>{{$surveyHistory->status}}</td></tr>
        <tr><td><b>Approved By  : </b>{{$surveyHistory->role_to}}</td></tr>
    </table>
    </div> --}}

    {{-- @if($surveyHistory->status == 'reviewed')
    <table class='table table-bordered'>
        <tr><td><b> Reviewed By : </b><img src="{{asset('gambar/approved2.jpg')}}" alt="Logo" height="75px"></td></tr>
    </table>
    @endif --}}

</body>
</html>
