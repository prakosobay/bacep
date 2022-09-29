<a type="button" class="btn btn-sm btn-success mx-1 my-1" href="{{ url('admin/user/edit', $model->id)}}">Edit</a>
<form action="{{ url('admin/user/destroy',$model->id) }}" onsubmit="return confirm('Are You Sure Want to Delete This User ?')" method="POST">
    @csrf
    <button type="submit"class="btn btn-danger btn-sm mx-1 my-1">Hapus</button>
</form>
