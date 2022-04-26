@if ($model->checkin == null)
<a href="{{url ('cleaning/action/checkin', $model->cleaning_id)}}" class="btn btn-xs btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i>Checkin</a>
<a href="#" class="btn btn-xs btn-danger btn-sm mx-2 my-2"><i class="glyphicon glyphicon-edit"></i>Reject</a>
@elseif(($model->checkin) && ($model->checkout == null))
<a href="{{url ('cleaning/action/checkout', $model->cleaning_id)}}" class="btn btn-xs btn-dark btn-sm"><i class="glyphicon glyphicon-checkout"></i>Checkout</a>
<a href="#" class="btn btn-xs btn-danger btn-sm mx-2 my-2"><i class="glyphicon glyphicon-edit"></i>Reject</a>
@elseif ($model->checkout)
<button class="btn btn-success">Done</button>
@endif
