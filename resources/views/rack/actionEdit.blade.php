<a href="{{ route('rackEdit', $model->id) }}" class="btn btn-sm btn-primary mx-1 my-1" type="button">Update</a>

<form action="{{ route('rackDelete',$model->id) }}" method="POST" onsubmit="return confirm('Are You Sure Want to Delete This Relasi ?')" >
    @csrf
    <button type="submit"class="btn btn-danger btn-sm mx-1 my-1">Hapus</button>
</form>
