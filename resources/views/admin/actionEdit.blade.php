<a href="{{ url('revisi/visitor/edit', $model->id)}}" class="btn btn-xs btn-success btn-sm mx-1 my-1" id=""><i class="glyphicon glyphicon-edit"></i>Edit</a>
<form action="{{ url('revisi/visitor/destroy',$model->id) }}" method="POST" onsubmit="return confirm('Are You Sure Want to Delete This Relasi ?')" >
    @csrf
    <button type="submit"class="btn btn-danger mr-2 col-xs-2 margin-bottom hapus">Hapus</button>
</form>
