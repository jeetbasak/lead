@extends('admin.layouts.app')
@section('title')
<title>Admin | Reset Password</title>
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
                <p>Reset Password !</p>
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
                <h2>Reset Password</h2>
                <p>Please enter your new password</p>
                <form method="post" action="{{route('admin.new.password.set')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{@$data->id}}">
                    {{-- email --}}
                    <div class="e-col">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    
                        <div class="e-col">
                            <button type="submit" class="next-btn next-button">
                             Change Password
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