{{-- @if ($model->checkin == null)
    <a href="{{url ('internal/action/checkin/form', $model->id)}}" class="btn btn-xs btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i>Checkin</a>
    <button type="button" class="btn btn-danger btn-sm mx-2 my-2" data-bs-toggle="modal" data-bs-target="#cancel">
        Cancel
    </button>

@elseif(($model->checkin) && ($model->checkout == null))
    <a href="{{url ('internal/action/checkout', $model->id)}}" class="btn btn-xs btn-dark btn-sm"><i class="glyphicon glyphicon-checkout"></i>Checkout</a>
    <button type="button" class="btn btn-danger btn-sm mx-2 my-2" data-bs-toggle="modal" data-bs-target="#cancel">
        Cancel
    </button>

@elseif ($model->checkout)
    <a href="{{ url('internal/action/show', $model->id)}}" class="btn btn-xs btn-success btn-sm mx-2 my-2"><i class="glyphicon glyphicon-edit"></i>Show</a>
@endif --}}

<a href="{{ url('internal/lastform', $model->id )}}" class="btn btn-primary btn-sm mx-1 my-1">Select Form</a>
<button type="button" class="btn btn-danger btn-sm mx-1 my-1" data-bs-toggle="modal" data-bs-target="#cancel">
    Cancel
</button>

{{-- modal cancel --}}
<div class="modal fade" id="cancel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alasan Reject :</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('internal/full/reject', $model->id)}}" method="POST">
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


