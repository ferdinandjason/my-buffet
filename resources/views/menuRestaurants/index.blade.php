@extends('adminlte::page')

@section('css')
<style>
    html, body {
        padding-top: 0px !important;
    }
</style>
@stop

@section('content_header')
    <h1>
        Hotel Menu
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Hotel</a></li>
        <li class="active">Menu</li>
    </ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Menu</h3>
            </div>
            <div class="box-body">
                <table id="menu-restoran" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                        <th rowspan="1" colspan="1">Gambar</th>
                        <th rowspan="1" colspan="1">Nama</th>
                        <th rowspan="1" colspan="1">Kategori</th>
                        <th rowspan="1" colspan="1">Stok</th>
                        <th rowspan="1" colspan="1">Harga</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr role="row" class="odd">
                            <td class="sorting_1">Webkit</td>
                            <td>Safari 1.2</td>
                            <td>OSX.3</td>
                            <td>125.5</td>
                            <td>A</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">Gambar</th>
                            <th rowspan="1" colspan="1">Nama</th>
                            <th rowspan="1" colspan="1">Kategori</th>
                            <th rowspan="1" colspan="1">Stok</th>
                            <th rowspan="1" colspan="1">Harga</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
@stop

@section('js')
    <script>
    $(document).ready(function() {
        $('#menu-restoran').DataTable();
    } );
    </script>
@stop