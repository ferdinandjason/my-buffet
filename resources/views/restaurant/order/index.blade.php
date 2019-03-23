@foreach ($orders as $order)
    <p>{{$order->id}}</p>
    <p>{{$order->user_id}}</p>
    <p>{{$order->restaurant_id}}</p>
    <p>{{$order->comments}}</p>
    <p>{{$order->total}}</p>
    @foreach ($order->details as $item)
        <p>{{$item->menu_restaurant_id}}</p>
        <p>{{$item->amount}}</p>
        <p>{{$item->sub_total}}</p>
    @endforeach
@endforeach