<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCESS & CHANGE REQUEST FORM</title>
    <link rel="stylesheet" href="{{ asset('css/visitor.css') }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <!--container-->

        <form class="form-group">
            <!--form-->



            <div id="form">
                <!--form-->
                <h1 class="text-white">Access Request Form</h1>
                <h2 class="text-white">Nomor: ARF/001/DCDV/XI/2019</h2>


                <div id="input">
                    <!--input-->
                    <div id="input4">
                        <!--input4-->

                        <select id="input-group4" style="background: black;">
                            <option value="">Hari</option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                            <option value="">5</option>
                            <option value="">6</option>
                            <option value="">7</option>
                            <option value="">8</option>
                            <option value="">9</option>
                            <option value="">10</option>
                            <option value="">11</option>
                            <option value="">12</option>
                            <option value="">13</option>
                            <option value="">14</option>
                            <option value="">15</option>
                            <option value="">16</option>
                            <option value="">17</option>
                            <option value="">18</option>
                            <option value="">19</option>
                            <option value="">20</option>
                            <option value="">21</option>
                            <option value="">22</option>
                            <option value="">23</option>
                            <option value="">24</option>
                            <option value="">25</option>
                            <option value="">26</option>
                            <option value="">27</option>
                            <option value="">28</option>
                            <option value="">29</option>
                            <option value="">30</option>
                            <option value="">31</option>
                        </select>
                        <select id="input-group2" style="background: black;">
                            <option value="">Bulan</option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                            <option value="">5</option>
                            <option value="">6</option>
                            <option value="">7</option>
                            <option value="">8</option>
                            <option value="">9</option>
                            <option value="">10</option>
                            <option value="">11</option>
                            <option value="">12</option>
                        </select>

                        <select id="input-group3" style="background: black;">
                            <option value="">Tahun</option>
                            <option value="">2021</option>
                            <option value="">2022</option>
                            <option value="">2023</option>
                        </select>

                        <h5 class="text-white">Purpose of Work</h3>




                            <div>
                                <label class="radiobutton_container">
                            <input name="type" type="radio">
                            <span class="radiobutton_mark"></span>
                            Troubleshoot
                        </label>
                            </div>
                            <div>
                                <label class="radiobutton_container">
                            <input name="type" type="radio">
                            <span class="radiobutton_mark"></span>
                           Maintenance
                        </label>
                            </div>
                            <div>
                                <label class="radiobutton_container">
                            <input name="type" type="radio">
                            <span class="radiobutton_mark"></span>
                           Mounting
                        </label>
                            </div>
                            <div>
                                <label class="radiobutton_container">
                            <input name="type" type="radio" checked="checked">
                            <span class="radiobutton_mark"></span>
                            Un-Mounting
                        </label>
                            </div>
                            <div>

                                <label class="radiobutton_container">
                            <input name="type" type="radio">
                            <span class="radiobutton_mark"></span>
                            Survey
                        </label>
                            </div>





                            <input type="text" id="input-group" placeholder="Nama Pengunjung">
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
                                <p> <i> <span style="color:red">Maksimal Validitas 2 Hari</span></i> </p>

                            </div>


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


                            <h6 class="text-white">Upload Your ID (KTP)</h6>
                            <div class="drop-zone">
                                <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                <input type="file" name="myFile" class="drop-zone__input">
                            </div>
                        </div>

                        <div>
                            <p> <i> <span style="color:red">Is it done ? Please Submit</span></i> </p>

                        </div>
                        <button type="submit" class="btn btn-warning text-white">Submit Form</button>
                        <button type="reset" class="btn btn-primary">Clear Form</button>




        </form>
        <!--form-->

        </div>
        <!--container-->
        <script src="./src/main.js"></script>
</body>

</html>
