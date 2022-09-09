@if($model->checkin == null)
    <a href="{{ route('troubleshootCheckinShow', $model->id) }}" class="btn btn-xs btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i>Checkin</a>
    <form action="{{ route('troubleshootCheckinCancel', $model->id) }}" method="POST" onsubmit="return confirm('Are You Sure Want to Cancel ?')">
        @csrf
        <button type="submit" class="btn btn-xs btn-danger btn-sm mx-1 my-1"><i class="glyphicon glyphicon-edit"></i>Cancel</button>
    </form>
@elseif(($model->checkin) && ($model->checkout == null))
    <a href="{{ route('troubleshootCheckoutShow', $model->id) }}" type="button" class="btn btn-sm btn-dark mx-1 my-1">Checkout</a>
@endif
