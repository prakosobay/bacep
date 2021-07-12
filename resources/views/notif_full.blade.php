<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifikasi Full Approval</title>

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
    <h2>Dear All,</h2>
	<h3>Terlampir link permit cleaning yang sudah Full Approval</h3>
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
    </table>
    {{-- http://127.0.0.1:8000/cleaning_pdf/$cleaning->cleaning_id --}}
        {{-- <p><a href="http://127.0.0.1:8000/cleaning_pdf/$cleaning['cleaning_id']">Klik tautan ini untuk melihat permit</a></p> --}}
        <p><a href="http://127.0.0.1:8000/cleaning_pdf/$data->cleaning_id">Klik tautan ini untuk melihat permit</a></p>
</body>
</html>
