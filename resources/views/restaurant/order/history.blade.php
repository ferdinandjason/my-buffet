@foreach ($orders as $order)
    <p>{{$order->id}}</p>
    <p>{{$order->created_at}}</p>
    <p>{{$order->total}}</p>
    <p>{{$order->status}}</p>
    <form action={{route('restaurant.order.paid', ['id' => $order->id])}} method="POST">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary btn-xs btn-block">Lunas</button>
    </form>
@endforeach