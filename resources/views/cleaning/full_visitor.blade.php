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
                    { data: 'id', name: 'others.id' },
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
                ajax: '{{ route('troubleshootYajraFullVisitor')}}',
                columns: [
                    { data: 'id', name: 'troubleshoot_bm_personils.id' },
                    { data: 'work', name: 'troubleshoot_bm_fulls.work' },
                    { data: 'visit', name: 'troubleshoot_bm_fulls.visit' },
                    { data: 'leave', name: 'troubleshoot_bm_fulls.leave' },
                    { data: 'nama', name: 'troubleshoot_bm_personils.nama' },
                    { data: 'checkin', name: 'troubleshoot_bm_personils.checkin' },
                    { data: 'checkout', name: 'troubleshoot_bm_personils.checkout' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });

    </script>
@endpush
@endsection
