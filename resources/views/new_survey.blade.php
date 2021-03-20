<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/new_survey.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/new_survey.js') }}" defer></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
						<label for="purpose_work">Purpose of Work *</label>
						<input id="purpose_work" name="purpose_work" class="form-control" type="text" data-validation="required">
						<span id="error_purpose_work" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="visitor_name">Name *</label>
						<input id="visitor_name" name="visitor_name" class="form-control" type="text" data-validation="required">
						<span id="error_visitor_name" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="visitor_company">Company *</label>
						<input id="visitor_company" name="visitor_company"  class="form-control" type="text" min="required" >
						<span id="error_visitor_company" class="text-danger"></span>
					</div>

					<div class="form-group">
						<label for="dob">Date Of Birth *</label>
						<input type="date" name="dob" id="dob" class="form-control">
						<span id="error_dob" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="gender">Gender</label>
						<select name="gender" id="gender" class="form-control">
							<option selected>Male</option>
							<option>Female</option>
							<option>Other</option>
						</select>
						<span id="error_gender" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="phone">Phone Number *</label>
						<input type="text" id="phone" name="phone" class="form-control" >
						<span id="error_phone" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="disc">Discription</label>
						<textarea class="form-control" rows="3"></textarea>
					</div>

					{{-- <button id="submit" type="submit" value="submit" class="btn btn-primary center">Submit</button> --}}
                    <button type="button" class="btn btn-warning text-white btn-submit">Submit Form</button>
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
</script>

</html>
