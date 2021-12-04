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
                    <select class="form-control" name="rutin_work" id="rutin">
                        <option value=""></option>
                        @foreach($rutin as $p)
                        <option value="{{ $p->id }}">{{ $p->work }}</option>
                        @endforeach
                    </select>
                    {{-- <div class="dropDownSelect2"></div> --}}

                    <h6 class="text-white mt-3">Request Validity (Berlakunya Permintaan)</h6>
                    <input type="date" name="val_from" id="val_from">
                    <h6 class="text-white mt-3">To (Sampai)</h6>
                    <input type="date" name="val_to" id="val_to">

                    <h6 style="text-align: left;" class="text-white mt-3">Authorized Entry Area </h6>
                    <table class="table table-borderless">
                        <tr>
                            <td>
                                <label class="radiobutton_container">
                                <input id="server" name="server" type="checkbox" value="">
                                <span class="radiobutton_mark"></span>
                                Server Room
                                </label>
                            </td>
                            <td>
                                <label class="radiobutton_container">
                                <input id="genset" name="genset" type="checkbox" value="">
                                <span class="radiobutton_mark"></span>
                                Generator Room
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="radiobutton_container">
                                <input id="mmr1" name="mmr1" type="checkbox" value="">
                                <span class="radiobutton_mark"></span>
                                MMR 1
                                </label>
                            </td>
                            <td>
                                <label class="radiobutton_container">
                                <input id="panel" name="panel" type="checkbox" value="">
                                <span class="radiobutton_mark"></span>
                                Panel Room
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="radiobutton_container">
                                <input id="mmr2" name="mmr2" type="checkbox" value="">
                                <span class="radiobutton_mark"></span>
                                MMR 2
                                </label>
                            </td>
                            <td>
                                <label class="radiobutton_container">
                                <input id="batre" name="batre" type="checkbox" value="">
                                <span class="radiobutton_mark"></span>
                                Battery Room
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="radiobutton_container">
                                <input id="ups" name="ups" type="checkbox" value="">
                                <span class="radiobutton_mark"></span>
                                UPS Room
                                </label>
                            </td>
                            <td>
                                <label class="radiobutton_container">
                                <input id="fss" name="fss" type="checkbox" value="">
                                <span class="radiobutton_mark"></span>
                                FSS Room
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="radiobutton_container">
                                <input id="lt2" name="lt2" type="checkbox" value="">
                                <span class="radiobutton_mark"></span>
                                Office 2nd Fl
                                </label>
                            </td>
                            <td>
                                <label class="radiobutton_container">
                                <input id="lt3" name="lt3" type="checkbox" value="">
                                <span class="radiobutton_mark"></span>
                                Office 3rd Fl
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="radiobutton_container">
                                <input id="trafo" name="trafo" type="checkbox" value="">
                                <span class="radiobutton_mark"></span>
                                Trafo Room
                                </label>
                            </td>
                            <td>
                                <label class="radiobutton_container">
                                <input id="yard" name="yard" type="checkbox" value="">
                                <span class="radiobutton_mark"></span>
                                Yard
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="radiobutton_container">
                                <input id="parking" name="parking" type="checkbox" value="">
                                <span class="radiobutton_mark"></span>
                                Parking Lot
                                </label>
                            </td>
                            <td>
                                <label class="radiobutton_container">
                                <input id="1" type="checkbox">
                                <span class="radiobutton_mark"></span>
                                <textarea id="other" name="other" value="">Other</textarea>
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
                    <input type="text" id="desc" value="" class="form-control @error('desc') is-invalid @enderror" required autocomplete="desc" placeholder="Pick in here (pilih disini)" name="desc" readonly>

                    {{-- Detail Time & Operation --}}
                    <h4 class="text-white mt-5">Detail Time & Operation (Detail Waktu & Operasi) </h4>
                    <font color="red" size="2">*Minimal Mengisi 2</font>
                    <p>
                        <input type="time" class="time" name="time_1">
                        <input type="text" id="item_1" class="detail @error('item1') is-invalid @enderror" required autocomplete="item1" value="" name="item_1" placeholder="Item" readonly>
                        <input type="text" id="procedure_1" class="detail @error('proce1') is-invalid @enderror" required autocomplete="proce1" value="" name="procedure_1" placeholder="Working Procedure" readonly>

                        <input type="time" class="time" name="time_2">
                        <input type="text" id="item_2" class="detail @error('item2') is-invalid @enderror" required autocomplete="item2" value="" name="item_2" placeholder="Item" readonly>
                        <input type="text" id="procedure_2" class="detail @error('proce2') is-invalid @enderror" required autocomplete="proce2" value="" name="procedure_2" placeholder="Working Procedure" readonly>

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
                    <font class="mt-2" color="red" size="2">*Minimal Mengisi 2</font>
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
                    <font color="red" size="2">*File harus berbentuk jpg,png,jpeg; maks 500kb</font><br>
                        <input class="nama @error('nama1') is-invalid @enderror" required autocomplete="nama1" type="text" name="name_1" placeholder="Name">
                        @error('nama1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input class="nama @error('company1') is-invalid @enderror" required autocomplete="company1" type="text" name="company_1" placeholder="Company">
                        @error('company1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input class="nama @error('dept1') is-invalid @enderror" required autocomplete="dept1" type="text" name="department_1" placeholder="Department">
                        @error('dept1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input class="nama @error('respon1') is-invalid @enderror" required autocomplete="respon1" type="text" name="respon_1" placeholder="Responsibility">
                        @error('respon1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input class="personil @error('phone1') is-invalid @enderror" required autocomplete="phone1" type="text" name="phone_1" placeholder="Phone number">
                        @error('phone1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="number" class="personil @error('id1') is-invalid @enderror" required autocomplete="id1"  name="id_1" placeholder="ID Number">
                        @error('id1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label ><strong>Sertifikat Vaksin 1 :</strong></label>
                        <input class="ktp" id="vaksina" type="file" name="vaksina_1" accept="image/*"/>
                        <label ><strong>Sertifikat Vaksin 2 :</strong></label>
                        <input class="ktp" id="vaksinb" type="file" name="vaksinb_1" accept="image/*"/>
                        <label ><strong>Foto KTP :</strong></label>
                        <input class="ktp ml-2" id="ktp" type="file" name="ktp_1" accept="image/*"/>

                    <h4 class="pic">Person in charge 2</h4>
                        <input class="nama" type="text" name="name_2" placeholder="Name">
                        <input class="nama" type="text" name="company_2" placeholder="Company">
                        <input class="nama" type="text" name="department_2" placeholder="Department">
                        <input class="nama" type="text" name="respon_2" placeholder="Responsibility">
                        <input class="personil" type="text" name="phone_2" placeholder="Phone number">
                        <input type="number" class="personil"  name="id_2" placeholder="ID Number">
                        <label ><strong>Sertifikat Vaksin 1 :</strong></label>
                        <input class="ktp" id="vaksina_2" type="file" name="vaksina_2" accept="image/*"/>
                        <label ><strong>Sertifikat Vaksin 2 :</strong></label>
                        <input class="ktp" id="vaksinb_2" type="file" name="vaksinb_2" accept="image/*"/>
                        <label ><strong>Foto KTP :</strong></label>
                        <input class="ktp ml-2" id="ktp_2" type="file" name="ktp_2" accept="image/*"/>

                    <h4 class="pic">Person in charge 3</h4>
                        <input class="nama" type="text" name="name_3" placeholder="Name">
                        <input class="nama" type="text" name="company_3" placeholder="Company">
                        <input class="nama" type="text" name="department_3" placeholder="Department">
                        <input class="nama" type="text" name="respon_3" placeholder="Responsibility">
                        <input class="personil" type="text" name="phone_3" placeholder="Phone number">
                        <input type="number" class="personil"  name="id_3" placeholder="ID Number">
                        <label ><strong>Sertifikat Vaksin 1 :</strong></label>
                        <input class="ktp" id="vaksina_3" type="file" name="vaksina_3" accept="image/*"/>
                        <label ><strong>Sertifikat Vaksin 2 :</strong></label>
                        <input class="ktp" id="vaksinb_3" type="file" name="vaksinb_3" accept="image/*"/>
                        <label ><strong>Foto KTP :</strong></label>
                        <input class="ktp ml-2" id="ktp_3" type="file" name="ktp_3" accept="image/*"/>

                    <h4 class="pic">Person in charge 4</h4>
                        <input class="nama" type="text" name="name_4" placeholder="Name">
                        <input class="nama" type="text" name="company_4" placeholder="Company">
                        <input class="nama" type="text" name="department_4" placeholder="Department">
                        <input class="nama" type="text" name="respon_4" placeholder="Responsibility">
                        <input class="personil" type="text" name="phone_4" placeholder="Phone number">
                        <input type="number" class="personil"  name="id_4" placeholder="ID Number">
                        <label ><strong>Sertifikat Vaksin 1 :</strong></label>
                        <input class="ktp" id="vaksina_4" type="file" name="vaksina_4" accept="image/*"/>
                        <label ><strong>Sertifikat Vaksin 2 :</strong></label>
                        <input class="ktp" id="vaksinb_4" type="file" name="vaksinb_4" accept="image/*"/>
                        <label ><strong>Foto KTP :</strong></label>
                        <input class="ktp ml-2" id="ktp_4" type="file" name="ktp_4" accept="image/*"/>

                    <h4 class="pic">Person in charge 5</h4>
                        <input class="nama" type="text" name="name_5" placeholder="Name">
                        <input class="nama" type="text" name="company_5" placeholder="Company">
                        <input class="nama" type="text" name="department_5" placeholder="Department">
                        <input class="nama" type="text" name="respon_5" placeholder="Responsibility">
                        <input class="personil" type="text" name="phone_5" placeholder="Phone number">
                        <input type="number" class="personil"  name="id_5" placeholder="ID Number">
                        <label ><strong>Sertifikat Vaksin 1 :</strong></label>
                        <input class="ktp" id="vaksina_5" type="file" name="vaksina_5" accept="image/*"/>
                        <label ><strong>Sertifikat Vaksin 2 :</strong></label>
                        <input class="ktp" id="vaksinb_5" type="file" name="vaksinb_5" accept="image/*"/>
                        <label ><strong>Foto KTP :</strong></label>
                        <input class="ktp ml-2" id="ktp_5" type="file" name="ktp_5" accept="image/*"/>
                </div>
            </div>
            <button type="submit" class="btn btn-warning text-white btn-submit">Submit Form</button>
            <button type="reset" class="btn btn-primary">Clear Form</button>
        </div>
    </form>
</div>

@endsection
