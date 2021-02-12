<!DOCTYPE html>
<html>
<head>
    <title>Mounting Data Center</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <center>
            <h4>ACCESS REQUEST FORM</h4>
            <h4>Nomor : ARF/001/DCDV/XI/2019</h4>
            <h5>
        <br/>
        <a href="/mounting_pdf" class="btn btn-primary" target="_blank">LIHAT PDF</a>
        <table class='table table-bordered'>
            {{-- <thead> --}}

                @foreach($mounting as $p)
                <tr>
                    <td><b>Time of Request : </b>{{$p->created_at}}</td>
                </tr>
                <tr>
                    <td><b>Purpose of Work : </b>{{$p->purpose_work}}</td>
                </tr>@endforeach
        </table>

        <table class='table table-bordered'>
            {{-- <thead> --}}
                <label>Requestor</label>
                @foreach($mounting as $p)
                <tr><td><b>Name             : </b>{{$p->visitor_name}}</td></tr>
                <tr><td><b>Department  : </b>{{$p->visitor_department}}</td></tr>
                @endforeach
        </table>

        <center>
            <h4>CHANGE REQUEST FORM</h4>
            <h4>Nomor : CRF/001/DCDV/XI/2019</h4>
            <h5>
        <br/>
    </div>
</body>
</html>
