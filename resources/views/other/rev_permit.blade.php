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

    {{-- ajax --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    {{-- Select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

                        {{-- PIC --}}
                        <div class="row">
                            <div class="col-2">
                                <label for="js-example-basic-single1"><strong>Personil 1 :</strong></label>
                                <select class=" nama-pic1 form-select" name="pic1" id="js-example-basic-single1">
                                    <option value="{{$rev->pic1}}" selected>{{$rev->pic1}} </option>
                                    @foreach($personil as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                    @endforeach
                                </select>

                                <label class="mt-4" for="pic2"><strong>Personil 2 :</strong></label>
                                <select class="nama-pic2 form-select" name="pic2" id="js-example-basic-single1">
                                    <option value="{{$rev->pic2}}" selected>{{$rev->pic2}} </option>
                                    @foreach($personil as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                    @endforeach
                                </select>

                                <label class="mt-4" for="pic3"><strong>Personil 3 :</strong></label>
                                <select class=" nama-pic3 form-select" name="pic3" id="js-example-basic-single1">
                                    <option value="{{$rev->pic3}}" selected>{{$rev->pic3}} </option>
                                    @foreach($personil as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                    @endforeach
                                </select>

                                <label class="mt-4" for="pic4"><strong>Personil 4 :</strong></label>
                                <select class=" nama-pic4 form-select" name="pic4" id="js-example-basic-single1">
                                    <option value="{{$rev->pic4}}" selected>{{$rev->pic4}} </option>
                                    @foreach($personil as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                    @endforeach
                                </select>

                                <label class="mt-4" for="pic5"><strong>Personil 5 :</strong></label>
                                <select class=" nama-pic5 form-select" name="pic5" id="js-example-basic-single1">
                                    <option value="{{$rev->pic5}}" selected>{{$rev->pic5}} </option>
                                    @foreach($personil as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-2">
                                <label class="" for="company_1"><strong>Company :</strong></label>
                                <input class="form-control" type="text" id="company_1" name="company_1" value="{{$rev->company_1}}" placeholder="Company" readonly>

                                <label class="mt-4" for="company_2"><strong>Company :</strong></label>
                                <input class="form-control" type="text" id="company_2" name="company_2" value="{{$rev->company_2}}" placeholder="Company" readonly>

                                <label class="mt-4" for="company_3"><strong>Company :</strong></label>
                                <input class="form-control" type="text" id="company_3" name="company_3" value="{{$rev->company_3}}" placeholder="Company" readonly>

                                <label class="mt-4" for="company_4"><strong>Company :</strong></label>
                                <input class="form-control" type="text" id="company_4" name="company_4" value="{{$rev->company_4}}" placeholder="Company" readonly>

                                <label class="mt-4" for="company_5"><strong>Company :</strong></label>
                                <input class="form-control" type="text" id="company_5" name="company_5" value="{{$rev->company_5}}" placeholder="Company" readonly>
                            </div>

                            <div class="col-2">
                                <label class="" for="department_1"><strong>Department :</strong></label>
                                <input class="form-control" type="text" id="department_1" name="department_1" value="{{$rev->department_1}}" placeholder="Department" readonly>

                                <label class="mt-4" for="department_2"><strong>Department :</strong></label>
                                <input class="form-control" type="text" id="department_2" name="department_2" value="{{$rev->department_2}}" placeholder="Department" readonly>

                                <label class="mt-4" for="department_3"><strong>Department :</strong></label>
                                <input class="form-control" type="text" id="department_3" name="department_3" value="{{$rev->department_3}}" placeholder="Department" readonly>

                                <label class="mt-4" for="department_4"><strong>Department :</strong></label>
                                <input class="form-control" type="text" id="department_4" name="department_4" value="{{$rev->department_4}}" placeholder="Department" readonly>

                                <label class="mt-4" for="department_5"><strong>Department :</strong></label>
                                <input class="form-control" type="text" id="department_5" name="department_5" value="{{$rev->department_5}}" placeholder="Department" readonly>
                            </div>

                            <div class="col-2">
                                <label class="" for="respon_1"><strong>Responsibility :</strong></label>
                                <input class="form-control" type="text" id="respon_1" name="respon_1" value="{{$rev->respon_1}}" placeholder="Responsibility" readonly>

                                <label class="mt-4" for="respon_2"><strong>Responsibility :</strong></label>
                                <input class="form-control" type="text" id="respon_2" name="respon_2" value="{{$rev->respon_2}}" placeholder="Responsibility" readonly>

                                <label class="mt-4" for="respon_3"><strong>Responsibility :</strong></label>
                                <input class="form-control" type="text" id="respon_3" name="respon_3" value="{{$rev->respon_3}}" placeholder="Responsibility" readonly>

                                <label class="mt-4" for="respon_4"><strong>Responsibility :</strong></label>
                                <input class="form-control" type="text" id="respon_4" name="respon_4" value="{{$rev->respon_4}}" placeholder="Responsibility" readonly>

                                <label class="mt-4" for="respon_5"><strong>Responsibility :</strong></label>
                                <input class="form-control" type="text" id="respon_5" name="respon_5" value="{{$rev->respon_5}}" placeholder="Responsibility" readonly>
                            </div>

                            <div class="col-2">
                                <label class="" for="phone_1"><strong>Phone Number :</strong></label>
                                <input class="form-control " type="text" id="phone_1" name="phone_1" value="{{$rev->phone_1}}" placeholder="Phone Number" readonly>

                                <label class="mt-4" for="phone_2"><strong>Phone Number :</strong></label>
                                <input class="form-control " type="text" id="phone_2" name="phone_2" value="{{$rev->phone_2}}" placeholder="Phone Number" readonly>

                                <label class="mt-4" for="phone_3"><strong>Phone Number :</strong></label>
                                <input class="form-control " type="text" id="phone_3" name="phone_3" value="{{$rev->phone_3}}" placeholder="Phone Number" readonly>

                                <label class="mt-4" for="phone_4"><strong>Phone Number :</strong></label>
                                <input class="form-control " type="text" id="phone_4" name="phone_4" value="{{$rev->phone_4}}" placeholder="Phone Number" readonly>

                                <label class="mt-4" for="phone_5"><strong>Phone Number :</strong></label>
                                <input class="form-control " type="text" id="phone_5" name="phone_5" value="{{$rev->phone_5}}" placeholder="Phone Number" readonly>
                            </div>

                            <div class="col-2">
                                <label class="" for="id_1"><strong>ID Number :</strong></label>
                                <input type="text" class="form-control" id="id_1" name="id_1" value="{{$rev->id_1}}" placeholder="ID Number" readonly>

                                <label class="mt-4" for="id_2"><strong>ID Number :</strong></label>
                                <input type="text" class="form-control" id="id_2" name="id_2" value="{{$rev->id_2}}" placeholder="ID Number" readonly>

                                <label class="mt-4" for="id_3"><strong>ID Number :</strong></label>
                                <input type="text" class="form-control" id="id_3" name="id_3" value="{{$rev->id_3}}" placeholder="ID Number" readonly>

                                <label class="mt-4" for="id_4"><strong>ID Number :</strong></label>
                                <input type="text" class="form-control" id="id_4" name="id_4" value="{{$rev->id_4}}" placeholder="ID Number" readonly>

                                <label class="mt-4" for="id_5"><strong>ID Number :</strong></label>
                                <input type="text" class="form-control" id="id_5" name="id_5" value="{{$rev->id_5}}" placeholder="ID Number" readonly>
                            </div>
                        </div>

                        {{-- Authorized Entry Area --}}
                        <div class="card-body">

                            <div class="row">
                                <div class="col-1">

                                        <div class="form-check">
                                            <input type="checkbox" name="loc4" class="form-check-input" value="" id="loc4">
                                            <label class="form-check-label" for="loc4">Server Room</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" name="loc5" class="form-check-input" value="" id="loc5">
                                            <label class="form-check-label" for="loc5">UPS Room</label>
                                        </div>
                                        {{-- <div class="form-check">
                                            <input type="checkbox" name="loc10" class="form-check-input" value="" id="loc10">
                                            <label class="form-check-label" for="loc10">Panel Room</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" name="loc9" class="form-check-input" value="" id="loc9">
                                            <label class="form-check-label" for="loc9">Genset Room</label>
                                        </div> --}}
                                    </div>

                            </div>
                        </div>

                        {{-- risk and service area impact --}}
                        <div class="row">
                            <div class="col-3">
                                <label class="mt-4" for="risk_1"><strong>Risk Description :</strong></label>
                                <input type="text" class="form-control" id="risk_1" name="risk_1" value="{{$rev->risk_1}}" placeholder="Risk Description" readonly>

                                <label class="mt-4" for="risk_2"><strong>Risk Description :</strong></label>
                                <input type="text" class="form-control" id="risk_2" name="risk_2" value="{{$rev->risk_2}}" placeholder="Risk Description" readonly>

                                <label class="mt-4" for="risk_3"><strong>Risk Description :</strong></label>
                                <input type="text" class="form-control" id="risk_3" name="risk_3" value="{{$rev->risk_3}}" placeholder="Risk Description" readonly>

                                <label class="mt-4" for="risk_4"><strong>Risk Description :</strong></label>
                                <input type="text" class="form-control" id="risk_4" name="risk_4" value="{{$rev->risk_4}}" placeholder="Risk Description" readonly>

                                <label class="mt-4" for="risk_5"><strong>Risk Description :</strong></label>
                                <input type="text" class="form-control" id="risk_5" name="risk_5" value="{{$rev->risk_5}}" placeholder="Risk Description" readonly>
                            </div>
                            <div class="col-3">
                                <label class="mt-4" for="poss_1"><strong>Possibility :</strong></label>
                                <input type="text" class="form-control" id="poss_1" name="poss_1" value="{{$rev->poss_1}}" placeholder="Possibility" readonly>

                                <label class="mt-4" for="poss_2"><strong>Possibility :</strong></label>
                                <input type="text" class="form-control" id="poss_2" name="poss_2" value="{{$rev->poss_2}}" placeholder="Possibility" readonly>

                                <label class="mt-4" for="poss_3"><strong>Possibility :</strong></label>
                                <input type="text" class="form-control" id="poss_3" name="poss_3" value="{{$rev->poss_3}}" placeholder="Possibility" readonly>

                                <label class="mt-4" for="poss_4"><strong>Possibility :</strong></label>
                                <input type="text" class="form-control" id="poss_4" name="poss_4" value="{{$rev->poss_4}}" placeholder="Possibility" readonly>

                                <label class="mt-4" for="poss_5"><strong>Possibility :</strong></label>
                                <input type="text" class="form-control" id="poss_5" name="poss_5" value="{{$rev->poss_5}}" placeholder="Possibility" readonly>
                            </div>
                            <div class="col-2">
                                <label class="mt-4" for="impact_1"><strong>Impact :</strong></label>
                                <input type="text" class="form-control" id="impact_1" name="impact_1" value="{{$rev->impact_1}}" placeholder="Impact" readonly>

                                <label class="mt-4" for="impact_2"><strong>Impact :</strong></label>
                                <input type="text" class="form-control" id="impact_2" name="impact_2" value="{{$rev->impact_2}}" placeholder="Impact" readonly>

                                <label class="mt-4" for="impact_3"><strong>Impact :</strong></label>
                                <input type="text" class="form-control" id="impact_3" name="impact_3" value="{{$rev->impact_3}}" placeholder="Impact" readonly>

                                <label class="mt-4" for="impact_4"><strong>Impact :</strong></label>
                                <input type="text" class="form-control" id="impact_4" name="impact_4" value="{{$rev->impact_4}}" placeholder="Impact" readonly>

                                <label class="mt-4" for="impact_5"><strong>Impact :</strong></label>
                                <input type="text" class="form-control" id="impact_5" name="impact_5" value="{{$rev->impact_5}}" placeholder="Impact" readonly>
                            </div>
                            <div class="col-4">
                                <label class="mt-4" for="mitigation_1"><strong>Mitigation :</strong></label>
                                <input type="text" class="form-control" id="mitigation_1" name="mitigation_1" value="{{$rev->mitigation_1}}" placeholder="Mitigation" readonly>

                                <label class="mt-4" for="mitigation_2"><strong>Mitigation :</strong></label>
                                <input type="text" class="form-control" id="mitigation_2" name="mitigation_2" value="{{$rev->mitigation_2}}" placeholder="Mitigation" readonly>

                                <label class="mt-4" for="mitigation_3"><strong>Mitigation :</strong></label>
                                <input type="text" class="form-control" id="mitigation_3" name="mitigation_3" value="{{$rev->mitigation_3}}" placeholder="Mitigation" readonly>

                                <label class="mt-4" for="mitigation_4"><strong>Mitigation :</strong></label>
                                <input type="text" class="form-control" id="mitigation_4" name="mitigation_4" value="{{$rev->mitigation_4}}" placeholder="Mitigation" readonly>

                                <label class="mt-4" for="mitigation_5"><strong>Mitigation :</strong></label>
                                <input type="text" class="form-control" id="mitigation_5" name="mitigation_5" value="{{$rev->mitigation_5}}" placeholder="Mitigation" readonly>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
{{-- <div class="row">

    <label class="mt-4" for="val_from"><strong>Validity From :</strong></label>
    <input type="date" class="form-control @error('val_from') is-invalid @enderror" required autocomplete="val_from" id="val_from" name="val_from" value="{{$rev->val_from}}"><br>
    @error('val_from')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <label class="mt-4" for="val_to"><strong>Validity To :</strong></label>
    <input type="date" class="form-control @error('val_to') is-invalid @enderror" required autocomplete="val_to" id="val_to" name="val_to" value="{{$rev->val_to}}"><br>
    @error('val_to')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="col-1">
    <div class="form-check">
        <input type="checkbox" name="loc2" class="form-check-input" value="" id="loc2">
        <label class="form-check-label" for="loc2">Office 2nd Fl</label>
    </div>
    <div class="form-check">
        <input type="checkbox" name="loc3" class="form-check-input" value="" id="loc3">
        <label class="form-check-label" for="loc3">Office 3rd Fl</label>
    </div>
    <div class="form-check">
        <input type="checkbox" name="loc1" class="form-check-input" value="" id="loc1">
        <label class="form-check-label" for="loc1">Lt. 1</label>
    </div>
    <div class="form-check">
        <input type="checkbox" name="loc14" class="form-check-input" value="" id="loc14">
        <label class="form-check-label" for="loc14">Yard</label>
    </div>
</div>
<div class="col-1">
    <div class="form-check">
        <input type="checkbox" name="loc11" class="form-check-input" value="" id="loc11">
        <label class="form-check-label" for="loc11">Battery Room</label>
    </div>
    <div class="form-check">
        <input type="checkbox" name="loc12" class="form-check-input" value="" id="loc12">
        <label class="form-check-label" for="loc12">Trafo Room</label>
    </div>
    <div class="form-check">
        <input type="checkbox" name="loc13" class="form-check-input" value="" id="loc13">
        <label class="form-check-label" for="loc13">Parking Lot</label>
    </div>

</div>
<div class="col-1">
    <div class="form-check">
        <input type="checkbox" name="loc6" class="form-check-input" value="" id="loc6">
        <label class="form-check-label" for="loc6">MMR 1</label>
    </div>
    <div class="form-check">
        <input type="checkbox" name="loc8" class="form-check-input" value="" id="loc8">
        <label class="form-check-label" for="loc8">MMR 2</label>
    </div>
    <div class="form-check">
        <input type="checkbox" name="loc7" class="form-check-input" value="" id="loc7">
        <label class="form-check-label" for="loc7">FSS</label>
    </div>
</div>
<div class="col-1">
    <label class="" for="time_1"><strong>Time :</strong></label>
    <input type="time" class="form-control" id="time_1" name="time_1" value="{{$rev->time_1}}" placeholder="Time">
    @error('time_1')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <label class="mt-4" for="time_2"><strong>Time :</strong></label>
    <input type="time" class="form-control" id="time_2" name="time_2" value="{{$rev->time_2}}" placeholder="Time">
    @error('time_2')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <label class="mt-4" for="time_3"><strong>Time :</strong></label>
    <input type="time" class="form-control" id="time_3" name="time_3" value="{{$rev->time_3}}" placeholder="Time">
    @error('time_3')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <label class="mt-4" for="time_4"><strong>Time :</strong></label>
    <input type="time" class="form-control" id="time_4" name="time_4" value="{{$rev->time_4}}" placeholder="Time">
    @error('time_4')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <label class="mt-4" for="time_5"><strong>Time :</strong></label>
    <input type="time" class="form-control" id="time_5" name="time_5" value="{{$rev->time_5}}" placeholder="Time">
    @error('time_5')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="col-5">
    <label class="" for="activity_1"><strong>Activity :</strong></label>
    <input type="text" class="form-control" id="activity_1" name="activity_1" value="{{$rev->activity_1}}" placeholder="Activity" readonly>

    <label class="mt-4" for="activity_2"><strong>Activity :</strong></label>
    <input type="text" class="form-control" id="activity_2" name="activity_2" value="{{$rev->activity_2}}" placeholder="Activity" readonly>

    <label class="mt-4" for="activity_3"><strong>Activity :</strong></label>
    <input type="text" class="form-control" id="activity_3" name="activity_3" value="{{$rev->activity_3}}" placeholder="Activity" readonly>

    <label class="mt-4" for="activity_4"><strong>Activity :</strong></label>
    <input type="text" class="form-control" id="activity_4" name="activity_4" value="{{$rev->activity_4}}" placeholder="Activity" readonly>

    <label class="mt-4" for="activity_5"><strong>Activity :</strong></label>
    <input type="text" class="form-control" id="activity_5" name="activity_5" value="{{$rev->activity_5}}" placeholder="Activity" readonly>
</div>
<div class="col-2">
    <label class="" for="item_1"><strong>Item :</strong></label>
    <input type="text" class="form-control" id="item_1" name="item_1" value="{{$rev->item_1}}" placeholder="Item" readonly>

    <label class="mt-4" for="item_2"><strong>Item :</strong></label>
    <input type="text" class="form-control" id="item_2" name="item_2" value="{{$rev->item_2}}" placeholder="Item" readonly>

    <label class="mt-4" for="item_3"><strong>Item :</strong></label>
    <input type="text" class="form-control" id="item_3" name="item_3" value="{{$rev->item_3}}" placeholder="Item" readonly>

    <label class="mt-4" for="item_4"><strong>Item :</strong></label>
    <input type="text" class="form-control" id="item_4" name="item_4" value="{{$rev->item_4}}" placeholder="Item" readonly>

    <label class="mt-4" for="item_5"><strong>Item :</strong></label>
    <input type="text" class="form-control" id="item_5" name="item_5" value="{{$rev->item_5}}" placeholder="Item" readonly>
</div> --}}
<script type="text/javascript">

    $(document).ready(function(){
        $('.js-example-basic-single').select2();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });

        $('.nama-pic1').change(function(){
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

        $('.nama-pic2').change(function(){
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

        $('.nama-pic3').change(function(){
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

        $('.nama-pic4').change(function(){
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

        $('.nama-pic5').change(function(){
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
                $('#activity_1').val(data.activity_1);
                $('#activity_2').val(data.activity_2);
                $('#activity_3').val(data.activity_3);
                $('#activity_4').val(data.activity_4);
                $('#activity_5').val(data.activity_5);
                $('#detail_1').val(data.detail_1);
                $('#detail_2').val(data.detail_2);
                $('#detail_3').val(data.detail_3);
                $('#detail_4').val(data.detail_4);
                $('#detail_5').val(data.detail_5);
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
    });
</script>
</html>
