@extends('adminlte::master')

@section('adminlte_css')
    <style>
        .card {
            background-color: #fff;
            border: 1px solid transparent; 
            border-radius: 6px; 
        }

        .card .card-caption {
            position: absolute;
            left: 30px;
            bottom: 10px;
            color: #fff;
        }
    </style>
@stop

@section('body')
    @include('layouts.nav')
    <div class="container">

        @foreach ($restaurants as $resto)
        
        <div class="col-sm-4">
            <div class="card">
                <span class="card-img">
                    <img src="https://fillmurray.com/g/640/320" class="img-responsive">
                    <div class="card-caption">
                        <span class="h2">{{$resto->nama}}</span>
                    </div>
                </span>
            </div>
        </div>

        @endforeach

        <!-- @foreach ($restaurants as $resto)
            <p>{{$resto->id}}</p>
            <p>{{$resto->nama}}</p>
            <p>{{$resto->alamat}}</p>
            <p>{{$resto->nomor_telepon}}</p>
            <button onclick="pilihRestaurant({{$resto->id}})">Pilih Resto +</button>
            <p> Menu nya adalah ---------------------------------------------- </p>
            @if(is_null($resto->menu))
                <p> No Menu Avaiable </p>
            @else
                @foreach ($resto->menu as $menu)
                    <img src="{{Storage::url($menu->foto)}}" style="height: 100px;width: 100px;"/>
                    <p>{{$menu->nama_makanan}}</p>
                    <p>{{$menu->deskripsi}}</p>
                    <p>{{$menu->harga}}</p>
                    <p>{{$menu->stok}}</p>
                    <button onclick="pilihMenu({{$menu->id}},'{{$menu->nama_makanan}}',{{$menu->harga}})">Tambah +</button>
                    <br/>
                @endforeach
            @endif
        @endforeach

        <p> -------------------------------------------------------------- </p>

        <form action={{route('user.order.final')}} method="POST" id="formOrder">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" id="user_id"/>
            <input type="hidden" name="restaurant_id" value="0" id="restaurant_id"/>
            <label for="comments">Note</label>
            <input type="text" name="comments" id="comments"/>
            <div id="dynamicField"></div>
            <input name="total" id="total" value="0"/>
            <button type="submit"> Beli </button>
        </form> -->




    </div>
@stop

@section('adminlte_js')
<script>
    $('#total').val(0)
    let orderMenuId = []

    function pilihRestaurant(id){
        $('#restaurant_id').val(id);
    }

    function pilihMenu(id, nama, harga){
        if(orderMenuId.find(e => e == id) !== undefined){
            $('#menuId_'+id).val( parseInt($('#menuId_'+id).val()) + 1);
            $('#hargaMenuId_'+id).val( parseInt($('#menuId_'+id).val()) * harga)
            $('#total').val( parseInt($('#total').val()) + harga )
        } else {
            orderMenuId.push(id);
            $('#dynamicField').append("<br><input type='hidden' name='menu_restaurant_id[]' value='"+id+"'/>"+
                "<p>"+nama+"</p>"+
                "<input type='text' name='amount[]' value=1 id='menuId_"+id+"'/>"+
                "<input type='text' name='sub_total[]' value="+harga+" id='hargaMenuId_"+id+"'/>"+
                "<br>"
            )
            $('#total').val( parseInt($('#total').val()) + harga )
        }
    }
</script>
@stop
