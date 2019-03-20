@extends('adminlte::page')

@section('css')
<style>
    html, body {
        padding-top: 0px !important;
    }

    .boxImage {
        position: relative;
        width: 100%;
        padding-top: 100%;
    }

    .boxImage #foodImage {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
    }

    .col-md-12 .box-footer {
        text-align: center;
    }

    .col-md-12 .box-footer button {
        width: 20%;
    }

</style>
@stop

@section('content_header')
    <h1>
        Hotel Menu
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Hotel</a></li>
        <li class="">Menu</li>
        <li class="active">New</li>
    </ol>
@stop

@section('content')

<div class="box box-primary">
    <div class="row">
        <form role="form">
            
            <div class="box-body">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="menuNama">Nama</label>
                        <input type="text" class="form-control" id="menuNama" placeholder="Nama menu">
                    </div>
                    <div class="form-group">
                        <label for="menuDeskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="menuDeskripsi" placeholder="Deskripsi menu">
                    </div>
                    <div class="form-group">
                        <label for="menuKategori">Kategori</label>
                        <input type="text" class="form-control" id="menuKategori" placeholder="Kategori menu">
                    </div>
                    <div class="form-group">
                        <label for="menuStok">Stok</label>
                        <input type="text" class="form-control" id="menuStok" placeholder="Stok">
                    </div>
                    <div class="form-group">
                        <label for="menuHarga">Harga</label>
                        <input type="text" class="form-control" id="menuHarga" placeholder="Harga menu">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <div class="boxImage">
                            <img id="foodImage" src="{{asset('/images/foodbefore.jpg')}}" alt="your image"/>
                        </div>

                        <label for="menuGambar">Gambar</label>
                        <input type="file" id="menuGambar">

                        <p class="help-block">Gambar harus dalam resolusi 1:1</p>
                    </div>
                </div>
                
                
            </div>
            <div class="col-md-12">
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            
        </form>
    </div>
</div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#menu-restoran').DataTable();
        } );


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#foodImage').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#menuGambar").change(function() {
            readURL(this);
        });

    </script>
@stop