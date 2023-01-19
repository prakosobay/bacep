<table>
    <thead>
        <tr>
            <th rowspan="2">ID</th>
            <th rowspan="2">Purpose of Work</th>
            <th rowspan="2">Date of Visit</th>
            <th rowspan="2">Date of Leave</th>
            <th colspan="3">Visitor 1</th>
            <th colspan="3">Visitor 2</th>
            {{-- <th colspan="2">Nomor Permit</th> --}}
        </tr>
        <tr>
            <th>Name</th>
            <th>Checkin </th>
            <th>Checkout </th>
            <th>Name</th>
            <th>Checkin</th>
            <th>Checkout</th>
            {{-- <th>Access Request</th>
            <th>Change Request</th> --}}
        </tr>
    </thead>
    <tbody>
    @foreach($fulls as $p)
        <tr>
            <td>{{ $p->cleaning_id }}</td>
            <td>{{ $p->cleaning_work }}</td>
            <td>{{ $p->validity_from }}</td>
            <td>{{ $p->leave }}</td>
            <td>{{ $p->cleaning_name }}</td>
            <td>{{ $p->checkin_personil }}</td>
            <td>{{ $p->checkout_personil }}</td>
            <td>{{ $p->cleaning_name2 }}</td>
            <td>{{ $p->checkin_personil2 }}</td>
            <td>{{ $p->checkout_personil2 }}</td>
            {{-- <td>AR/{{ $p->number_ar }}/{{ $p->month_ar }}/{{ $p->year_ar }}</td>
            <td>CR/{{ $p->number_cr }}/{{ $p->month_cr }}/{{ $p->year_cr }}</td> --}}
        </tr>
    @endforeach
    </tbody>
</table>
