<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cleaning PDF</title>
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
        {{-- <div style="page-break-after: always;"> --}}
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
                </tr>
                @foreach ($getCleaning as $p)
                    <tr class="table-content">
                        <td class="table-content" rowspan="2">{{ $p->cleaning_id }}</td>
                        <td class="table-content" rowspan="2">{{$p->cleaning_work}}</td>
                        <td class="table-content" rowspan="2">{{$p->cleaning->validity_from}}</td>
                        <td class="table-content" rowspan="2">{{$p->cleaning->validity_to}}</td>
                        <td class="table-content" >{{$p->cleaning_name}}</td>
                        <td class="table-content" >{{$p->checkin_personil}}</td>
                        <td class="table-content" ><img src="{{ storage_path("app/public/bm/cleaning/checkin". '/' . $p->photo_checkin_personil) }}" alt="" style="width: 100px; height: 100px;"></td>
                        <td class="table-content" >{{$p->checkout_personil}}</td>
                        <td class="table-content" ><img src="{{ storage_path("app/public/bm/cleaning/checkout". '/' . $p->photo_checkout_personil) }}" alt="" style="width: 100px; height: 100px;"></td>
                    </tr>
                    <tr class="table-content">
                        <td class="table-content" >{{$p->cleaning_name2}}</td>
                        <td class="table-content">{{$p->checkin_personil2}}</td>
                        <td class="table-content" ><img src="{{ storage_path("app/public/bm/cleaning/checkin". '/' . $p->photo_checkin_personil2) }}" alt="" style="width: 100px; height: 100px;"></td>
                        <td class="table-content">{{$p->checkout_personil2}}</td>
                        <td class="table-content" ><img src="{{ storage_path("app/public/bm/cleaning/checkout". '/' . $p->photo_checkout_personil2) }}" alt="" style="width: 100px; height: 100px;"></td>
                    </tr>
                @endforeach
            </table>
        {{-- </div> --}}
    </main>
</body>
</html>
