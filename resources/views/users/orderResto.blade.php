@extends('adminlte::master')

@section('adminlte_css')
    <style>
        .card {
            background-color: #fff;
            border: 1px solid #eee; 
            border-radius: 6px; 
        }

        .card .card-img img { 
            border-radius: 6px 6px 0 0; 
        }

        .card .card-img { 
            position: relative; 
            padding: 0; 
            display: table; 
        }

        .card .card-body {
            display: table; 
            width: 100%; 
            padding: 12px;
        }

        .card .card-body h5, .card .card-body h4 {
            text-transform: uppercase;
            margin: 0;
        }

        .card .card-body p {
            margin-top: 6px;
            margin-bottom: 12px;
        }

        .card .card-body .inline > *{
            display: inline-block;
        }

        .card .card-body .inline > *:nth-child(2) {
            float: right;
        }

        .preview-price {
            width: 50%;
            height: 50px;
            right: 0;
            left: 0;
            bottom: 0;
            position: fixed;
            left: 50%;
            margin-left: -25%;
            padding: 0 30px;
            background-color: #00a65a;
            border-radius: 6px; 
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .preview-price > * {
            display: inline-block;
            color: white;
        }

        .preview-price > *:nth-child(1), .preview-price > *:nth-child(2) {
            margin-top: 15.5px;
        }

        .preview-price > *:nth-child(3) {
            float: right;
            margin-top: 10px;
            background: transparent;
            border: 1px solid white;
        }




    </style>
@stop

@section('body')
    @include('layouts.nav')
    <div class="container">
        @foreach ($menuRestaurants as $menu)
            <div class="col-sm-4">
                <div class="card">
                    <span class="card-img">
                        <img src="{{Storage::url($menu->foto)}}" class="img-responsive">
                        <div class="card-body">
                            <h5><b>{{$menu->kategori}}</b></h5>
                            <h4>{{$menu->nama_makanan}}</h4>
                            <p>{{$menu->deskripsi}}</p>

                            <div class="inline">
                                <h5><b>Rp {{$menu->harga}}</b></h5>
                                <button class="btn btn-sm bg-olive" onclick="pilihMenu({{$menu->id}}, '{{$menu->nama_makanan}}', {{$menu->harga}})">+ Add</button>
                                <!-- <div class="btn-group">
                                    <button type="button" class="btn btn-sm" onclick="pilihMenu({{$menu->id}}, '{{$menu->nama_makanan}}', {{$menu->harga}})">-</button>
                                    <button class="btn btn-sm">0</button>
                                    <button type="button" class="btn btn-sm">+</button>
                                </div> -->
                            </div>
                        </div>
                    </span>
                </div>
            </div>

            <!-- <p>{{$menu->id}}</p>
            <p>{{$menu->nama}}</p>
            <p>{{$menu->deskripsi}}</p>
            <p>{{$menu->kategori}}</p>
            <p>{{$menu->harga}}</p>
            <p>{{$menu->stok}}</p>
            <p>{{$menu->foto}}</p>
            <p>{{$menu->restaurant->nama}}</p> -->
        @endforeach

        <div class="preview-price">
            <h4><b>Total: </b>RP </h4>
            <h4 class="preview-total-price">0</h4>
            <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#modal-cart"> 
            <i class="fa fa-fw fa-shopping-cart"> </i>View Cart</button>
        </div>

        <div class="modal fade" id="modal-cart" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">My Cart</h4>
                    </div>
                    
                    <form action={{route('user.order.final')}} method="POST" id="formOrder">
                    {{ csrf_field() }}
                    
                        <div class="modal-body">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}" id="user_id"/>
                                <input type="hidden" name="restaurant_id" value="0" id="restaurant_id"/>
                                
                                <div id="dynamicField"></div>

                                <table class="table table-condensed" id="dynamicTable">
                                    <tbody>
                                    
                                    </tbody>
                                </table>
                                
                                <label for="comments">Note</label>
                                <input type="text" name="comments" id="comments"/>

                                <input type="hidden" name="total" id="total" value="0"/>
                                
                        </div>
                        <div class="modal-footer">
                            <h4><b>Total: </b>RP </h4>
                            <h4 class="preview-total-price">0</h4>
                            
                            <button type="submit" class="btn btn-default bg-olive">Order</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

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

            $('.preview-total-price').text($('#total').val())

            $('#tabletr_'+id+' > td:nth-child(2)').text($('#menuId_'+id).val())
            $('#tabletr_'+id+' > td:nth-child(3)').text(parseInt($('#menuId_'+id).val()) * harga)

        } else {
            orderMenuId.push(id);
            $('#dynamicField').append(
                "<br><input type='hidden' name='menu_restaurant_id[]' value='"+id+"'/>"+ 
                "<input type='hidden' name='amount[]' value=1 id='menuId_"+id+"'/>"+
                "<input type='hidden' name='sub_total[]' value="+harga+" id='hargaMenuId_"+id+"'/>"+
                "<br>"
            )

            $('#dynamicTable').append(
                "<tr id='tabletr_" +id + "'><td><p>"+nama+"</p></td>"+
                "<td>1</td>" + 
                "<td>" + harga + "</td></tr>"
            )

            $('#total').val( parseInt($('#total').val()) + harga )

            $('.preview-total-price').text($('#total').val());
        }
    }
</script>
@stop
