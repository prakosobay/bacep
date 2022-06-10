<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifikasi Reject Permit Maintenance</title>

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
    <h2>Dear Bapak Sino,</h2>
	<h3>Mohon maaf permit yang anda ajukan tidak dapat kami proses, mohon untuk mengajukan permit baru pada tautan di bawah ini.</h3>
    <table>
        <thead>
            <tr>
                <th>No. Permit</thead>
                <th>Date of Request</th>
                <th>Purpose of Work</th>
                <th>Date of Visit</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y')  }}</td>
                <td>{{ $data->work }}</td>
                <td>{{ Carbon\Carbon::parse($data->visit)->format('d-m-Y') }}</td>
            </tr>
        </tbody>
    </table>
        <p><a href="http://dcops.balifiber.id">Klik tautan ini untuk login</a></p>
</body>
</html>
