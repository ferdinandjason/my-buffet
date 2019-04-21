@foreach ($orders as $order)
    <p>{{$order->id}}</p>
    <p>{{$order->created_at}}</p>
    <p>{{$order->total}}</p>
    <p>{{$order->status}}</p>
    @foreach ($order->details as $item)
        <tr>
            <td>{{$item->menuRestaurant->nama_makanan}}</td>
            <td>{{$item->amount}}</td>
            <td>{{$item->sub_total}}</td>
        </tr>
    @endforeach
    <p>{{$order->comments}}</p>
    <p>{{$order->alamat}}</p>
@endforeach