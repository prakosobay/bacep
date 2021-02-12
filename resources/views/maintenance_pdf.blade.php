<!DOCTYPE html>
<html>
<head>
    <title>Maintenance Data Center</title>
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
        <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No. </th>
                <th>Time of Request</th>
                <th>Tanggal</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Purpose Work</th>
                <th>Nama Visitor</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($survey as $p)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{$p->created_at}}</td>
                <td>{{$p->date}}</td>
                <td>{{$p->months}}</td>
                <td>{{$p->year}}</td>
                <td>{{$p->purpose_work}}</td>
                <td>{{$p->visitor_name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
