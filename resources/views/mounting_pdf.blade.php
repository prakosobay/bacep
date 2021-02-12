<!DOCTYPE html>
<html>
<head>
    <title>Mounting Data Center</title>
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
        @foreach($mounting as $p)
        <tr><td><b>Time of Request : </b>{{$p->created_at}}</td></tr>
        <tr><td><b>Purpose of Work : </b>{{$p->purpose_work}}</td>
        </tr>@endforeach
    </table>

    <table class='table table-bordered'>
        <label>Requestor</label>
                @foreach($mounting as $p)
                <tr><td><b>Name             : </b>{{$p->visitor_name}}</td></tr>
                <tr><td><b>Department  : </b>{{$p->visitor_department}}</td></tr>
                @endforeach
    </table>


    <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
        }
    </style>
    <center>
        <h4>CHANGE REQUEST FORM</h4>
        <h4>Nomor : ARF/001/DCDV/XI/2019</h4>
    </center>
    <table class='table table-bordered'>
    </table>

</body>
</html>
