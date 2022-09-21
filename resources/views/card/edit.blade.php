@extends('layouts.admin')

@section('judul_halaman', 'Tabel User Web Permit')
        {{ csrf_field() }}

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Data Users Role</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary mr-5 sm" href="{{ route('card') }}">
                Kembali
            </a>
        </div>
        <div class="card-body">
            <form method="post" id="user" class="validate-form" action="{{ route('cardUpdate', $getCard->id) }}">
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
                    <div class="col-6">
                        <div class="form-group">
                            <label for="number" class="form-label"><strong>Nomor Kartu</strong></label>
                            <input type="text" class="form-control" id="number" name="number" value="{{ $getCard->number }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="id"><strong>Type Kartu</strong></label>
                            <select name="card_type_id" id="card_type_id" class="form-control" required>
                                @foreach ( $getTypes as $type )
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
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
