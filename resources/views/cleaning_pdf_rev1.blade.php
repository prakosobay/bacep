<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cleaning PDF</title>

    <style>
        @page {
                margin: 0.5cm 0.5cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 3cm;
                margin-left: 1cm;
                margin-right: 1cm;
                margin-bottom: 1cm;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0.5cm;
                right: 0.5cm;
                height: 3cm;
                text-align: center;
            }

            /** Define the footer rules **/
            footer {
                position: fixed;
                bottom: 0.1cm;
                height: 1cm;
                left: 0.5cm;
                right: 0.5cm;
                text-align: center;
            }

            .table-bordered, td{
                border-spacing: 0.5px;
                border: 1px solid black;
                /* border-collapse: collapse; */
                font-size: 8pt;
                width: 100%;
                margin: 1px;
                padding: 1px;
            }

            /* td{
                border: 1px solid black;
                margin: 5px;
                padding: 7px;
            } */

            .table-hover{
                border: 1px solid;
                font-size: 8pt;
            }

            .text_header{
                text-align: center;
                font-size: 10pt;
            }

            .text_footer{
                text-align: center;
                font-size: 8pt;
            }

            .img-fluid{
                height: 40px;
                width: 110px;
            }


            .page_break + .page_break{
            page-break-before: always;
            }
    </style>
</head>
<body>
    <header>
        <table class="table table-bordered">
            <tr >
                <td rowspan="2" ><img src="{{ public_path("gambar/bts_logo.jpg") }}" class="img-fluid" alt="logo_bts"></td>
                <td class="text_header"><b>FORM</b></td>
                <td ><b>Kode Dokumen : FRM-BTS-DCDV-2021-04</b></td>
            </tr>
            <tr>
                <td class="text_header"><b>Access Request</b></td>
                <td ><b>Tanggal Berlaku : 18 Mei 2021</b></td>
            </tr>
        </table>
    </header>

    <footer>
        <table class="table table-bordered">
            <tr>
                <td class="text_footer">Kode Dok: FRM-BTS-DCDV-2019-04</td>
                <td class="text_footer">Revisi : 01</td>
                <td class="text_footer"><font color="red">Kategori : Dokumen Terbatas</font></td>
                <td class="text_footer">Hal : 1/1</td>
            </tr>
        </table>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <div style="page-break-after: always;">
            <table class="table table-hover">
                <tr >
                    <td ><b>Time of Request</b></td>
                    <td >: {{$cleaning->created_at}}</td>
                </tr>
                <tr >
                    <td ><b>Access Request Number: </b></td>
                    <td >: {{$cleaning->cleaning_id}}</td>
                </tr>
                <tr >
                    <td ><b>Purpose of Work</b></td>
                    <td >: {{$cleaning->cleaning_work}}</td>
                </tr>
            </table>
        </div>
    </main>
</body>
</html>
