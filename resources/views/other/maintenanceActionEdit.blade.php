
@if($model->checkin == null)
    <a href="{{ route('maintenanceCheckinShow', $model->id)}}" class="btn btn-xs btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i>Checkin</a>
    <form action="{{ route ('maintenanceCheckinCancel', $model->id) }}" method="POST" onsubmit="return confirm('Are You Sure Want to Cancel ?')">
        @method('put')
        @csrf
        <button type="submit" class="btn btn-xs btn-danger btn-sm mx-1 my-1"><i class="glyphicon glyphicon-edit"></i>Cancel</button>
    </form>
@elseif(($model->checkin) && ($model->checkout == null))
    <a href="{{route ('maintenanceCheckoutShow', $model->id)}}" class="btn btn-xs btn-dark btn-sm mx-1 my-1"><i class="glyphicon glyphicon-checkout"></i>Checkout</a>
@endif


