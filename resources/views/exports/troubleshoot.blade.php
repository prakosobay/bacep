<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Purpose of Work</th>
            <th>Date of Visit</th>
            <th>Date of Leave</th>
            <th>Visitor Name</th>
            <th>Visitor Company</th>
            <th>Visitor Phone</th>
            <th>Checkin</th>
            <th>Checkout</th>
            <th>Access Request</th>
            <th>Change Request</th>
        </tr>
    </thead>
    <tbody>
    @foreach($fulls as $p)
        <tr>
            <td>{{ $p->troubleshoot_bm_id }}</td>
            <td>{{ $p->work }}</td>
            <td>{{ $p->visit }}</td>
            <td>{{ $p->leave }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->company }}</td>
            <td>{{ $p->phone }}</td>
            <td>{{ $p->checkin }}</td>
            <td>{{ $p->checkout }}</td>
            <td>AR/{{ $p->number_ar }}/{{ $p->month_ar }}/{{ $p->year_ar }}</td>
            <td>CR/{{ $p->number_cr }}/{{ $p->month_cr }}/{{ $p->year_cr }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
