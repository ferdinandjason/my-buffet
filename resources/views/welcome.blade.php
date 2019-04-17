@extends('adminlte::master')

@section('adminlte_css')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

    <style>
        .homepage-hero .container {
            height: 80vh;
        }

        .homepage-hero .container h1 {
            font-size: 32px;
            font-weight: 900;
            color: #F3EFF5;
            margin-bottom: 455px;
        }
        
        .homepage-hero .container h5{
            color: #F3EFF5;
            margin-bottom: 45px;
        }


        .homepage-hero .container h3 {
            color: #F3EFF5;
            font-size: 18px;
        }

        .homepage-hero .container h5 a {
            color: #72B01D;
        }

        .homepage-hero .container h5 a:hover {
            color: #3F7D20;
        }

        .homepage-hero .container h3 a {
            color: #72B01D;
        }

        .homepage-hero .container h3 a:hover {
            color: #3F7D20;
        }


        a.button-register {
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

        a.button-register:active {
            top:0.1em;
        }
            
        @media all and (max-width:30em) {
            a.button-register {
                display:block;
                margin:0.4em auto;
            }
        }

    </style>
@stop

@section('body')
    @include('layouts.nav')
    <div class="container">
        <section class="homepage-hero">
            <div class="container center">
                <h1>Order your favourite food at any place</h1>
                <h3>What are you waiting for?</h3>

                <a href="{{url('/register')}}" class="button-register">Register Now!</a>

                <h5>Already have an account?  <a href="{{url('/login')}}">Login</a></h5>

                <h3>Are you a Restaurant Owner?  <a href="{{url('/login')}}">Join Us!</a></h3>

            </div>
            
        </section>
        
        <section class="homepage-restaurants">
            
        </section>
    </div>
@stop