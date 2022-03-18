<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCESS REQUEST FORM</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ar.css') }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <!--container-->

        <form id="form_survey" class="form-group">
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

                        <input type="text" id="input-group" placeholder="Purpose of Work (Pekerjaan yang dilakukan)" name="purpose_work">
                        <input type="text" id="input-group" placeholder="Visitor Name (Nama Pengunjung)" name="visitor_name">
                        <input type="text" id="input-group" placeholder="Visitor Company (Nama Perusahaan)" name="visitor_company">
                        <input type="number" id="input-group" placeholder="Visitor ID Number (Nomor Identitas)" name="visitor_id">
                        <input type="text" id="input-group" placeholder="Visitor Department (Departemen Pengunjung)" name="visitor_department">
                        <input type="number" id="input-group" placeholder="Visitor Phone Number (Nomor Handphone)" name="visitor_phone">

                        <h6 class="text-white">Request Validity (Berlakunya Permintaan)</h6>
                        <input type="date" name="from" id="dateofbirth">
                        <h6 class="text-white"></h6>
                        <h6 class="text-white">To (Sampai)</h6>
                        <input type="date" name="to" id="dateofbirth">
                        <h6 class="text-white"></h6>

                        <h6 for="survey_area" class="text-white">Authorized Entry Area </h6>
                        <div>
                            <label class="radiobutton_container">
                            <input id="1" name="server" type="radio">
                            <span class="radiobutton_mark"></span>
                            Server Room
                            </label>
                        </div>
                        <div >
                            <label class="radiobutton_container">
                            <input id="1" name="generator" type="radio">
                            <span class="radiobutton_mark"></span>
                            Generator Room
                            </label>
                        </div>
                        <div>
                            <label class="radiobutton_container">
                            <input id="1" name="ups" type="radio">
                            <span class="radiobutton_mark"></span>
                            UPS Room
                            </label>
                        </div>
                        <div >
                            <label class="radiobutton_container">
                            <input id="1" name="panel" type="radio">
                            <span class="radiobutton_mark"></span>
                            Panel Room
                            </label>
                        </div>
                        <div >
                            <label class="radiobutton_container">
                            <input id="1" name="fss" type="radio">
                            <span class="radiobutton_mark"></span>
                            FSS Room
                            </label>
                        </div>
                        <div >
                            <label class="radiobutton_container">
                            <input id="1" name="staging" type="radio">
                            <span class="radiobutton_mark"></span>
                            Staging Room
                            </label>
                        </div>
                        <div >
                            <label class="radiobutton_container">
                            <input id="1" name="battery" type="radio">
                            <span class="radiobutton_mark"></span>
                            Battery Room
                            </label>
                        </div>
                        <div >
                            <label class="radiobutton_container">
                            <input id="1" name="trafo" type="radio">
                            <span class="radiobutton_mark"></span>
                            Trafo Room
                            </label>
                        </div>
                        <div >
                            <label class="radiobutton_container">
                            <input id="1" name="mmr1" type="radio">
                            <span class="radiobutton_mark"></span>
                            MMR 1
                            </label>
                        </div>
                        <div >
                            <label class="radiobutton_container">
                            <input id="1" name="mmr2" type="radio">
                            <span class="radiobutton_mark"></span>
                            MMR 2
                            </label>
                        </div>
                        <div >
                            <label class="radiobutton_container">
                            <input id="1" name="2nd" type="radio">
                            <span class="radiobutton_mark"></span>
                            Office 2nd FL
                            </label>
                        </div>
                        <div >
                            <label class="radiobutton_container">
                            <input id="1" name="3rd" type="radio">
                            <span class="radiobutton_mark"></span>
                            Office 3rd FL
                            </label>
                        </div>
                        <div >
                            <label class="radiobutton_container">
                            <input id="1" name="yard" type="radio">
                            <span class="radiobutton_mark"></span>
                            Yard
                            </label>
                        </div>
                        <div >
                            <label class="radiobutton_container">
                            <input id="1" name="parking" type="radio">
                            <span class="radiobutton_mark"></span>
                            Parking Area
                            </label>
                        </div>
                </div>
                <!--input4-->
                <button type="button" class="btn btn-warning text-white btn-submit">Submit Form</button>
                <button type="reset" class="btn btn-primary">Clear Form</button>
            </div>
            <!--form-->
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

        var datastring = $("#form_survey").serialize();
        $.ajax({
            type:'POST',
            url:"{{url('submit_data_survey')}}",
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
