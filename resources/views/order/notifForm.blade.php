<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consumable Form</title>
    <style>
        table, th, td {
                border-width: 300px;
                border-spacing: 0px;
                border: 3px solid black;
                border-collapse: collapse;
                font-size: 8pt;
                margin: 5px;
                padding: 7px;
            }
    </style>
</head>
<body>
    <div class="card">
        <h3 class="">Hallo, DC Team!</h3>
        <p>Mohon untuk review form consumable dari team {{$content->req_dept}} yang telah di submit.
            Link terlampir </p>
            <table>
                <thead>
                    <tr>
                        <th>Date of Request</th>
                        <th>Requestor Name</th>
                        <th>Requestor Dept</th>
                        <th>Requestor Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ Carbon\Carbon::parse($content->created_at)->format('d-m-Y')  }}</td>
                        <td>{{ $content->req_name  }}</td>
                        <td>{{ $content->req_dept  }}</td>
                        <td>{{ $content->req_phone  }}</td>
                    </tr>
                </tbody>
            </table>
        <p>Silahkan Login di  <a href="https://dcops.balifiber.id/approval/all">sini</a></p>
    </div>
</body>
</html>
