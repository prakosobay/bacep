<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCESS & CHANGE REQUEST FORM</title>
    <link rel="stylesheet" href="{{asset('/css/other.css')}}">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="/cleaning.js" defer></script> -->

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <style>
    .nav-item .nav-link {
         color: white;
         font-size: 25px;
         }

    .navbar{
        margin-left: 100px;
        margin-right: 100px;
        opacity: 0.9;
        background-color: #000
    }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-dark ">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item mr-10">
                <a class="nav-link" href="{{url('/home')}}"><strong>Home</strong></a>
            </li>
            <li class="nav-item mr-10">
                <a class="nav-link" href="{{url('/perbaikan')}}"><strong>Isian</strong></a>
            </li>
            <li class="nav-item mr-10">
                <a class="nav-link" href="{{url('rutin')}}"><strong>Rutin</strong></a>
            </li>
        </ul>
    </div>
</nav>

@yield('content')

</body>

<script type="text/javascript">
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

    $('#pic1').change(function(){
        let id = $(this).val();
        $.ajax({
            url: "{{url("/personil")}}"+'/'+id,
            dataType:"json",
            type: "get",
            success: function(response){
                const {personil} = response;
                console.log(personil)
            $('#company_1').val(personil.company);
            $('#department_1').val(personil.department);
            $('#respon_1').val(personil.respon);
            $('#phone_1').val(personil.phone);
            $('#id_1').val(personil.nik);
            }
        });
    });

    $('#pic2').change(function(){
        let id = $(this).val();
        $.ajax({
            url: "{{url("/personil")}}"+'/'+id,
            dataType:"json",
            type: "get",
            success: function(response){
                const {personil} = response;
                console.log(personil)
            $('#company_2').val(personil.company);
            $('#department_2').val(personil.department);
            $('#respon_2').val(personil.respon);
            $('#phone_2').val(personil.phone);
            $('#id_2').val(personil.nik);
            }
        });
    });

    $('#pic3').change(function(){
        let id = $(this).val();
        $.ajax({
            url: "{{url("/personil")}}"+'/'+id,
            dataType:"json",
            type: "get",
            success: function(response){
                const {personil} = response;
                console.log(personil)
            $('#company_3').val(personil.company);
            $('#department_3').val(personil.department);
            $('#respon_3').val(personil.respon);
            $('#phone_3').val(personil.phone);
            $('#id_3').val(personil.nik);
            }
        });
    });

    $('#pic4').change(function(){
        let id = $(this).val();
        $.ajax({
            url: "{{url("/personil")}}"+'/'+id,
            dataType:"json",
            type: "get",
            success: function(response){
                const {personil} = response;
                console.log(personil)
            $('#company_4').val(personil.company);
            $('#department_4').val(personil.department);
            $('#respon_4').val(personil.respon);
            $('#phone_4').val(personil.phone);
            $('#id_4').val(personil.nik);
            }
        });
    });

    $('#pic5').change(function(){
        let id = $(this).val();
        $.ajax({
            url: "{{url("/personil")}}"+'/'+id,
            dataType:"json",
            type: "get",
            success: function(response){
                const {personil} = response;
                console.log(personil)
            $('#company_5').val(personil.company);
            $('#department_5').val(personil.department);
            $('#respon_5').val(personil.respon);
            $('#phone_5').val(personil.phone);
            $('#id_5').val(personil.nik);
            }
        });
    });

    $('#rutin').change(function(){
        let id = $(this).val();
        $.ajax({
            url: "{{url("/rutins")}}"+'/'+id,
            dataType:"json",
            type: "get",
            success: function(response){
                const {data} = response;
                console.log(data)
            $('#desc').val(data.desc);
            $('#item_1').val(data.item_1);
            $('#item_2').val(data.item_2);
            $('#item_3').val(data.item_3);
            $('#item_4').val(data.item_4);
            $('#item_5').val(data.item_5);
            $('#procedure_1').val(data.procedure_1);
            $('#procedure_2').val(data.procedure_2);
            $('#procedure_3').val(data.procedure_3);
            $('#procedure_4').val(data.procedure_4);
            $('#procedure_5').val(data.procedure_5);
            $('#risk_1').val(data.risk_1);
            $('#risk_2').val(data.risk_2);
            $('#risk_3').val(data.risk_3);
            $('#risk_4').val(data.risk_4);
            $('#risk_5').val(data.risk_5);
            $('#impact_1').val(data.impact_1);
            $('#impact_2').val(data.impact_2);
            $('#impact_3').val(data.impact_3);
            $('#impact_4').val(data.impact_4);
            $('#impact_5').val(data.impact_5);
            $('#poss_1').val(data.poss_1);
            $('#poss_2').val(data.poss_2);
            $('#poss_3').val(data.poss_3);
            $('#poss_4').val(data.poss_4);
            $('#poss_5').val(data.poss_5);
            $('#mitigation_1').val(data.mitigation_1);
            $('#mitigation_2').val(data.mitigation_2);
            $('#mitigation_3').val(data.mitigation_3);
            $('#mitigation_4').val(data.mitigation_4);
            $('#mitigation_5').val(data.mitigation_5);
            $('#loc1').val(data.loc1);
            $('#loc2').val(data.loc2);
            $('#loc3').val(data.loc3);
            $('#loc4').val(data.loc4);
            $('#loc5').val(data.loc5);
            $('#loc6').val(data.loc6);
            $('#loc7').val(data.loc7);
            $('#loc8').val(data.loc8);
            $('#loc9').val(data.loc9);
            $('#loc10').val(data.loc10);
            $('#loc11').val(data.loc11);
            $('#loc12').val(data.loc12);
            $('#loc13').val(data.loc13);
            $('#loc14').val(data.loc14);
            }
        });
    });

    $(".btn-submit2").click(function(e){
        e.preventDefault();
        var datastring = $("#form_rutin").serialize();
        $.ajax({
            type:'POST',
            url:"{{url('rutin.form')}}",
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
})
</script>
</html>
