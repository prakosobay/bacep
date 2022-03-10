<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Revisi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.my-select-multiple').select2();
        });
    </script>

</head>
<body>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h2 mb-2 mt-2 text-gray-800 text-center"><strong>Revisi Permit Other</strong></h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" id="revisi" class="validate-form" action="{{url('rev_other', $rev->id)}}">
                        @method('PUT')
                        @csrf
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-2">
                                <label for="id"><strong>ID Permit :</strong></label>
                                <input type="number" class="form-control" id="id" name="other_id" value="{{$rev->other_id}}" readonly><br>
                            </div>
                            <div class="col-2">
                                <label for="dor"><strong>Date of Request :</strong></label>
                                <input type="text" class="form-control" id="dor" name="dor" value="{{Carbon\Carbon::parse($rev->created_at)->format('d-m-Y H:i')}}" readonly><br>
                            </div>
                            <div class="col-2">
                                <label for="requestor"><strong>Requestor :</strong></label>
                                <input type="text" class="form-control" id="requestor" name="requestor" value="{{$requestor->name}}" readonly><br>
                            </div>
                            <div class="col-6">
                                <label for="other_work"><strong>Purpose of Work :</strong></label>
                                <input type="text" class="form-control" id="other_work" name="other_work" value="{{$rev->other_work}}" readonly><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <label for="val_from"><strong>Validity From :</strong></label>
                                <input type="date" class="form-control @error('val_from') is-invalid @enderror" required autocomplete="val_from" id="val_from" name="val_from" value="{{$rev->val_from}}"><br>
                                @error('val_from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-2">
                                <label for="val_to"><strong>Validity To :</strong></label>
                                <input type="date" class="form-control @error('val_to') is-invalid @enderror" required autocomplete="val_to" id="val_to" name="val_to" value="{{$rev->val_to}}"><br>
                                @error('val_to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <h4 class="text-center"><strong>Authorized Entry Area</strong></h4><br>
                            <div class="col-2">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" value="" id="loc4">
                                    <label class="form-check-label" for="loc4">Server Room</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" value="" id="loc2">
                                    <label class="form-check-label" for="loc2">Office 2nd Fl</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" value="" id="loc3">
                                    <label class="form-check-label" for="loc3">Office 3rd Fl</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
