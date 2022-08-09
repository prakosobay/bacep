<a href="{{url ('survey/action/checkin', $model->id)}}" class="btn btn-xs btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i>Checkin</a>
<button type="button" class="btn btn-danger btn-sm mx-2 my-2" data-bs-toggle="modal" data-bs-target="#rejectSurvey">
    Reject
</button>

{{-- modal Reject --}}
<div class="modal fade" id="rejectSurvey" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alasan Reject :</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('survey/full/reject', $model->id)}}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="note" class="form-label">Note : </label>
                    <input id="note" type="text" class="form-control" name="note" value="{{ old('note')}}" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
