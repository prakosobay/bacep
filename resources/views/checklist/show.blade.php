@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center"><strong>Detail Checklist Genset</strong></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary mr-5 sm" href="{{url('checklist.table')}}">
                Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <h3 class="h3 mb-2 text-black-1000 text-center"><strong>Genset 1</strong></h3>
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th><strong>No. </strong></th>
                            <th><strong>Task Detail</strong></th>
                            <th><strong>Unit Status</strong></th>
                            <th><strong>Remarks</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1. </td>
                            <td>Tighten Battery Connection</td>
                            @if($show->input1 == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input1 == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark1}}</td>
                        </tr>
                        <tr>
                            <td>2. </td>
                            <td>Measurement Battery Voltage (Open Circuit)</td>
                            @if($show->input2 == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input2 == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark2}}</td>
                        </tr>
                        <tr>
                            <td>3. </td>
                            <td>Measurement Battery Voltage (Charging Condition)</td>
                            @if($show->input3 == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input3 == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark3}}</td>
                        </tr>
                        <tr>
                            <td>4. </td>
                            <td>Check For Lubricant Oil Level</td>
                            @if($show->input4 == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input4 == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark4}}</td>
                        </tr>
                        <tr>
                            <td>5. </td>
                            <td>Status Storage Tank Level</td>
                            @if($show->input5 == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input5 == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark5}}</td>
                        </tr>
                        <tr>
                            <td>6. </td>
                            <td>Status Daily Tank Level</td>
                            @if($show->input6 == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input6 == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark6}}</td>
                        </tr>
                        <tr>
                            <td>7. </td>
                            <td>Measurement Engine Running (hours)</td>
                            @if($show->input7 == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input7 == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark7}}</td>
                        </tr>
                        <tr>
                            <td>8. </td>
                            <td>Genset Mode</td>
                            @if($show->input8 == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input8 == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark8}}</td>
                        </tr>
                        <tr>
                            <td>9. </td>
                            <td>Switch Selector Panel Coupler</td>
                            @if($show->input9 == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input9 == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark9}}</td>
                        </tr>
                        <tr>
                            <td>10. </td>
                            <td>Switch Selector Panel PKG</td>
                            @if($show->input10 == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input10 == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark10}}</td>
                        </tr>
                        <tr>
                            <td>11. </td>
                            <td>Switch Selector PUTR 1</td>
                            @if($show->input11 == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input11 == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark11}}</td>
                        </tr>
                        <tr>
                            <td>12. </td>
                            <td>Switch Selector PUTR 2</td>
                            @if($show->input12 == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input12 == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark12}}</td>
                        </tr>
                    </tbody>
                </table>
                <h3 class="h3 mb-2 text-black-1000 text-center"><strong>Genset 2</strong></h3>
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th><strong>No. </strong></th>
                            <th><strong>Task Detail</strong></th>
                            <th><strong>Unit Status</strong></th>
                            <th><strong>Remarks</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1. </td>
                            <td>Tighten Battery Connection</td>
                            @if($show->input1a == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input1a == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark1a}}</td>
                        </tr>
                        <tr>
                            <td>2. </td>
                            <td>Measurement Battery Voltage (Open Circuit)</td>
                            @if($show->input2a == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input2a == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark2a}}</td>
                        </tr>
                        <tr>
                            <td>3. </td>
                            <td>Measurement Battery Voltage (Charging Condition)</td>
                            @if($show->input3a == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input3a == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark3a}}</td>
                        </tr>
                        <tr>
                            <td>4. </td>
                            <td>Check For Lubricant Oil Level</td>
                            @if($show->input4a == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input4a == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark4a}}</td>
                        </tr>
                        <tr>
                            <td>5. </td>
                            <td>Status Storage Tank Level</td>
                            @if($show->input5a == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input5a == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark5a}}</td>
                        </tr>
                        <tr>
                            <td>6. </td>
                            <td>Status Daily Tank Level</td>
                            @if($show->input6a == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input6a == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark6a}}</td>
                        </tr>
                        <tr>
                            <td>7. </td>
                            <td>Measurement Engine Running (hours)</td>
                            @if($show->input7a == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input7a == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark7a}}</td>
                        </tr>
                        <tr>
                            <td>8. </td>
                            <td>Genset Mode</td>
                            @if($show->input8a == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input8a == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark8a}}</td>
                        </tr>
                        <tr>
                            <td>9. </td>
                            <td>Switch Selector Panel Coupler</td>
                            @if($show->input9a == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input9a == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark9a}}</td>
                        </tr>
                        <tr>
                            <td>10. </td>
                            <td>Switch Selector Panel PKG</td>
                            @if($show->input10a == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input10a == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark10a}}</td>
                        </tr>
                        <tr>
                            <td>11. </td>
                            <td>Switch Selector PUTR 1</td>
                            @if($show->input11a == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input11a == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark11a}}</td>
                        </tr>
                        <tr>
                            <td>12. </td>
                            <td>Switch Selector PUTR 2</td>
                            @if($show->input12a == '0')
                            <td class="text-center">NOT OK</td>
                            @elseif($show->input12a == '1')
                            <td class="text-center">OK</td>
                            @endif
                            <td class="text-center">{{$show->remark12a}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
