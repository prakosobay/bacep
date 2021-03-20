<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/new_survey.css') }}"> --}}
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />

    <style>
        .js-example-basic-multiple{
            min-width: 620px;
            max-width: 620px;
        }
    </style>


    <script src="{{ asset('js/select2.min.js') }}" defer></script>
    {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> --}}
    <script src="{{ asset('js/new_survey.js') }}" defer></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Survey</title>
</head>

<body>

<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Enter Your Details Here</div>
            <form id="form_new_survey" class="form-group">
                {{ csrf_field() }}
			<div class="panel-body">
				<form name="myform">

					<div class="form-group">
						<label for="survey_name">Name *</label>
						<input id="survey_name" name="survey_name" class="form-control" type="text" data-validation="required">
						<span id="error_survey_name" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="survey_company">Company *</label>
						<input id="survey_company" name="survey_company"  class="form-control" type="text" data-validation="required" >
						<span id="error_survey_company" class="text-danger"></span>
					</div>
                    <div class="form-group">
						<label for="survey_department">Department *</label>
						<input id="survey_department" name="survey_department" class="form-control" type="text" data-validation="required">
						<span id="error_survey_department" class="text-danger"></span>
					</div>
                    <div class="form-group">
						<label for="survey_id">ID Number *</label>
						<input id="survey_id" name="survey_id" class="form-control" type="text" data-validation="required">
						<span id="error_survey_id" class="text-danger"></span>
					</div>
                    <div class="form-group">
						<label for="survey_phone">Phone Number *</label>
						<input id="survey_phone" name="survey_phone" class="form-control" type="number" data-validation="required">
						<span id="error_survey_phone" class="text-danger"></span>
					</div>
					<div class="form-group">
                        <p><label>Time of Visit</label></p>
						<label for="survey_date_from">From *</label>
						<input type="date" name="survey_date_from" id="survey_date_from" class="form-control" data-validation="required">
						<span id="error_survey_date_from" class="text-danger"></span>
					</div>
                    <div class="form-group">
						<label for="survey_date_to">To *</label>
						<input type="date" name="survey_date_to" id="survey_date_to" class="form-control" data-validation="required">
						<span id="error_survey_date_to" class="text-danger"></span>
					</div>
                    <div class="form-group">
						<label for="survey_area">Authorized Entry Area *</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="server" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">Server Room</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="generator" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault1">Generator Room</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mmr1" id="flexRadioDefault3">
                                <label class="form-check-label" for="flexRadioDefault1">MMR 1</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="panel" id="flexRadioDefault4">
                                <label class="form-check-label" for="flexRadioDefault1">Panel Room</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mmr2" id="flexRadioDefault5">
                                <label class="form-check-label" for="flexRadioDefault1">MMR 2</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="battery" id="flexRadioDefault6">
                                <label class="form-check-label" for="flexRadioDefault1">Battery Room</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ups" id="flexRadioDefault7">
                                <label class="form-check-label" for="flexRadioDefault1">UPS Room</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="fss" id="flexRadioDefault8">
                                <label class="form-check-label" for="flexRadioDefault1">FSS Room</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="2nd" id="flexRadioDefault9">
                                <label class="form-check-label" for="flexRadioDefault1">Office 2nd FL</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="3rd" id="flexRadioDefault10">
                                <label class="form-check-label" for="flexRadioDefault1">Office 3rd FL</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="yard" id="flexRadioDefault11">
                                <label class="form-check-label" for="flexRadioDefault1">Yard</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="trafo" id="flexRadioDefault12">
                                <label class="form-check-label" for="flexRadioDefault1">Trafo Room</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="parking" id="flexRadioDefault13">
                                <label class="form-check-label" for="flexRadioDefault1">Parking Lot</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="other" id="flexRadioDefault14">
                                <label class="form-check-label" for="flexRadioDefault1">Others</label>
                            </div>

                    </div>

                    {{-- <div class="form-group">
						<label for="survey_lokasi">Authorized Entry Area *</label>
                            <p><select class="js-example-basic-multiple" name="survey_lokasi" multiple="multiple"></p>
                                <option value="AL">Server Room</option>
                                <option value="WY">MMR 1</option>
                                <option value="AL">MMR 2</option>
                                <option value="WY">UPS Room</option>
                                <option value="AL">Office 2nd FL</option>
                                <option value="WY">Yard</option>
                                <option value="AL">Generator Room</option>
                                <option value="WY">Panel Room</option>
                                <option value="AL">Battery Room</option>
                                <option value="WY">FSS Room</option>
                                <option value="AL">Office 3rd FL</option>
                                <option value="WY">Trafo Room</option>
                                <option value="AL">Parking Lot</option>
                                <option value="WY">Others</option>
                            </select>
						<span id="error_survey_lokasi" class="text-danger"></span>
					</div> --}}


					{{-- <div class="form-group">
						<label for="disc">Discription</label>
						<textarea class="form-control" rows="3"></textarea>
					</div> --}}

					<button id="submit" type="submit" value="submit" class="btn btn-primary center">Submit</button>
                    {{-- <button type="button" class="btn btn-warning text-white btn-submit">Submit Form</button> --}}
                    <button type="reset" class="btn btn-primary">Clear Form</button>
				</form>
			</div>
            </form>
		</div>
	</div>
</div>
</body>

<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

    $(".btn-submit").click(function(e){

        e.preventDefault();

        var datastring = $("#form_new_survey").serialize();
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

    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

</html>
