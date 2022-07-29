@extends('layouts.internal_full_visitor')

@section('content')
<script>
    $(function() {
        $('#it_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('internal/ipcore/yajra/full/visitor')}}',
            columns: [
                { data: 'id', name: 'internals.id' },
                { data: 'work', name: 'internals.work' },
                { data: 'visit', name: 'internals.visit' },
                { data: 'leave', name: 'internals.leave' },
                { data: 'name', name: 'internal_visitors.name' },
                { data: 'company', name: 'internal_visitors.company' },
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endsection
