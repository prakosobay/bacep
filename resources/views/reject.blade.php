<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Notify</title>

<style>
    /* table{
        border-collapse: collapse;
        width: 300px;
    }
    th,td{
        border: 2px solid black;
        padding: 15px;
    } */
    table, th, td {
            border-width: 300px;
            border-spacing: 0px;
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 10pt;
            margin: 5px;
            padding: 7px;
		}
</style>
</head>

<body>
    <h1>Dear Bapak/Ibu,</h1>
	<h2>Mohon maaf permit yang anda ajukan tidak dapat kami proses, mohon untuk mengajukan permit baru pada tautan di bawah ini.</h2>
    <table>
        <tr>
            <td>No Permit</td>
            <td>{{ $nama }}</td>
        </tr>
        <tr>
            <td>Tanggal Pekerjaan</td>
            <td>{{ $pesan }}</td>
        </tr>
        <tr>
            <td>Tujuan Pekerjaan</td>
            <td>  </td>
        </tr>
    </table>
        <p><a href="http://172.16.45.239:8000">http://172.16.45.239:8000/approval/all</a></p>
</body>
</html>
