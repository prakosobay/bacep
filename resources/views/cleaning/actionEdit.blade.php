@if ($model->checkin_personil == null)
    <a href="{{url ('cleaning/action/checkin', $model->cleaning_id)}}" class="btn btn-xs btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i>Checkin</a>
    <form action="{{ route ('cleaningCheckinCancel', $model->cleaning_id) }}" method="POST" onsubmit="return confirm('Are You Sure Want to Cancel ?')">
        @csrf
        <button type="submit" class="btn btn-xs btn-danger btn-sm mx-1 my-1"><i class="glyphicon glyphicon-edit"></i>Cancel</button>
    </form>

@elseif(($model->checkin_personil) && ($model->checkout_personil == null))
    <a href="{{url ('cleaning/action/checkout', $model->cleaning_id)}}" class="btn btn-xs btn-dark btn-sm"><i class="glyphicon glyphicon-checkout"></i>Checkout</a>

@endif
{{-- modal reject --}}
<div class="modal fade" id="reject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alasan Reject :</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('cleaning/full/reject', $model->cleaning_id)}}" method="POST">
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


