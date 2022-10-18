{{-- <button class="btn btn-sm btn-primary mx-1 my-1" type="button" data-bs-toggle="modal" data-bs-target="#roomModal{{ $model->id }}" data-id="{{ $model->id }}">Update</button> --}}

{{-- <div class="modal fade" id="roomModal{{ $model->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $model->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('roomUpdate', $model->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Name :</label>
                        <input type="text" name="name" id="name" value="{{ $model->name }}" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}

<form action="{{ route('roomDelete',$model->id) }}" method="POST" onsubmit="return confirm('Are You Sure Want to Delete This Relasi ?')" >
    @csrf
    <button type="submit"class="btn btn-danger btn-sm mx-1 my-1">Hapus</button>
</form>
