@extends('adminlte::master')

@section('adminlte_css')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@stop

@section('body')
    @include('layouts.nav')
    <div class="container">
        <section class="homepage-hero">
            <div class="container center">
                hai
            </div>
            
        </section>
        <section class="homepage-deals">
            <div class="container center">
                hai2
            </div>
            
        </section>
        <section class="homepage-restaurants">
            
        </section>
    </div>
@stop