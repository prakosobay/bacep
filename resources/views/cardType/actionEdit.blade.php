<button type="button" class="btn btn-primary btn-sm mx-1 my-1" data-bs-toggle="modal" data-id="{{ $model->id }}" data-bs-target="#exampleModal{{ $model->id }}">
    Edit
  </button>

  <!-- Modal -->
<div class="modal fade" id="exampleModal{{ $model->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('cardTypeUpdate', $model->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Tipe Kartu :</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $model->name }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<form action="{{ route('cardTypeDelete',$model->id) }}" method="POST" onsubmit="return confirm('Are You Sure Want to Delete This Relasi ?')" >
    @csrf
    <button type="submit"class="btn btn-danger mx-1 my-1 btn-sm">Hapus</button>
</form>
