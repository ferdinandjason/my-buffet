<!-- ini ui buat edit profile dari restaurant nya pake variable $restaurant --> 

@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.css">

    <style>
        html, body {
            padding-top: 0px !important;
        }

        .profile-container {
            margin-bottom: 5vh;
            border-radius: 15px;
            width: 100%;
        }

        .row-profile {
            height: 80vh;
            margin-top: 10px;
            position: relative;
        }

        .left-profile {
            padding: 20px 60px 0 60px;
        }

        .right-profile {
            padding: 20px 0 0 60px;
        }

        #resto-photo {
            position: relative;
            width: 100%;
            padding-top: 60%;
        }

        #resto-photo #resto-avatar {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
        }

        .personal-info, .password-account{
            display: table;
            width: 80%;
            border-spacing: 8px;
            table-layout: fixed;
        }

        .table-row {
            display: table-row;
        }

        .table-title, .table-content {
            display: table-cell;
        }

        .table-title {
            margin-right: 50px;
        }

        .button-submit {
            position: absolute;
            bottom: 0;
            right: 20px;
        }
</style>
@stop

@section('content_header')
    <h1>
        My Profile
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Hotel</a></li>
        <li class="active">Profile</li>
    </ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header">
                
            </div>
            <div class="box-body">

                <div class="container profile-container">

                    <form id="edit-resto-profile" role="form" method="POST" action="#" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
                    <div class="row row-profile">

                        <div class="left-profile col-md-4">
                            <div class="form-group">
                                <div id="resto-photo">
                                    <img id="resto-avatar" src="{{asset('/images/restodefault.png')}}" alt="your image"/>
                                </div>

                                <label for="foto">Change Photo</label>
                                <input type="file" id="foto" name="foto">
                            </div>
                        </div>

                        <div class="right-profile col-md-8">
                            <div class="row profile-header">
                                <h1>Hotel Majapahit</h1>
                                <h5><b>Joined at: </b>10 April 2019</h5>
                            </div>

                            <div class="row profile-personal">
                                <h1>Personal Info</h1>
                                <div class="personal-info">
                                    <div class="table-row">
                                        <h3 class="table-title">Username</h3>
                                        <input type="text" class="form-control table-content" id="username" name="username" placeholder="{{ old('username') }}" value="{{ old('username') }}">
                                        <!-- <h5 class="table-content">majapahit</h5> -->
                                    </div>
                                    <div class="table-row">
                                        <h3 class="table-title">Name</h3>
                                        <input type="text" class="form-control table-content" id="name" name="name" placeholder="{{ old('name') }}" value="{{ old('name') }}">
                                        <!-- <h5 class="table-content">Hotel Majapahit</h5> -->
                                    </div>
                                    <div class="table-row">
                                        <h3 class="table-title">Email</h3>
                                        <input type="email" class="form-control table-content" id="email" name="email" placeholder="{{ old('email') }}" value="{{ old('email') }}">
                                        <!-- <h5 class="table-content">hotelmajapahit@gmail.com</h5> -->
                                    </div>
                                    <div class="table-row">
                                        <h3 class="table-title">Alamat</h3>
                                        <input type="text" class="form-control table-content" id="alamat" name="alamat" placeholder="{{ old('alamat') }}" value="{{ old('alamat') }}">
                                        <!-- <h5 class="table-content">Jln Teknik Komputer Gg II Perumahan dosen ITS Blok U no 26, ITS, Keputih, Sukolilo, Surabaya</h5> -->
                                    </div>
                                    <div class="table-row">
                                        <h3 class="table-title">No Telp</h3>
                                        <input type="text" class="form-control table-content" id="notelp" name="notelp" placeholder="{{ old('notelp') }}" value="{{ old('notelp') }}">
                                        <!-- <h5 class="table-content">089648491314</h5> -->
                                    </div>
                                </div>
                            </div>

                            <div class="row profile-password">
                                <h1>Password</h1>
                                <div class="password-account">
                                    <div class="table-row">
                                        <h3 class="table-title">Password</h3>
                                        <input type="password" class="form-control table-content" id="password" name="password" placeholder="{{ old('password') }}" value="{{ old('password') }}">
                                        <!-- <h5 class="table-content">************</h5> -->
                                    </div>
                                    <div class="table-row">
                                        <h3 class="table-title">New Password</h3>
                                        <input type="password" class="form-control table-content" id="newpassword" name="newpassword" value="{{ old('password') }}">
                                    </div>
                                    <div class="table-row">
                                        <h3 class="table-title">Confirm New Password</h3>
                                        <input type="password" class="form-control table-content" id="confirmnewpassword" name="confirmnewpassword" value="{{ old('password') }}">
                                    </div>
                                </div>
                            </div>
                        
                        </div>

                        <div class="button-submit">
                            <button type="submit" id="buttonedit" class="btn btn-success">Submit</button>
                        </div>

                    </div>
                </div>

            </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
@stop

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>

<script>

    function readURL(input) {            
        if (input.files && input.files[0]) {
            $("#resto-photo").css("padding-top", "0");

            var reader = new FileReader();

            reader.onload = function(e) {
                $('#resto-avatar').attr('src', e.target.result);
                $('#resto-avatar').croppie({
                    viewport: { width: 300, height: 300 },
                    boundary: { width: 300, height: 300 }
                });

                $(".croppie-container").css("height", "auto");   
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#foto").change(function() {
        readURL(this);
    });

</script>
    
@stop