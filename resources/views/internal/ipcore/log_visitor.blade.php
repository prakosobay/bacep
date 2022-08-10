@extends('layouts.internal_full_visitor')

@section('content')
@push('scripts')
<script>
    $(function() {
        $('#ipcore_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('internal/ipcore/yajra/full/visitor')}}',
            columns: [
                { data: 'work', name: 'internals.work' },
                { data: 'req_name', name: 'internals.req_name' },
                { data: 'visit', name: 'internals.visit' },
                { data: 'leave', name: 'internals.leave' },
                { data: 'name', name: 'internal_visitors.name' },
                { data: 'checkin', name: 'internal_visitors.checkin' },
                { data: 'checkout', name: 'internal_visitors.checkout' },
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endsection
