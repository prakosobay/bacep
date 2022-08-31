<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifikasi Web Permit</title>

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
    <h2>Dear Team{{ $content->req_dept }},</h2>
	<h3>Mohon maaf permit yang anda ajukan tidak dapat kami proses, mohon untuk mengajukan permit baru pada tautan di bawah ini.</h3>
    <table>
        <thead>
            <tr>
                <th>No. Permit</thead>
                <th>Date of Request</th>
                <th>Requestor Name</th>
                <th>Purpose of Work</th>
                <th>Date of Visit</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $content->id }}</td>
                <td>{{ Carbon\Carbon::parse($content->created_at)->format('d-m-Y')  }}</td>
                <td>{{ $content->req_name }}</td>
                <td>{{ $content->work }}</td>
                <td>{{ Carbon\Carbon::parse($content->visit)->format('d-m-Y') }}</td>
                <td>{{ $content->reject_note }}</td>
            </tr>
        </tbody>
    </table>
    <p><a href="http://dcops.balifiber.id">Klik tautan ini untuk login</a></p>
</body>
</html>
