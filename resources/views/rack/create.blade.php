@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Racks</strong></h1>

    <div class="container mx-3 my-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ url('rack/store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="room" class="form-label"><b>Room :</b></label>
                            <select name="m_room_id" id="room" class="form-select">
                                <option value=""></option>
                                @foreach ($getRooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="company" class="form-label"><b>Company :</b></label>
                            <select name="m_company_id" class="form-select" id="company">
                                <option value=""></option>
                                @foreach ($getCompanies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="number" class="form-label"><b>No. Rack :</b></label>
                            <select name="number" class="form-select" id="number">
                                @for ($i = 1; $i < 80; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="created_by" value="{{ auth()->user()->id }}" readonly hidden>
                    </div>
                </div>

                <div class="container">
                    <button type="submit" class="btn btn-primary mx-1 my-2">Submit</button>
                    <button type="reset" class="btn btn-warning mx-1 my-2">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $('#pilihan2').change(function(){
        let id = $(this).val();
        $.ajax({
            url: "{{url("/detail")}}"+'/'+id,
            dataType:"json",
            type: "get",
            success: function(response){
                const {data} = response;
                console.log(data)
            $('#phone_number2').val(data.phone_number);
            $('#id_number2').val(data.id_number);
            }
        });
    });
</script>
@endpush
@endsection



