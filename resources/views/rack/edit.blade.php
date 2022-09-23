@extends('layouts.admin')

@section('judul_halaman', 'Tabel User Web Permit')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Master Data Rack</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary mr-5 sm" href="{{ route('rack') }}">
                Kembali
            </a>
        </div>
        <div class="card-body">
            <form method="post" id="user" class="validate-form" action="{{ route('rackUpdate', $getRack->id) }}">
                @csrf
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="number" class="form-label"><strong>Nomor Rack :</strong></label>
                            <input type="text" class="form-control" id="number" name="number" value="{{ $getRack->number }}" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="room_id"><strong>Room :</strong></label>
                            <select name="room_id" id="room_id" class="form-control" required>
                                @foreach ( $getRooms as $room )
                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="company_id"><strong>Company :</strong></label>
                            <select name="company_id" id="company_id" class="form-control" required>
                                @foreach ( $getCompanies as $company )
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md mx-1 my-1">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
