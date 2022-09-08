@extends('layouts.log-visitor')

@section('content')
@push('scripts')
    <script>

        $(function() {
            $('#cleaning_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('yajra_full_approve_cleaning_other')}}',
                columns: [
                    { data: 'cleaning_id', name: 'cleaning_id' },
                    { data: 'validity_from', name: 'validity_from' },
                    { data: 'cleaning_work', name: 'cleaning_work' },
                    { data: 'cleaning_name', name: 'cleaning_name' },
                    { data: 'checkin_personil', name: 'checkin_personil' },
                    { data: 'checkout_personil', name: 'checkout_personil' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });

        $(function() {
            $('#maintenance_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('maintenanceYajraFullVisitor') }}',
                columns: [
                    { data: 'id', name: 'other_personils.id' },
                    { data: 'work', name: 'other_fulls.work' },
                    { data: 'visit', name: 'other_fulls.visit' },
                    { data: 'leave', name: 'other_fulls.leave' },
                    { data: 'name', name: 'other_personils.name' },
                    { data: 'checkin', name: 'other_personils.checkin' },
                    { data: 'checkout', name: 'other_personils.checkout' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });

        $(function() {
            $('#troubleshoot_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('other/troubleshoot/yajra/full/visitor')}}',
                columns: [
                    { data: 'troubleshoot_bm_id', name: 'troubleshoot_bm_id' },
                    { data: 'work', name: 'work' },
                    { data: 'visit', name: 'visit' },
                    { data: 'leave', name: 'leave' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

    </script>
@endpush
@endsection
