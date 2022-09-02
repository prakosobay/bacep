<a type="button" class="btn btn-sm btn-success mx-1 my-1" href="{{ route('assetEditShow', $model->id)}}">Masuk</a>
<a type="button" class="btn btn-sm btn-danger mx-1 my-1" href="{{ route('assetEditKeluar', $model->id)}}">Keluar</a>
<a type="button" class="btn btn-sm btn-primary mx-1 my-1" href="{{ route('assetEditDigunakan', $model->id)}}">Digunakan</a>
<a type="button" class="btn btn-sm btn-secondary mx-1 my-1" href="{{ route('assetEditItemcode', $model->id)}}">Edit</a>

