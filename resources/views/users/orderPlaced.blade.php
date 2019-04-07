@extends('adminlte::master')

@section('adminlte_css')
    <style>
        .placed {
            color: #3d9970 !important;
            font-size: 80px;
        }

        .panel-heading {
            background-color: white !important;
        }

        p {
            font-size: 20px;
        }

        .container {
            margin-top: 80px;
        }

        button a{
            color: white !important;
        }

        .bank {
            width: 102px;
            height: 30px;
        }

        .panel-footer p{
            text-align: left;
        }

    </style>
@stop

@section('body')
    @include('layouts.nav')
    <div class="container">
        <div class="col-md-12 text-center">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="glyphicon glyphicon-ok-circle placed"></i><br><h2>Order Telah Diterima !</h2></div>
                <div class="panel-body">
                    <p>Setelah kamu transfer, pesanan kamu akan jadi dalam ~30 menit!</p>
                    

                    <div class="panel-body">
                            <div class="col-md-12 text-center"> 
                                <div class="btn-group btn-group-lg" role="group" aria-label="Large button group"> 
                                    <button type="button" onclick="tampil(1)" class="btn"><img class="bank" src="http://www.bni.co.id/Portals/1/bni-logo-id.svg?ver=2017-04-27-170938-000"></button> 
                                    <button type="button" onclick="tampil(2)" class="btn"><img class="bank" src="https://upload.wikimedia.org/wikipedia/id/thumb/e/e0/BCA_logo.svg/1280px-BCA_logo.svg.png"></button> 
                                    <button type="button" onclick="tampil(3)" class="btn"><img class="bank" src="https://upload.wikimedia.org/wikipedia/id/thumb/f/fa/Bank_Mandiri_logo.svg/1280px-Bank_Mandiri_logo.svg.png"></button> 
                                    <button type="button" onclick="tampil(4)" class="btn"><img class="bank" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/BANK_BRI_logo.svg/1280px-BANK_BRI_logo.svg.png"></button> 
                                    <button type="button" onclick="tampil(5)" class="btn"><img class="bank" src="https://upload.wikimedia.org/wikipedia/id/thumb/4/48/PermataBank_logo.svg/1280px-PermataBank_logo.svg.png"></button> 
    
                                </div>
                            </div>
                            <div class="col-md-12"> 
                                <div class="panel-footer" style="display: none" id="1">
                                    <p>1. Login ke akun BNI Mobile</p>
                                    <p>2. Pilih Transfer > Virtual Account Billing</p>
                                    <p>3. Masukkan angka 42398 diikuti nomor HP-mu (mis.: 42398xxx xxxxx xxxx)</p>
                                    <p>4. Masukkan {{$order->total}}</p>
                                    <p>5. Ikuti instruksi untuk menyelesaikan transaksi</p>
                                </div>
                                <div class="panel-footer" style="display: none" id="2">
                                    <p>1. Login ke akun BCA Mobile</p>
                                    <p>2. Pilih Transaksi Lainnya > Transfer > Virtual Account</p>
                                    <p>3. Masukkan angka 33143 diikuti nomor HP-mu (mis.: 33143xxx xxxxx xxxx)</p>
                                    <p>4. Masukkan {{$order->total}}</p>
                                    <p>5. Ikuti instruksi untuk menyelesaikan transaksi</p>
                                </div>
                                <div class="panel-footer" style="display: none" id="3">
                                    <p>1. Login ke akun Mandiri Mobile</p>
                                    <p>2. Pilih Bayar/Beli > Lainnya > Lainya > Transfer > Virtual Account</p>
                                    <p>3. Masukkan angka 61234 diikuti nomor HP-mu (mis.: 61234xxx xxxxx xxxx)</p>
                                    <p>4. Masukkan {{$order->total}}</p>
                                    <p>5. Ikuti instruksi untuk menyelesaikan transaksi</p>
                                </div>
                                <div class="panel-footer" style="display: none" id="4">
                                    <p>1. Login ke akun Bri Mobile</p>
                                    <p>2. Pilih Transfer > Transfer ke Bank Lain > Bank Nobu (Biaya admin 6500)</p>
                                    <p>3. Masukkan angka 9 diikuti nomor HP-mu (mis.: 9xxx xxxxx xxxx)</p>
                                    <p>4. Masukkan {{$order->total}}</p>
                                    <p>5. Ikuti instruksi untuk menyelesaikan transaksi</p>
                                </div>
                                <div class="panel-footer" style="display: none" id="5">
                                    <p>1. Login ke akun Permata Mobile Net</p>
                                    <p>2. Pilih Transfer > Transfer ke Virtual Account </p>
                                    <p>3. Masukkan angka 91 diikuti nomor HP-mu (mis.: 91xxx xxxxx xxxx)</p>
                                    <p>4. Masukkan {{$order->total}}</p>
                                    <p>5. Konfirmasi Detail dan masukkan Response Code</p>
                                    <p>6. Ikuti instruksi untuk menyelesaikan transaksi</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center"> 
                            <a href="{{route('user.home')}}">
                                <button type="submit" class="btn btn-default bg-olive" style="width: 15%;">
                                    Home
                                </button>
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
        
@stop

@section('adminlte_js')
<script>
function tampil(id){
        $('#1').css('display','none');
        $('#2').css('display','none');
        $('#3').css('display','none');
        $('#4').css('display','none');
        $('#5').css('display','none');
        $('#'+id).css('display','block');
    }
</script>
@stop
