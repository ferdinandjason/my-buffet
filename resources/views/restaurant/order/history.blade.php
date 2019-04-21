@extends('adminlte::page')

@section('css')
    <style>
        html, body {
            padding-top: 0px !important;
        }

        .box-body.table-responsive {
            padding-top: 20px;
        }

    </style>
@endsection

@section('content_header')
    <h1>
        Order History
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Hotel</a></li>
        <li><a href="#"><i></i> Order</a></li>
        <li class="active"> History</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header">
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Created At</th>
                            <th>Total</th>
                            <th>Comments</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->comments}}</td>
                            <td>{{$order->alamat}}</td>
                            <td><span class="label label-success">{{$order->status}}</span></td>
                            <td>
                                <div style="display:flex">
                                    <a href="#">
                                        <button type="button" class="btn btn-info" style="margin-left:10px;" data-toggle="modal" data-target="#modal-detail"> 
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </button>
                                    </a>
                                </div>
                            </td>

                            <div class="modal fade" id="modal-detail" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Order Detail</h4>
                                        </div>
                                        
                                        <div class="modal-body" style="padding-top: 0px; padding-bottom: 0px;">
                                            @foreach ($order->details as $item)
                                            
                                            {{$item->menuRestaurant->nama_makanan}}<br>
                                            {{$item->amount}}<br>
                                            {{$item->sub_total}}<br>

                                            @endforeach
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

<!-- @foreach ($orders as $order)
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
@endforeach -->