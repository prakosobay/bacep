<!DOCTYPE html>
<html lang="en">
<head>
    <title>Maintenance PDF</title>
    <style>
        @page {
            margin: 0.5cm 0.5cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 0.3cm;
            margin-left: 0.5cm;
            margin-right: 0.5cm;
            margin-bottom: 0.5cm;
        }

        .table-visitor {
            border: 2px solid black;
            border-collapse: collapse;
            font-size: 10pt;
            width: 100%;
            margin-top: 10px;
        }

        .table-grey {
            text-align: center;
            background-color: grey;
            border: 1px solid black;
        }

        .table-content{
            text-align: center;
            border: 1px solid black;
        }

        .page_break+.page_break {
            page-break-before: always;
        }
    </style>

</head>
<body>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <table cellpadding="5" class="table-visitor">
            <tr class="table-grey">
                <td class="table-grey" rowspan="2"><b>No.</b></td>
                <td class="table-grey" rowspan="2"><b>Kegiatan</b></td>
                <td class="table-grey" colspan="2"><b>Tanggal</b></td>
                <td class="table-grey" colspan="5"><b>Visitor</b></td>
            </tr>
            <tr class="table-grey">
                <td class="table-grey"><b>Visit</b></td>
                <td class="table-grey"><b>Leave</b></td>
                <td class="table-grey"><b>Nama</b></td>
                <td class="table-grey"><b>Checkin</b></td>
                <td class="table-grey"><b>Photo</b></td>
                <td class="table-grey"><b>Checkout</b></td>
                <td class="table-grey"><b>Photo</b></td>
            </tr>Carbon\Carbon::parse($v->other->visit)->format('d-m-Y H:i')
            @foreach ( $maintenances as $v )
                <tr class="table-content">
                    <td class="table-content" >{{ $loop->iteration }}</td>
                    <td class="table-content" >{{$v->other->work}}</td>
                    <td class="table-content" >{{ Carbon\Carbon::parse($v->other->visit)->format('d-m-Y') }}</td>
                    <td class="table-content" >{{ Carbon\Carbon::parse($v->other->leave)->format('d-m-Y') }}</td>
                    <td class="table-content">{{ $v->name }}</td>
                    <td class="table-content">{{ $v->checkin }}</td>
                    <td class="table-content"><img src="{{ public_path("storage/bm/maintenance/checkin". '/' . $v->photo_checkin) }}" alt="" style="width: 100px; height: 100px;"></td>
                    <td class="table-content">{{ $v->checkout }}</td>
                    <td class="table-content"><img src="{{ public_path("storage/bm/maintenance/checkout". '/' . $v->photo_checkout) }}" alt="" style="width: 100px; height: 100px;"></td>
                </tr>
            @endforeach
        </table>
    </main>
</body>
</html>
