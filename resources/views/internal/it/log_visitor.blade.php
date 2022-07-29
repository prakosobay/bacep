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
            { data: 'id', name: 'internals.id' },
            { data: 'work', name: 'internals.work' },
            { data: 'visit', name: 'internals.visit' },
            { data: 'leave', name: 'internals.leave' },
            { data: 'checkin', name: 'internal_visitors.checkin' },
            { data: 'checkout', name: 'internal_visitors.checkout' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endsection
