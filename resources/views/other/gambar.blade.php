<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gambar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
    <form class="form-group" enctype="multipart/form-data" method="POST" action="{{url('/gambar2')}}">
        @csrf
        {{-- <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Multiple files input example</label>
            <input class="form-control" type="file" id="formFileMultiple" name="pict" accept="image/*"/>
        </div> --}}

        <input type="time" name="jam1">
        <input type="time" name="jam2">
        <button type="submit" class="btn btn-warning text-white btn-submit">Submit Form</button>
    </form>

    <div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Time1</th>
                <th>Time2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jam as $c)
            <tr>
                <td>{{$c->time1}}</td>
                <td>{{$c->time2}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
</html>
