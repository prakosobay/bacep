<table>
    <thead>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Purpose of Work</th>
            <th rowspan="2">Requestor</th>
            <th rowspan="2">Date of Visit</th>
            <th rowspan="2">Date of Leave</th>
            <th colspan="7">Visitor</th>
            <th colspan="2">Nomor Permit</th>
        </tr>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Nik</th>
            <th>Company</th>
            <th>Department</th>
            <th>Checkin </th>
            <th>Checkout </th>
            <th>Access Request</th>
            <th>Change Request</th>
        </tr>
    </thead>
    <tbody>
    @foreach($eksternals as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->eksternal->work }}</td>
            <td>{{ $p->eksternal->requestor->name }}</td>
            <td>{{ $p->eksternal->visit }}</td>
            <td>{{ $p->eksternal->leave }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->phone }}</td>
            <td>{{ $p->nik }}</td>
            <td>{{ $p->company }}</td>
            <td>{{ $p->department }}</td>
            <td>{{ $p->checkin }}</td>
            <td>{{ $p->checkout }}</td>
            <td>AR/{{ $p->eksternal->ar_eksternal->number }}/{{ $p->eksternal->ar_eksternal->month }}/{{ $p->eksternal->ar_eksternal->year }}</td>
            <td>CR/{{ $p->eksternal->cr_eksternal->number }}/{{ $p->eksternal->cr_eksternal->month }}/{{ $p->eksternal->cr_eksternal->year }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
