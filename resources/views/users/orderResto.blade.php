@foreach ($menuRestaurants as $menu)
    <p>{{$menu->id}}</p>
    <p>{{$menu->nama}}</p>
    <p>{{$menu->deskripsi}}</p>
    <p>{{$menu->kategori}}</p>
    <p>{{$menu->harga}}</p>
    <p>{{$menu->stok}}</p>
    <p>{{$menu->foto}}</p>
    <p>{{$menu->restaurant->nama}}</p>
@endforeach