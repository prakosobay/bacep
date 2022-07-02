@extends('layouts.list_reject_bm')
@section('content')
<script>


$(function() {
    $('#maintenance_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url('other/maintenance/yajra/full/reject')}}',
        columns: [
            { data: 'other_id', name: 'other_id' },
            { data: 'visit', name: 'visit' },
            { data: 'work', name: 'work' },
            { data: 'note', name: 'note' },
        ]
    });
});

$(function() {
    $('#cleaning_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url('/cleaning/yajra/full/reject')}}',
        columns: [
            { data: 'cleaning_id', name: 'cleaning_id' },
            { data: 'validity_from', name: 'validity_from' },
            { data: 'cleaning_work', name: 'cleaning_work' },
            { data: 'cleaning_name', name: 'cleaning_name' },
            { data: 'note', name: 'note'},
        ]
    });
});

$(function() {
    $('#troubleshoot_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url('other/troubleshoot/yajra/full/reject')}}',
        columns: [
            { data: 'troubleshoot_bm_id', name: 'troubleshoot_bm_id' },
            { data: 'visit', name: 'visit' },
            { data: 'work', name: 'work' },
            { data: 'note', name: 'note'},
        ]
    });
});
</script>
@endsection
