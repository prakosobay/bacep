<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCESS & CHANGE REQUEST FORM</title>
    <link rel="stylesheet" href="{{asset('/css/other.css')}}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="/cleaning.js" defer></script> -->

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
<!--container-->

    <form  id="form_other" class="form-group" enctype="multipart/form-data" method="POST" action="{{url('other.form')}}">
        <!-- {{ csrf_field() }} -->
        <!--form-->

        <div  id="form">
        <!--form-->

            <div class="center">
                <h1 class="text-white">Access Request Form</h1>
                <h2 class="text-white">Nomor: FRM-BTS-DCDV-2021-03</h2>
            </div>

            <div id="input">
                <!--input-->
                <div id="input4">
                    <!--input4-->

                    <input type="text" id="input-group" style="background: black;" name="other_work" placeholder="Purpose Of Work">
                    <p>
                    <h6 class="text-white">Request Validity (Berlakunya Permintaan)</h6>
                    <input type="date" name="val_from" id="val_from">
                    <h6 class="text-white"></h6>
                    <h6 class="text-white">To (Sampai)</h6>
                    <input type="date" name="val_to" id="val_to">
                    <h6 class="text-white"></h6>
                    <p>
                    <h6 for="survey_area" style="text-align: left;" class="text-white">Authorized Entry Area </h6>
                    <table class="table table-borderless">
                        <tr>
                            <td>
                                <label class="radiobutton_container">
                                <input id="1" name="server" type="checkbox" value="1">
                                <span class="radiobutton_mark"></span>
                                Server Room
                                </label>
                            </td>
                            <td>
                                <label class="radiobutton_container">
                                <input id="1" name="genset" type="checkbox" value="1">
                                <span class="radiobutton_mark"></span>
                                Generator Room
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="radiobutton_container">
                                <input id="1" name="mmr1" type="checkbox" value="1">
                                <span class="radiobutton_mark"></span>
                                MMR 1
                                </label>
                            </td>
                            <td>
                                <label class="radiobutton_container">
                                <input id="1" name="panel" type="checkbox" value="1">
                                <span class="radiobutton_mark"></span>
                                Panel Room
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="radiobutton_container">
                                <input id="1" name="mmr2" type="checkbox" value="1">
                                <span class="radiobutton_mark"></span>
                                MMR 2
                                </label>
                            </td>
                            <td>
                                <label class="radiobutton_container">
                                <input id="1" name="batre" type="checkbox" value="1">
                                <span class="radiobutton_mark"></span>
                                Battery Room
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="radiobutton_container">
                                <input id="1" name="ups" type="checkbox" value="1">
                                <span class="radiobutton_mark"></span>
                                UPS Room
                                </label>
                            </td>
                            <td>
                                <label class="radiobutton_container">
                                <input id="1" name="fss" type="checkbox" value="1">
                                <span class="radiobutton_mark"></span>
                                FSS Room
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="radiobutton_container">
                                <input id="1" name="2nd" type="checkbox" value="1">
                                <span class="radiobutton_mark"></span>
                                Office 2nd Fl
                                </label>
                            </td>
                            <td>
                                <label class="radiobutton_container">
                                <input id="1" name="3rd" type="checkbox" value="1">
                                <span class="radiobutton_mark"></span>
                                Office 3rd Fl
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="radiobutton_container">
                                <input id="1" name="trafo" type="checkbox" value="1">
                                <span class="radiobutton_mark"></span>
                                Trafo Room
                                </label>
                            </td>
                            <td>
                                <label class="radiobutton_container">
                                <input id="1" name="yard" type="checkbox" value="1">
                                <span class="radiobutton_mark"></span>
                                Yard
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="radiobutton_container">
                                <input id="1" name="parking" type="checkbox" value="1">
                                <span class="radiobutton_mark"></span>
                                Parking Lot
                                </label>
                            </td>
                            <td>
                                <label class="radiobutton_container">
                                <input id="1" type="checkbox">
                                <span class="radiobutton_mark"></span>
                                <textarea id="1" name="other">Other</textarea>
                            </td>
                        </tr>
                      </table>
                </div>
            </div>
        </div>

        <div  id="form2">

            <div class="center">
            <h1 class="text-white">Change Request Form</h1>
            <h2 class="text-white">Nomor: FRM-BTS-DCDV-2021-03</h2>
            </div>

            <div id="input">
                    <!--input-->
                <div id="input4">
                        <!--input4-->
                    <h4 class="text-white">1. Background and Objective (Jenis Pekerjaan)</h4>
                        <input type="text" id="input-group" placeholder="Fill in here" name="other_background">
                    <p>
                    <h4 class="text-white">2. Description os Scope of Work (Deskripsikan Pekerjaan)</h4>
                        <input type="text" id="input-group" placeholder="Fill in here" name="other_describ">
                    <p>

                    {{-- Detail Time & Operation --}}
                    <h4 class="text-white">3. Detail Time & Operation (Detail Waktu & Operasi) </h4>
                    <p>
                        <font color="red" size="2">*Minimal Mengisi 2</font>
                    </p>
                        <input type="time" id="input-group20" style="background: white; " name="time_1">
                        <input id="input-group14" style="background: black ;" name="item_1" placeholder="Item">
                        <input id="input-group8" style="background: black ;" name="procedure_1" placeholder="Working Procedure">

                        <input type="time" id="input-group20" style="background: white; " name="time_2">
                        <input id="input-group14" style="background: black ;" name="item_2" placeholder="Item">
                        <input id="input-group8" style="background: black ;" name="procedure_2" placeholder="Working Procedure">

                        <input type="time" id="input-group20" style="background: white; " name="time_3">
                        <input id="input-group14" style="background: black ;" name="item_3" placeholder="Item">
                        <input id="input-group8" style="background: black ;" name="procedure_3" placeholder="Working Procedure">

                        <input type="time" id="input-group20" style="background: white; " name="time_4">
                        <input id="input-group14" style="background: black ;" name="item_4" placeholder="Item">
                        <input id="input-group8" style="background: black ;" name="procedure_4" placeholder="Working Procedure">

                        <input type="time" id="input-group20" style="background: white; " name="time_5" placeholder="">
                        <input id="input-group14" style="background: black ;" name="item_5" placeholder="Item">
                        <input id="input-group8" style="background: black ;" name="procedure_5" placeholder="Working Procedure">

                    {{-- Risk Service Area Impact --}}
                    <P>
                    <h4 class="text-white">4. Risk and Service Area Impact (Resiko dan Dampak Area Servis)</h4>
                    <p>
                        <font color="red" size="2">*Minimal Mengisi 2</font>
                    </p>
                        <input id="input-group1" style="background: black; " name="risk_1" placeholder="Risk Description">
                        <input id="input-group14" style="background: black ;" name="possibility" placeholder="Possibility">
                        <select id="input-group3" style="background: black;" name="impact">
                            <option value="">Impact</option>
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                        <input id="input-group15" style="background: black;" name="mitigation_1" placeholder="Mitigation Plan">

                        <input id="input-group1" style="background: black; " name="risk_2" placeholder="Risk Description">
                        <input id="input-group14" style="background: black ;" name="possibility" placeholder="Possibility">
                        <select id="input-group3" style="background: black;" name="impact">
                            <option value="">Impact</option>
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                        <input id="input-group15" style="background: black;" name="mitigation_2" placeholder="Mitigation Plan">

                        <input id="input-group1" style="background: black; " name="risk_3" placeholder="Risk Description">
                        <input id="input-group14" style="background: black ;" name="possibility" placeholder="Possibility">
                        <select id="input-group3" style="background: black;" name="impact">
                            <option value="">Impact</option>
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                        <input id="input-group15" style="background: black;" name="mitigation_3" placeholder="Mitigation Plan">

                        <input id="input-group1" style="background: black; " name="risk_4" placeholder="Risk Description">
                        <input id="input-group14" style="background: black ;" name="possibility" placeholder="Possibility">
                        <select id="input-group3" style="background: black;" name="impact">
                            <option value="">Impact</option>
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                        <input id="input-group15" style="background: black;" name="mitigation_4" placeholder="Mitigation Plan">

                        <input id="input-group1" style="background: black; " name="risk_5" placeholder="Risk Description">
                        <input id="input-group14" style="background: black ;" name="possibility" placeholder="Possibility">
                        <select id="input-group3" style="background: black;" name="impact">
                            <option value="">Impact</option>
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                        <input id="input-group15" style="background: black;" name="mitigation_5" placeholder="Mitigation Plan">

                    <p>
                    <h4 class="text-white">5. Testing and Verification</h4>
                    <input type="text" class="contoh2" id="input-group" placeholder="Fill in here (isi disini)" name="cleaning_testing">
                    <P>
                    <h4 class="text-white">6. Rollback Plan</h4>
                    <input type="text" class="contoh2" id="input-group" placeholder="Fill in here (isi disini)" name="cleaning_rollback">
                    <P>
                    <h4 class="text-white">7. Person in charge</h4>
                        <input id="input-group1" style="background: black; " name="cleaning_name_1" placeholder="Name">
                        <input id="input-group14" style="background: black;" name="cleaning_number_1" placeholder="Phone number">
                        <input type="number" id="input-group14" style="background: black;" name="cleaning_id_1" placeholder="ID Number">
                        <input id="input-group14" style="background: black;" name="cleaning_name_1" placeholder="Company">

                        <input id="input-group1" style="background: black;" name="cleaning_number_1"placeholder="Name">
                        <input id="input-group14" style="background: black;" name="cleaning_id_1" placeholder="Phone Number">
                        <Input type="number" id="input-group14" style="background: black;" name="cleaning_name_1" placeholder="ID Number">
                        <input id="input-group14" style="background: black;" name="cleaning_number_1"placeholder="Company">

                        <Input id="input-group1" style="background: black;" name="cleaning_id_1" placeholder="Name">
                        <input id="input-group14" style="background: black;" name="cleaning_name_1" placeholder="Phone Number">
                        <input type="number" id="input-group14" style="background: black;" name="cleaning_number_1"placeholder="ID number">
                        <input id="input-group14" style="background: black;" name="cleaning_id_1" placeholder="Company">

                        <input id="input-group1" style="background: black;" name="cleaning_id_1" placeholder="Name">
                        <input id="input-group14" style="background: black;" name="cleaning_id_1" placeholder="Phone Number">
                        <input type="number" id="input-group14" style="background: black;" name="cleaning_id_1" placeholder="ID Number">
                        <input id="input-group14" style="background: black;" name="cleaning_id_1" placeholder="Company">

                        <input id="input-group1" style="background: black;" name="cleaning_id_1" placeholder="Name">
                        <input id="input-group14" style="background: black;" name="cleaning_id_1" placeholder="Phone Number">
                        <input type="number" id="input-group14" style="background: black;" name="cleaning_id_1" placeholder="ID Number">
                        <input id="input-group14" style="background: black;" name="cleaning_id_1" placeholder="Company">

                        <input id="input-group1" style="background: black;" name="cleaning_id_1" placeholder="Name">
                        <input id="input-group14" style="background: black;" name="cleaning_id_1" placeholder="Phone Number">
                        <input type="number" id="input-group14" style="background: black;" name="cleaning_id_1" placeholder="ID Number">
                        <input id="input-group14" style="background: black;" name="cleaning_id_1" placeholder="Company">
                            <p>
                        <br>
                    <h4 class="text-white">8. Foto KTP</h4>
                        <input id="ktp" type="file" multiple="multiple" name="ktp" accept="image/*"/>
                </div>
            </div>
            <button type="submit" class="btn btn-warning text-white btn-submit">Submit Form</button>
            <button type="reset" class="btn btn-primary">Clear Form</button>
        </div>

    <!--container-->
    </form>
</div>

</body>

<!-- {{-- <script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

    $(".btn-submit").click(function(e){

        e.preventDefault();

        var datastring = $("#form_cleaning").serialize();
        $.ajax({
            type:'POST',
            url:"{{url('submit_data_cleaning')}}",
            data: datastring,
            error: function (request, error) {
                console.log(error)
                alert(" Can't do because: " + error);
            },
            success:function(data){
                console.log(data);
                if(data.status == 'SUCCESS'){
                    Swal.fire({
                        title: "Success!",
                        text: 'Data Saved',
                        type: "success",
                    }).then(function(){
                        location.href = "{{url("/home")}}";
                    });

                }else if(data.status == 'FAILED'){

                    Swal.fire({
                        title: "Failed!",
                        text: 'Saving Data Failed',
                    }).then(function(){
                        location.reload();
                    });
                }
            }
        });
    });
</script> --}} -->
</html>
