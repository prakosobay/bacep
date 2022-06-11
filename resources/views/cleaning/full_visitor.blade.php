@extends('layouts.log-visitor')

@section('content')
@push('scripts')
    <script>

        // $(function() {
        //     $("#start_date").datepicker({
        //         "dateFormat": "yy-mm-dd"
        //     });

        //     $("#end_date").datepicker({
        //         "dateFormat": "yy-mm-dd"
        //     });
        // });

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
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        $(function() {
            $('#maintenance_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('other/maintenance/yajra/full/visitor')}}',
                columns: [
                    { data: 'other_id', name: 'other_id' },
                    { data: 'work', name: 'work' },
                    { data: 'visit', name: 'visit' },
                    { data: 'leave', name: 'leave' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });


        // Filter
        // $(document).on("click", "#filter", function(e) {
        //     e.preventDefault();
        //     var start_date = $("#start_date").val();
        //     var end_date = $("#end_date").val();
        //     if (start_date == "" || end_date == "") {
        //         alert("Both date required");
        //     } else {
        //         $('#records').DataTable().destroy();
        //         fetch(start_date, end_date);
        //     }
        // });
        // // Reset
        // $(document).on("click", "#reset", function(e) {
        //     e.preventDefault();
        //     $("#start_date").val(''); // empty value
        //     $("#end_date").val('');
        //     $('#records').DataTable().destroy();
        //     fetch();
        // });

    </script>
@endpush
@endsection
