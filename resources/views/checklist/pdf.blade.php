<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checklist Genset</title>
</head>
<style>
    @page {
        margin: 0.5cm 0.5cm;
    }

    /** Define now the real margins of every page in the PDF **/
    body {
        margin-top: 0.3cm;
        margin-left: 0.5cm;
        margin-right: 0.5cm;
        margin-bottom: 0.3cm;
    }

    .page_break+.page_break {
        page-break-before: always;
    }

    .table-bordered,
    .col_header {
        border-spacing: 0.5px;
        border: 1px solid black;
        width: 100%;
        font-size: 9pt;
        margin: 1px;
        padding: 1px;
    }

    .table-bordered,
    .col_footer {
        border-spacing: 0.5px;
        border: 1px solid black;
        width: 100%;
        font-size: 8pt;
        text-align: center;
        margin: 1px;
        padding: 1px;
        margin-bottom: 0.1cm;
        margin-top: 10px;
    }
</style>
<body>
    <main>
        <div style="page-break-after: always;">
            <h2 class="text-center"><strong>Form Pengecekan Genset</strong></h2>
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th><strong>No. </strong></th>
                        <th><strong>Deskripsi</strong></th>
                        <th><strong>Uni Status</strong></th>
                        <th><strong>Remarks</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1. </td>
                        <td>Tighten Battery Connection</td>
                        @if($genset->input1 == '0')
                        <td>NOT OK</td>
                        @elseif($genset->input1 == '1')
                        <td>OK</td>
                        @endif
                        <td>{{$genset->remark1}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>
