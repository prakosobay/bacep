@if ($model->checkin == null)
    <a href="{{url ('internal/action/checkin/form', $model->id)}}" class="btn btn-xs btn-primary btn-sm mx-1 my-1"><i class="glyphicon glyphicon-edit"></i>Checkin</a>
    <form action="{{ url ('internal/action/cancel', $model->id) }}" method="POST" onsubmit="return confirm('Are You Sure Want to Cancel ?')">
        @method('put')
        @csrf
        <button type="submit" class="btn btn-xs btn-danger btn-sm mx-1 my-1"><i class="glyphicon glyphicon-edit"></i>Cancel</button>
    </form>

@elseif(($model->checkin) && ($model->checkout == null))
    <a href="{{url ('internal/action/checkout/form', $model->id)}}" class="btn btn-xs btn-dark btn-sm mx-1 my-1"><i class="glyphicon glyphicon-checkout"></i>Checkout</a>

@elseif ($model->checkout)
    <a href="{{ url('internal/action/show', $model->id)}}" class="btn btn-xs btn-success btn-sm mx-1 my-1"><i class="glyphicon glyphicon-edit"></i>Show</a>
@endif

{{-- <a href="{{ url('internal/lastform', $model->id )}}" class="btn btn-primary btn-sm mx-1 my-1">Select Form</a>
<button type="button" class="btn btn-danger btn-sm mx-1 my-1" data-bs-toggle="modal" data-bs-target="#cancel">
    Cancel
</button> --}}




