<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Form Checklist</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/perbaikan.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <h1><strong>Form Checklist Genset</strong></h1>
            <a href="{{url('table_barang')}}" type="button" class="btn btn-primary">Kembali</a>
            <form method="POST" id="checklist" class="validate-form">
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
                <table id="genset1" class="table table-bordered" >
                    <thead>
                        <tr>
                            <th>Generator 1</th>
                            <th><input class="text-center form-control form-control-sm" name="date1" type="date"></th>
                            <th><input class="text-center form-control form-control-sm" name="time1" type="time"></th>
                        </tr>
                        <tr>
                            <th>Task Details</th>
                            <th>Unit Status</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <label for="tighten">1. Tighten Battery Connection</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="1">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input id="tighten" class="form-control form-control-sm @error('tighten') is-invalid @enderror" required autocomplete="tighten" name="remark1" type="text" required autofocus>
                                    @error('tighten')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="open">2. Measurement Battery Voltage (Open Circuit)</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="2">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input id="open" class="form-control form-control-sm @error('open') is-invalid @enderror" required autocomplete="open" name="remark2" type="text" required>
                                    @error('open')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="charging">3. Measurement Battery Voltage (Charging Condition)</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="3">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input id="charging" class="form-control form-control-sm @error('charging') is-invalid @enderror" required autocomplete="charging" name="remark3" type="text" required>
                                    @error('charging')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="oil">4. Check For Lubricant Oil Level</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="4">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input id="oil" class="form-control form-control-sm @error('oil') is-invalid @enderror" required autocomplete="oil" name="remark4" type="text" required>
                                    @error('oil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="tank">5. Status Storage Tank Level</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="5">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input id="tank" class="form-control form-control-sm @error('tank') is-invalid @enderror" required autocomplete="tank" name="remark5" type="text" required>
                                    @error('tank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="engine">6. Measurement Engine Running (hours)</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="6">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input id="engine" class="form-control form-control-sm @error('engine') is-invalid @enderror" required autocomplete="engine" name="remark6" type="text" required>
                                    @error('engine')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="mode">7. Genset Mode</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="7">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input id="mode" class="form-control form-control-sm @error('mode') is-invalid @enderror" required autocomplete="mode" name="remark2" type="text" required>
                                    @error('mode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="switch">8. Switch Selector Panel Coupler</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="8">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input id="switch" class="form-control form-control-sm @error('switch') is-invalid @enderror" required autocomplete="switch" name="remark2" type="text" required>
                                    @error('switch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="pkg">9. Switch Selector Panel PKG</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="9">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input id="pkg" class="form-control form-control-sm @error('pkg') is-invalid @enderror" required autocomplete="pkg" name="remark2" type="text" required>
                                    @error('pkg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="putr1">10. Switch Selector PUTR 1</label>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="10">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input id="putr1" class="form-control form-control-sm @error('putr1') is-invalid @enderror" required autocomplete="putr1" name="remark2" type="text" required>
                                    @error('putr1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="putr2">11. Switch Selector PUTR 2</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="11">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input id="putr2" class="form-control form-control-sm @error('putr2') is-invalid @enderror" required autocomplete="putr2" name="remark2" type="text" required>
                                    @error('putr2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table id="genset2" class="table table-bordered" >
                    <thead>
                        <tr>
                            <th>Generator 2</th>
                            <th><input class="text-center" name="date2" type="date"></th>
                            <th><input class="text-center" name="time2" type="time"></th>
                        </tr>
                        <tr>
                            <th>Task Details</th>
                            <th>Unit Status</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <label>1. Tighten Battery Connection</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="1a">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input name="remark1a" type="text" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>2. Measurement Battery Voltage (Open Circuit)</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="2a">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input name="remark2a" type="text" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>3. Measurement Battery Voltage (Charging Condition)</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="3a">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input name="remark3a" type="text" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>4. Check For Lubricant Oil Level</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="4a">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input name="remark4a" type="text" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>5. Status Storage Tank Level</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="5a">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input name="remark5a" type="text" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>6. Measurement Engine Running (hours)</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="6a">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input name="remark6a" type="text" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>7. Genset Mode</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="7a">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input name="remark7a" type="text" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>8. Switch Selector Panel Coupler</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="8a">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input name="remark8a" type="text" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>9. Switch Selector Panel PKG</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="9a">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input name="remark9a" type="text" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>10. Switch Selector PUTR 1</label>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="10a">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input name="remark10a" type="text" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>11. Switch Selector PUTR 2</label>
                            </td>
                            <td class="input">
                                <select id="input-group3" style="background: white;" name="11a">
                                    <option value="">-</option>
                                    <option value="1">OK</option>
                                    <option value="0">Not OK</option>
                                </select>
                            </td>
                            <td class="input">
                                <input name="remark11a" type="text" required>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-lg">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
    </div>


</body>
