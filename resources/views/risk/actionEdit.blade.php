{{-- <a href="{{ route('riskEdit', $model->id) }}" class="btn btn-sm btn-primary mx-1 my-1" type="button">Update</a> --}}

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
            <form action="{{ route('riskUpdate', $model->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="risk" class="form-label"><b>Risk :</b></label>
                        <input id="risk" type="text" class="form-control" name="risk" value="{{ $model->risk }}" required>
                    </div>
                    <div class="form-group">
                        <label for="poss" class="form-label"><b>Possibility :</b></label>
                        <input id="poss" type="text" class="form-control" name="poss" value="{{ $model->poss }}" required>
                    </div>
                    <div class="form-group">
                        <label for="impact" class="form-label"><b>Impact :</b></label>
                        <select name="impact" id="impact" class="form-control">
                            <option value="{{ $model->impact }}">{{ $model->impact }}</option>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mitigation" class="form-label"><b>Mitigation Plan :</b></label>
                        <input id="mitigation" type="text" class="form-control" name="mitigation" value="{{ $model->mitigation }}" required>
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

<form action="{{ route('riskDelete',$model->id) }}" method="POST" onsubmit="return confirm('Are You Sure Want to Delete This Relasi ?')" >
    @csrf
    <button type="submit"class="btn btn-danger btn-sm mx-1 my-1">Hapus</button>
</form>
