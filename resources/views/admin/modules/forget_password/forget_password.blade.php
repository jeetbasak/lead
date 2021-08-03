@extends('admin.layouts.app')
@section('title')
<title>Admin | Forget Password</title>
@endsection
@section('head')
@include('admin.include.head')
@endsection
@section('content')
<div class="container-fluid p-0">
    <div class="d-flex signup-bg">
        <div class="left-panel">
            <div class="logo-col text-center"><h2>TaskAffix</h2></div>
            
            <div class="log-text">
                <h2>ADMIN</h2>
                <p>Forget Password !</p>
                {{--  <a href="{{ route('register') }}">Sign Up</a> --}}
            </div>
            
        </div>
        <div class="right-panel">
            <div class="login-info">
                <ul>
                    {{--  <li>Doesn't have an account yet?</li> --}}
                    {{-- <li><a class="share-btn" href="{{ route('register') }}">Sign Up</a></li> --}}
                </ul>
            </div>
            
            <div class="welcome-col">
                <h2>Forget Password</h2>
                <p>Please enter your email</p>
                @include('frontend.include.message')
                <form method="POST" action="{{ route('admin.forget.password') }}">
                    @csrf
                    {{-- email --}}
                    <div class="e-col">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter your email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    
                        <div class="e-col">
                            <button type="submit" class="next-btn next-button">
                             Post
                            </button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
    </div>
    @endsection
    @section('script')
    @include('admin.include.script')
    @endsection