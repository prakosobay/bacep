<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log Book Eksternal</title>
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

        .table-detail {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 9pt;
            width: 100%;
            margin-top: 10px;
        }

        .table-center {
            text-align: center;
            border: 1px solid black;
            border-collapse: collapse;
        }

        .page_break+.page_break {
            page-break-before: always;
        }
    </style>
</head>
<body>

    <main>
        <div style="page-break-after: always;">
            <table class="table table-detail">
                <tr>
                    <th class="table-center" rowspan="2">No.</th>
                    <th class="table-center" rowspan="2">Work</th>
                    <th class="table-center" rowspan="2">Requestor</th>
                    <th class="table-center" rowspan="2">Visit</th>
                    <th class="table-center" rowspan="2">Leave</th>
                    <th class="table-center" colspan="8">Visitor</th>
                </tr>
                <tr>
                    <th class="table-center">Name</th>
                    <th class="table-center">Company</th>
                    <th class="table-center">Dept</th>
                    <th class="table-center">Phone</th>
                    <th class="table-center">Checkin</th>
                    <th class="table-center">Photo Checkin</th>
                    <th class="table-center">Checkout</th>
                    <th class="table-center">Photo Checkout</th>
                </tr>
                @foreach ( $eksternals as $p )
                    <tr>
                        <td class="table-center">{{ $loop->iteration }}</td>
                        <td class="table-center">{{ $p->eksternal->work }}</td>
                        <td class="table-center">{{ $p->eksternal->requestor->name }}</td>
                        <td class="table-center">{{ $p->eksternal->visit }}</td>
                        <td class="table-center">{{ $p->eksternal->leave }}</td>
                        <td class="table-center">{{ $p->name }}</td>
                        <td class="table-center">{{ $p->company }}</td>
                        <td class="table-center">{{ $p->department }}</td>
                        <td class="table-center">{{ $p->phone }}</td>
                        <td class="table-center">{{ $p->checkin }}</td>
                        <td class="table-center">
                            <img src="{{ public_path('storage/eksternal/checkin/'.$p->photo_checkin) }}" width="180px" height="180px">
                        </td>
                        <td class="table-center">{{ $p->checkout }}</td>
                        <td class="table-center">
                            <img src="{{ public_path('storage/eksternal/checkout/'.$p->photo_checkout) }}" width="180px" height="180px">
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </main>
</body>
</html>
