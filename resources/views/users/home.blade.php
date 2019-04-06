@extends('adminlte::master')
@include('layouts.nav')

<!-- <h1>User Dashboard<h1>
<a href={{route('user.order')}}> Order </a> -->

@section('adminlte_css')
    <style>
        .carousel-inner>.item>img{
            width: 100%;
        }

        .carousel-caption{
            top: 40%;
        }

        .carousel-caption>.outer-order-form>h1{
            font-size: 32px;
            padding-bottom: 15px;
        }

        .overlay{
            position: absolute;
            display: block;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgb(69,73,85, 0.3);
        }

        a.button-find{
            display: inline-block;
            padding: 0.8em 5em;
            margin: 0 0.5em 0.5em 0;
            border-radius: 0.5em;
            box-sizing: border-box;
            text-decoration: none;
            font-size: 18px;
            color: #FFFFFF;
            background-color: #72B01D;
            box-shadow: inset 0 -0.6em 0 -0.35em rgba(0, 0, 0, 0.17);
            text-align: center;
            position: relative;
        }

        a.button-find:active{
            top:0.1em;
        }
            
        @media all and (max-width:30em){
            a.button-find{
                display:block;
                margin:0.4em auto;
            }
        }

    </style>
@endsection

@section('body')
<div class="bs-example">
    <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
    	<!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li class="slide-one active"></li>
            <li class="slide-two"></li>
            <li class="slide-three"></li>
        </ol>   
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="active item">
                <img src="{{asset('/images/home-slider1.jpg')}}" alt="First Slide">
            </div>
            <div class="item">
                <img src="{{asset('/images/home-slider2.jpg')}}" alt="Second Slide">
            </div>
            <div class="item">
                <img src="{{asset('/images/home-slider3.jpg')}}" alt="Third Slide">
            </div>

            <div class="carousel-caption">
                <div class="outer-order-form">
                    <h1 class="text-center">Order your favourite food at any place</h1>
                </div>

                <a href={{route('user.order')}} class="button-find">Find Restaurants</a>

            </div>

            
        </div>

        <div class="overlay"></div>
    
    </div>
</div>

<h1>User Dashboard<h1>
<a href={{route('user.order')}}> Order </a>

@foreach($data['bestResto'] as $resto)
        <p>{{$resto->restaurant->id}}<p>
@endforeach

@foreach ($data['orders'] as $order)
    <p>{{$order->id}}</p>
    <p>{{$order->created_at}}</p>
    <p>{{$order->total}}</p>
    <p>{{$order->status}}</p>
    <!-- $order->details buat menu menunya apa aja -->
@endforeach

@endsection