@if ($model->checkin == null)
    <a href="{{route ('checkinEksternal', Crypt::encrypt($model->id))}}" class="btn btn-xs btn-primary btn-sm mx-1 my-1"><i class="glyphicon glyphicon-edit"></i>Checkin</a>
    <form action="{{ route ('cancelCheckinEksternal', Crypt::encrypt($model->id)) }}" method="POST" onsubmit="return confirm('Are You Sure Want to Cancel ?')">
        @method('put')
        @csrf
        <button type="submit" class="btn btn-xs btn-danger btn-sm mx-1 my-1"><i class="glyphicon glyphicon-edit"></i>Cancel</button>
    </form>

@elseif(($model->checkin) && ($model->checkout == null))
    <a href="{{route ('checkoutEksternal', Crypt::encrypt($model->id))}}" class="btn btn-xs btn-dark btn-sm mx-1 my-1"><i class="glyphicon glyphicon-checkout"></i>Checkout</a>
@endif


