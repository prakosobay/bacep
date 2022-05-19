<table>
    <thead>
        <tr>
            <th rowspan="2">No. </th>
            <th rowspan="2">Kegiatan</th>
            <th colspan="2">Tanggal</th>
            <th colspan="5">Visitor 1</th>
            <th colspan="5">Visitor 2</th>
            <th rowspan="2">Status</th>
        </tr>
        <tr>
            <th>Visit</th>
            <th>Leave</th>
            <th>Nama</th>
            <th>Checkin</th>
            <th>Photo Checkin</th>
            <th>Checkout</th>
            <th>Photo Checkout</th>
            <th>Nama</th>
            <th>Checkin</th>
            <th>Photo Checkin</th>
            <th>Checkout</th>
            <th>Photo Checkout</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($excel_log as $p)
            <tr>
                <td></td>
                <td>{{$p->cleaning_work}}</td>
                <td>{{$p->validity_from}}</td>
                <td>{{$p->date_of_leave}}</td>
                <td>{{$p->cleaning_name}}</td>
                <td>{{$p->checkin_personil}}</td>
                <td></td>
                <td>{{$p->checkout_personil}}</td>
                <td></td>
                <td>{{$p->cleaning_name2}}</td>
                <td>{{$p->checkin_personil2}}</td>
                <td></td>
                <td>{{$p->checkout_personil2}}</td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>
