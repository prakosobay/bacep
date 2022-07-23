@extends('layouts.internal_full_visitor')

@section('content')
@push('scripts')
<script>
$(function() {
    $('#it_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url('internal/it/yajra/full/visitor')}}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'work', name: 'work' },
            { data: 'visit', name: 'visit' },
            { data: 'leave', name: 'leave' },
            { data: 'checkin', name: 'checkin' },
            { data: 'checkout', name: 'checkout' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endsection
