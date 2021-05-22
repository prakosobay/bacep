<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cleaning PDF</title>

    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">

</head>
<body>
    <header>
        <table class="table table-bordered">
            <tr >
                <td class="col_header" rowspan="2" ><img src="{{ public_path("gambar/bts_logo.jpg") }}" class="img-fluid" alt="logo_bts"></td>
                <td class="col_header"><font size="10pt"><b>FORM</b></font></td>
                <td class="col_header"><b>Kode Dokumen : FRM-BTS-DCDV-2021-04</b></td>
            </tr>
            <tr>
                <td class="col_header"><font size="10pt"><b>Access Request</b></font></td>
                <td class="col_header"><b>Tanggal Berlaku : 18 Mei 2021</b></td>
            </tr>
        </table>
    </header>

    <footer>
        <table class="table table-bordered">
            <tr>
                <td class="col_footer">Kode Dok: FRM-BTS-DCDV-2019-04</td>
                <td class="col_footer">Revisi : 01</td>
                <td class="col_footer"><font color="red">Kategori : Dokumen Terbatas</font></td>
                <td class="col_footer">Hal : 1/1</td>
            </tr>
        </table>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <div style="page-break-after: always;">
            <table class="table table-hover">
                <tr >
                    <td >Time of Request</td>
                    <td >: {{$cleaning->created_at}}</td>
                </tr>
                <tr >
                    <td >Access Request Number: </td>
                    <td >: {{$cleaning->cleaning_id}}</td>
                </tr>
                <tr >
                    <td >Purpose of Work</td>
                    <td >: {{$cleaning->cleaning_work}}</td>
                </tr>
            </table>
        </div>
    </main>
</body>
</html>
