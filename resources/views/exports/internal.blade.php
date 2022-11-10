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
    @foreach($internals as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->internal->work }}</td>
            <td>{{ $p->internal->requestor->name }}</td>
            <td>{{ $p->internal->visit }}</td>
            <td>{{ $p->internal->leave }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->phone }}</td>
            <td>{{ $p->nik }}</td>
            <td>{{ $p->company }}</td>
            <td>{{ $p->department }}</td>
            <td>{{ $p->checkin }}</td>
            <td>{{ $p->checkout }}</td>
            <td>AR/{{ $p->internal->ar_internal->number }}/{{ $p->internal->ar_internal->month }}/{{ $p->internal->ar_internal->year }}</td>

            @if($p->internal->cr_internal)
                <td>CR/{{ $p->internal->cr_internal->number }}/{{ $p->internal->cr_internal->month }}/{{ $p->internal->cr_internal->year }}</td>
            @else
                <td>-</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
