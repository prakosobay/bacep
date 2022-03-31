@extends('layouts.permit')

@section('content')

    {{-- Form --}}
    <div class="bgmain display-flex">
        <div class="container form-container">
            <div class="backbtn">
                <a href="#"><img src="{{asset('gambar/home/bell.svg')}}" alt="">Back To Home</a>
            </div>
            <h4 class="margin-row text-center">Form Permit IT</h4>
            <div class="margin-row">
                <form id="myform" class="validate-form" enctype="multipart/form-data" method="POST" action="#">
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

                    <h5 class="margin-item"> Work Info</h5>
                    <div class="margin-item">
                        <label for="work">Purpose of Work</label>
                        <select class="form-select" aria-label="Default select" id="work" required autofocus>
                            <option selected>Select Purpose of Work</option>
                            <option value="1">Work One</option>
                            <option value="2">Work Two</option>
                            <option value="3">Work Three</option>
                        </select>
                    </div>

                    {{-- Validity --}}
                    <div class="form-group margin-item row">
                        <div class="col col-item">
                            <label for="date_visit">Date of Visit</label>
                            <input class="form-control @error('date_visit') is-invalid @enderror" required autocomplete="date_visit" type="date" name="date_visit" id="date_visit">
                        </div>
                        <div class="col-separator"></div>
                        <div class="col col-item">
                            <label for="date_leave">Date of Leave</label>
                            <input class="form-control @error('date_leave') is-invalid @enderror" required autocomplete="date_leave" type="date" name="date_leave" id="date_leave">
                        </div>
                    </div>

                    {{-- Authorized Area --}}
                    <div class="margin-item row">
                        <label class="col-item">Authorized Entry Area</label>
                        <div class="col-3 col-item">
                            <div class="form-check margin-item">
                                <input type="checkbox" class="form-check-input" id="server" name="loc1" value="1" required>
                                <label for="server">Server Room</label>
                            </div>
                            <div class="form-check margin-item">
                                <input type="checkbox" class="form-check-input" id="mmr1" name="loc2" value="1" required>
                                <label for="mmr1">MMR 1</label>
                            </div>
                            <div class="form-check margin-item">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                MMR 2
                            </div>
                            <div class="form-check margin-item">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                UPS Room
                            </div>
                        </div>
                        <div class="col-3 col-item">
                            <div class="form-check margin-item">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                FSS Room
                            </div>
                            <div class="form-check margin-item">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                CCTV Room
                            </div>
                            <div class="form-check margin-item">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                Yard
                            </div>
                            <div class="form-check margin-item">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                Parking Lot
                            </div>
                        </div>
                        <div class="col-3 col-item">
                            <div class="form-check margin-item">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                Battery Room
                            </div>
                            <div class="form-check margin-item">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                Generator Room
                            </div>
                            <div class="form-check margin-item">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                Panel Room
                            </div>
                            <div class="form-check margin-item">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                Trafo Room
                            </div>
                        </div>
                        <div class="col-3 col-item">
                            <div class="form-check margin-item">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                Office 2nd Floor
                            </div>
                            <div class="form-check margin-item">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                Office 3rd Floor
                            </div>
                            <div class="form-check margin-item">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                Other
                                <input type="" class="form-control">
                            </div>
                        </div>
                    </div>

                    <h5 class="margin-item">Work Info</h5>

                    {{-- Table Activity --}}
                    <table class="table table-bordered">
                        <label class="col-item">Detail Time Table of Activity</label>
                        <thead>
                            <tr>
                                <th scope="col">Time</th>
                                <th scope="col">Activity Description</th>
                                <th scope="col">Detail Service Impact</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="time" class="form-control @error('detail1') is-invalid @enderror" required autocomplete="time1" id="time1" name="time1">
                                    @error('time1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td><input type="text" class="form-control @error('detail1') is-invalid @enderror" required autocomplete="activity1" id="activity1" name="activity1">
                                    @error('activity1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td><input type="text" class="form-control @error('detail1') is-invalid @enderror" required autocomplete="detail1" id="detail1" name="detail1">
                                    @error('detail1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><input type="time" class="form-control"></td>
                                <td><input class="form-control"></td>
                                <td><input class="form-control"></td>
                            </tr>
                            <tr>
                                <td><input type="time" class="form-control"></td>
                                <td><input class="form-control"></td>
                                <td><input class="form-control"></td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- DEtail Execution --}}
                    <table class="table table-bordered">
                        <label class="col-item">Detail Operation and Execution</label>
                        <thead>
                            <tr>
                                <th class="col-4">Item</th>
                                <th class="col-8">Working Procedure</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" class="form-control @error('item1') is-invalid @enderror" required autocomplete="item1" id="item1" name="item1">
                                    @error('item1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td><input class="form-control"></td>
                            </tr>
                            <tr>
                                <td><input class="form-control"></td>
                                <td><input class="form-control"></td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- risk impact --}}
                    <table class="table table-bordered">
                        <label class="col-item">Risk Service Area Impact</label>
                        <thead>
                            <tr>
                                <th class="col-3">Risk Description</th>
                                <th class="col-3">Possibility</th>
                                <th class="col-3">Impact</th>
                                <th class="col-3">Mitigation Plan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" class="form-control @error('risk1') is-invalid @enderror" required autocomplete="risk1" id="risk1" name="risk1">
                                    @error('risk1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td><input type="text" class="form-control @error('possibility1') is-invalid @enderror" required autocomplete="possibility1" id="possibility1" name="possibility1">
                                    @error('possibility1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td><input type="text" class="form-control @error('impact1') is-invalid @enderror" required autocomplete="impact1" id="impact1" name="impact1">
                                    @error('impact1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td><input type="text" class="form-control @error('mitigation1') is-invalid @enderror" required autocomplete="mitigation1" id="mitigation1" name="mitigation1">
                                    @error('mitigation1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><input class="form-control"></td>
                                <td><input class="form-control"></td>
                                <td><input class="form-control"></td>
                                <td><input class="form-control"></td>
                            </tr>
                            <tr>
                                <td><input class="form-control"></td>
                                <td><input class="form-control"></td>
                                <td><input class="form-control"></td>
                                <td><input class="form-control"></td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- background --}}
                    <div class="form-group margin-item">
                        <label for="Background and Objective"></label>
                        <input type="text" class="form-control @error('background') is-invalid @enderror" required autocomplete="background" id="background" name="background">
                        @error('background')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group margin-item">
                        <label>Scope of Work Description</label>
                        <input class="form-control">
                    </div>
                    <div class="form-group margin-item row">
                        <div class="col col-item">
                            <label>Testing and Verification</label>
                            <input class="form-control">
                        </div>
                        <div class="col-separator"></div>
                        <div class="col col-item">
                            <label>Rollback Operation</label>
                            <input class="form-control">
                        </div>
                    </div>

                    {{-- Visitor --}}
                    <h5 class="margin-item">Visitors & Person in Charge Identity</h5>
                    <div class="form-group margin-item row">
                        <div class="col col-item">
                            <label>Visitor 1 Name (Person in Charge)</label>
                            <input class="form-control">
                        </div>
                        <div class="col-separator"></div>
                        <div class="col col-item">
                            <label>ID Number</label>
                            <input class="form-control">
                        </div>
                        <div class="col-separator"></div>
                        <div class="col col-item">
                            <label>Phone Number</label>
                            <input class="form-control">
                        </div>
                    </div>
                    <div class="form-group margin-item row">
                        <div class="col col-item">
                            <label>Visitor 2 Name (Person in Charge)</label>
                            <input class="form-control">
                        </div>
                        <div class="col-separator"></div>
                        <div class="col col-item">
                            <label>ID Number</label>
                            <input class="form-control">
                        </div>
                        <div class="col-separator"></div>
                        <div class="col col-item">
                            <label>Phone Number</label>
                            <input class="form-control">
                        </div>
                    </div>
                    <div class="form-group margin-item row">
                        <div class="col col-item">
                            <label>Visitor 3 Name</label>
                            <input class="form-control">
                        </div>
                        <div class="col-separator"></div>
                        <div class="col col-item">
                            <label>ID Number</label>
                            <input class="form-control">
                        </div>
                        <div class="col-separator"></div>
                        <div class="col col-item">
                            <label>Phone Number</label>
                            <input class="form-control">
                        </div>
                    </div>
                    <div class="form-group margin-item row">
                        <div class="col col-item">
                            <label>Visitor 4 Name</label>
                            <input class="form-control">
                        </div>
                        <div class="col-separator"></div>
                        <div class="col col-item">
                            <label>ID Number</label>
                            <input class="form-control">
                        </div>
                        <div class="col-separator"></div>
                        <div class="col col-item">
                            <label>Phone Number</label>
                            <input class="form-control">
                        </div>
                    </div>
                    <div class="form-group margin-item row">
                        <div class="col col-item">
                            <label>Visitor 5 Name</label>
                            <input class="form-control">
                        </div>
                        <div class="col-separator"></div>
                        <div class="col col-item">
                            <label>ID Number</label>
                            <input class="form-control">
                        </div>
                        <div class="col-separator"></div>
                        <div class="col col-item">
                            <label>Phone Number</label>
                            <input class="form-control">
                        </div>
                    </div>

                    <div class="submit-container margin-item">
                        <button href="#" type="submit" class="btn btn-primary">Submit</button>
                        <button type="cancel" class="btn btn-secondary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

