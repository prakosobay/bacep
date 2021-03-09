<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCESS & CHANGE REQUEST FORM</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bm.css') }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

        <form id="form_cleaning" class="form-group">
            {{ csrf_field() }}
            <!--form-->
            <div id="form">
                <!--form-->
                <h1 class="text-white">Access Request Form</h1>
                <h2 class="text-white">Nomor: ARF/001/DCDV/XI/2019</h2>

                <div id="input">
                    <!--input-->
                    <div id="input4">
                        <!--input4-->



                        <h5 class="text-white">Purpose of Work :</h3>

                            <div>
                                <label class="radiobutton_container">
                                <input id="1" name="radio" type="radio">
                                <span class="radiobutton_mark"></span>
                                Pembersihan lantai 1 (MMR 1&2 - UPS - Server Wallmount - Fire Suppression System)
                                </label>
                            </div>

                            <div>
                                <label class="radiobutton_container">
                                <input id="2" name="radio" type="radio">
                                <span class="radiobutton_mark"></span>
                                Pembersihan Ruang Data Center (Pembersihan Plafon Atas, Besi Support, Rack & Raised Floor)
                            </label>
                            </div>

                            <div>
                                <label class="radiobutton_container">
                                <input id="3" name="radio" type="radio">
                                <span class="radiobutton_mark"></span>
                                Pembersihan Under Raised Floor Koridor Lantai 1 (MMR 1&2, Ruang UPS, Fire Suppression System & Server Wallmount)
                            </label>
                            </div>

                            <div>
                                <label class="radiobutton_container">
                                <input id="4" name="radio" type="radio">
                                <span class="radiobutton_mark"></span>
                                Pembersihan Lantai Dasar Ruang Facility Data Center (Trafo - Battery - PUTR - Genset - Bagian Luar PLN)
                            </label>
                            </div>

                            <div>
                                <label class="radiobutton_container">
                                <input id="5" name="radio" type="radio">
                                <span class="radiobutton_mark"></span>
                                Pembersihan Lantai Dasar Data Center (ruang Server)
                            </label>
                            </div>

                            <div>
                                <label class="radiobutton_container">
                                <input id="6" name="radio" type="radio">
                                <span class="radiobutton_mark"></span>
                                Pest Control (Insect & Rodent Control)
                            </label>
                            </div>

                            <h5 class="text-white">Visitor Name :</h3>
                                <div>
                                    <label class="radiobutton_container">
                                    <input id="riko" name="riko" type="radio">
                                    <span class="radiobutton_mark"></span>
                                    Riko Adi Pratama
                                </label>
                                </div>

                                <div>
                                    <label class="radiobutton_container">
                                    <input id="jejen" name="jejen" type="radio">
                                    <span class="radiobutton_mark"></span>
                                    Jejen Jenudin
                                </label>
                                </div>

                                <div>
                                    <label class="radiobutton_container">
                                    <input id="fani" name="fani" type="radio">
                                    <span class="radiobutton_mark"></span>
                                    Alfani Sulaeman
                                </label>
                                </div>

                                <div>
                                    <label class="radiobutton_container">
                                    <input id="andi" name="andi" type="radio">
                                    <span class="radiobutton_mark"></span>
                                    Andi Sugandi
                                </label>
                                </div>

                                <h5 class="text-white">Tanggal Pengerjaan </h5>
                                <div>
                                    <p><label>Mulai :</label>
                                    <input id="mulai" type="date" name="tanggal1" style="background: white;"/>
                                    </p>
                                </div>

                                <div>
                                    <p><label>Sampai :</label>
                                    <input id="sampai" type="date" name="tanggal2" style="background: white;"/>
                                    </p>
                                </div>

                            {{-- <input type="text" id="input-group" placeholder="Nama Pengunjung"> --}}
                            <input type="text" id="input-group" placeholder="Nama Perusahaan">
                            <input type="text" id="input-group" placeholder="Nomor ID">
                            <input type="text" id="input-group" placeholder="Departemen Pengunjung">
                            <input type="text" id="input-group" placeholder="Nomor Handphone">

                            <h6 class="text-white">Vadility</h6>
                            <select id="input-group3" style="background: black;">
                                <option value="">From</option>
                                <option value="">00:00</option>
                        </select>
                            <select id="input-group3" style="background: black;">
                            <option value="">To</option>
                            <option value="">00:00</option>
                        </select>

                            <div>
                                <h6 class="text-white">Waktu</h6>
                                <select id="input-group3" style="background: black;">
                            <option value="">Masuk</option>
                            <option value="">00:00</option>
                            <option value="">01:00</option>
                            <option value="">02:00</option>
                            <option value="">03:00</option>
                            <option value="">04:00</option>
                            <option value="">05:00</option>
                            <option value="">06:00</option>
                            <option value="">07:00</option>
                            <option value="">08:00</option>
                            <option value="">09:00</option>
                            <option value="">10:00</option>
                            <option value="">11:00</option>
                            <option value="">12:00</option>
                            <option value="">13:00</option>
                            <option value="">14:00</option>
                            <option value="">15:00</option>
                            <option value="">16:00</option>
                            <option value="">17:00</option>
                            <option value="">18:00</option>
                            <option value="">19:00</option>
                            <option value="">20:00</option>
                            <option value="">21:00</option>
                            <option value="">22:00</option>
                            <option value="">23:00</option>
                            <option value="">24:00</option>
                        </select>
                                <select id="input-group3" style="background: black;">
                            <option value="">Keluar</option>
                            <option value="">00:00</option>
                            <option value="">01:00</option>
                            <option value="">02:00</option>
                            <option value="">03:00</option>
                            <option value="">04:00</option>
                            <option value="">05:00</option>
                            <option value="">06:00</option>
                            <option value="">07:00</option>
                            <option value="">08:00</option>
                            <option value="">09:00</option>
                            <option value="">10:00</option>
                            <option value="">11:00</option>
                            <option value="">12:00</option>
                            <option value="">13:00</option>
                            <option value="">14:00</option>
                            <option value="">15:00</option>
                            <option value="">16:00</option>
                            <option value="">17:00</option>
                            <option value="">18:00</option>
                            <option value="">19:00</option>
                            <option value="">20:00</option>
                            <option value="">21:00</option>
                            <option value="">22:00</option>
                            <option value="">23:00</option>
                            <option value="">24:00</option>
                        </select>
                            </div>
                    </div>
                    <!--input-->
                    <h6 class="text-white">Area Yang Dimasuki</h6>
                    <select id="input-group" style="background: black;">

                <option value="">Server Room</option>
                <option value="">MMR 1</option>
                <option value="">MMR 2</option>
                <option value="">UPS Room</option>
                <option value="">Generator Room</option>
                <option value="">Panel Room</option>
                <option value="">Battery Room</option>
                <option value="">FSS Room</option>
                <option value="">Trafo Room</option>
                <option value="">Parking Lot</option>
                <option value="">Yard</option>
                <option value="">Other Lantai 1</option>
            </select>
                    <select id="input-group" style="background: black;">
                <option value="">Tipe Akses</option>
                <option value="">General Access</option>
                <option value="">Limited Access</option>
                <option value="">Escorted Access</option>
            </select>
                </div>
                <!--input4-->

                <div id="form">
                    <!--form-->
                    <h1 class="text-white">Change Request Form</h1>
                    <h2 class="text-white">Nomor: ARF/001/DCDV/XI/2019</h2>

                    <div id="input">
                        <!--input-->
                        <div id="input4">
                            <!--input4-->
                            <input type="text" id="input-group" placeholder="Deskripsikan Pekerjaan">
                            <input type="text" id="input-group" placeholder="Resiko dan Dampak Area Servis">
                            <input type="text" id="input-group" placeholder="Barang yang Digunakan">
                            <input type="text" id="input-group" placeholder="Testing & Verivication">
                            <input type="text" id="input-group" placeholder="Rollback Plan">
                        </div>
                        <button type="submit" class="btn btn-warning text-white btn-submit">Submit Form</button>
                        <button type="reset" class="btn btn-primary">Clear Form</button>
        </form>
        <!--form-->
        </div>
        <!--container-->

</body>

<script type="text/javascript">

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
</script>
</html>
