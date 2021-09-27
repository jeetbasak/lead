{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <style>
        html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
        }
        .full-height {
        height: 100vh;
        }
        .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
        }
        .position-ref {
        position: relative;
        }
        .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
        }
        .content {
        text-align: center;
        }
        .title {
        font-size: 84px;
        }
        .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
        }
        .m-b-md {
        margin-bottom: 30px;
        }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ route('login') }}">Login</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
                @endauth
            </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
--}}
@extends('layouts.app')
@section('title')
<title>Landing page</title>
@endsection
@section('head')
@include('admin.include.head')
@endsection
@section('content')
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="container-fluid p-0">
    <!-- Top navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-shadow border-bottom">
        <div class="container">
            <div class="flx-row p-3 p-l-r-0">
                <div class="head-left">
                    <h2 class="logo"><a href="{{route('hm')}}"><img src="{{url('/')}}/public/admin/assets/images/TaskAffix.png" style="width: 110px;padding: 0px 0px;"></a></h2>
                    <button class="navbar-toggler lnd-menu" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                    <div class="collapse navbar-collapse lnd-drop" id="navbarSupportedContent">
                        <ul class="navbar-nav mt-lg-0 login-menu">
                            <li><a href="{{route('faq')}}">Faq</a></li>
                             <li><a href="{{route('tc')}}">About us</a></li>
                           
                        </ul>
                    </div>
                </div>
                <div class="head-right">
                    <ul class="login-menu">
                        {{--  <li><a href="#">Login</a></li> --}}
                        @if (Route::has('login'))
                        
                        @auth
                        <li> <b> <a href="{{ url('/home') }}">{{Auth::user()->name}}</a> </b></li>
                        @else
                        <li> <a href="{{ route('login') }}">Login</a> </li>
                        @if (Route::has('register'))
                        {{-- <li>    <a href="{{ route('register') }}">Register</a></li> --}}
                        <li class="get-btn"><a href="{{ route('register') }}">Get Started <span> > </span></a></li>
                        @endif
                        @endauth
                    </div>
                    @endif
                    
                </ul>
            </div>
            
            
        </div>
    </nav>
    <!-- Page content-->
    
    <div class="container l-content">
        <h1>Work without Limits</h1>
        <p>Easily build, run, and scale your dream workflows on one platform. What would you like to manage with monday.com work OS? </p>
        @php

        $service=DB::table('service')->where('status','A')->get();

        @endphp
        <ul>
            @foreach($service as $key=> $val)
            <li><input type="checkbox"> {{@$val->name}}</li>
            @endforeach
           {{--  <li><input type="checkbox"> Sales and CRM</li>
            <li><input type="checkbox"> Marketing</li>
            <li><input type="checkbox"> Creative and Design</li>
            <li><input type="checkbox"> Software development</li>
            <li><input type="checkbox"> Task management</li>
            <li><input type="checkbox"> HR and recruitment</li>
            <li><input type="checkbox"> IT</li>
            <li><input type="checkbox"> 200+ workflows</li> --}}
        </ul>
        
        
        
        @if (Route::has('login'))
        @auth
        <div class="btn"><a href="{{ route('dashboard.home') }}">Go To Dashboard <span> > </span></a></div>
        @else
        @if (Route::has('register'))
        
        <div class="btn"><a href="{{ route('register') }}">Get Started <span> > </span></a></div>
        
        @endif
        @endauth
        @endif
        
    </div>
    @php
    $img=DB::table('picture')->where('status','A')->get();
    @endphp
    <div class="pro-row">
        <ul>
            @foreach($img as $val)
            <li>
                <p>{{$val->title}}</p>
                <img src="{{url('/')}}/storage/app/public/pic/{{@$val->image}}" alt="" style="width: 100%; height: 175px;">
            </li>
            @endforeach
            {{-- <li>
                <p>Task management  Sales and CRM</p>
                <img src="{{url('/')}}/public/admin/assets/images/img2.png" alt="">
            </li>
            <li>
                <p>Marketing</p>
                <img src="{{url('/')}}/public/admin/assets/images/img3.png" alt="">
            </li>
            <li>
                <p>Software development</p>
                <img src="{{url('/')}}/public/admin/assets/images/img4.png" alt="">
            </li> --}}
        </ul>
    </div>

    <div class="footer">
        <p>Copyright © taskaffix.com. All Rights Reserved</p>
    </div>
    
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
{{-- @section('footer')
@include('frontend.include.footer')
@endsection --}}
@endsection
{{-- end content --}}
@section('script')
@include('frontend.include.script')
@endsection