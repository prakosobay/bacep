@if ($model->checkin_personil == null)
<a href="{{url ('cleaning/action/checkin', $model->cleaning_id)}}" class="btn btn-xs btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i>Checkin</a>
{{-- <a href="#" class="btn btn-xs btn-danger btn-sm mx-2 my-2"><i class="glyphicon glyphicon-edit"></i>Reject</a> --}}
<button type="button" class="btn btn-danger btn-sm mx-2 my-2" data-bs-toggle="modal" data-bs-target="#reject">
  Reject
</button>
@elseif(($model->checkin_personil) && ($model->checkout_personil == null))
<a href="{{url ('cleaning/action/checkout', $model->cleaning_id)}}" class="btn btn-xs btn-dark btn-sm"><i class="glyphicon glyphicon-checkout"></i>Checkout</a>
{{-- <a href="#" class="btn btn-xs btn-danger btn-sm mx-2 my-2"><i class="glyphicon glyphicon-edit"></i>Reject</a> --}}
<button type="button" class="btn btn-danger btn-sm mx-2 my-2" data-bs-toggle="modal" data-bs-target="#reject">
  Reject
</button>
<div class="modal fade" id="reject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reject Permit Cleaning</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('/cleaning/full/reject', $model->cleaning_id)}}" method="POST" onsubmit="return confirm('Are you sure want to reject this permit ?')">
                @csrf
                {{-- @method('PUT') --}}
                <div class="modal-body">
                    <label for="note">Note :</label>
                    <input type="text" id="note" name="note" class="form-control mt-2" value="{{ old('note')}}" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@elseif ($model->checkout_personil)
<a href="{{ url('cleaning/action/show', $model->cleaning_id)}}" class="btn btn-xs btn-success btn-sm mx-2 my-2"><i class="glyphicon glyphicon-edit"></i>Show</a>
@endif


