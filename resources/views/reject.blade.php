<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifikasi Reject</title>

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
                <th>Validity</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $data->cleaning_id }}</td>
                <td>{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y')  }}</td>
                <td>{{ $data->cleaning_work }}</td>
                <td>{{ Carbon\Carbon::parse($data->validity_from)->format('d-m-Y') }}</td>
            </tr>
        </tbody>

        {{-- <tr>
            <td>No Permit</td>
            <td>{{ $data->cleaning_id }}</td>
        </tr>
        <tr>
            <td>Tanggal Pekerjaan</td>
            <td>{{ Carbon\Carbon::parse($data->validity_from)->format('d-m-Y')  }}</td>
        </tr>
        <tr>
            <td>Tujuan Pekerjaan</td>
            <td>{{ $data->cleaning_work }}</td>
        </tr> --}}
    </table>
        <p><a href="http://172.16.45.195:8000">http://172.16.45.195:8000</a></p>
</body>
</html>
