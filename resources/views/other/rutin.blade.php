@extends('layouts.form')

@section('content')
<div class="container">
    <form  id="form_rutin" class="form-group" enctype="multipart/form-data" method="POST">
        @csrf
        <!--form-->

        <div  id="form">
        <!--form-->
            <div id="input">
                <!--input-->
                <div id="input4">
                    <!--input4-->

                    <div class="center">
                        <h1 class="text-white text-center">Access Request Form</h1>
                    </div>

                    <label class="mt-4 mb-2"><strong>Purpose of Work</strong></label>
                    <select class="form-control" name="other_work" id="rutin" required>
                        <option value=""></option>
                        @foreach($rutin as $p)
                        <option value="{{ $p->id }}">{{ $p->work }}</option>
                        @endforeach
                    </select>

                    <h6 class="text-white mt-3">Request Validity (Berlakunya Permintaan)</h6>
                    <input type="date" name="val_from" id="val_from" required>
                    <h6 class="text-white mt-3">To (Sampai)</h6>
                    <input type="date" name="val_to" id="val_to" required>

                    <h6 style="text-align: left;" class="text-white mt-3">Authorized Entry Area </h6>
                    <table class="table table-borderless">
                        <tr>
                            <td>
                                <input type="text" id="loc1" name="loc1" value="" readonly>
                            </td>
                            <td>
                                <input type="text" id="loc2" name="loc2" value="" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="loc3" name="loc3" value="" readonly>
                            </td>
                            <td>
                                <input type="text" id="loc4" name="loc4" value="" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="loc5" name="loc5" value="" readonly>
                            </td>
                            <td>
                                <input type="text" id="loc6" name="loc6" value="" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="loc7" name="loc7" value="" readonly>
                            </td>
                            <td>
                                <input type="text" id="loc8" name="loc8" value="" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="loc9" name="loc9" value="" readonly>
                            </td>
                            <td>
                                <input type="text" id="loc10" name="loc10" value="" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="loc11" name="loc11" value="" readonly>
                            </td>
                            <td>
                                <input type="text" id="loc12" name="loc12" value="" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="loc13" name="loc13" value="" readonly>
                            </td>
                            <td>
                                <input type="text" id="loc14" name="loc14" value="" readonly>
                            </td>
                        </tr>
                      </table>
                </div>
            </div>
        </div>

        <div  id="form2">
            <div id="input">
                    <!--input-->
                <div id="input4">
                        <!--input4-->
                        <div class="center">
                            <h1 class="text-white text-center">Change Request Form</h1>
                        </div>

                    {{-- Description of Work --}}
                    <h4 class="text-white mt-5">Description of Scope of Work (Deskripsikan Pekerjaan)</h4>
                    <input type="text" id="desc" value="" class="form-control @error('desc') is-invalid @enderror" required autocomplete="desc"  name="desc" readonly>

                    {{-- Detail Time & Operation --}}
                    <h4 class="text-white mt-5">Detail Time & Operation (Detail Waktu & Operasi) </h4>
                    <p>
                        <input type="time" class="time" name="time_1">
                        <input type="text" id="item_1" class="detail" required autocomplete="item1" value="" name="item_1" placeholder="Item" readonly>
                        <input type="text" id="procedure_1" class="detail" required autocomplete="proce1" value="" name="procedure_1" placeholder="Working Procedure" readonly>

                        <input type="time" class="time" name="time_2">
                        <input type="text" id="item_2" class="detail" required autocomplete="item2" value="" name="item_2" placeholder="Item" readonly>
                        <input type="text" id="procedure_2" class="detail" required autocomplete="proce2" value="" name="procedure_2" placeholder="Working Procedure" readonly>

                        <input type="time" class="time" name="time_3">
                        <input type="text" id="item_3" class="detail" value="" name="item_3" placeholder="Item" readonly>
                        <input type="text" id="procedure_3" class="detail" value="" name="procedure_3" placeholder="Working Procedure" readonly>

                        <input type="time" class="time" name="time_4">
                        <input type="text" id="item_4" class="detail" value="" name="item_4" placeholder="Item" readonly>
                        <input type="text" id="procedure_4" class="detail" value="" name="procedure_4" placeholder="Working Procedure" readonly>

                        <input type="time" class="time" name="time_5">
                        <input type="text" id="item_5" class="detail" value="" name="item_5" placeholder="Item" readonly>
                        <input type="text" id="procedure_5" class="detail" value="" name="procedure_5" placeholder="Working Procedure" readonly>
                    </p>

                    {{-- Risk Service Area Impact --}}
                    <h4 class="text-white mt-5">Risk and Service Area Impact (Resiko dan Dampak Area Servis)</h4>
                    <p>
                        <input id="risk_1" class="risk" value="" type="text" name="risk_1" placeholder="Risk" readonly>
                        <input id="poss_1" class="risk" value="" type="text" name="poss_1" placeholder="Possibility" readonly>
                        <input id="impact_1" class="risk" type="text" name="impact_1" value="" placeholder="Impact" readonly>
                        <input id="mitigation_1" class="risk" value="" type="text" name="mitigation_1" placeholder="Mitigation" readonly>

                        <input id="risk_2" class="risk" value="" type="text" name="risk_2" placeholder="Risk" readonly>
                        <input id="poss_2" class="risk" value="" type="text" name="poss_2" placeholder="Possibility" readonly>
                        <input id="impact_2" class="risk" type="text" name="impact_2" value="" placeholder="Impact" readonly>
                        <input id="mitigation_2" class="risk" value="" type="text" name="mitigation_2" placeholder="Mitigation" readonly>

                        <input id="risk_3" class="risk" value="" type="text" name="risk_3" placeholder="Risk" readonly>
                        <input id="poss_3" class="risk" value="" type="text" name="poss_3" placeholder="Possibility" readonly>
                        <input id="impact_3" class="risk" type="text" name="impact_3" value="" placeholder="Impact" readonly>
                        <input id="mitigation_3" class="risk" value="" type="text" name="mitigation_3" placeholder="Mitigation" readonly>

                        <input id="risk_4" class="risk" value="" type="text" name="risk_4" placeholder="Risk" readonly>
                        <input id="poss_4" class="risk" value="" type="text" name="poss_4" placeholder="Possibility" readonly>
                        <input id="impact_4" class="risk" type="text" name="impact_4" value="" placeholder="Impact" readonly>
                        <input id="mitigation_4" class="risk" value="" type="text" name="mitigation_4" placeholder="Mitigation" readonly>

                        <input id="risk_5" class="risk" value="" type="text" name="risk_5" placeholder="Risk" readonly>
                        <input id="poss_5" class="risk" value="" type="text" name="poss_5" placeholder="Possibility" readonly>
                        <input id="impact_5" class="risk" type="text" name="impact_5" value="" placeholder="Impact" readonly>
                        <input id="mitigation_5" class="risk" value="" type="text" name="mitigation_5" placeholder="Mitigation" readonly>
                    </p>

                    {{-- Testing Verification --}}
                    <h4 class="text-white mt-5">Testing and Verification</h4>
                    <input type="text" class="form-control" placeholder="Fill in here (isi disini)" name="testing">

                    {{-- Rollback  --}}
                    <h4 class="text-white mt-5">Rollback Plan</h4>
                    <input type="text" class="form-control" placeholder="Fill in here (isi disini)" name="rollback">

                    {{-- PIC --}}
                    <h4 class="pic">Person in charge 1</h4>
                        <select class="nama nama-pic1" name="pic1" id="js-example-basic-single1">
                            <option value=""> </option>
                            @foreach($personil as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        <input class="nama" type="text" id="company_1" name="company_1" placeholder="Company" readonly>
                        <input class="nama" type="text" id="department_1" name="department_1" placeholder="Department" readonly>
                        <input class="nama " type="text" id="respon_1" name="respon_1" placeholder="Responsibility" readonly>
                        <input class="personil " type="text" id="phone_1" name="phone_1" placeholder="Phone number" readonly>
                        <input type="number" class="personil" id="id_1" name="id_1" placeholder="ID Number" readonly>

                        {{-- <label ><strong>Sertifikat Vaksin 1 :</strong></label>
                        <input class="ktp" id="vaksina" type="file" name="vaksina_1" accept="image/*"/>
                        <label ><strong>Sertifikat Vaksin 2 :</strong></label>
                        <input class="ktp" id="vaksinb" type="file" name="vaksinb_1" accept="image/*"/>
                        <label ><strong>Foto KTP :</strong></label>
                        <input class="ktp ml-2" id="ktp" type="file" name="ktp_1" accept="image/*"/> --}}

                    <h4 class="pic">Person in charge 2</h4>
                        <select class="nama nama-pic2" name="pic2" id="js-example-basic-single2">
                            <option value=""></option>
                            @foreach($personil as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        <input class="nama" type="text" id="company_2" name="company_2" placeholder="Company" readonly>
                        <input class="nama" type="text" id="department_2" name="department_2" placeholder="Department" readonly>
                        <input class="nama " type="text" id="respon_2" name="respon_2" placeholder="Responsibility" readonly>
                        <input class="personil " type="text" id="phone_2" name="phone_2" placeholder="Phone number" readonly>
                        <input type="number" class="personil" id="id_2" name="id_2" placeholder="ID Number" readonly>

                    <h4 class="pic">Person in charge 3</h4>
                        <select class="nama nama-pic3" name="pic3" id="js-example-basic-single3">
                                <option value=""></option>
                            @foreach($personil as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        <input class="nama" type="text" id="company_3" name="company_3" placeholder="Company" readonly>
                        <input class="nama" type="text" id="department_3" name="department_3" placeholder="Department" readonly>
                        <input class="nama " type="text" id="respon_3" name="respon_3" placeholder="Responsibility" readonly>
                        <input class="personil " type="text" id="phone_3" name="phone_3" placeholder="Phone number" readonly>
                        <input type="number" class="personil" id="id_3" name="id_3" placeholder="ID Number" readonly>

                    <h4 class="pic">Person in charge 4</h4>
                        <select class="nama nama-pic4" name="pic4" id="js-example-basic-single4">
                                <option value=""></option>
                            @foreach($personil as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        <input class="nama" type="text" id="company_4" name="company_4" placeholder="Company" readonly>
                        <input class="nama" type="text" id="department_4" name="department_4" placeholder="Department" readonly>
                        <input class="nama " type="text" id="respon_4" name="respon_4" placeholder="Responsibility" readonly>
                        <input class="personil " type="text" id="phone_4" name="phone_4" placeholder="Phone number" readonly>
                        <input type="number" class="personil" id="id_4" name="id_4" placeholder="ID Number" readonly>

                    <h4 class="pic">Person in charge 5</h4>
                        <select class="nama nama-pic5" name="pic5" id="js-example-basic-single5">
                                <option value=""></option>
                            @foreach($personil as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        <input class="nama" type="text" id="company_5" name="company_5" placeholder="Company" readonly>
                        <input class="nama" type="text" id="department_5" name="department_5" placeholder="Department" readonly>
                        <input class="nama " type="text" id="respon_5" name="respon_5" placeholder="Responsibility" readonly>
                        <input class="personil " type="text" id="phone_5" name="phone_5" placeholder="Phone number" readonly>
                        <input type="number" class="personil" id="id_5" name="id_5" placeholder="ID Number" readonly>
                </div>
            </div>
            <button type="submit" class="btn btn-warning text-white btn-submit2">Submit Form</button>
            <button type="reset" class="btn btn-primary">Clear Form</button>
        </div>
    </form>
</div>

<script>
$(document).ready(function() {
    $('#js-example-basic-single1').select2({
        placeholder: "Pilih Personil",
    });
    $('#js-example-basic-single2').select2({
        placeholder: "Pilih Personil",
    });
    $('#js-example-basic-single3').select2({
        placeholder: "Pilih Personil",
    });
    $('#js-example-basic-single4').select2({
        placeholder: "Pilih Personil",
    });
    $('#js-example-basic-single5').select2({
        placeholder: "Pilih Personil",
    });
});
</script>
@endsection
