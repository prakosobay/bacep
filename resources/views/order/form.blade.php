@extends('layouts.permit')
@section('content')
<div class="container my-5">
    <div class="card">
        <h1 class="text-center my-3 h1Permit">Consumable Form</h1>
        <form action="{{ url('order/store')}}" method="POST" class="validate-form">
            @csrf
            <div class="container form-container">

                @if (session('gagal'))
                    <div class="alert alert-warning mt-2">
                        {{ session('gagal') }}
                    </div>
                @endif

                {{-- Requestor --}}
                <div class="mb-5">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-4">
                                <label for="req_name" class="form-label">Name :</label>
                                <input type="text" class="form-control" id="req_name" name="req_name" value="{{ auth()->user()->name }}" readonly>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group-mb-4">
                                <label for="req_email" class="form-label">Email :</label>
                                <input type="email" value="{{ auth()->user()->email }}" id="req_email" name="req_email" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-4">
                                <label for="req_phone" class="form-label">Phone Number:</label>
                                <input type="text" class="form-control" id="req_phone" name="req_phone" value="{{ auth()->user()->phone }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group-mb-4">
                                <label for="req_company" class="form-label">Company :</label>
                                <input type="text" value="{{ auth()->user()->company }}" id="req_company" name="req_company" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-4">
                                <label for="req_dept" class="form-label">Department :</label>
                                <input type="text" value="{{ auth()->user()->department }}" id="req_dept" name="req_dept" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Consumable --}}
                <div class="mb-5">
                    <table class="table table-bordered table-hover" id="table_consumable">
                        <thead>
                            <tr>
                                <th colspan="4">Equipment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Item Name</th>
                                <td>
                                    <select name="item[]" id="item" class="form-select" required>
                                        <option value=""></option>
                                        <optgroup label="Patchcord Single Mode">
                                            <option value="Singlemode SC-LC">SC-LC</option>
                                            <option value="Singlemode LC-LC">LC-LC</option>
                                            <option value="Singlemode LC-FC">LC-FC</option>
                                        </optgroup>
                                        <optgroup label="Patchcord Multi Mode">
                                            <option value="Multimode LC-LC">LC-LC</option>
                                            <option value="Multimode LC-FC">LC-FC</option>
                                        </optgroup>
                                        <optgroup label="UTP">
                                            <option value="UTP">UTP</option>
                                        </optgroup>
                                        <optgroup label="Power Cable">
                                            <option value="C13 - C14">C13 to C14</option>
                                            <option value="C13 - Europe">C13 to Europe</option>
                                            <option value="C13 - UK">C13 to UK</option>
                                        </optgroup>
                                    </select>
                                </td>
                                <th>Quantity</th>
                                <td><input type="number" class="form-control" name="qty[]" value="{{ old('qty')}}" required></td>
                            </tr>
                            <tr>
                                <th>From</th>
                                <td>
                                    <select name="from[]" id="from" class="form-select" required>
                                        <option value=""></option>
                                        <option value="mm1">MMR 1</option>
                                        <option value="mm2">MMR 2</option>
                                        <option value="dc">Data Center</option>
                                        <option value="cctv">CCTV Room</option>
                                    </select>
                                </td>
                                <th>Rack</th>
                                <td>
                                    <select name="rack_from[]" id="rack_from" class="form-select" required>
                                        <option value=""></option>
                                        <option value="100">Wallmount</option>
                                        @for ($x = 1; $x < 40; $x++)
                                            <option value="{{$x}}">Rack {{$x}}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>To</th>
                                <td>
                                    <select name="to[]" id="to" class="form-select" required>
                                        <option value=""></option>
                                        <option value="mm1">MMR 1</option>
                                        <option value="mm2">MMR 2</option>
                                        <option value="dc">Data Center</option>
                                        <option value="cctv">CCTV Room</option>
                                    </select>
                                </td>
                                <th>Rack</th>
                                <td>
                                    <select name="rack_to[]" id="rack_to" class="form-select" required>
                                        <option value=""></option>
                                        <option value="100">Wallmount</option>
                                        @for ($x = 1; $x < 40; $x++)
                                            <option value="{{$x}}">Rack {{$x}}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th >Note</th>
                                <td colspan="3"><input type="text" class="form-control" name="note[]" value="{{ old('note')}}"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button id="button_consumable"><b>Add More Fields</b></button>
                </div>

                {{-- @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                {{-- Submit --}}
                <button type="submit" class="btn btn-lg btn-success mx-2">Submit</button>
                <button type="reset" class="btn btn-lg btn-warning mx-2">Reset</button>
            </div>
        </form>
    </div>
</div>
@stack('script')
<script>
$(document).ready(function(){

    // $('.js-example-basic-multiple').select2({
    //     placeholder: 'Select an option',
    //     allowClear : true,
    //     tags : true,
    // });

    let max_row = 6;
    let row = 1;
    let button_consumable = $('#button_consumable');
    let table_consumable = $('#table_consumable');

    $(button_consumable).click(function(e){
        e.preventDefault();
        if(row < max_row){
            $(table_consumable).append('<tbody><tr><th>Item Name</th><td><select name="item[]" id="item" class="form-select" required><option value=""></option><optgroup label="Patchcord Single Mode"><option value="Singlemode SC-LC">SC-LC</option><option value="Singlemode LC-LC">LC-LC</option><option value="Singlemode LC-FC">LC-FC</option></optgroup><optgroup label="Patchcord Multi Mode"><option value="Multimode LC-LC">LC-LC</option><option value="Multimode LC-FC">LC-FC</option></optgroup><optgroup label="UTP"><option value="UTP">UTP</option></optgroup><optgroup label="Power Cable"><option value="C13 - C14">C13 to C14</option><option value="C13 - Europe">C13 to Europe</option><option value="C13 - UK">C13 to UK</option></optgroup></select></td><th>Quantity</th><td><input type="number" class="form-control" name="qty[]" value="{{ old('qty')}}" required></td></tr><tr><th>From</th><td><select name="from[]" id="from" class="form-select" required><option value=""></option><option value="mm1">MMR 1</option><option value="mm2">MMR 2</option><option value="dc">Data Center</option><option value="cctv">CCTV Room</option></select></td><th>Rack</th><td><select name="rack_from[]" id="rack_from" class="form-select" required><option value=""></option><option value="100">Wallmount</option>@for ($x = 1; $x < 40; $x++)<option value="{{$x}}">Rack {{$x}}</option>@endfor</select></td></tr><tr><th>To</th><td><select name="to[]" id="to" class="form-select" required><option value=""></option><option value="mm1">MMR 1</option><option value="mm2">MMR 2</option><option value="dc">Data Center</option><option value="cctv">CCTV Room</option></select></td><th>Rack</th><td><select name="rack_to[]" id="rack_to" class="form-select" required><option value=""></option><option value="100">Wallmount</option>@for ($x = 1; $x < 40; $x++)<option value="{{$x}}">Rack {{$x}}</option>@endfor</select></td></tr><tr><th >Note</th><td colspan="3"><input type="text" class="form-control" name="note[]" value="{{ old('note')}}"></td></tr></tbody>');
            row++;
        }
    })
});
</script>
@endsection
